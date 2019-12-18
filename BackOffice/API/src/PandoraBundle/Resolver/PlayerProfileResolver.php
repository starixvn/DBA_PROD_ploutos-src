<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\Resolver;

use PandoraBundle\Joinery\PlayerProfileJoinery;

class PlayerProfileResolver extends AbstractResolver
{
    protected $targetEntity = 'PandoraBundle:Playerprofiles';
    public function initEntityResolver(){
        $this->rawFieldArrayJoinery = PlayerProfileJoinery::fields();
        $this->fieldArrayJoinery = $this->targetFieldsToMapped($this->rawFieldArrayJoinery);
    }
    
    public function queryBuilderJoin(){
        // JOIN OBJECT IF THERE IS DEFINED IN SELECTED FILDS
        $implodedField = implode(', ', $this->fieldArrayJoinery);
        $this->query->join('a.PlayerRegistration', 'b');
        
        if(strpos($implodedField, 'c.') !== false){
            $this->query->join('a.Wallet', 'c');
        }
        if(strpos($implodedField, 'd.') !== false){
            $this->query->leftjoin('a.VipLevel', 'd');
        }
        if(strpos($implodedField, 'e.') !== false){
            $this->query->leftjoin('a.PaymentRiskLevel', 'e');
        }
        if(strpos($implodedField, 'f.') !== false){
            $this->query->leftjoin('a.WithdrawalLevel', 'f');
        }
        if(strpos($implodedField, 'g.') !== false){
            $this->query->leftjoin('a.FraudRiskLevel', 'g');
        }
        if(strpos($implodedField, 'h.') !== false){
            $this->query->leftjoin('a.SecurityQuestion1', 'h');
        }
        if(strpos($implodedField, 'i.') !== false){
            $this->query->leftjoin('a.GameBetLimitLevel', 'i');
        }
        if(strpos($implodedField, 'j.') !== false){
            $this->query->leftjoin('a.BankAccount', 'j');
        }
        if(strpos($implodedField, 'k.') !== false){
            $this->query->leftjoin('a.WithdrawalBankAccount', 'k');
        }
        if(strpos($implodedField, 'l.') !== false){
            $this->query->leftjoin('a.Country', 'l');
        }
//         if(strpos($implodedField, 'm.') !== false){
//             $this->query->leftjoin('a.Currency', 'm');
//         }
        if(strpos($implodedField, 'n.') !== false){
            $this->query->leftjoin('a.SecurityQuestion2', 'n');
        }
        if(strpos($implodedField, 'o.') !== false){
            $this->query->join('a.WalletComputedBalances', 'o');
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
    
    public function getQueryBuilderPagingResult()
    {
        $this->queryBuilderSelectAndJoin();
        $this->joinModifierAspEntities();
        $results = $this->query->getQuery()->getResult();
        
        // TODO: MAKE THE COLUMN SUBJECT TO COUNT DYNAMIC AS WELL
        if(isset($this->args['count']) && $this->args['count']){
            $this->totalCount = $this->query->select('count(a.Id)')->setFirstResult(0)->setMaxResults(1)->getQuery()->getSingleScalarResult();
        }
        
        // MASK SENSITIVE FIELDS
        $visibleEmail = $this->hasAccessToModule('FieldPlayerEmail', $this->currentUser->getRoles()[0]);
        $visibleMobile = $this->hasAccessToModule('FieldPlayerMobile', $this->currentUser->getRoles()[0]);
        $visibleSecurityAsnwer = $this->hasAccessToModule('FieldPlayerSecurityAnswer', $this->currentUser->getRoles()[0]);
        
        if(count($results) > 0 && (!$visibleEmail || !$visibleMobile)){
            foreach ($results as $key => $value){
                if(isset($value['Email']) && !$visibleEmail){
                    $results[$key]['Email'] = $this->maskField($value['Email']);
                }
                if(isset($value['MobileNo']) && !$visibleMobile){
                    $results[$key]['MobileNo'] = $this->maskField($value['MobileNo']);
                }
                if(isset($value['SecurityQuestionAnswer1']) && !$visibleSecurityAsnwer){
                    $results[$key]['SecurityQuestionAnswer1'] = $this->maskField($value['SecurityQuestionAnswer1']);
                }
                if(isset($value['SecurityQuestionAnswer2']) && !$visibleSecurityAsnwer){
                    $results[$key]['SecurityQuestionAnswer2'] = $this->maskField($value['SecurityQuestionAnswer2']);
                }
            }
        }
        
        return $this->preparePagingResult($results, $this->totalCount);
    }
    
    public function getQueryBuilderSingleResult()
    {
        $this->queryBuilderSelectAndJoin();
        $this->joinModifierAspEntities();
        if(isset($this->args['Id'])){
            $this->query->andWhere('a.Id = :Id');
            $this->query->setParameter('Id', $this->args['Id']);
        }
        if(isset($this->args['UserName'])){
            $this->query->andWhere('a.UserName = :UserName');
            $this->query->setParameter('UserName', $this->args['UserName']);
        }
        $this->query->setMaxResults(1);
        $result = $this->query->getQuery()->getResult();
//         print '<pre>';
//         print_r($this->query->getDQL());
//         print '</pre>';
//         exit;
        
        // MASK SENSITIVE FIELDS
        if(isset($result[0]['Email']) && !$this->hasAccessToModule('FieldPlayerEmail', $this->currentUser->getRoles()[0])){
            $result[0]['Email'] = $this->maskField($result[0]['Email']); 
        }
        if(isset($result[0]['MobileNo']) && !$this->hasAccessToModule('FieldPlayerMobile', $this->currentUser->getRoles()[0])){
            $result[0]['MobileNo'] = $this->maskField($result[0]['MobileNo']);
        }
        if(isset($result[0]['SecurityQuestionAnswer1']) && !$this->hasAccessToModule('FieldPlayerSecurityAnswer', $this->currentUser->getRoles()[0])){
            $result[0]['SecurityQuestionAnswer1'] = $this->maskField($result[0]['SecurityQuestionAnswer1']);
        }
        if(isset($result[0]['SecurityQuestionAnswer2']) && !$this->hasAccessToModule('FieldPlayerSecurityAnswer', $this->currentUser->getRoles()[0])){
            $result[0]['SecurityQuestionAnswer2'] = $this->maskField($result[0]['SecurityQuestionAnswer2']);
        }
        
        return $result;
    }
    
    public function getEntity(string $UserName = ''){
        return $this->pandora_em->getRepository($this->targetEntity)->findOneBy(['UserName'=> $UserName]);
    }
    
    // ACTIONs
    public function updateFraudRiskLevelId(int $playerProfileId, int $fraudRiskLevelId){
        try{
            $fraudRiskLevel = $this->promoted_em->getRepository('PandoraBundle:Fraudrisklevels')->find($fraudRiskLevelId);
            if(!$fraudRiskLevel){
                throw new \Exception('Invalid Fraud Risk level. Please contact Administrator.');
            }
            
            $playerData = $this->promoted_em->getRepository($this->targetEntity)->find($playerProfileId);
            $playerData->setFraudRiskLevel($fraudRiskLevel);
            
            // SET MODIFICATION INFORMATION
            $playerData->setModifiedById($this->currentUser->getAspNetUserId());
            $playerData->setDateModified(new \DateTime('NOW'));
            
            $this->promoted_em->merge($playerData);
            $this->promoted_em->flush();
            return $playerData;
        }catch(\Exception $err){
            throw new \Exception('Unable to save to Database. Please contact Administrator.');
        }
    }
    
    public function updateGameBetLimitLevelId(int $playerProfileId, int $gameBetLimitLevelId){
        try{
            $gameBetLimit = $this->promoted_em->getRepository('PandoraBundle:Gamebetlimitlevels')->find($gameBetLimitLevelId);
            if(!$gameBetLimit){
                throw new \Exception('Invalid Game Bet Limit level. Please contact Administrator.');
            }
            
            $playerData = $this->promoted_em->getRepository($this->targetEntity)->find($playerProfileId);
            $playerData->setGameBetLimitLevel($gameBetLimit);
            
            // SET MODIFICATION INFORMATION
            $playerData->setModifiedById($this->currentUser->getAspNetUserId());
            $playerData->setDateModified(new \DateTime('NOW'));
            
            $this->promoted_em->merge($playerData);
            $this->promoted_em->flush();
            return $playerData;
        }catch(\Exception $err){
            throw new \Exception('Unable to save to Database. Please contact Administrator.');
        }
    }
    
    public function updatePaymentRiskLevelId(int $playerProfileId, int $paymentRiskLevelId){
        try{
            $paymentRiskLevel = $this->promoted_em->getRepository('PandoraBundle:Paymentrisklevels')->find($paymentRiskLevelId);
            if(!$paymentRiskLevel){
                throw new \Exception('Invalid Payment Risk level. Please contact Administrator.');
            }
            
            $playerData = $this->promoted_em->getRepository($this->targetEntity)->find($playerProfileId);
            $playerData->setPaymentRiskLevel($paymentRiskLevel);
            
            // SET MODIFICATION INFORMATION
            $playerData->setModifiedById($this->currentUser->getAspNetUserId());
            $playerData->setDateModified(new \DateTime('NOW'));
            
            $this->promoted_em->merge($playerData);
            $this->promoted_em->flush();
            return $playerData;
        }catch(\Exception $err){
            throw new \Exception('Unable to save to Database. Please contact Administrator.');
        }
    }
    
    public function updateVipLevelId(int $playerProfileId, int $VipLevelId){
        try{
            $vipLevel = $this->promoted_em->getRepository('PandoraBundle:Viplevels')->find($VipLevelId);
            if(!$vipLevel){
                throw new \Exception('Invalid Vip level. Please contact Administrator.');
            }
            
            $playerData = $this->promoted_em->getRepository($this->targetEntity)->find($playerProfileId);
            $playerData->setVipLevel($vipLevel);
            
            // SET MODIFICATION INFORMATION
            $playerData->setModifiedById($this->currentUser->getAspNetUserId());
            $playerData->setDateModified(new \DateTime('NOW'));
            
            $this->promoted_em->merge($playerData);
            $this->promoted_em->flush();
            return $playerData;
        }catch(\Exception $err){
            throw new \Exception('Unable to save to Database. Please contact Administrator.');
        }
    }
}