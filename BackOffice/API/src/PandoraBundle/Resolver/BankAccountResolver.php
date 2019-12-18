<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\BankAccountJoinery;
use PandoraBundle\Entity\Banks;
use PandoraBundle\Entity\Currencies;

class BankAccountResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Bankaccounts';
        $this->rawFieldArrayJoinery = BankAccountJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        if(isset($this->args['entity']['BankId'])){
            $bankEnity = $this->pandora_em->getRepository(Banks::class)->find($this->args['entity']['BankId']);
            $this->entity->setBank($bankEnity);
            $this->entity->setBankName($bankEnity->getBankName());
        }
        if(isset($this->args['entity']['CurrencyId'])){
            $currencyEnity = $this->pandora_em->getRepository(Currencies::class)->find($this->args['entity']['CurrencyId']);
            $this->entity->setCurrency($currencyEnity);
        }
        
        $BAPMExists = $this->entity->getBankAccountPaymentMethod();
        foreach($BAPMExists as $BAPM){
            $this->entity->getBankAccountPaymentMethod()->removeElement($BAPM);  
        }
        if( isset($this->args['entity']['PaymentMethodIds']) ) {
            $this->args['entity']['PaymentMethodIds'] = array_filter($this->args['entity']['PaymentMethodIds']);
            foreach($this->args['entity']['PaymentMethodIds'] as $paymentMethodId) {
                $paymentMethodEntity = $this->pandora_em->getRepository(\PandoraBundle\Entity\Paymentmethods::class)->find($paymentMethodId);
                if ( !$this->entity->getBankAccountPaymentMethod()->contains($paymentMethodEntity) ) {
                    $this->entity->getBankAccountPaymentMethod()->add($paymentMethodEntity);
                }
            }
        }
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
    
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        $this->joinModifierAspEntities();
        if(isset($this->args['Id'])){
            $this->query->where('a.Id = :Id');
            $this->query->setParameter('Id', $this->args['Id']);
        }
        $result = $this->query->getQuery()->getResult();
        
        if(count($result) > 0 && in_array('PaymentMethodIds', $this->fieldArray)){
            $em = $this->promoted_em->createQueryBuilder();
            $result[0]['PaymentMethodIds'] = array_column($em
            ->select('a.PaymentMethodId')
            ->from('PandoraBundle:Bankaccountpaymentmethods', 'a')
            ->where('a.BankAccountId = :Id')
            ->setParameter('Id', $this->args['Id'])
            ->setMaxResults(500)
            ->getQuery()
            ->getArrayResult(), 'PaymentMethodId');
        }
        
        return $result;
    }
}