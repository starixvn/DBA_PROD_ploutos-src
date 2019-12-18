<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation;

use PandoraBundle\GraphQL\Mutation\BankAccount\BankAccountMutationType;
use PandoraBundle\GraphQL\Mutation\Language\LanguageMutationType;
use PandoraBundle\GraphQL\Mutation\Notification\NotificationMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionVerifyPlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\Rebate\RebateMutationType;
use PandoraBundle\GraphQL\Mutation\RebateDetail\RebateDetailMutationType;
use PandoraBundle\GraphQL\Mutation\SecurityQuestion\SecurityQuestionMutationType;
use PandoraBundle\GraphQL\Mutation\StateProvince\StateProvinceMutationType;
use PandoraBundle\GraphQL\Mutation\SubAgent\SubAgentMutationType;
use PandoraBundle\GraphQL\Mutation\User\UserMutationType;
use PandoraBundle\GraphQL\Mutation\WalletFundTransfer\WalletFundTransferMutationType;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use PandoraBundle\GraphQL\Mutation\Bank\BankMutationType;
use PandoraBundle\GraphQL\Mutation\Brand\BrandMutationType;
use PandoraBundle\GraphQL\Mutation\Country\CountryMutationType;
use PandoraBundle\GraphQL\Mutation\Currency\CurrencyMutationType;
use PandoraBundle\GraphQL\Mutation\GameBetLimitLevel\GameBetLimitLevelMutationType;
use PandoraBundle\GraphQL\Mutation\GameBetLimitSetting\GameBetLimitSettingMutationType;
use PandoraBundle\GraphQL\Mutation\GamePlatform\GamePlatformMutationType;
use PandoraBundle\GraphQL\Mutation\GamePlatformOAuthCredential\GamePlatformOAuthCredentialMutationType;
use PandoraBundle\GraphQL\Mutation\GamePlatformProduct\GamePlatformProductMutationType;
use PandoraBundle\GraphQL\Mutation\GamePlatformSupportedCurrency\GamePlatformSupportedCurrencyMutationType;
use PandoraBundle\GraphQL\Mutation\GamePlatformSupportedLanguage\GamePlatformSupportedLanguageMutationType;
use PandoraBundle\GraphQL\Mutation\UserAccess\UserAccessMutationType;
use PandoraBundle\GraphQL\Mutation\VIPLevel\VIPLevelMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionActivatePlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionArchivePlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionChangeVipPlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionCreatePlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionDeactivatePlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionEnablePlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionFraudRiskLevelPlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionLockPlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionResetCodePlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionBetLimitLevelPlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionPaymentRiskLevelPlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionChangeTypePlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionUnLockPlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\BrandMarket\BrandMarketMutationType;
use PandoraBundle\GraphQL\Mutation\BrandMarketEmailNotificationSetup\BrandMarketEmailNotificationSetupMutationType;
use PandoraBundle\GraphQL\Mutation\WithdrawalLevel\WithdrawalLevelMutationType;
use PandoraBundle\GraphQL\Mutation\PaymentMethod\PaymentMethodMutationType;
use PandoraBundle\GraphQL\Mutation\PaymentRiskLevel\PaymentRiskLevelMutationType;
use PandoraBundle\GraphQL\Mutation\UniqueDepositAmountRule\UniqueDepositAmountRuleMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProviderLocking\PlayerProviderLockingMutationType;
use PandoraBundle\GraphQL\Mutation\CampaignDetail\CampaignDetailMutationType;
use PandoraBundle\GraphQL\Mutation\CampaignDetailLevel\CampaignDetailLevelMutationType;
use PandoraBundle\GraphQL\Mutation\PaymentGateway\PaymentGatewayMutationType;
use PandoraBundle\GraphQL\Mutation\PaymentGatewayBank\PaymentGatewayBankMutationType;
use PandoraBundle\GraphQL\Mutation\Bonus\BonusMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerRebate\PlayerRebateMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerSeenMessageHistory\ActionCreatePlayerSeenMessagesHistoryMutationType;
use PandoraBundle\GraphQL\Mutation\EmailTemplate\EmailTemplateMutationType;
use PandoraBundle\GraphQL\Mutation\FileManaged\FileManagedMutationType;
use PandoraBundle\GraphQL\Mutation\FraudRiskLevel\FraudRiskLevelMutationType;
use PandoraBundle\GraphQL\Mutation\UniqueDepositAmount\UniqueDepositAmountMutationType;
use PandoraBundle\GraphQL\Mutation\WalletDeposit\ActionCreateWalletDepositMutationType;
use PandoraBundle\GraphQL\Mutation\WalletDeposit\ActionRejectWalletDepositMutationType;
use PandoraBundle\GraphQL\Mutation\WalletDeposit\ActionApproveWalletDepositMutationType;
use PandoraBundle\GraphQL\Mutation\WalletDeposit\ActionAdjustWalletDepositMutationType;
use PandoraBundle\GraphQL\Mutation\WalletDeposit\ActionWagerFulfilledWalletDepositMutationType;
use PandoraBundle\GraphQL\Mutation\WalletWithdrawal\ActionApproveWalletWithdrawalMutationType;
use PandoraBundle\GraphQL\Mutation\WalletWithdrawal\ActionRejectWalletWithdrawalMutationType;
use PandoraBundle\GraphQL\Mutation\WalletWithdrawal\ActionClearWalletWithdrawalMutationType;
use PandoraBundle\GraphQL\Mutation\NotificationMessageLog\NotificationMessageLogMutationType;
use PandoraBundle\GraphQL\Mutation\OnlineBank\OnlineBankMutationType;
use PandoraBundle\GraphQL\Mutation\OnlineBankSupportedCurrencies\OnlineBankSupportedCurrenciesTypeMutationType;
use PandoraBundle\GraphQL\Mutation\OnlineBankType\OnlineBankTypeMutationType;
use PandoraBundle\GraphQL\Mutation\WageringFulfilment\WageringFulfilmentMutationType;
use PandoraBundle\GraphQL\Mutation\WalletAdjustment\ActionAddCreditWalletAdjustmentMutationType;
use PandoraBundle\GraphQL\Mutation\WalletAdjustment\ActionApproveWalletAdjustmentMutationType;
use PandoraBundle\GraphQL\Mutation\WalletAdjustment\ActionAddDebitWalletAdjustmentMutationType;
use PandoraBundle\GraphQL\Mutation\User\UserPersonalInfoMutationType;
use PandoraBundle\GraphQL\Mutation\Comment\CommentMutationType;
use PandoraBundle\GraphQL\Mutation\RecordViewed\RecordViewedMutationType;
use PandoraBundle\GraphQL\Mutation\TransactionGrabs\ActionTransactionGrabUnGrabMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionResetPasswordPlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerProfile\ActionEditPlayerProfileMutationType;
use PandoraBundle\GraphQL\Mutation\AffiliateCommission\ActionAffiliateCommissionMutationType;
use PandoraBundle\GraphQL\Mutation\AffiliateCommission\ActionApproveAffiliateCommissionsMutationType;
use PandoraBundle\GraphQL\Mutation\AffiliateEarningPlan\AffiliateEarningPlanMutationType;
use PandoraBundle\GraphQL\Mutation\WalletWithdrawal\ActionForFraudWalletWithdrawalMutationType;
use PandoraBundle\GraphQL\Mutation\WalletWithdrawal\ActionUnClearWalletWithdrawalMutationType;
use PandoraBundle\GraphQL\Mutation\Affiliate\ActionActivateAffiliateMutationType;
use PandoraBundle\GraphQL\Mutation\Affiliate\ActionCloseAffiliateMutationType;
use PandoraBundle\GraphQL\Mutation\Affiliate\ActionSuspendAffiliateMutationType;
use PandoraBundle\GraphQL\Mutation\Affiliate\AffiliateMutationType;
use PandoraBundle\GraphQL\Mutation\Tickets\TicketsMutationType;
use PandoraBundle\GraphQL\Mutation\TicketCategory\TicketCategoryMutationType;
use PandoraBundle\GraphQL\Mutation\TabularReport\TabularReportMutationType;
use PandoraBundle\GraphQL\Mutation\Teams\TeamsMutationType;
use PandoraBundle\GraphQL\Mutation\Tickets\ActionAcknowledgeTicketMutationType;
use PandoraBundle\GraphQL\Mutation\Tickets\ActionAssignTicketMutationType;
use PandoraBundle\GraphQL\Mutation\Tickets\ActionCloseTicketMutationType;
use PandoraBundle\GraphQL\Mutation\AffiliateWorkFlow\ActionAffiliateWorkFlowMutationType;
use PandoraBundle\GraphQL\Mutation\AffiliateTrackingLink\AffiliateTrackingLinkMutationType;
use PandoraBundle\GraphQL\Mutation\AffiliateTransaction\ActionApproveAffiliateTransactionMutationType;
use PandoraBundle\GraphQL\Mutation\AffiliateTransaction\ActionRejectAffiliateTransactionMutationType;
use PandoraBundle\GraphQL\Mutation\AffiliateTransaction\AffiliateTransactionMutationType;
use PandoraBundle\GraphQL\Mutation\AuditTrail\AuditTrailViewedMutationType;
use PandoraBundle\GraphQL\Mutation\IMPlatform\IMPlatformMutationType;
use PandoraBundle\GraphQL\Mutation\BannedWords\BannedWordsMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerDocument\PlayerDocumentMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerNoteCategory\PlayerNoteCategoryMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerNoteType\PlayerNoteTypeMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerNote\PlayerNoteMutationType;
use PandoraBundle\GraphQL\Mutation\PlayerNotification\PlayerNotificationMutationType;
use PandoraBundle\GraphQL\Mutation\CMSManagement\CMSManagementMutationType;
use PandoraBundle\GraphQL\Mutation\EmailBlast\ActionReProcessEmailBlastStatusMutationType;
use PandoraBundle\GraphQL\Mutation\EmailBlast\EmailBlastMutationType;
use PandoraBundle\GraphQL\Mutation\EmailBlast\ActionSendEmailBlastMutationType;
use PandoraBundle\GraphQL\Mutation\Messages\ActionCreateAndSendPlayerMessagesMutationType;
use PandoraBundle\GraphQL\Mutation\Messages\ActionUpdateAndSendPlayerMessagesMutationType;
use PandoraBundle\GraphQL\Mutation\Messages\ActionCreatePlayerMessagesMutationType;
use PandoraBundle\GraphQL\Mutation\Messages\ActionUpdatePlayerMessagesMutationType;

class MutationType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addFields([
            new UserMutationType(),
            new UserPersonalInfoMutationType(),
            new BankMutationType(),
            new BrandMutationType(),
            new UserAccessMutationType(),
            new CountryMutationType(),
            new CurrencyMutationType(),
            new VIPLevelMutationType(),
            new GameBetLimitLevelMutationType(),
            new GameBetLimitSettingMutationType(),
            new LanguageMutationType(),
            new StateProvinceMutationType(),
            new GamePlatformProductMutationType(),
            new GamePlatformMutationType(),
            new SecurityQuestionMutationType(),
            new NotificationMutationType(),
            new GamePlatformSupportedCurrencyMutationType(),
            new GamePlatformSupportedLanguageMutationType(),
            new RebateMutationType(),
            new BrandMarketMutationType(),
            new WalletFundTransferMutationType(),
            new WithdrawalLevelMutationType(),
            new BankAccountMutationType(),
            new PaymentMethodMutationType(),
            new PaymentRiskLevelMutationType(),
            new UniqueDepositAmountRuleMutationType(),
            new PlayerProviderLockingMutationType(),
            new CampaignDetailMutationType(),
            new CampaignDetailLevelMutationType(),
            new PaymentGatewayBankMutationType(),
            new BonusMutationType(),
            new PlayerRebateMutationType(),
            new FraudRiskLevelMutationType(),
            new UniqueDepositAmountMutationType(),
            new SubAgentMutationType(),
            new NotificationMessageLogMutationType(),
            new WageringFulfilmentMutationType(),
            new CommentMutationType(),
            new RecordViewedMutationType(),
            
            // ACTIONS
            new ActionVerifyPlayerProfileMutationType(),
            new ActionActivatePlayerProfileMutationType(),
            new ActionArchivePlayerProfileMutationType(),
            new ActionDeactivatePlayerProfileMutationType(),
            new ActionEnablePlayerProfileMutationType(),
            new ActionLockPlayerProfileMutationType(),
            new ActionResetCodePlayerProfileMutationType(),
            new ActionBetLimitLevelPlayerProfileMutationType(),
            new ActionPaymentRiskLevelPlayerProfileMutationType(),
            new ActionFraudRiskLevelPlayerProfileMutationType(),
            new ActionChangeTypePlayerProfileMutationType(),
            new ActionChangeVipPlayerProfileMutationType(),
            new ActionUnLockPlayerProfileMutationType(),
            new ActionResetPasswordPlayerProfileMutationType(),
            new ActionEditPlayerProfileMutationType(),
            
            new ActionCreateWalletDepositMutationType(),
            new ActionApproveWalletDepositMutationType(),
            new ActionRejectWalletDepositMutationType(),
            new ActionAdjustWalletDepositMutationType(),
            new ActionWagerFulfilledWalletDepositMutationType(),
            new ActionForFraudWalletWithdrawalMutationType(),
            new ActionUnClearWalletWithdrawalMutationType(),
            new ActionApproveWalletWithdrawalMutationType(),
            new ActionRejectWalletWithdrawalMutationType(),
            new ActionClearWalletWithdrawalMutationType(),
            
            new ActionAddCreditWalletAdjustmentMutationType(),
            new ActionAddDebitWalletAdjustmentMutationType(),
            new ActionApproveWalletAdjustmentMutationType(),
            
            new ActionTransactionGrabUnGrabMutationType(),
            new ActionActivateAffiliateMutationType(),
            new ActionSuspendAffiliateMutationType(),
            new ActionCloseAffiliateMutationType(),
            new AffiliateMutationType(),
            new ActionApproveAffiliateCommissionsMutationType(),
            
            new AffiliateEarningPlanMutationType(),
            new AffiliateMutationType(),
            new ActionAffiliateWorkFlowMutationType(),
            new AffiliateTransactionMutationType(),
            new ActionApproveAffiliateTransactionMutationType(),
            new ActionRejectAffiliateTransactionMutationType(),
            
            new TicketsMutationType(),
            new ActionAcknowledgeTicketMutationType(),
            new ActionAssignTicketMutationType(),
            new ActionCloseTicketMutationType(),
            
            new TicketCategoryMutationType(),
            
            new TeamsMutationType(),
            new IMPlatformMutationType(),
            new BannedWordsMutationType(),
            
            new GamePlatformOAuthCredentialMutationType(),
            
            new BrandMarketEmailNotificationSetupMutationType(),
            
            new PlayerNoteCategoryMutationType(),
            new PlayerNoteTypeMutationType(),
            new AffiliateTrackingLinkMutationType(),
            
            new FileManagedMutationType(),
            
            new PlayerNoteMutationType(),
            
            new PlayerDocumentMutationType(),
            new PlayerNotificationMutationType(),
            
            new AuditTrailViewedMutationType(),
            new ActionCreatePlayerProfileMutationType(),
            
            new TabularReportMutationType(),
            new CMSManagementMutationType(),
            new EmailTemplateMutationType(),
            new PaymentGatewayMutationType(),
            
            new EmailBlastMutationType(),
            new ActionSendEmailBlastMutationType(),
            new ActionReProcessEmailBlastStatusMutationType(),
            
            new RebateDetailMutationType(),
            
            new OnlineBankMutationType(),
            new OnlineBankTypeMutationType(),
            new OnlineBankSupportedCurrenciesTypeMutationType(),
            
            new ActionAffiliateCommissionMutationType(),

            new ActionCreatePlayerMessagesMutationType(),
            new ActionCreateAndSendPlayerMessagesMutationType(),
            new ActionUpdatePlayerMessagesMutationType(),
            new ActionUpdateAndSendPlayerMessagesMutationType(),
            
            new ActionCreatePlayerSeenMessagesHistoryMutationType
        ]);
    }
}