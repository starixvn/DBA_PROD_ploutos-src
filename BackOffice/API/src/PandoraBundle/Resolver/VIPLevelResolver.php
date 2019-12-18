<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Entity\Brands;
use PandoraBundle\Joinery\VIPLevelJoinery;

class VIPLevelResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Viplevels';
        $this->rawFieldArrayJoinery = VIPLevelJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }    
    
    public function mapRelatedObject(){
        if( isset($this->args['entity']['BrandId']) ) {
            $vipLevelToBrandsEntity = $this->pandora_em->getRepository(Brands::class)->find($this->args['entity']['BrandId']);
            $this->entity->setBrand($vipLevelToBrandsEntity);
		}
	}	
	
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
		$this->query->from($this->targetEntity, 'a');
		
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->leftjoin('a.Brand', 'b');
        }
    }
    
//     public function getQueryBuilderPagingResult()
//     {
//         $this->queryBuilderSelectAndJoin();
//         $results = $this->query->getQuery()->getResult();
//         // TODO: MAKE THE COLUMN SUBJECT TO COUNT DYNAMIC AS WELL
//         if(isset($this->args['count']) && $this->args['count']){
//             $this->totalCount = $this->query->select('count(a.Id)')->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
//         }
//         return $this->preparePagingResult($results, $this->totalCount);
//     }
    
//     public function getQueryBuilderSingleResult()
//     {
//         $this->queryBuilderSelectAndJoin();
//         if(isset($this->args['Id'])){
//             $this->query->where('a.Id = :Id');
//             $this->query->setParameter('Id', $this->args['Id']);
//         }
//         return $this->query->getQuery()->getResult();
//     }
}