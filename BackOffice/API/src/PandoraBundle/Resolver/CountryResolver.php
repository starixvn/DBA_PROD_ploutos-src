<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\CountryJoinery;
use PandoraBundle\Entity\Countrys;

class CountryResolver extends AbstractResolver
{
    public function initEntityResolver(){
        $this->targetEntity = 'PandoraBundle:Countrys';
        $this->rawFieldArrayJoinery = CountryJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
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
            $this->query->leftjoin('a.Bank', 'c');
        }
    }
    
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        $this->joinModifierAspEntities();
        
        if(isset($this->args['Id'])){
            if(is_numeric($this->args['Id'])){
                $this->query->where('a.Id = :Id');
            }else{
                $this->query->where('a.CountryCode = :Id');
            }
            $this->query->setParameter('Id', $this->args['Id']);
        }
        return $this->query->getQuery()->getResult();
    }
    
    public function getCountryCodeById(int $Id = 0){
        if($Id > 0) {
            $countryEntity = $this->pandora_em->getRepository(Countrys::class)->find($Id);
            return $countryEntity->getCountryCode();
        }
        return '';
    }
}