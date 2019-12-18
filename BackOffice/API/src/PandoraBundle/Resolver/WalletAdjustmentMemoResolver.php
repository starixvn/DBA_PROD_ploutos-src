<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\WalletAdjustmentMemoJoinery;

class WalletAdjustmentMemoResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Walletadjustmentmemos';
        $this->rawFieldArrayJoinery = WalletAdjustmentMemoJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $this->query->leftjoin('a.Wallet', 'b');
        $this->query->leftjoin('b.PlayerProfiles', 'c');
        
        // JOINING FOR FILTERING OF BRAND AND CURRENCY/MARKET
        $this->query->leftjoin('c.PlayerRegistration', 'e');
        
        // EXTRA WHERE CLAUSE
        if(!empty($this->args['credit_memo'])){
            $this->query->andWhere('a.AdjustmentType = 0');
        }
        if(!empty($this->args['debit_memo'])){
            $this->query->andWhere('a.AdjustmentType = 1');
        }
//         if(!empty($this->args['start_date']) && !empty($this->args['end_date'])){
//             $this->query->andWhere('a.TransactionDate BETWEEN :start AND :end')
//             ->setParameter('start', $this->args['start_date']->format('Y-m-d 00:00:00'))
//             ->setParameter('end', $this->args['end_date']->format('Y-m-d H:i:s'));
//         }else{
//             if(!empty($this->args['start_date'])){
//                 $this->query->andWhere('a.TransactionDate >= :start')
//                 ->setParameter('start', $this->args['start_date']->format('Y-m-d 00:00:00'));
//             }
//             if(!empty($this->args['end_date'])){
//                 $this->query->andWhere('a.TransactionDate <= :end')
//                 ->setParameter('end', $this->args['end_date']->format('Y-m-d H:i:s'));
//             }
//         }
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