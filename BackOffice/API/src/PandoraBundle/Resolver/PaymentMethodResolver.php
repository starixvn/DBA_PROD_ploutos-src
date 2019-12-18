<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\PaymentMethodJoinery;

use PandoraBundle\Entity\Paymentrisklevels;
use PandoraBundle\Entity\Uniquedepositamountrules;
use PandoraBundle\Entity\Currencies;
use PandoraBundle\Entity\Brands;

class PaymentMethodResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Paymentmethods';
        $this->rawFieldArrayJoinery = PaymentMethodJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }    
        
    public function mapRelatedObject(){
        if( isset($this->args['entity']['PaymentRiskLevelId']) ) {
            $paymentMethodToPaymentRiskLevelEnity = $this->pandora_em->getRepository(Paymentrisklevels::class)->find($this->args['entity']['PaymentRiskLevelId']);
            $this->entity->setPaymentRiskLevel($paymentMethodToPaymentRiskLevelEnity);
        }
        if( isset($this->args['entity']['CurrencyId']) ) {
            $paymentMethodToCurrencyEnity = $this->pandora_em->getRepository(Currencies::class)->find($this->args['entity']['CurrencyId']);
            $this->entity->setCurrency($paymentMethodToCurrencyEnity);
        }
        if( isset($this->args['entity']['UniqueDepositAmountRuleId']) ) {
            $paymentMethodToUniqueDepositAmountRuleEnity = $this->pandora_em->getRepository(Uniquedepositamountrules::class)->find($this->args['entity']['UniqueDepositAmountRuleId']);
            $this->entity->setUniqueDepositAmountRule($paymentMethodToUniqueDepositAmountRuleEnity);            
		}
		if( isset($this->args['entity']['BrandId']) ) {
            $brandEnity = $this->pandora_em->getRepository(Brands::class)->find($this->args['entity']['BrandId']);
            $this->entity->setBrand($brandEnity);            
        }
        
        $BAPMExists = $this->entity->getPaymentMethodCountry();
        foreach($BAPMExists as $BAPM){
            $this->entity->getPaymentMethodCountry()->removeElement($BAPM);  
        }
        if( isset($this->args['entity']['CountryIds']) ) {
            $this->args['entity']['CountryIds'] = array_filter($this->args['entity']['CountryIds']);
            foreach($this->args['entity']['CountryIds'] as $countryId) {
                $countryEntity = $this->pandora_em->getRepository(\PandoraBundle\Entity\Countrys::class)->find($countryId);
                if ( !$this->entity->getPaymentMethodCountry()->contains($countryEntity) ) {
                    $this->entity->getPaymentMethodCountry()->add($countryEntity);
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
            $this->query->leftjoin('a.PaymentRiskLevel', 'b');
        }
		if(strpos($implodedField, 'c.') !== false){
			$this->query->leftjoin('a.Currency', 'c');
		}
		if(strpos($implodedField, 'd') !== false){
			$this->query->leftjoin('a.UniqueDepositAmountRule', 'd');
		}		
        if(strpos($implodedField, 'e.') !== false){
            $this->query->leftjoin('a.Brand', 'e');
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
        
        if(count($result) > 0 && in_array('CountryIds', $this->fieldArray)){
            $em = $this->promoted_em->createQueryBuilder();
            $result[0]['CountryIds'] = array_column($em
            ->select('CONCAT(b.CountryName, \', \') AS CountryName')
            ->from('PandoraBundle:Countrypaymentmethods', 'a')
            ->innerJoin('PandoraBundle:Countrys', 'b', 'WITH','a.CountryId = b.Id')
            ->where('a.PaymentMethodId = :Id')
            ->setParameter('Id', $this->args['Id'])
            ->setMaxResults(500)
            ->getQuery()
            ->getArrayResult(), 'CountryName');
        }
        
        return $result;
    }
}