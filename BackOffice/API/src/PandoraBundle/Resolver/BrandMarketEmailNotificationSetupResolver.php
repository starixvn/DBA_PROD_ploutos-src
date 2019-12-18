<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

// use PandoraBundle\Entity\Brands;
// use PandoraBundle\Entity\Currencies;
// use PandoraBundle\Entity\Countrys;
use PandoraBundle\Joinery\BrandMarketEmailNotificationSetupJoinery;
use PandoraBundle\Entity\Brandmarkets;

class BrandMarketEmailNotificationSetupResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Brandmarketemailnotificationsetups';
        $this->rawFieldArrayJoinery = BrandMarketEmailNotificationSetupJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        $brandMarketEnity = $this->pandora_em->getRepository(Brandmarkets::class)->find($this->args['entity']['BrandMarketId']);
        $this->entity->setBrandMarket($brandMarketEnity);
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        $this->query->leftjoin('a.BrandMarket', 'b');
        $this->query->leftjoin('b.Brand', 'c');
        $this->query->leftjoin('b.Country', 'd');
        $this->query->leftjoin('b.Currency', 'e');
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