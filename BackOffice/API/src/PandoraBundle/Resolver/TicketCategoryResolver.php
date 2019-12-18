<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Entity\Brands;
use PandoraBundle\Joinery\TicketCategoryJoinery;

class TicketCategoryResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Ticketcategory';
        $this->rawFieldArrayJoinery = TicketCategoryJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        $brandEnity = $this->pandora_em->getRepository(Brands::class)->find($this->args['entity']['BrandId']);
        $this->entity->setBrand($brandEnity);
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->leftjoin('a.Brand', 'b');
        }
    }
}