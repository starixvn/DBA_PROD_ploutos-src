// SEE: ReadMe.md for documentation

import { AbstractFields } from './fields/AbstractField'
import * as Admin from './fields/Admin'
import * as Player from './fields/Player'
import * as Payment from './fields/Payment'
import * as Bonuses from './fields/Bonus'
import * as Affiliates from './fields/Affiliate'
import * as Tickets from './fields/Ticket'
import * as Setup from './fields/Setup'
import * as Tabular from './fields/TabularReport'
import * as Marketing from './fields/Marketing'

// SEPARATED DATABASE
export const AdminUsers         			= Admin.Users
export const TabularReport     				= Tabular.TabularReport

// Player Manager
export const PlayerProfile      			= Player.Profile.concat(AbstractFields)
export const PlayerBank         			= Player.Bank.concat(AbstractFields)
export const PlayerBet          			= Player.Bet.concat(AbstractFields)
export const PlayerWin          			= Player.Win.concat(AbstractFields)
export const PlayerLoss         			= Player.Loss.concat(AbstractFields)
export const PlayerMessage      			= Player.PlayerMessage.concat(AbstractFields)
export const PlayerMessages      			= Player.PlayerMessages.concat(AbstractFields)
export const MessagesSeenHistory      		= Player.MessagesSeenHistory.concat(AbstractFields)
export const PlayerMessagesRecipient      	= Player.PlayerMessagesRecipient.concat(AbstractFields)
export const PlayerMessageMonitoring      	= Player.MessageMonitoring.concat(AbstractFields)
export const PlayerAccessLog    			= Player.AccessLog.concat(AbstractFields)
export const PlayerFingerprint  			= Player.Fingerprint.concat(AbstractFields)
export const PlayerWageringFulfillment		= Player.WageringFulfillment.concat(AbstractFields)
export const PlayerLedger       			= Player.Ledger.concat(AbstractFields)
export const PlayerWallet       			= Player.Wallet.concat(AbstractFields)
export const PlayerNote       				= Player.PlayerNote.concat(AbstractFields)
export const PlayerDocument       			= Player.PlayerDocument.concat(AbstractFields)
export const PlayerNotification       		= Player.PlayerNotification.concat(AbstractFields)

// Payment Manager
export const Deposit            			= Payment.Deposit.concat(AbstractFields)
export const Withdrawal         			= Payment.Withdrawal.concat(AbstractFields)
export const CreditMemo         			= Payment.CreditMemo.concat(AbstractFields)
export const DebitMemo          			= Payment.DebitMemo.concat(AbstractFields)
export const FundTransfer       			= Payment.FundTransfer.concat(AbstractFields)

// Setup
export const Brand              			= Setup.Brand.concat(AbstractFields)
export const Country            			= Setup.Country.concat(AbstractFields)
export const Currency           			= Setup.Currency.concat(AbstractFields)
export const Language           			= Setup.Language.concat(AbstractFields)
export const EarningPlan        			= Setup.EarningPlan.concat(AbstractFields)
export const Platform           			= Setup.Platform.concat(AbstractFields)
export const Games              			= Setup.Games.concat(AbstractFields)
export const MarketBrand        			= Setup.MarketBrand.concat(AbstractFields)
export const Notification       			= Setup.Notification.concat(AbstractFields)
export const SecurityQuestion   			= Setup.SecurityQuestion.concat(AbstractFields)
export const States             			= Setup.States.concat(AbstractFields)
export const SupportedCurrency  			= Setup.SupportedCurrency.concat(AbstractFields)
export const VipLevel           			= Setup.VipLevel.concat(AbstractFields)
export const BetLimitLevel      			= Setup.BetLimitLevel.concat(AbstractFields)
export const BetLimitSetting    			= Setup.BetLimitSetting.concat(AbstractFields)
export const Credential         			= Setup.Credential.concat(AbstractFields)
export const EmailNotification				= Setup.EmailNotification.concat(AbstractFields)
export const PlayerNoteCategory				= Setup.PlayerNoteCategory.concat(AbstractFields)
export const PlayerNoteTypeSetup			= Setup.PlayerNoteType.concat(AbstractFields)

export const TicketCategory     			= Setup.TicketCategory.concat(AbstractFields)
export const Team               			= Setup.Team.concat(AbstractFields)

export const Bank               			= Setup.Bank.concat(AbstractFields)
export const BankAccount        			= Setup.BankAccount.concat(AbstractFields)
export const PaymentMethod      			= Setup.PaymentMethod.concat(AbstractFields)
export const BankAccountPaymentMethod   	= Setup.BankAccountPaymentMethod
export const FraudRiskLevel     			= Setup.FraudRiskLevel.concat(AbstractFields)
export const PaymentRiskLevel   			= Setup.PaymentRiskLevel.concat(AbstractFields)
export const WithdrawalLevel    			= Setup.WithdrawalLevel.concat(AbstractFields)
export const PaymentGatewayBank 			= Setup.PaymentGatewayBank.concat(AbstractFields)
export const UniqueDepositAmountRule 		= Setup.UniqueDepositAmountRule.concat(AbstractFields)
// export const UniqueDepositAmount 			= Setup.UniqueDepositAmount.concat(AbstractFields)
export const PaymentGateway       			= Setup.PaymentGateway.concat(AbstractFields)
export const OnlineBank       				= Setup.OnlineBank.concat(AbstractFields)
export const OnlineBankType   				= Setup.OnlineBankType.concat(AbstractFields)
export const OnlineBankSupportedCurrency	= Setup.OnlineBankSupportedCurrency.concat(AbstractFields)

export const IMPlatform						= Setup.IMPlatform.concat(AbstractFields)
export const BannedWord						= Setup.BannedWord.concat(AbstractFields)

export const EmailService       			= Setup.EmailService.concat(AbstractFields)

// Bonus
export const Bonus              			= Bonuses.Bonus.concat(AbstractFields)
export const Rebate             			= Bonuses.Rebate.concat(AbstractFields)				// Todo: Move to Setup
export const PlayerRebate       			= Bonuses.PlayerRebate.concat(AbstractFields)
// export const CampaignLevel      			= Bonuses.CampaignLevel
export const RebateDetail             		= Bonuses.RebateDetail.concat(AbstractFields)		// Todo: Move to Setup

// Ticket
export const Ticket             			= Tickets.Ticket.concat(AbstractFields)

// Affiliate
export const Affiliate          			= Affiliates.Affiliate.concat(AbstractFields)
export const AffiliateTransaction       	= Affiliates.AffiliateTransaction.concat(AbstractFields)
export const Commission         			= Affiliates.Commission.concat(AbstractFields)
export const AffiliateCommissionDetail		= Affiliates.AffiliateCommissionDetail.concat(AbstractFields)
export const AffiliateTrackingLinks     	= Affiliates.AffiliateTrackingLinks.concat(AbstractFields)

// Marketing
export const EmailBlast						= Marketing.EmailBlast.concat(AbstractFields)
export const EmailBlastMonitoring			= Marketing.EmailBlastMonitoring.concat(AbstractFields)