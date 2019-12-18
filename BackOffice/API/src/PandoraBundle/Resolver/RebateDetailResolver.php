<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\RebateDetailJoinery;
use PandoraBundle\Entity\Rebates;
use PandoraBundle\Entity\Currencies;

class RebateDetailResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Rebatedetails';
        $this->rawFieldArrayJoinery = RebateDetailJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        if(isset($this->args['entity']['RebateId'])) {
            $entity = $this->pandora_em->getRepository(Rebates::class)->find($this->args['entity']['RebateId']);
            $this->entity->setRebate($entity);
        }
        if(isset($this->args['entity']['CurrencyId'])) {
            $currencyEntity = $this->pandora_em->getRepository(Currencies::class)->find($this->args['entity']['CurrencyId']);
            $this->entity->setCurrency($currencyEntity);
        }
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
            $this->query->leftjoin('a.Rebate', 'c');
        }
    }

}