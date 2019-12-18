<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\WalletDepositJoinery;

class WalletDepositResolver extends AbstractResolver
{
    public $targetEntity = 'PandoraBundle:Walletdeposits';
    public function initEntityResolver(){
        $this->rawFieldArrayJoinery = WalletDepositJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function queryBuilderJoin(){
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        $this->query->leftjoin('a.Wallet', 'b');
        if(strpos($implodedField, 'c.') !== false || strpos($implodedField, 'd.') !== false){
            $this->query->leftjoin('a.BankAccount', 'c');
        }
        
        // SECOND LEVEL JOINING
        if(strpos($implodedField, 'd.') !== false){
            $this->query->leftjoin('c.Currency', 'd');
        }
        // if(strpos($implodedField, 'e.') !== false){
        $this->query->leftjoin('b.PlayerProfiles', 'e');
        // }
        if(strpos($implodedField, 'g.') !== false){
            $this->query->leftjoin('a.PaymentRiskLevel', 'g');
        }
        if(strpos($implodedField, 'h.') !== false){
            $this->query->leftjoin('a.PaymentMethod', 'h');
        }
        if(strpos($implodedField, 'i.') !== false){
            $this->query->leftjoin('a.TransactionGrabs', 'i', 'WITH', 'i.TransactionType = 0');
        }
        
        // JOINING FOR FILTERING OF BRAND AND CURRENCY/MARKET
        $this->query->leftjoin('e.PlayerRegistration', 'f');
    }
    
    public function queryBuilderSelectAndJoinReport(){
        $this->queryBuilderFrom();
        $this->queryBuilderJoin();
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->queryBuilderSelect();
        $this->queryBuilderFrom();
        $this->queryBuilderJoin();
        
        // EXTRA WHERE CLAUSE
//         if(!empty($this->args['start_deposit_date']) && !empty($this->args['end_deposit_date'])){
//             $this->query->andWhere('a.TransactionDate BETWEEN :start AND :end')
//             ->setParameter('start', $this->args['start_deposit_date']->format('Y-m-d 00:00:00'))
//             ->setParameter('end', $this->args['end_deposit_date']->format('Y-m-d H:i:s'));
//         }else{
//             if(!empty($this->args['start_deposit_date'])){
//                 $this->query->andWhere('a.TransactionDate >= :start')
//                 ->setParameter('start', $this->args['start_deposit_date']->format('Y-m-d 00:00:00'));
//             }
//             if(!empty($this->args['end_deposit_date'])){
//                 $this->query->andWhere('a.TransactionDate <= :end')
//                 ->setParameter('end', $this->args['end_deposit_date']->format('Y-m-d H:i:s'));
//             }
//         }
    }
    
    
    public function getDepositLastId(){
        $this->query = $this->pandora_em->createQueryBuilder();
        return $this->query->select('a.Id')->from($this->targetEntity, 'a')->orderBy('a.Id', 'DESC')->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
    }
    
    public function getNewlyDeposits(int $Id = 0){
        $this->query = $this->pandora_em->createQueryBuilder();
        $this->query->select('a.Id, a.TransactionNo, a.ActualDepositAmount, c.UserName, d.CurrencyCode, d.BrandCode');
        $this->query->from($this->targetEntity, 'a');
        $this->query->leftjoin('a.Wallet', 'b');
        $this->query->leftjoin('b.PlayerProfiles', 'c');
        $this->query->leftjoin('c.PlayerRegistration', 'd');
        $this->query->where('a.Id > :Id');
        $this->query->setParameter(':Id', $Id);
        return $this->query->setMaxResults(100)->getQuery()->getArrayResult();
    }
}