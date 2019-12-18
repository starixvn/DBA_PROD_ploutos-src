<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\PlayerMessagesJoinery;

class PlayerMessagesResolver extends AbstractResolver
{
    protected $targetEntity = 'PandoraBundle:PlayerMessages';
    public function initEntityResolver(){
        $this->rawFieldArrayJoinery = PlayerMessagesJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->join('a.PlayerProfile', 'b');
        }
        
        $this->query->leftjoin('a.Message', 'c');
        if(strpos($implodedField, 'd.') !== false){
            $this->query->leftjoin('c.Brand', 'd');
        }
        if(strpos($implodedField, 'e.') !== false){
            $this->query->leftjoin('c.Currency', 'e');
        }
    }
    
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        $this->joinModifierAspEntities();
        if(isset($this->args['Id'])){
            $this->query->andWhere('a.Id = :Id');
            $this->query->setParameter('Id', $this->args['Id']);
        }
        if(isset($this->args['MessageId'])){
            $this->query->andWhere('a.MessageId = :MessageId');
            $this->query->setParameter('MessageId', $this->args['MessageId']);
        }
        $this->query->setMaxResults(1);
        $result = $this->query->getQuery()->getResult();

        return $result;
    }
    
    public function getEntity(string $MessageId = ''){
        return $this->pandora_em->getRepository($this->targetEntity)->findOneBy(['MessageId'=> $MessageId]);
    }
    public function getPlayerMessageIdByMessageId($messageId = 0){
        $playerMessage = $this->pandora_em->getRepository($this->targetEntity)->findOneBy(['MessageId' => $messageId]);
        return $playerMessage->getId();
    }
    
}