<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Entity\Brands;
use PandoraBundle\Joinery\OnlineBanksJoinery;
use PandoraBundle\Entity\Onlinebanktypes;

class OnlineBankResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Onlinebanks';
        $this->rawFieldArrayJoinery = OnlineBanksJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
        
    public function mapRelatedObject(){
        if(isset($this->args['entity']['BrandId'])) {
            $brandEnity = $this->pandora_em->getRepository(Brands::class)->find($this->args['entity']['BrandId']);
            $this->entity->setBrand($brandEnity);
        }
        if(isset($this->args['entity']['OnlineBankTypeId'])) {
            $onlineBank = $this->pandora_em->getRepository(Onlinebanktypes::class)->find($this->args['entity']['OnlineBankTypeId']);
            $this->entity->setOnlineBankType($onlineBank);
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
            $this->query->leftjoin('a.OnlineBankType', 'c');
        }
    }
    
}