<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\AffiliateTransactionJoinery;
use PandoraBundle\Entity\Affiliates;

class AffiliateTransactionResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Affiliatetransactions';
        $this->rawFieldArrayJoinery = AffiliateTransactionJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        if( isset($this->args['entity']['AffiliateId']) ) {
            $affiliateEnity = $this->pandora_em->getRepository(Affiliates::class)->find($this->args['entity']['AffiliateId']);
            $this->entity->setAffiliate($affiliateEnity);
        }
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->leftjoin('a.Affiliate', 'b');
        }
        if(strpos($implodedField, 'i.') !== false){
            $this->query->leftjoin('a.TransactionGrabs', 'i', 'WITH', 'i.TransactionType = 7');
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
    
    public function getEntity(string $AffiliateCode = ''){
        return $this->pandora_em->getRepository($this->targetEntity)->findOneBy(['AffiliateCode'=> $AffiliateCode]);
    }
    
    public function getAffiliateById(int $id = 0){
        $this->query->select('a.Id, a.TxnType, a.Status, a.TransactionAmount');
        $this->query->from($this->targetEntity, 'a');
        $this->query->where('a.Id = :Id');
        $this->query->setParameter('Id', $id);
        return $this->query->getQuery()->getResult();
    }
    
}