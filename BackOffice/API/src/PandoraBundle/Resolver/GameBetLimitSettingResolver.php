<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Entity\Gamebetlimitlevels;
use PandoraBundle\Joinery\GameBetLimitSettingJoinery;

class GameBetLimitSettingResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Gamebetlimitsettings';
        $this->rawFieldArrayJoinery = GameBetLimitSettingJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        if( isset($this->args['entity']['BetLimitLevelId']) ) {
            $betSettingsEntity = $this->pandora_em->getRepository(Gamebetlimitlevels::class)->find($this->args['entity']['BetLimitLevelId']);
            $this->entity->setBetLimitLevel($betSettingsEntity);
        }
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->leftjoin('a.BetLimitLevel', 'b');
        }
    }
    
}