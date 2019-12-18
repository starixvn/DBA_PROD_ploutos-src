<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\AspNetUserRoleJoinery;

class AspNetUserRoleResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Aspnetuserroles';
        $this->rawFieldArrayJoinery = AspNetUserRoleJoinery::fields();
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
            $this->totalCount = $this->query->select('count(a.UserId)')->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
        }
        
        return $this->preparePagingResult($results, $this->totalCount);
    }
    
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        if(isset($this->args['UserId'])){
            $this->query->where('a.UserId = :UserId');
            $this->query->setParameter('UserId', $this->args['UserId']);
        }
        return $this->query->getQuery()->getResult();
    }
}