<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\BrandMarketJoinery;
use PandoraBundle\Entity\Brands;
use PandoraBundle\Entity\Currencies;
use PandoraBundle\Entity\Countrys;

class BrandMarketResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Brandmarkets';
        $this->rawFieldArrayJoinery = BrandMarketJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        $brandEnity = $this->pandora_em->getRepository(Brands::class)->find($this->args['entity']['BrandId']);
        $currencyEnity = $this->pandora_em->getRepository(Currencies::class)->find($this->args['entity']['CurrencyId']);
        $countryEnity = $this->pandora_em->getRepository(Countrys::class)->find($this->args['entity']['CountryId']);
        
        $this->entity->setBrand($brandEnity);
        $this->entity->setCurrency($currencyEnity);
        $this->entity->setCountry($countryEnity);
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        $this->query->leftjoin('a.Brand', 'b');
        $this->query->leftjoin('a.Currency', 'd');
        if(strpos($implodedField, 'c.') !== false){
            $this->query->leftjoin('a.Country', 'c');
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