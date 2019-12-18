export default {
	items: [
		{
			name: 'Reports',
			url: '/reports/dashboards',
			method: '',
			icon: 'icon-graph',
			children: [
				{
					name: 'Dashboard',
					url: '/reports/dashboards',
					method: 'menuDashboard',
				},
				{
					name: 'AdHoc Reports',
					url: '/reports/tabular/list',
					method: 'menuAdHocTabular',
				}
			]
		},
		{
			name: 'Pogo Portal',
			url: '/pogo-portal',
			method: 'menuPogoPortal',
			icon: 'icon-folder',
		},
		{
			name: 'Player Manager',
			url: '/player_manager/profile/list',
			method: 'menuPlayerManager',
			icon: 'icon-people',
			children: [
				{
					name: 'Player Profiles',
					url: '/player_manager/profile/list',
					method: 'menuPlayerProfile',
				},
				{
					name: 'Player Bank Accounts',
					url: '/player_manager/bank_account/list',
					method: 'menuPlayerBankAccount',
				},
				{
					name: 'Player Bets',
					url: '/player_manager/bet/list',
					method: 'menuPlayerBet',
				},
				{
					name: 'Player Losses',
					url: '/player_manager/wallet_loss/list',
					method: 'menuPlayerWalletLoss',
				},
				{
					name: 'Player Wins',
					url: '/player_manager/wallet_win/list',
					method: 'menuPlayerWalletWin',
				},
				{
					name: 'Messages Monitoring',
					url: '/player_manager/messages_monitoring/list',
					method: 'menuMessageMonitoring',
				},
				{
					name: 'Access Logs',
					url: '/player_manager/access_log/list',
					method: 'menuAccessLog',
				},
				{
					name: 'Fingerprint',
					url: '/player_manager/player_fingerprint/list',
					method: 'menuFingerprint',
				},
				// {
				// 	name: 'Wagering Fulfillments',
				// 	url: '/player_manager/wagering_fulfillment/list',
				// 	method: 'menuWageringFulfillment',
				// },
				{
					name: 'Wallets',
					url: '/player_manager/wallet/list',
					method: 'menuWallet',
				},
				{
					name: 'Wallet Ledgers',
					url: '/player_manager/wallet_ledger/list',
					method: 'menuWalletLedger',
				},
				{
					name: 'Player Message',
					url: '/player_manager/player_messages/list',
					method: 'menuPlayerMessage',
				},
				{
					name: 'Messages',
					url: '/player_manager/messages/list',
					method: 'menuMessages',
				},
				
			]
		},
		{
			name: 'Payment Manager',
			url: '/payment_manager/deposit/list',
			method: 'menuPaymentManager',
			icon: 'icon-wallet',
			children: [
				{
					name: 'Deposit',
					url: '/payment_manager/deposit/list',
					method: 'menuDeposit',
					children: [
						{
							name: 'All Deposits',
							url: '/payment_manager/deposit/list',
							method: 'menuDeposit'
						},
						{
							name: 'My Grabbed Deposits',
							url: '/payment_manager/deposit/list/grabbed',
							method: 'menuDeposit'
						}
					]
				},
				{
					name: 'Withdrawal',
					url: '/payment_manager/withdrawal/list',
					method: 'menuWithdrawal',
					children: [
						{
							name: 'All Withdrawal',
							url: '/payment_manager/withdrawal/list',
							method: 'menuWithdrawal'
						},
						{
							name: 'My Grabbed Withdrawal',
							url: '/payment_manager/withdrawal/list/grabbed',
							method: 'menuWithdrawal'
						}
					]
				},
				{
					name: 'Credit Memo',
					url: '/payment_manager/credit_memo/list',
					method: 'menuCreditMemo',
				},
				{
					name: 'Debit Memo',
					url: '/payment_manager/debit_memo/list',
					method: 'menuDebitMemo',
				},
				// {
				// 	name: 'Fund Transfer',
				// 	url: '/payment_manager/fund_transfer/list',
				// 	method: 'menuFundTransfers',
				// },
			]
		},
		{
			name: 'Bonus Manager',
			url: '/bonus/bonuses/list',
			method: 'menuBonusManager',
			icon: 'icon-present',
			children: [
				{
					name: 'Bonuses',
					url: '/bonus/bonuses/list',
					method: 'menuBonuses',
				},
				{
					name: 'Player Rebates',
					url: '/bonus/player_rebate/list',
					method: 'menuPlayerRebates',
				},
			]
		},
		{
			name: 'Affiliate Manager',
			url: '/affiliate_manager/affiliate/list',
			method: 'menuAffiliateManager',
			icon: 'icon-share',
			children: [
				{
					name: 'Affiliates',
					url: '/affiliate_manager/affiliate/list',
					method: 'menuAffiliate',
				},
				{
					name: 'Transactions',
					url: '/affiliate_manager/affiliate_transaction/list',
					method: 'menuAffiliateTransaction',
					children: [
						{
							name: 'All Transactions',
							url: '/affiliate_manager/affiliate_transaction/list',
							method: 'menuAffiliateTransaction'
						},
						{
							name: 'My Transactions',
							url: '/affiliate_manager/affiliate_transaction/list/grabbed',
							method: 'menuAffiliateTransaction'
						}
					]
				},
				{
					name: 'Commissions',
					url: '/affiliate_manager/affiliate_commission/list',
					method: 'menuAffiliateCommision',
					children: [
						{
							name: 'All Commissions',
							url: '/affiliate_manager/affiliate_commission/list',
							method: 'menuAffiliateCommision'
						},
						{
							name: 'My Commissions',
							url: '/affiliate_manager/affiliate_commission/list/grabbed',
							method: 'menuAffiliateCommision'
						}
					]
				},
				
			]
		},
		{			
			name: 'Ticket Manager',
			url: '/ticket_manager/ticket/list',
			method: 'menuTicketManager',
			icon: 'icon-earphones-alt',
			children: [
				{
					name: 'Tickets',
					url: '/ticket_manager/ticket/list',
					method: 'menuTicketManager',
					children: [
						{
							name: 'All Tickets',
							url: '/ticket_manager/ticket/list',
							method: 'menuTicketManager'
						},
						{
							name: 'My Grabbed Tickets',
							url: '/ticket_manager/ticket/list/grabbed',
							method: 'menuTicketManager'
						}
					]
				},
			]
		},
		{
			name: 'Marketing',
			url: '/marketing/email_blast/list',
			method: '',
			icon: 'icon-paper-plane',
			children: [
				{
					name: 'Email Blast',
					url: '/marketing/email_blast/list',
					method: 'menuEmailBlast',
				},
				{
					name: 'Email Blast Monitoring',
					url: '/marketing/email_blast_monitoring/list',
					method: 'menuEmailBlastMonitoring',
				}
			]
		},
		{
			name: 'Admin',
			url: '/admin/user/list',
			method: 'menuAdminManager',
			icon: 'icon-organization',
			children: [
				{
					name: 'Users',
					url: '/admin/user/list',
					method: 'menuUsers',
				},
				{
					name: 'Access Rights',
					url: '/admin/access_rights',
					method: 'menuAccessRights',
				}
			]
		},
		{
			name: 'Setup',
			url: '/setup/setup/list',
			method: 'menuSetupManager',
			icon: 'icon-settings',
			children: [
				{
					name: 'Player Manager Setup',
					url: '/setup/brand/list',
					method: 'menuPlayerManagerSetup',
					children: [
						{
							name: 'Brands',
							url: '/setup/brand/list',
							method: 'menuBrands',
						},
						{
							name: 'Countries',
							url: '/setup/country/list',
							method: 'menuCountries',
						},
						{
							name: 'Currencies',
							url: '/setup/currency/list',
							method: 'menuCurrencies',
						},
						{
							name: 'Languages',
							url: '/setup/language/list',
							method: 'menuLanguage',
						},
						{
							name: 'States/Provinces',
							url: '/setup/states/list',
							method: 'menuStateProvince',
						},
						{
							name: 'Game Platforms',
							url: '/setup/platform/list',
							method: 'menuProducts',
						},
						{
							name: 'Games',
							url: '/setup/game/list',
							method: 'menuGames',
						},
						{
							name: 'Supported Currencies',
							url: '/setup/supportedcurrency/list',
							method: 'menuSupportedCurrencies',
						},
						{
							name: 'VIP Levels',
							url: '/setup/viplevel/list',
							method: 'menuVIPLevels',
						},
						{
							name: 'Security Questions',
							url: '/setup/question/list',
							method: 'menuSecurityQuestions',
						},
						{
							name: 'Notifications',
							url: '/setup/notification/list',
							method: 'menuNotifications',
						},
						{
							name: 'Email Notifications',
							url: '/setup/email_notification/list',
							method: 'menuEmailNotifications',
						},
						{
							name: 'Bet Limit Levels',
							url: '/setup/betlimitlevel/list',
							method: 'gameBetLimitLevelList',
						},
						{
							name: 'Bet Limit Settings',
							url: '/setup/betlimitsetting/list',
							method: 'gameBetLimitSettingList',
						},
						{
							name: 'Market Brands',
							url: '/setup/market/list',
							method: 'menuMarketBrands',
						},
						{
							name: 'Product OAuth Credentials',
							url: '/setup/credential/list',
							method: 'menuCredential',
						},
						{
							name: 'Player Note Categories',
							url: '/setup/playernotecategory/list',
							method: 'menuPlayerNoteCategory',
						},
						{
							name: 'Player Note Types',
							url: '/setup/playernotetypesetup/list',
							method: 'menuPlayerNoteTypeSetup',
						}
					]
				},
				{
					name: 'Payment Manager Setup',
					url: '/setup/bank/list',
					method: 'menuPaymentManagerSetup',
					children: [
						{
							name: 'Payment Risk Levels',
							url: '/setup/payment_risk_level/list',
							method: 'menuPaymentRiskLevel',
						},
						{
							name: 'Withdrawal Levels',
							url: '/setup/withdrawal_level/list',
							method: 'menuWithdrawalLevels',
						},
						{
							name: 'Fraud Risk Levels',
							url: '/setup/fraud_risk_level/list',
							method: 'menuFraudRiskLevels',
						},
						{
							name: 'Unique Deposit Amount Rules',
							url: '/setup/unique_deposit_amount_rule/list',
							method: 'menuUniqueDepositAmounts',
						},
						{
							name: 'Payment Methods',
							url: '/setup/payment_method/list',
							method: 'menuPaymentMethod',
						},
						{
							name: 'Payment Gateways',
							url: '/setup/payment_gateway/list',
							method: 'menuPaymentGateway',
						},
						{
							name: 'Banks',
							url: '/setup/bank/list',
							method: 'menuBank',
						},
						{
							name: 'Bank Accounts',
							url: '/setup/bank_accounts/list',
							method: 'menuBankAccounts',
						},
						{
							name: 'Online Bank Types',
							url: '/setup/online_bank_type/list',
							method: 'menuOnlineBankTypes',
						},
						{
							name: 'Online Banks',
							url: '/setup/online_bank/list',
							method: 'menuOnlineBanks',
						},
						{
							name: 'Online Bank Supported Currencies',
							url: '/setup/online_bank_currency/list',
							method: 'menuOnlineBankSupportedCurrency',
						},
					]
				},{
					name: 'Bonus Manager Setup',
					url: '/setup/rebates/list',
					method: 'menuBonusManagerSetup',
					children: [
						{
							name: 'Rebates',
							url: '/setup/rebates/list',
							method: 'menuRebates',
						},
						{
							name: 'Rebate Details',
							url: '/setup/rebate_detail/list',
							method: 'menuRebateDetail',
						},
					]
				},
				{
					name: 'Affiliate Manager Setup',
					url: '/setup/earningplan/list',
					method: 'menuAffiliateManagerSetup',
					children: [
						{
							name: 'Earning Plans',
							url: '/setup/earningplan/list',
							method: 'menuAffiliateEarningPlan',
						},
						{
							name: 'Rewards',
							url: '/setup/rewards/list',
							method: 'menuAffiliateRewards',
						},
						{
							name: 'IM Platforms',
							url: '/setup/implatform/list',
							method: 'menuIMPlatform',
						},
						{
							name: 'Banned Words',
							url: '/setup/bannedword/list',
							method: 'menuBannedWord',
						}
					]
				},
				{
					name: 'Ticket Manager Setup',
					url: '/setup/team/list',
					method: 'menuTicketManagerSetup',
					children: [
						{
							name: 'Teams',
							url: '/setup/team/list',
							method: 'menuTeams',
						},
						{
							name: 'Ticket Categories',
							url: '/setup/ticket_category/list',
							method: 'menuTicketCategories',
						}
					]
				},
				{
					name: 'Email Template Setup',
					url: '/setup/email_template/list',
					method: 'menuEmailService',
				}
			]
		},
	]
}
