<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\PlayerFingerPrintJoinery;

class PlayerFingerPrintResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:PlayerFingerPrints';
        $this->rawFieldArrayJoinery = PlayerFingerPrintJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }

    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
    }
    
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        $this->joinModifierAspEntities();
        if(is_numeric($this->args['FingerPrint'])){
            $this->query->where('a.Id = :Id');
            $this->query->setParameter('Id', $this->args['FingerPrint']);
        }else{
            $this->query->where('a.FingerPrint = :FingerPrint');
            $this->query->setParameter('FingerPrint', $this->args['FingerPrint']);
        }
        $result = $this->query->getQuery()->getResult();
        if(count($result) > 0){
            return $result;
        }
        return [];
    }
}