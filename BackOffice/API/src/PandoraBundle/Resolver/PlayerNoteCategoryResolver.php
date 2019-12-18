<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\PlayerNoteCategoryJoinery;
use PandoraBundle\Entity\Teams;

class PlayerNoteCategoryResolver extends AbstractResolver
{
    protected $targetEntity = 'PandoraBundle:Playernotecategory';
    public function initEntityResolver(){
        $this->rawFieldArrayJoinery = PlayerNoteCategoryJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        if(isset($this->args['entity']['TeamId'])) {
            $teamEnity = $this->pandora_em->getRepository(Teams::class)->find($this->args['entity']['TeamId']);
            $this->entity->setTeam($teamEnity);
        }
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->join('a.Team', 'b');
        }
    }
}