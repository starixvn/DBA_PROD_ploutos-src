<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\PlayerMessageSeenHistoryJoinery;
// use PandoraBundle\Entity\Playerprofiles;
// use PandoraBundle\Entity\Messages;

class PlayerMessageSeenHistoryResolver extends AbstractResolver
{
    protected $targetEntity = 'PandoraBundle:PlayerMessageSeenHistory';
    public function initEntityResolver(){
        
        $this->rawFieldArrayJoinery = PlayerMessageSeenHistoryJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
//     public function mapRelatedObject(){
//         if(isset($this->args['entity']['PlayerProfileId'])) {
//             $playerProfileEnity = $this->pandora_em->getRepository(Playerprofiles::class)->find($this->args['entity']['PlayerProfileId']);
//             $this->entity->setPlayerProfile($playerProfileEnity);
//         }
//         if(isset($this->args['entity']['MessageId'])) {
//             $messageEnity = $this->pandora_em->getRepository(Messages::class)->find($this->args['entity']['MessageId']);
//             $this->entity->setPlayerProfile($messageEnity);
//         }
//     }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->join('a.PlayerProfile', 'b');
        }
        if(strpos($implodedField, 'c.') !== false){
            $this->query->join('a.Message', 'c');
        }
    }
}