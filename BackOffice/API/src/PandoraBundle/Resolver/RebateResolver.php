<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\RebateJoinery;
use PandoraBundle\Entity\Viplevels;
use PandoraBundle\Entity\Gameplatformproducts;

class RebateResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Rebates';
        $this->rawFieldArrayJoinery = RebateJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        if(isset($this->args['entity']['VipLevelId'])){
            $VIPLevelEnity = $this->pandora_em->getRepository(Viplevels::class)->find($this->args['entity']['VipLevelId']);
            $this->entity->setVIPLevel($VIPLevelEnity);
        }
        if(isset($this->args['entity']['ProductId'])){
            $gameEntity = $this->pandora_em->getRepository(Gameplatformproducts::class)->find($this->args['entity']['ProductId']);
            $this->entity->setGameplatformproduct($gameEntity);
        }
    }
	
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
		$this->query->from($this->targetEntity, 'a');
 
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FIELDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
		if(strpos($implodedField, 'b.') !== false){
            $this->query->leftjoin('a.VIPLevel', 'b');
        }
		if(strpos($implodedField, 'c.') !== false){
            $this->query->leftjoin('a.Gameplatformproduct', 'c');
        }
    }
    
}