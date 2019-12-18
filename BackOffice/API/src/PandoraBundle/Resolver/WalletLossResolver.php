<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\WalletLossJoinery;

class WalletLossResolver extends AbstractResolver
{
    public $targetEntity = 'PandoraBundle:Walletlosses';
    public function initEntityResolver(){
        $this->rawFieldArrayJoinery = WalletLossJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function queryBuilderJoin(){
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        // if(strpos($implodedField, 'b.') !== false){
        $this->query->leftjoin('a.PlayerProfile', 'b');
        // }
        if(strpos($implodedField, 'c.') !== false){
            $this->query->leftjoin('a.Wallet', 'c');
        }
        if(strpos($implodedField, 'd.') !== false){
            $this->query->leftjoin('a.GamePlatform', 'd');
        }
        if(strpos($implodedField, 'e.') !== false){
            $this->query->leftjoin('a.GamePlatformProduct', 'e');
        }
    }
    
    public function queryBuilderSelectAndJoinReport(){
        $this->queryBuilderFrom();
        $this->queryBuilderJoin();
    }
    
    public function queryBuilderSelectAndJoin(){
        $this->queryBuilderSelect();
        $this->queryBuilderFrom();
        $this->queryBuilderJoin();
    }

}