<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\BonusJoinery;
use PandoraBundle\Entity\Brands;
use PandoraBundle\Entity\Viplevels;
use PandoraBundle\Entity\Currencies;

class BonusResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Bonuses';
        $this->rawFieldArrayJoinery = BonusJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        $brandEnity = $this->pandora_em->getRepository(Brands::class)->find($this->args['entity']['BrandId']);
        $VIPLevelEnity = $this->pandora_em->getRepository(Viplevels::class)->find($this->args['entity']['VIPLevelId']);
        $CurrencyEnity = $this->pandora_em->getRepository(Currencies::class)->find($this->args['entity']['CurrencyId']);
        
        $this->entity->setBrand($brandEnity);
        $this->entity->setVIPLevel($VIPLevelEnity);
        $this->entity->setCurrency($CurrencyEnity);
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FIELDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->leftjoin('a.Currency', 'b');
        }
        if(strpos($implodedField, 'c.') !== false){
            $this->query->leftjoin('a.Bank', 'c');
        }
        if(strpos($implodedField, 'd.') !== false){
            $this->query->leftjoin('a.Brand', 'd');
        }
        // if(strpos($implodedField, 'e.') !== false){
            $this->query->leftjoin('a.Currency', 'e');
        // }
        if(strpos($implodedField, 'f.') !== false){
            $this->query->leftjoin('a.VIPLevel', 'f');
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