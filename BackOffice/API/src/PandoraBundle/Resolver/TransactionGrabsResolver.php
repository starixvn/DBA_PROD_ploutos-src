<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\TransactionGrabsJoinery;

class TransactionGrabsResolver extends AbstractResolver
{
    public $targetEntity = 'PandoraBundle:Transactiongrabs';
    public function initEntityResolver(){
        $this->rawFieldArrayJoinery = TransactionGrabsJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
    }
    
    public function getQueryBuilderPagingResult()
    {
        $this->queryBuilderSelectAndJoin();
        $results = $this->query->getQuery()->getResult();
        
        // TODO: MAKE THE COLUMN SUBJECT TO COUNT DYNAMIC AS WELL
        if(isset($this->args['count']) && $this->args['count']){
            $this->totalCount = $this->query->select('count(a.Id)')->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
        }
        
        return $this->preparePagingResult($results, $this->totalCount);
    }
    
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        if(isset($this->args['Id'])){
            $this->query->where('a.Id = :Id');
            $this->query->setParameter('Id', $this->args['Id']);
            return $this->query->getQuery()->getResult();
        }
        if(isset($this->args['TransactionType']) && isset($this->args['SourceObjectId'])){
            $this->query->andWhere('a.TransactionType = :TransactionType');
            $this->query->andWhere('a.SourceObjectId = :SourceObjectId');
            $this->query->setParameters([
                'TransactionType' => $this->args['TransactionType'],
                'SourceObjectId' => $this->args['SourceObjectId']
            ]);
        }
        return $this->query->getQuery()->getResult();
    }
    
    public function deleteTransactionGrabEntity(int $targetId = 0){
        $query = $this->promoted_em->createQuery('DELETE FROM '.$this->targetEntity.' a WHERE a.Id='.$targetId);
        if($query->getResult()){
            return $this->args;
        };
    }
}