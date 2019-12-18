<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\UniqueDepositAmountJoinery;
use PandoraBundle\Entity\Uniquedepositamounts;

class UniqueDepositAmountResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Uniquedepositamounts';
        $this->rawFieldArrayJoinery = UniqueDepositAmountJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->leftjoin('a.Currency', 'b');
        }
        if(strpos($implodedField, 'c.') !== false){
            $this->query->leftjoin('a.Bank', 'c');
        }
    }
    
    public function createUniqueDepositAmount(int $UDARuleId = 0, float $StartValue = 0.0, float $EndValue = 0.0, float $IncrementValue = 0.0){
        if($UDARuleId == 0 || $EndValue == 0 || $IncrementValue == 0){
            return false;
        }
        
        if($EndValue <= $StartValue){
            return false;
        }
        
        $UDARuleValue = $StartValue;
        while($UDARuleValue <= $EndValue){
            $UDAEntity = new Uniquedepositamounts();
            $UDAEntity->setWalletId(0);
            $UDAEntity->setDepositAmount(0.0000);
            $UDAEntity->setGeneratedUDA(0);
            $UDAEntity->setInUse(false);
            $UDAEntity->setDateGenerated(new \DateTime('now'));
            $UDAEntity->setValidityDate(new \DateTime('now'));
            
            // DYNAMIC VALs
            $UDAEntity->setUniqueDepositAmountRuleId($UDARuleId);
            $UDAEntity->setUDARuleValue($UDARuleValue);
            
            $this->pandora_em->persist($UDAEntity);
            
            // ITERATE ADDITIONs
            $UDARuleValue = $UDARuleValue + $IncrementValue;
        }
        $this->pandora_em->flush();
        return true;
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