<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\TabularReportJoinery;

class TabularReportResolver extends AbstractResolver
{
    public $targetEntity = 'AppBundle:TabularReport';
    public function initEntityResolver(){
        $this->rawFieldArrayJoinery = TabularReportJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
        
        // OVERRIDE ENTITY DEFAULT
        $this->promoted_em = $this->default_em;
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // EXTRA WHERE CLAUSE
        $roles = $this->currentUser->getroles();
        if(!in_array('ROLE_ADMIN', $roles)){
            $orConditions = [];
            foreach($roles as $value){
                $orConditions[] = $this->query->expr()->like('a.Roles', ':'.$value);
                $this->query->setParameter($value, '%'.$value.'%');
            }
            $orConditions[] = $this->query->expr()->andX('a.CreatedById = :AspId');
            $this->query->setParameter('AspId', $this->currentUser->getAspNetUserId());
            
            $orX = $this->query->expr()->orX();
            $orX->addMultiple($orConditions);
            $this->query->andWhere($orX);
        }
    }
    
    public function isCurrentUserOwnerOfReport($Id = 0){
        if($Id > 0){
            $roles = $this->currentUser->getroles();
            if(in_array('ROLE_ADMIN', $roles)){
                return true;
            }
            
            $reportTab = $this->promoted_em->getRepository($this->targetEntity)->find($Id);
            return $reportTab && $reportTab->getCreatedById() == $this->currentUser->getAspNetUserId();
        }
        return false;
    }
}