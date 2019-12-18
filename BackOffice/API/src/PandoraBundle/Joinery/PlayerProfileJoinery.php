<?php
namespace PandoraBundle\Joinery;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\IntType;
use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use PandoraBundle\GraphQL\Enum\GenderTypeEnum;
use PandoraBundle\GraphQL\Enum\PlayerAccountStatusTypeEnum;
use PandoraBundle\GraphQL\Enum\PlayerTypeEnum;

class PlayerProfileJoinery{
    
    public static function fields(){
        return [
            'Id' => [
                'type' => new NonNullType(new IdType()),
                'joineryTerm' => 'a.Id',
            ],
            'UserId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserId'
            ],
            'UserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.UserName'
            ],
            'Title' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Title'
            ],
            'LastName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.LastName'
            ],
            'FirstName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.FirstName'
            ],
            'PlayerRegistrationId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerRegistrationId'
            ],
            'BirthDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.BirthDate'
            ],
            'Gender' => [
                'type' => new GenderTypeEnum(),
                'joineryTerm' => 'a.Gender'
            ],
            'Street1' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Street1'
            ],
            'Street2' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Street2'
            ],
            'CityCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CityCode'
            ],
            'RegionCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.RegionCode'
            ],
            'StateProvinceCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.StateProvinceCode'
            ],
            'StateProvinceId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.StateProvinceId',
                'searchConfig' => [
                    'graphQLEndpoint' => 'stateProvinceList',
                    'label' => 'StateProvinceName',
                    'value' => 'Id'
                ]
            ],
            'Zip' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Zip'
            ],
            'CountryCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CountryCode'
            ],
            'Email' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.Email'
            ],
            'FullName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.FullName'
            ],
            'WebChatUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.WebChatUserName'
            ],
            'QQUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.QQUserName'
            ],
            'InstantMessengerUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.InstantMessengerUserName'
            ],
            'DepositAlertEmail' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.DepositAlertEmail'
            ],
            'DepositAlertSms' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.DepositAlertSms'
            ],
            'WithdrawAlertEmail' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.WithdrawAlertEmail'
            ],
            'WithdrawAlertSms' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.WithdrawAlertSms'
            ],
            'InstantMessengerTypeId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.InstantMessengerTypeId',
                'searchConfig' => [
                    'graphQLEndpoint' => 'iMPlatformList',
                    'label' => 'IMPlatformName',
                    'value' => 'Id'
                ]
            ],
            'PaymentRiskLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PaymentRiskLevelId',
                'searchConfig' => [
                    'graphQLEndpoint' => 'paymentRiskLevelList',
                    'label' => 'PaymentRiskLevelName',
                    'value' => 'Id'
                ]
            ],
            'VipLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.VipLevelId',
                'searchConfig' => [
                    'graphQLEndpoint' => 'vIPLevelList',
                    'label' => 'VipLevelName',
                    'value' => 'Id'
                ]
            ],
            'FraudRiskLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.FraudRiskLevelId',
                'searchConfig' => [
                    'graphQLEndpoint' => 'fraudRiskLevelList',
                    'label' => 'FraudRiskLevelName',
                    'value' => 'Id'
                ]
            ],
            'SecurityQuestionId1' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SecurityQuestionId1',
                'searchConfig' => [
                    'graphQLEndpoint' => 'securityQuestionList',
                    'label' => 'SecurityQuestionDesc',
                    'value' => 'Id'
                ]
            ],
            'SecurityQuestionAnswer1' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SecurityQuestionAnswer1'
            ],
            'SecurityQuestionId2' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SecurityQuestionId2',
                'searchConfig' => [
                    'graphQLEndpoint' => 'securityQuestionList',
                    'label' => 'SecurityQuestionDesc',
                    'value' => 'Id'
                ]
            ],
            'SecurityQuestionAnswer2' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SecurityQuestionAnswer2'
            ],
            
            // TODO: REFACTOR -----------------
            'PlayerRegisterActivationType' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.PlayerRegisterActivationType'
            ],
            'PlayerActivationStatus' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.PlayerActivationStatus'
            ],
            'AccountStatus' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.AccountStatus'
            ],
            // TODO: REFACTOR -----------------
            
            'IsLocked' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsLocked'
            ],
            'HasBeenUpdated' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.HasBeenUpdated'
            ],
            'LoginAttemp' => [
                'type' => new IntType(),
                'joineryTerm' => 'a.LoginAttemp'
            ],
            'BankAccountId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.BankAccountId'
            ],
            'WithdrawalLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WithdrawalLevelId'
            ],
            'WithdrawalBankAccountId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.WithdrawalBankAccountId'
            ],
            'CheckForFraud' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.CheckForFraud'
            ],
            'IsDoNotAllowBonus' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.IsDoNotAllowBonus'
            ],
            'AgentId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.AgentId'
            ],
            'SubAgentId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.SubAgentId'
            ],
            'PlayerCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.PlayerCode'
            ],
            'GameBetLimitLevelId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.GameBetLimitLevelId'
            ],
            'LineId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.LineId'
            ],
            'WhatsappId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.WhatsappId'
            ],
            'KakaoTalkId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.KakaoTalkId'
            ],
            'SkypeId' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.SkypeId'
            ],
            'CreatedById' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.CreatedById'
            ],
            'ModifiedById' => [
                'type' => new StringType(),
                'joineryTerm' => 'a.ModifiedById'
            ],
            'DateCreated' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateCreated'
            ],
            'DateModified' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'a.DateModified'
            ],
            'ActiveRecord' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'a.ActiveRecord'
            ],
            'CountryId' => [
                'type' => new IdType(),
                'joineryTerm' => 'a.CountryId'
            ],
            
            'AccountStatus' => [
                'type' => new PlayerAccountStatusTypeEnum(),
                'joineryTerm' => 'a.AccountStatus'
            ],
            'DaysRegistered' => [
                'type' => new StringType(),
                'joineryTerm' => 'DATE_DIFF(CURRENT_TIME(), b.DateCreated) AS DaysRegistered'
            ],
            'LockedBalance' => [
                'type' => new DecimalType(),
                'joineryTerm' => '(SELECT SUM(wla.ActualDepositAmount) FROM PandoraBundle:Walletdeposits AS wla WHERE wla.WalletId = c.Id AND wla.Status = 2 AND wla.IsWageringFulfilled = 0) AS LockedBalance' // 2 MEANS APPROVED STATUS
            ],
            'TotalDeposits' => [
                'type' => new DecimalType(),
                'joineryTerm' => '(SELECT SUM(wd.ActualDepositAmount) FROM PandoraBundle:Walletdeposits AS wd WHERE wd.WalletId = c.Id AND wd.Status = 2) AS TotalDeposits' // 2 MEANS APPROVED STATUS
            ],
            'TotalDepositCount' => [
                'type' => new StringType(),
                'joineryTerm' => '(SELECT COUNT(1) FROM PandoraBundle:Walletdeposits AS wdc WHERE wdc.WalletId = c.Id AND wdc.Status = 2) AS TotalDepositCount'
            ],
            'TotalDepositCountWithBonus' => [
                'type' => new StringType(),
                'joineryTerm' => '(SELECT COUNT(1) FROM PandoraBundle:Walletdeposits AS wdcb WHERE wdcb.WalletId = c.Id AND wdcb.Status = 2 AND wdcb.BonusId > 0) AS TotalDepositCountWithBonus'
            ],
            'TotalBonus' => [
                'type' => new DecimalType(),
                'joineryTerm' => '(SELECT SUM(wb.BonusAmount) FROM PandoraBundle:Walletdeposits AS wb WHERE wb.WalletId = c.Id AND wb.Status = 2) AS TotalBonus' // 2 MEANS APPROVED STATUS
            ],
            'TotalWithdrawals' => [
                'type' => new DecimalType(),
                'joineryTerm' => '(SELECT SUM(tww.WithdrawAmount) FROM PandoraBundle:Walletwithdrawals AS tww WHERE tww.WalletId = c.Id AND tww.Status = 2) AS TotalWithdrawals' // 2 MEANS APPROVED STATUS
            ],
            'TotalWithdrawalCount' => [
                'type' => new StringType(),
                'joineryTerm' => '(SELECT COUNT(1) FROM PandoraBundle:Walletwithdrawals AS twwc WHERE twwc.WalletId = c.Id AND twwc.Status = 2) AS TotalWithdrawalCount' // 2 MEANS APPROVED STATUS
            ],
            'TotalWins' => [
                'type' => new DecimalType(),
                'joineryTerm' => '(SELECT SUM(ww.WinAmount) FROM PandoraBundle:Walletwins AS ww WHERE ww.PlayerProfileId = a.Id) AS TotalWins'
            ],
            'TotalLoss' => [
                'type' => new DecimalType(),
                'joineryTerm' => '(SELECT SUM(wl.LossAmount) FROM PandoraBundle:Walletlosses AS wl WHERE wl.PlayerProfileId = a.Id) AS TotalLoss'
            ],
            'TotalCreditMemo' => [
                'type' => new DecimalType(),
                'joineryTerm' => '(SELECT SUM(cm.CreditAmount) FROM PandoraBundle:Walletadjustmentmemos AS cm WHERE cm.WalletId = c.Id AND cm.Status = 2 AND cm.AdjustmentType = 0) AS TotalCreditMemo'
            ],
            'TotalDebitMemo' => [
                'type' => new DecimalType(),
                'joineryTerm' => '(SELECT SUM(dm.DebitAmount) FROM PandoraBundle:Walletadjustmentmemos AS dm WHERE dm.WalletId = c.Id AND dm.Status = 2 AND dm.AdjustmentType = 1) AS TotalDebitMemo'
            ],
            
            
            /* PLAYER REGISTRATION FIELDs */
            'UserAccountNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.UserAccountNo'
            ],
            'MobileNo' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.MobileNo'
            ],
            'Email' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.Email'
            ],
            'PlayerType' => [
                'type' => new PlayerTypeEnum(),
                'joineryTerm' => 'b.PlayerType'
            ],
            'RegistrationDate' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'b.DateCreated AS RegistrationDate'
            ],
            'CurrencyCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.CurrencyCode'
            ],
            'BrandId' => [
                'type' => new IdType(),
                'joineryTerm' => 'b.BrandId'
            ],
            'BrandCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.BrandCode'
            ],
            'SourceUrl' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.SrcUrl AS SourceUrl'
            ],
            'Platform' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.Platform'
            ],
            'IsEmailVerified' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'b.IsEmailVerified'
            ],
            'IsMobileVerified' => [
                'type' => new BooleanType(),
                'joineryTerm' => 'b.IsMobileVerified'
            ],
            'IPAddress' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.IPAddress'
            ],
            'LastLoginTime' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'b.LastLoginTime'
            ],
            'LastLoginIPAddress' => [
                'type' => new StringType(),
                'joineryTerm' => 'b.LastLoginIPAddress'
            ],
            'PlayerRegisterStatus' => [
                'type' => new PlayerAccountStatusTypeEnum(),
                'joineryTerm' => 'b.PlayerRegisterStatus'
            ],
            'AffiliateId' => [
                'type' => new IdType(),
                'joineryTerm' => 'b.AffiliateId'
            ],
            
            
            /* WALLET FIELDS */
            'WalletCode' => [
                'type' => new StringType(),
                'joineryTerm' => 'c.WalletCode'
            ],
            'WalletLastUpdated' => [
                'type' => new DateTimeType(),
                'joineryTerm' => 'c.WalletLastUpdated'
            ],
            'Balance' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'c.Balance'
            ],
            
            /*WALLET COMPUTED BALANCES */
            'WithdrawableAmount' => [
                'type' => new DecimalType(),
                'joineryTerm' => 'o.WithdrawableAmount'
            ],
            
            
            /* VIP FIELDS */
            'VipLevelName' => [
                'type' => new StringType(),
                'joineryTerm' => 'd.VipLevelName'
            ],
            
            
            /* PAYMENT RISK LEVEL FIELDS */
            'PaymentRiskLevelName' => [
                'type' => new StringType(),
                'joineryTerm' => 'e.PaymentRiskLevelName'
            ],
            
            
            /* WITHDRAWAL LEVEL FIELDS */
            'WithdrawalLevelName' => [
                'type' => new StringType(),
                'joineryTerm' => 'f.WithdrawalLevelName'
            ],
            
            /* FRAUD RISK LEVEL FIELDS */
            'FraudRiskLevelName' => [
                'type' => new StringType(),
                'joineryTerm' => 'g.FraudRiskLevelName'
            ],
            
            
            /* SECURITY QUESTION 1 FIELDS */
            'SecurityQuestionDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'h.SecurityQuestionDesc'
            ],
            
            /* GAME BET LIMIT FIELDS */
            'BetLimitLevelDesc' => [
                'type' => new StringType(),
                'joineryTerm' => 'i.BetLimitLevelDesc'
            ],
            
            /* GAME BET LIMIT FIELDS */
            'DepositBankName' => [
                'type' => new StringType(),
                'joineryTerm' => 'j.BankName AS DepositBankName'
            ],
            
            /* GAME BET LIMIT FIELDS */
            'WithdrawalBankName' => [
                'type' => new StringType(),
                'joineryTerm' => 'k.BankName AS WithdrawalBankName'
			],
            
            /* COUNTRY ENTITY */
            'Country' => [
                'type' => new StringType(),
                'joineryTerm' => 'l.CountryName AS Country'
            ],
            
//             /* CURRENCY ENTITY */
//             'CurrencyId' => [
//                 'type' => new IdType(),
//                 'joineryTerm' => 'm.Id AS CurrencyId'
//             ],
            
            /* SECURITY QUESTION FIELDS */
            'SecurityQuestionDesc2' => [
                'type' => new StringType(),
                'joineryTerm' => 'n.SecurityQuestionDesc AS SecurityQuestionDesc2'
            ],
            
            
            'CreatedByUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'x.UserName AS CreatedByUserName'
            ],
            'ModifiedByUserName' => [
                'type' => new StringType(),
                'joineryTerm' => 'y.UserName AS ModifiedByUserName'
            ]
        ];
    }
}