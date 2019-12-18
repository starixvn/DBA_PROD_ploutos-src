<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\PlayerAccessLogJoinery;

class PlayerAccessLogResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Playeraccesslogs';
        $this->rawFieldArrayJoinery = PlayerAccessLogJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->join('a.PlayerProfiles', 'b');
        }
    }
    
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        $this->joinModifierAspEntities();
        if(isset($this->args['Id']) && !empty($this->args['Id'])){
            $this->query->where('a.Id = :Id');
            $this->query->setParameter('Id', $this->args['Id']);
        }
        if(isset($this->args['FingerPrint']) && !empty($this->args['FingerPrint'])){
            $this->query->where('a.FingerPrint = :FingerPrint');
            $this->query->setParameter('FingerPrint', $this->args['FingerPrint']);
        }
        $this->query->setMaxResults(1);
        return $this->query->getQuery()->getResult();
    }
}