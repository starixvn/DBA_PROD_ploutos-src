<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\PlayerfingerprinthitJoinery;

class PlayerfingerprinthitResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Playerfingerprinthits';
        $this->rawFieldArrayJoinery = PlayerfingerprinthitJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }

    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
    }
    
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        $this->query->setMaxResults(1);
        if(isset($this->args['Id']) && !empty($this->args['Id'])){
            $this->query->where('a.Id = :Id');
            $this->query->setParameter('Id', $this->args['Id']);
        }
        if(isset($this->args['FingerPrint']) && !empty($this->args['FingerPrint'])){
            $this->query->where('a.FingerPrint = :FingerPrint');
            $this->query->setParameter('FingerPrint', $this->args['FingerPrint']);
        }
        return $this->query->getQuery()->getResult();
    }
}