<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\OnlineBankSupportedCurrenciesTypesJoinery;
use PandoraBundle\Entity\Currencies;
use PandoraBundle\Entity\Onlinebanks;

class OnlineBankSupportedCurrenciesResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Onlinebanksupportedcurrencies';
        $this->rawFieldArrayJoinery = OnlineBankSupportedCurrenciesTypesJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        if(isset($this->args['entity']['CurrencyId'])) {
            $entity = $this->pandora_em->getRepository(Currencies::class)->find($this->args['entity']['CurrencyId']);
            $this->entity->setCurrency($entity);
        }
        if(isset($this->args['entity']['OnlineBankId'])) {
            $onlineBankentity = $this->pandora_em->getRepository(Onlinebanks::class)->find($this->args['entity']['OnlineBankId']);
            $this->entity->setOnlineBank($onlineBankentity);
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
            $this->query->leftjoin('a.OnlineBank', 'c');
        }
    }
    
}