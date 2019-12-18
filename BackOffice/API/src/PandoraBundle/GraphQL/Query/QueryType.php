<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use PandoraBundle\GraphQL\Query\AgentSubAgentUser\AgentSubAgentUserField;
use PandoraBundle\GraphQL\Query\AgentSubAgentUser\AgentSubAgentUserListField;
use PandoraBundle\GraphQL\Query\Affiliate\AffiliateField;
use PandoraBundle\GraphQL\Query\Affiliate\AffiliateListField;
use PandoraBundle\GraphQL\Query\AffiliateCommision\AffiliateCommissionField;
use PandoraBundle\GraphQL\Query\AffiliateCommision\AffiliateCommissionListField;
use PandoraBundle\GraphQL\Query\AffiliateCommisionDetail\AffiliateCommissionDetailField;
use PandoraBundle\GraphQL\Query\AffiliateCommisionDetail\AffiliateCommissionDetailListField;
use PandoraBundle\GraphQL\Query\AffiliateEarningPlan\AffiliateEarningPlanField;
use PandoraBundle\GraphQL\Query\AffiliateEarningPlan\AffiliateEarningPlanListField;
use PandoraBundle\GraphQL\Query\AffiliateTransaction\AffiliateTransactionField;
use PandoraBundle\GraphQL\Query\AffiliateTransaction\AffiliateTransactionListField;
use PandoraBundle\GraphQL\Query\BandWord\BannedWordField;
use PandoraBundle\GraphQL\Query\BandWord\BannedWordListField;
use PandoraBundle\GraphQL\Query\Bank\BankField;
use PandoraBundle\GraphQL\Query\Bank\BankListField;
use PandoraBundle\GraphQL\Query\BankAccountPaymentMethod\BankAccountPaymentMethodField;
use PandoraBundle\GraphQL\Query\BankAccountPaymentMethod\BankAccountPaymentMethodListField;
use PandoraBundle\GraphQL\Query\Bonus\BonusField;
use PandoraBundle\GraphQL\Query\Bonus\BonusListField;
use PandoraBundle\GraphQL\Query\Brand\BrandField;
use PandoraBundle\GraphQL\Query\Brand\BrandListField;
use PandoraBundle\GraphQL\Query\CampaignDetail\CampaignDetailField;
use PandoraBundle\GraphQL\Query\CampaignDetail\CampaignDetailListField;
use PandoraBundle\GraphQL\Query\CampaignDetailLevel\CampaignDetailLevelField;
use PandoraBundle\GraphQL\Query\CampaignDetailLevel\CampaignDetailLevelListField;
use PandoraBundle\GraphQL\Query\Country\CountryField;
use PandoraBundle\GraphQL\Query\Country\CountryListField;
use PandoraBundle\GraphQL\Query\CountryPaymentMethod\CountryPaymentMethodField;
use PandoraBundle\GraphQL\Query\CountryPaymentMethod\CountryPaymentMethodListField;
use PandoraBundle\GraphQL\Query\Currency\CurrencyField;
use PandoraBundle\GraphQL\Query\Currency\CurrencyListField;
use PandoraBundle\GraphQL\Query\CustomerTicket\CustomerTicketField;
use PandoraBundle\GraphQL\Query\CustomerTicket\CustomerTicketListField;
use PandoraBundle\GraphQL\Query\GameBetLimitLevel\GameBetLimitLevelField;
use PandoraBundle\GraphQL\Query\GameBetLimitLevel\GameBetLimitLevelListField;
use PandoraBundle\GraphQL\Query\GameBetLimitSetting\GameBetLimitSettingField;
use PandoraBundle\GraphQL\Query\GameBetLimitSetting\GameBetLimitSettingListField;
use PandoraBundle\GraphQL\Query\GamePlatform\GamePlatformField;
use PandoraBundle\GraphQL\Query\GamePlatform\GamePlatformListField;
use PandoraBundle\GraphQL\Query\GamePlatformOAuthCredential\GamePlatformOAuthCredentialField;
use PandoraBundle\GraphQL\Query\GamePlatformOAuthCredential\GamePlatformOAuthCredentialListField;
use PandoraBundle\GraphQL\Query\GamePlatformProduct\GamePlatformProductField;
use PandoraBundle\GraphQL\Query\GamePlatformProduct\GamePlatformProductListField;
use PandoraBundle\GraphQL\Query\GamePlatformSupportedCurrency\GamePlatformSupportedCurrencyField;
use PandoraBundle\GraphQL\Query\GamePlatformSupportedCurrency\GamePlatformSupportedCurrencyListField;
use PandoraBundle\GraphQL\Query\GamePlatformSupportedLanguage\GamePlatformSupportedLanguageField;
use PandoraBundle\GraphQL\Query\GamePlatformSupportedLanguage\GamePlatformSupportedLanguageListField;
use PandoraBundle\GraphQL\Query\Language\LanguageField;
use PandoraBundle\GraphQL\Query\Language\LanguageListField;
use PandoraBundle\GraphQL\Query\NotificationMessageLog\NotificationMessageLogField;
use PandoraBundle\GraphQL\Query\NotificationMessageLog\NotificationMessageLogListField;
use PandoraBundle\GraphQL\Query\PaymentGateway\PaymentGatewayField;
use PandoraBundle\GraphQL\Query\PaymentGateway\PaymentGatewayListField;
use PandoraBundle\GraphQL\Query\PaymentGatewayBank\PaymentGatewayBankField;
use PandoraBundle\GraphQL\Query\PaymentGatewayBank\PaymentGatewayBankListField;
use PandoraBundle\GraphQL\Query\PaymentMethod\PaymentMethodField;
use PandoraBundle\GraphQL\Query\PaymentMethod\PaymentMethodListField;
use PandoraBundle\GraphQL\Query\PlayerDocument\PlayerDocumentField;
use PandoraBundle\GraphQL\Query\PlayerDocument\PlayerDocumentListField;
use PandoraBundle\GraphQL\Query\PlayerFingerPrint\PlayerFingerPrintField;
use PandoraBundle\GraphQL\Query\PlayerFingerPrint\PlayerFingerPrintListField;
use PandoraBundle\GraphQL\Query\Playerfingerprinthit\PlayerfingerprinthitField;
use PandoraBundle\GraphQL\Query\Playerfingerprinthit\PlayerfingerprinthitListField;
use PandoraBundle\GraphQL\Query\PlayerProviderLocking\PlayerProviderLockingField;
use PandoraBundle\GraphQL\Query\PlayerProviderLocking\PlayerProviderLockingListField;
use PandoraBundle\GraphQL\Query\PlayerRebate\PlayerRebateField;
use PandoraBundle\GraphQL\Query\PlayerRebate\PlayerRebateListField;
use PandoraBundle\GraphQL\Query\PlayerRebateDetail\PlayerRebateDetailField;
use PandoraBundle\GraphQL\Query\PlayerRebateDetail\PlayerRebateDetailListField;
use PandoraBundle\GraphQL\Query\Rebate\RebateField;
use PandoraBundle\GraphQL\Query\Rebate\RebateListField;
use PandoraBundle\GraphQL\Query\SubAgent\SubAgentField;
use PandoraBundle\GraphQL\Query\SubAgent\SubAgentListField;
use PandoraBundle\GraphQL\Query\UniqueDepositAmount\UniqueDepositAmountField;
use PandoraBundle\GraphQL\Query\UniqueDepositAmount\UniqueDepositAmountListField;
use PandoraBundle\GraphQL\Query\UniqueDepositAmountRule\UniqueDepositAmountRuleField;
use PandoraBundle\GraphQL\Query\UniqueDepositAmountRule\UniqueDepositAmountRuleListField;
use PandoraBundle\GraphQL\Query\WageringFulfilment\WageringFulfilmentField;
use PandoraBundle\GraphQL\Query\WageringFulfilment\WageringFulfilmentListField;
use PandoraBundle\GraphQL\Query\Wallet\WalletField;
use PandoraBundle\GraphQL\Query\Wallet\WalletListField;
use PandoraBundle\GraphQL\Query\WalletAdjustmentMemo\WalletAdjustmentMemoField;
use PandoraBundle\GraphQL\Query\WalletAdjustmentMemo\WalletAdjustmentMemoListField;
use PandoraBundle\GraphQL\Query\WalletDeposit\WalletDepositField;
use PandoraBundle\GraphQL\Query\WalletDeposit\WalletDepositListField;
use PandoraBundle\GraphQL\Query\WalletFundTransfer\WalletFundTransferField;
use PandoraBundle\GraphQL\Query\WalletFundTransfer\WalletFundTransferListField;
use PandoraBundle\GraphQL\Query\WalletLoss\WalletLossChartField;
use PandoraBundle\GraphQL\Query\WalletLoss\WalletLossField;
use PandoraBundle\GraphQL\Query\WalletLoss\WalletLossListField;
use PandoraBundle\GraphQL\Query\WalletWin\WalletWinField;
use PandoraBundle\GraphQL\Query\WalletWin\WalletWinListField;
use PandoraBundle\GraphQL\Query\WalletWithdrawal\WalletWithdrawalChartField;
use PandoraBundle\GraphQL\Query\WalletWithdrawal\WalletWithdrawalField;
use PandoraBundle\GraphQL\Query\WalletWithdrawal\WalletWithdrawalListField;
use PandoraBundle\GraphQL\Query\Agent\AgentListField;
use PandoraBundle\GraphQL\Query\PaymentRiskLevel\PaymentRiskLevelField;
use PandoraBundle\GraphQL\Query\PaymentRiskLevel\PaymentRiskLevelListField;
use PandoraBundle\GraphQL\Query\PlayerProfile\PlayerProfileChartField;
use PandoraBundle\GraphQL\Query\PlayerProfile\PlayerProfileListField;
use PandoraBundle\GraphQL\Query\PlayerAccessLog\PlayerAccessLogField;
use PandoraBundle\GraphQL\Query\PlayerAccessLog\PlayerAccessLogListField;
use PandoraBundle\GraphQL\Query\PlayerProfile\PlayerProfileField;
use PandoraBundle\GraphQL\Query\PlayerRegistration\PlayerRegistrationField;
use PandoraBundle\GraphQL\Query\PlayerRegistration\PlayerRegistrationListField;
use PandoraBundle\GraphQL\Query\VIPLevel\VIPLevelField;
use PandoraBundle\GraphQL\Query\VIPLevel\VIPLevelListField;
use PandoraBundle\GraphQL\Query\EnumRepository\EnumRepositoryField;
use PandoraBundle\GraphQL\Query\FraudRiskLevel\FraudRiskLevelField;
use PandoraBundle\GraphQL\Query\FraudRiskLevel\FraudRiskLevelListField;
use PandoraBundle\GraphQL\Query\Agent\AgentField;
use PandoraBundle\GraphQL\Query\BankAccount\BankAccountField;
use PandoraBundle\GraphQL\Query\BankAccount\BankAccountListField;
use PandoraBundle\GraphQL\Query\PlayerBankAccount\PlayerBankAccountField;
use PandoraBundle\GraphQL\Query\PlayerBankAccount\PlayerBankAccountListField;
use PandoraBundle\GraphQL\Query\PlayerBet\PlayerBetField;
use PandoraBundle\GraphQL\Query\PlayerBet\PlayerBetListField;
use PandoraBundle\GraphQL\Query\Product\ProductField;
use PandoraBundle\GraphQL\Query\Product\ProductListField;
use PandoraBundle\GraphQL\Query\WalletLedger\WalletLedgerField;
use PandoraBundle\GraphQL\Query\WalletLedger\WalletLedgerListField;
use PandoraBundle\GraphQL\Query\WithdrawalLevel\WithdrawalLevelField;
use PandoraBundle\GraphQL\Query\WithdrawalLevel\WithdrawalLevelListField;
use PandoraBundle\GraphQL\Query\StateProvince\StateProvinceField;
use PandoraBundle\GraphQL\Query\StateProvince\StateProvinceListField;
use PandoraBundle\GraphQL\Query\User\UserField;
use PandoraBundle\GraphQL\Query\User\UserListField;
use PandoraBundle\GraphQL\Query\User\UserRoleListField;
use PandoraBundle\GraphQL\Query\UserAccess\UserAccessListField;
use PandoraBundle\GraphQL\Query\UserAccess\UserAccessModuleListField;
use PandoraBundle\GraphQL\Query\SecurityQuestion\SecurityQuestionField;
use PandoraBundle\GraphQL\Query\SecurityQuestion\SecurityQuestionListField;
use PandoraBundle\GraphQL\Query\SingleSignOn\SingleSignOnField;
use PandoraBundle\GraphQL\Query\Notification\NotificationField;
use PandoraBundle\GraphQL\Query\Notification\NotificationListField;
use PandoraBundle\GraphQL\Query\BrandMarket\BrandMarketField;
use PandoraBundle\GraphQL\Query\BrandMarket\BrandMarketListField;
use PandoraBundle\GraphQL\Query\BrandMarketEmailNotificationSetup\BrandMarketEmailNotificationSetupField;
use PandoraBundle\GraphQL\Query\BrandMarketEmailNotificationSetup\BrandMarketEmailNotificationSetupListField;
use PandoraBundle\GraphQL\Query\Dashboard\DashboardDepositField;
use PandoraBundle\GraphQL\Query\User\UserPersonalInfoField;
use PandoraBundle\GraphQL\Query\Comment\CommentField;
use PandoraBundle\GraphQL\Query\Comment\CommentListField;
use PandoraBundle\GraphQL\Query\Dashboard\DashboardPlayerProfileField;
use PandoraBundle\GraphQL\Query\SystemInfo\SystemInfoField;
use PandoraBundle\GraphQL\Query\Tickets\TicketsField;
use PandoraBundle\GraphQL\Query\Tickets\TicketsListField;
use PandoraBundle\GraphQL\Query\TicketCategory\TicketCategoryField;
use PandoraBundle\GraphQL\Query\TicketCategory\TicketCategoryListField;
use PandoraBundle\GraphQL\Query\Teams\TeamsListField;
use PandoraBundle\GraphQL\Query\Teams\TeamsField;
use PandoraBundle\GraphQL\Query\IMPlatform\IMPlatformListField;
use PandoraBundle\GraphQL\Query\IMPlatform\IMPlatformField;
use PandoraBundle\GraphQL\Query\TransactionGrab\TransactionGrabField;
use PandoraBundle\GraphQL\Query\TransactionGrab\TransactionGrabListField;
use PandoraBundle\GraphQL\Query\PlayerNoteCategory\PlayerNoteCategoryField;
use PandoraBundle\GraphQL\Query\PlayerNoteCategory\PlayerNoteCategoryListField;
use PandoraBundle\GraphQL\Query\PlayerNoteType\PlayerNoteTypeField;
use PandoraBundle\GraphQL\Query\PlayerNoteType\PlayerNoteTypeListField;
use PandoraBundle\GraphQL\Query\AffiliateTrackingLink\AffiliateTrackingLinkField;
use PandoraBundle\GraphQL\Query\AffiliateTrackingLink\AffiliateTrackingLinkListField;
use PandoraBundle\GraphQL\Query\PlayerNote\PlayerNoteField;
use PandoraBundle\GraphQL\Query\PlayerNote\PlayerNoteListField;
use PandoraBundle\GraphQL\Query\FileManaged\FileManagedField;
use PandoraBundle\GraphQL\Query\FileManaged\FileManagedListField;
use PandoraBundle\GraphQL\Query\PlayerNotification\PlayerNotificationField;
use PandoraBundle\GraphQL\Query\PlayerNotification\PlayerNotificationListField;
use PandoraBundle\GraphQL\Query\WalletDeposit\WalletDepositChartField;
use PandoraBundle\GraphQL\Query\AuditTrail\AuditTrailField;
use PandoraBundle\GraphQL\Query\AuditTrail\AuditTrailListField;
use PandoraBundle\GraphQL\Query\WalletWin\WalletWinChartField;
use PandoraBundle\GraphQL\Query\SystemMetaData\SystemMetaDataListField;
use PandoraBundle\GraphQL\Query\TabularReport\TabularReportField;
use PandoraBundle\GraphQL\Query\TabularReport\TabularReportListField;
use PandoraBundle\GraphQL\Query\TabularReportGenerator\TabularReportGeneratorField;
use PandoraBundle\GraphQL\Query\EmailTemplate\EmailTemplateField;
use PandoraBundle\GraphQL\Query\EmailTemplate\EmailTemplateListField;
use PandoraBundle\GraphQL\Query\EmailBlast\EmailBlastField;
use PandoraBundle\GraphQL\Query\EmailBlast\EmailBlastListField;
use PandoraBundle\GraphQL\Query\EmailBlastMonitoring\EmailBlastMonitoringField;
use PandoraBundle\GraphQL\Query\EmailBlastMonitoring\EmailBlastMonitoringListField;
use PandoraBundle\GraphQL\Query\RebateDetail\RebateDetailField;
use PandoraBundle\GraphQL\Query\RebateDetail\RebateDetailListField;
use PandoraBundle\GraphQL\Query\OnlineBank\OnlineBankField;
use PandoraBundle\GraphQL\Query\OnlineBank\OnlineBankListField;
use PandoraBundle\GraphQL\Query\OnlineBankSupportedCurrencies\OnlineBankSupportedCurrenciesField;
use PandoraBundle\GraphQL\Query\OnlineBankSupportedCurrencies\OnlineBankSupportedCurrenciesListField;
use PandoraBundle\GraphQL\Query\OnlineBankType\OnlineBankTypeField;
use PandoraBundle\GraphQL\Query\OnlineBankType\OnlineBankTypeListField;
use PandoraBundle\GraphQL\Query\Messages\MessagesField;
use PandoraBundle\GraphQL\Query\Messages\MessagesListField;
use PandoraBundle\GraphQL\Query\PlayerMessages\PlayerMessagesField;
use PandoraBundle\GraphQL\Query\PlayerMessages\PlayerMessagesListField;
use PandoraBundle\GraphQL\Query\PlayerMessageSeenHistory\PlayerMessageSeenHistoryField;
use PandoraBundle\GraphQL\Query\PlayerMessageSeenHistory\PlayerMessageSeenHistoryListField;
class QueryType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addFields([
            new PlayerProfileField(),
            new PlayerProfileListField(),
            
            new PlayerRegistrationField(),
            new PlayerRegistrationListField(),
            
            new AgentField(),
            new AgentListField(),
            
            new VIPLevelField(),
            new VIPLevelListField(),
            
            new PaymentRiskLevelField(),
            new PaymentRiskLevelListField(),
            
            new FraudRiskLevelField(),
            new FraudRiskLevelListField(),
            
            new BankAccountField(),
            new BankAccountListField(),
            
            new PlayerBankAccountField(),
            new PlayerBankAccountListField(),

            new PlayerAccessLogField(),
            new PlayerAccessLogListField(),

            new PlayerBetField(),
            new PlayerBetListField(),

            new PlayerRebateField(),
            new PlayerRebateListField(),

            new PlayerRebateDetailField(),
            new PlayerRebateDetailListField(),

            new WalletLedgerField(),
            new WalletLedgerListField(),

            new WalletAdjustmentMemoField(),
            new WalletAdjustmentMemoListField(),

            new WalletDepositField(),
            new WalletDepositListField(),

            new WalletWithdrawalField(),
            new WalletWithdrawalListField(),
            new WalletWithdrawalChartField(),
            
            new WalletLossField(),
            new WalletLossListField(),
            new WalletLossChartField(),

            new WalletWinField(),
            new WalletWinListField(),
            new WalletWinChartField(),

            new AffiliateCommissionField(),
            new AffiliateCommissionListField(),

            new AffiliateCommissionDetailField(),
            new AffiliateCommissionDetailListField(),
            
            new AffiliateEarningPlanField(),
            new AffiliateEarningPlanListField(),

            new AffiliateField(),
            new AffiliateListField(),

            new AffiliateTransactionField(),
            new AffiliateTransactionListField(),

            new UserField(),
            new UserPersonalInfoField(),
            new UserListField(),

            new GameBetLimitLevelField(),
            new GameBetLimitLevelListField(),

            new GameBetLimitSettingField(),
            new GameBetLimitSettingListField(),

            new GamePlatformProductField(),
            new GamePlatformProductListField(),

            new GamePlatformField(),
            new GamePlatformListField(),

            new GamePlatformOAuthCredentialField(),
            new GamePlatformOAuthCredentialListField(),

            new GamePlatformSupportedCurrencyField(),
            new GamePlatformSupportedCurrencyListField(),

            new GamePlatformSupportedLanguageField(),
            new GamePlatformSupportedLanguageListField(),

            new BannedWordField(),
            new BannedWordListField(),

            new BankAccountPaymentMethodField(),
            new BankAccountPaymentMethodListField(),

            new BankField(),
            new BankListField(),

            new BonusField(),
            new BonusListField(),

            new BrandField(),
            new BrandListField(),

            new CountryField(),
            new CountryListField(),

            new CountryPaymentMethodField(),
            new CountryPaymentMethodListField(),

            new CurrencyField(),
            new CurrencyListField(),

            new CustomerTicketField(),
            new CustomerTicketListField(),

            new AgentSubAgentUserField(),
            new AgentSubAgentUserListField(),

            new CampaignDetailLevelField(),
            new CampaignDetailLevelListField(),

            new CampaignDetailField(),
            new CampaignDetailListField(),
            
            new CommentField(),
            new CommentListField(),
            
            new UserRoleListField(),
            
            new UserAccessListField(),
            
            new UserAccessModuleListField(),
            new LanguageField(),
            new LanguageListField(),

            new StateProvinceField(),
            new StateProvinceListField(),

            new ProductField(),
            new ProductListField(),

            new RebateField(),
            new RebateListField(),
            
            new SecurityQuestionField(),
            new SecurityQuestionListField(),
            
            new NotificationField(),
            new NotificationListField(),
            
            new BrandMarketField(),
            new BrandMarketListField(),

            new WalletFundTransferField(),
            new WalletFundTransferListField(),
            
            new WithdrawalLevelField(),
            new WithdrawalLevelListField(),

            new EnumRepositoryField(),

            new PaymentMethodField(),
            new PaymentMethodListField(),

            new UniqueDepositAmountRuleField(),
            new UniqueDepositAmountRuleListField(),

            new PlayerProviderLockingField(),
            new PlayerProviderLockingListField(),

            new PaymentGatewayBankField(),
            new PaymentGatewayBankListField(),

            new UniqueDepositAmountField(),
            new UniqueDepositAmountListField(),

            new WalletField(),
            new WalletListField(),

            new SubAgentField(),
            new SubAgentListField(),

            new NotificationMessageLogField(),
            new NotificationMessageLogListField(),

            new WageringFulfilmentField(),
            new WageringFulfilmentListField(),
            
            new DashboardDepositField(),
            new DashboardPlayerProfileField(),

            new PlayerFingerPrintField(),
            new PlayerFingerPrintListField(),

            new PlayerfingerprinthitField(),
            new PlayerfingerprinthitListField(),
            
            new TicketsField(),
            new TicketsListField(),
            
            new TicketCategoryField(),
            new TicketCategoryListField(),
            
            new TransactionGrabField(),
            new TransactionGrabListField(),
            
            new TeamsField(),
            new TeamsListField(),
            
            new IMPlatformField(),
            new IMPlatformListField(),
            
            new BrandMarketEmailNotificationSetupField(),
            new BrandMarketEmailNotificationSetupListField(),
            
            new SystemInfoField(),
            
            new PlayerNoteCategoryField(),
            new PlayerNoteCategoryListField(),
            
            new PlayerNoteTypeField(),
            new PlayerNoteTypeListField(),
            
            new AffiliateTrackingLinkField(),
            new AffiliateTrackingLinkListField(),
            
            new PlayerNoteField(),
            new PlayerNoteListField(),
            
            new FileManagedField(),
            new FileManagedListField(),
            
            new PlayerDocumentField(),
            new PlayerDocumentListField(),
            
            new PlayerNotificationField(),
            new PlayerNotificationListField(),
            
            new PlayerProfileChartField(),
            new WalletDepositChartField(),
            
            new AuditTrailField(),
            new AuditTrailListField(),
            
            new TabularReportField(),
            new TabularReportListField(),
            new TabularReportGeneratorField(),
            
            new SystemMetaDataListField(),
            
            new EmailTemplateField(),
            new EmailTemplateListField(),
            
            new PaymentGatewayField(),
            new PaymentGatewayListField(),
            
            new EmailBlastField(),
            new EmailBlastListField(),
            
            new EmailBlastMonitoringField(),
            new EmailBlastMonitoringListField(),
            
            new RebateDetailField(),
            new RebateDetailListField(),
            
            new OnlineBankField(),
            new OnlineBankListField(),
            
            new OnlineBankTypeField(),
            new OnlineBankTypeListField(),
            
            new OnlineBankSupportedCurrenciesField(),
            new OnlineBankSupportedCurrenciesListField(),

            new SingleSignOnField(),

            new MessagesField(),
            new MessagesListField(),

            new PlayerMessagesField(),
            new PlayerMessagesListField(),

            new PlayerMessageSeenHistoryField(),
            new PlayerMessageSeenHistoryListField(),
        ]);
    }
}