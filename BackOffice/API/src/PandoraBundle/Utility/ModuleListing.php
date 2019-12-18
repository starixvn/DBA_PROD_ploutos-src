<?php

namespace PandoraBundle\Utility;

use PandoraBundle\GraphQL\Mutation\MutationType;
use PandoraBundle\GraphQL\Query\QueryType;

/**
 * @author Echarbeto
 */
class ModuleListing{
    public static function getList(){
        $items = [];
        $query = new QueryType();
        $queryFields = $query->getFields();
        foreach($queryFields as $value){
            $queryItem = [];
            $queryItem['ModuleName'] = $value->getName();
            $queryItem['ModuleSystemName'] = $value->getName();
            $queryItem['ModuleDescription'] = $value->getDescription();
            $queryItem['ModuleType'] = 'INFOS';
            array_push($items, $queryItem);
        }
        
        $mutation = new MutationType();
        $mutationFields = $mutation->getFields();
        foreach($mutationFields as $value){
            $mutationItem = [];
            $mutationItem['ModuleName'] = $value->getName();
            $mutationItem['ModuleSystemName'] = $value->getName();
            $mutationItem['ModuleDescription'] = $value->getDescription();
            $mutationItem['ModuleType'] = 'ACTIONS';
            array_push($items, $mutationItem);
        }
        
        // PLAYER MANAGER MENU
        $items[] = [
            'ModuleName' => 'menuPlayerManager',
            'ModuleSystemName' => 'menuPlayerManager',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Player Manager'
        ];
        $items[] = [
            'ModuleName' => 'menuPlayerManagerSetup',
            'ModuleSystemName' => 'menuPlayerManagerSetup',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Player Manager Setup'
        ];
        $items[] = [
            'ModuleName' => 'menuPlayerProfile',
            'ModuleSystemName' => 'menuPlayerProfile',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Player Profile'
        ];
        $items[] = [
            'ModuleName' => 'menuBrands',
            'ModuleSystemName' => 'menuBrands',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Brands'
        ];
        $items[] = [
            'ModuleName' => 'menuCountries',
            'ModuleSystemName' => 'menuCountries',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Countries'
        ];
        $items[] = [
            'ModuleName' => 'menuCurrencies',
            'ModuleSystemName' => 'menuCurrencies',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Currencies'
        ];
        $items[] = [
            'ModuleName' => 'menuStateProvince',
            'ModuleSystemName' => 'menuStateProvince',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu State Province'
        ];
        $items[] = [
            'ModuleName' => 'menuProducts',
            'ModuleSystemName' => 'menuProducts',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Products'
        ];
        $items[] = [
            'ModuleName' => 'menuSupportedCurrencies',
            'ModuleSystemName' => 'menuSupportedCurrencies',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Supported Currencies'
        ];
        $items[] = [
            'ModuleName' => 'menuOauthCredentials',
            'ModuleSystemName' => 'menuOauthCredentials',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Oauth Credentials'
        ];
        $items[] = [
            'ModuleName' => 'menuGames',
            'ModuleSystemName' => 'menuGames',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Games'
        ];
        $items[] = [
            'ModuleName' => 'menuVIPLevels',
            'ModuleSystemName' => 'menuVIPLevels',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu V I P Levels'
        ];
        $items[] = [
            'ModuleName' => 'menuSecurityQuestions',
            'ModuleSystemName' => 'menuSecurityQuestions',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Security Questions'
        ];
        $items[] = [
            'ModuleName' => 'menuNotifications',
            'ModuleSystemName' => 'menuNotifications',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Notifications'
        ];
        $items[] = [
            'ModuleName' => 'menuGameBetLimitLevel',
            'ModuleSystemName' => 'menuGameBetLimitLevel',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Game Bet Limit Level'
        ];
        $items[] = [
            'ModuleName' => 'menuGameBetLimitLevelSettings',
            'ModuleSystemName' => 'menuGameBetLimitLevelSettings',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Game Bet Limit Level Settings'
        ];
        $items[] = [
            'ModuleName' => 'menuMarketBrands',
            'ModuleSystemName' => 'menuMarketBrands',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Market Brands'
        ];
        $items[] = [
            'ModuleName' => 'menuMessageMonitoring',
            'ModuleSystemName' => 'menuMessageMonitoring',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Message Monitoring'
        ];
        $items[] = [
            'ModuleName' => 'menuAccessLog',
            'ModuleSystemName' => 'menuAccessLog',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Access Log'
        ];
        $items[] = [
            'ModuleName' => 'menuWalletLedger',
            'ModuleSystemName' => 'menuWalletLedger',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Wallet Ledger'
        ];
        $items[] = [
            'ModuleName' => 'menuWallet',
            'ModuleSystemName' => 'menuWallet',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Wallet'
        ];
        $items[] = [
            'ModuleName' => 'menuPlayerBankAccount',
            'ModuleSystemName' => 'menuPlayerBankAccount',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Player Bank Account'
        ];
        $items[] = [
            'ModuleName' => 'menuWageringFulfillment',
            'ModuleSystemName' => 'menuWageringFulfillment',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Wagering Fulfillment'
        ];
        $items[] = [
            'ModuleName' => 'menuPlayerBet',
            'ModuleSystemName' => 'menuPlayerBet',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Player Bet'
        ];
        $items[] = [
            'ModuleName' => 'menuPlayerWalletWin',
            'ModuleSystemName' => 'menuPlayerWalletWin',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Player Wallet Win'
        ];
        $items[] = [
            'ModuleName' => 'menuPlayerWalletLoss',
            'ModuleSystemName' => 'menuPlayerWalletLoss',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Player Wallet Loss'
        ];
        $items[] = [
            'ModuleName' => 'menuPlayerMessage',
            'ModuleSystemName' => 'menuPlayerMessage',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Player Message'
        ];

        
        // PAYMENT MANAGER MENU
        $items[] = [
            'ModuleName' => 'menuPaymentManager',
            'ModuleSystemName' => 'menuPaymentManager',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Payment Manager'
        ];
        $items[] = [
            'ModuleName' => 'menuDeposit',
            'ModuleSystemName' => 'menuDeposit',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Deposit'
        ];
        $items[] = [
            'ModuleName' => 'menuWithdrawal',
            'ModuleSystemName' => 'menuWithdrawal',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Withdrawal'
        ];
        $items[] = [
            'ModuleName' => 'menuCreditMemo',
            'ModuleSystemName' => 'menuCreditMemo',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Credit Memo'
        ];
        $items[] = [
            'ModuleName' => 'menuDebitMemo',
            'ModuleSystemName' => 'menuDebitMemo',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Debit Memo'
        ];
        $items[] = [
            'ModuleName' => 'menuFundTransfers',
            'ModuleSystemName' => 'menuFundTransfers',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Fund Transfers'
        ];
        $items[] = [
            'ModuleName' => 'menuBank',
            'ModuleSystemName' => 'menuBank',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Bank'
        ];
        $items[] = [
            'ModuleName' => 'menuBankAccounts',
            'ModuleSystemName' => 'menuBankAccounts',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Bank Accounts'
        ];
        $items[] = [
            'ModuleName' => 'menuPaymentMethod',
            'ModuleSystemName' => 'menuPaymentMethod',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Payment Method'
        ];
        $items[] = [
            'ModuleName' => 'menuPaymentRiskLevel',
            'ModuleSystemName' => 'menuPaymentRiskLevel',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Payment Risk Level'
        ];
        $items[] = [
            'ModuleName' => 'menuWithdrawalLevels',
            'ModuleSystemName' => 'menuWithdrawalLevels',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Withdrawal Levels'
        ];
        $items[] = [
            'ModuleName' => 'menuOnlinePaymentBanks',
            'ModuleSystemName' => 'menuOnlinePaymentBanks',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Online Payment Banks'
        ];
        $items[] = [
            'ModuleName' => 'menuUniqueDepositAmounts',
            'ModuleSystemName' => 'menuUniqueDepositAmounts',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Unique Deposit Amounts'
        ];
        $items[] = [
            'ModuleName' => 'menuFraudRiskLevels',
            'ModuleSystemName' => 'menuFraudRiskLevels',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Fraud Risk Levels'
        ];

        
        // AFFILIATE MANAGER MENU
        $items[] = [
            'ModuleName' => 'menuAffiliateManager',
            'ModuleSystemName' => 'menuAffiliateManager',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Affiliate Manager'
        ];
        $items[] = [
            'ModuleName' => 'menuAffiliate',
            'ModuleSystemName' => 'menuAffiliate',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Affiliate'
        ];
        $items[] = [
            'ModuleName' => 'menuAffiliateCommision',
            'ModuleSystemName' => 'menuAffiliateCommision',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Affiliate Commission'
        ];
        $items[] = [
            'ModuleName' => 'menuAffiliateTransaction',
            'ModuleSystemName' => 'menuAffiliateTransaction',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Affiliate Transaction'
        ];
        $items[] = [
            'ModuleName' => 'menuAffiliateSetup',
            'ModuleSystemName' => 'menuAffiliateSetup',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Affiliate Setup'
        ];
        $items[] = [
            'ModuleName' => 'menuAffiliateEarningPlan',
            'ModuleSystemName' => 'menuAffiliateEarningPlan',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Affiliate Earning Plan'
        ];
        $items[] = [
            'ModuleName' => 'menuAffiliateRewards',
            'ModuleSystemName' => 'menuAffiliateRewards',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Affiliate Rewards'
        ];
        
        // BONUS MANAGER MENU
        $items[] = [
            'ModuleName' => 'menuBonusManager',
            'ModuleSystemName' => 'menuBonusManager',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Bonus Manager'
        ];
        $items[] = [
            'ModuleName' => 'menuBonusManagerSetup',
            'ModuleSystemName' => 'menuBonusManagerSetup',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Bonus Manager Setup'
        ];
        $items[] = [
            'ModuleName' => 'menuBonuses',
            'ModuleSystemName' => 'menuBonuses',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Bonuses'
        ];
        $items[] = [
            'ModuleName' => 'menuRebates',
            'ModuleSystemName' => 'menuRebates',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Rebates'
        ];
        $items[] = [
            'ModuleName' => 'menuPlayerRebates',
            'ModuleSystemName' => 'menuPlayerRebates',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Player Rebates'
        ];
        $items[] = [
            'ModuleName' => 'menuCampaignLevels',
            'ModuleSystemName' => 'menuCampaignLevels',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Campaign Levels'
        ];
        $items[] = [
            'ModuleName' => 'menuCampaignDetail',
            'ModuleSystemName' => 'menuCampaignDetails',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Campaign Detail'
        ];
        $items[] = [
            'ModuleName' => 'menuAffiliateCode',
            'ModuleSystemName' => 'menuAffiliateCode',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Affiliate Code'
        ];
        
        
        // ADMIN MENU
        $items[] = [
            'ModuleName' => 'menuAdminManager',
            'ModuleSystemName' => 'menuAdminManager',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Admin Manager'
        ];
        $items[] = [
            'ModuleName' => 'menuUsers',
            'ModuleSystemName' => 'menuUsers',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Users'
        ];
        $items[] = [
            'ModuleName' => 'menuAccessRights',
            'ModuleSystemName' => 'menuAccessRights',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Access Rights'
        ];
        
        // TICKET MENU
        $items[] = [
            'ModuleName' => 'menuTicketManager',
            'ModuleSystemName' => 'menuTicketManager',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Ticket Manager'
        ];
        $items[] = [
            'ModuleName' => 'menuTeams',
            'ModuleSystemName' => 'menuTeams',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Teams'
        ];
        $items[] = [
            'ModuleName' => 'menuTicketCategories',
            'ModuleSystemName' => 'menuTicketCategories',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Ticket Categories'
        ];
        
        
        // MARKETING
        $items[] = [
            'ModuleName' => 'menuEmailBlast',
            'ModuleSystemName' => 'menuEmailBlast',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Email Blast'
        ];
        $items[] = [
            'ModuleName' => 'menuEmailBlastMonitoring',
            'ModuleSystemName' => 'menuEmailBlastMonitoring',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Email Blast Monitoring'
        ];
        
        
        // REPORTs
        $items[] = [
            'ModuleName' => 'menuDashboard',
            'ModuleSystemName' => 'menuDashboard',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Dashboard'
        ];
        $items[] = [
            'ModuleName' => 'menuAdHocTabular',
            'ModuleSystemName' => 'menuAdHocTabular',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Ad-Hoc Tabular'
        ];
        
        // SETUP
        $items[] = [
            'ModuleName' => 'menuSetupManager',
            'ModuleSystemName' => 'menuSetupManager',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Setup Manager'
        ];
        
        // POGO PORTAL
        $items[] = [
            'ModuleName' => 'menuPogoPortal',
            'ModuleSystemName' => 'menuPogoPortal',
            'ModuleType' => 'MENU',
            'ModuleDescription' => 'Menu Pogo Portal'
        ];
        
        // FIELD LEVEL SECURITY
        $items[] = [
            'ModuleName' => 'FieldPlayerEmail',
            'ModuleSystemName' => 'FieldPlayerEmail',
            'ModuleType' => 'FIELD',
            'ModuleDescription' => 'Player Field Player Email'
        ];
        $items[] = [
            'ModuleName' => 'FieldPlayerMobile',
            'ModuleSystemName' => 'FieldPlayerMobile',
            'ModuleType' => 'FIELD',
            'ModuleDescription' => 'Player Field Player Mobile'
        ];
        $items[] = [
            'ModuleName' => 'FieldPlayerSecurityAnswer',
            'ModuleSystemName' => 'FieldPlayerSecurityAnswer',
            'ModuleType' => 'FIELD',
            'ModuleDescription' => 'Player Field Player Security Answer'
        ];
        
        // SORT FIRST
        usort($items, function($a, $b) {
            $a1 = $a["ModuleDescription"]; //get the name string value
            $b1 = $b["ModuleDescription"];
            
            $out = strcasecmp($a1,$b1);
            if($out == 0){ return 0;} //they are the same string, return 0
            if($out > 0){ return 1;} // $a1 is lower in the alphabet, return 1
            if($out < 0){ return -1;} //$a1 is higher in the alphabet, return -1
        });
        
        return $items;
    }
}