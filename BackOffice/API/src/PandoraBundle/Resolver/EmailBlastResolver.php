<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\EmailBlastJoinery;
use PandoraBundle\Entity\Emailtemplate;
use PandoraBundle\Entity\Emailblast;

class EmailBlastResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Emailblast';
        $this->rawFieldArrayJoinery = EmailBlastJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function mapRelatedObject(){
        if( isset($this->args['entity']['EmailTemplateId']) ) {
            $entity = $this->pandora_em->getRepository(Emailtemplate::class)->find($this->args['entity']['EmailTemplateId']);
            $this->entity->setEmailTemplate($entity);
        }
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->query->select($this->fieldArrayJoinery);
        $this->query->from($this->targetEntity, 'a');
        
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        if(strpos($implodedField, 'b.') !== false){
            $this->query->leftjoin('a.EmailTemplate', 'b');
        }
    }
    
    public function getEmailBlastById(int $Id = 0){
        return $this->pandora_em->getRepository(Emailblast::class)->find($Id);
    }
}