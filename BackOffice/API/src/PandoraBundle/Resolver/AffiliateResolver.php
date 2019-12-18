<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\AffiliateJoinery;

class AffiliateResolver extends AbstractResolver
{
    protected $targetEntity = 'PandoraBundle:Affiliates';
    public function initEntityResolver(){
        $this->rawFieldArrayJoinery = AffiliateJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
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
            $this->query->leftjoin('a.IMPlatformName1', 'c');
		}
        if(strpos($implodedField, 'd.') !== false){
            $this->query->leftjoin('a.IMPlatformName2', 'd');
		}
        if(strpos($implodedField, 'e.') !== false){
            $this->query->leftjoin('a.BankName', 'e');
		}
        if(strpos($implodedField, 'f.') !== false){
            $this->query->leftjoin('a.EarningPlanName', 'f');
		}
		if(strpos($implodedField, 'g.') !== false){
		    $this->query->leftjoin('a.SecurityQuestion', 'g');
		}
		if(strpos($implodedField, 'h.') !== false){
		    $this->query->leftjoin('a.Country', 'h');
		}
    }
    
    public function getEntity(string $UserName = ''){
        return $this->pandora_em->getRepository($this->targetEntity)->findOneBy(['UserName'=> $UserName]);
    }
    
}