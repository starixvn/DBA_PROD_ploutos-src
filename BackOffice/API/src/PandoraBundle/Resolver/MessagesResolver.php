<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\MessagesJoinery;
use PandoraBundle\Entity\Brands;
use PandoraBundle\Entity\Currencies;

class MessagesResolver extends AbstractResolver
{
    protected $targetEntity = 'PandoraBundle:Messages';
    public function initEntityResolver(){
        $this->rawFieldArrayJoinery = MessagesJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        if( isset($this->args['entity']['BrandId']) ) {
            $brandEnity = $this->pandora_em->getRepository(Brands::class)->find($this->args['entity']['BrandId']);
            $this->entity->setBrand($brandEnity);
            
        }
        if( isset($this->args['entity']['CurrencyId']) ) {
            $currencyEnity = $this->pandora_em->getRepository(Currencies::class)->find($this->args['entity']['CurrencyId']);
            $this->entity->setCurrency($currencyEnity);
        }
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->leftjoin('a.Brand', 'b');
        }
        if(strpos($implodedField, 'c.') !== false){
            $this->query->leftjoin('a.Currency', 'c');
        }
    }
    
    public function getLastMessageId(){
        $lastQuestion = $this->pandora_em->getRepository($this->targetEntity)->findOneBy([], ['Id' => 'desc']);
        return $lastQuestion->getId();
    }
    
}