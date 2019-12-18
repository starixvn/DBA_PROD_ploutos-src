/* eslint-disable react/no-deprecated */
import React, { Component, Fragment } from 'react'
import { Switch, Route, Redirect } from 'react-router-dom'
import Container from 'reactstrap/lib/Container'

import ApolloClient, { createNetworkInterface } from 'apollo-client'
import { ApolloProvider } from 'react-apollo'
import PropTypes from 'prop-types'
import Sound from 'react-sound'

import { LocalConfiguration } from '../../config/Configurations'
import { GetLocalData, RemoveLocalData, DocCookies } from '../../utils/CoreHelpers'
import ErrorBoundary from '../../utils/ErrorBoundary'
import Loadabler from '../../components/Loadabler'

const NotificationAlert = Loadabler({ loader: () => import('../../components/NotificationAlert') })
const FormAlert = Loadabler({ loader: () => import('../../components/FormAlert') })

// =========== STATIC - LAYOUT
// import Header from '../../components/Header/'
import Sidebar from '../../components/Sidebar/'
// import Breadcrumb from '../../components/Breadcrumb/'
// import Footer from '../../components/Footer/'

import SubMenuNav from '../../components/SubMenuNav'

// =========== PAGES
const Login = Loadabler({ loader: () => import('../../views/Pages/Login/') })
const Dashboard = Loadabler({ loader: () => import('../../views/Components/Report/Dashboard') })
const Tabular = Loadabler({ loader: () => import('../../views/Components/Report/Tabular/Tabular') })
// const TabularEdit = Loadabler({ loader: () => import('../../views/Components/Report/Tabular/TabularEdit') })

// PROFILE MANAGER - LIST
const PlayerProfile = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerProfile/PlayerProfile') })
const PlayerBank = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerBank/PlayerBank') })
const PlayerBet = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerBet/PlayerBet') })
const PlayerWin = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerWin/PlayerWin') })
const PlayerLoss = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerLoss/PlayerLoss') })
const PlayerMessageMonitoring = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerMessageMonitoring/PlayerMessageMonitoring') })
const PlayerAccessLog = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerAccessLog/PlayerAccessLog') })
const PlayerFingerprint = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerFingerprint/PlayerFingerprint') })
// const PlayerWageringFulfillment = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerWageringFulfillment/PlayerWageringFulfillment') })
const PlayerWallet = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerWallet/PlayerWallet') })
const PlayerLedger = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerLedger/PlayerLedger') })
const PlayerNote = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerNote/PlayerNote') })
const PlayerDocument = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerDocument/PlayerDocument') })
const PlayerNotification = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerNotification/PlayerNotification') })

const PlayerProfileEdit = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerProfile/PlayerProfileEdit') })
const PlayerProfileAdd = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerProfile/PlayerProfileAdd') })

const PlayerMessages = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerMessages/PlayerMessages') })
const PlayerMessagesAdd = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerMessages/PlayerMessagesAdd') })
// const PlayerMessagesEdit = Loadabler({ loader: () => import('../../views/Components/PlayerManager/PlayerMessages/PlayerMessagesEdit') })

const Messages = Loadabler({ loader: () => import('../../views/Components/PlayerManager/Messages/Messages') })
const MessagesAdd = Loadabler({ loader: () => import('../../views/Components/PlayerManager/Messages/MessagesAdd') })
const MessagesEdit = Loadabler({ loader: () => import('../../views/Components/PlayerManager/Messages/MessagesEdit') })

// PAYMENT MANAGER - LIST
const Deposit = Loadabler({ loader: () => import('../../views/Components/PaymentManager/Deposit/Deposit') })
const DepositForm = Loadabler({ loader: () => import('../../views/Components/PaymentManager/Deposit/DepositForm') })
const Withdrawal = Loadabler({ loader: () => import('../../views/Components/PaymentManager/Withdrawal/Withdrawal') })
const DebitMemo = Loadabler({ loader: () => import('../../views/Components/PaymentManager/WalletAdjustment/DebitMemo') })
const CreditMemo = Loadabler({ loader: () => import('../../views/Components/PaymentManager/WalletAdjustment/CreditMemo') })
const FundTransfer = Loadabler({ loader: () => import('../../views/Components/PaymentManager/FundTransfer/FundTransfer') })

// ADMIN
const Users = Loadabler({ loader: () => import('../../views/Components/Admin/User/User') })

// const UserCreate = Loadabler({ loader: () => import('../../views/Components/Admin/User/UserCreate') })
const UserEdit = Loadabler({ loader: () => import('../../views/Components/Admin/User/UserEdit') })
const UserPersonalInfoEdit = Loadabler({ loader: () => import('../../views/Components/Admin/User/UserPersonalInfoEdit') })

const RoleAccessRights = Loadabler({ loader: () => import('../../views/Components/Admin/AccessRights/RoleAccessRights') })

// SETUP
const Setup = Loadabler({ loader: () => import('../../views/Components/Setup/Setup/Setup') })
const Brand = Loadabler({ loader: () => import('../../views/Components/Setup/Brand/Brand') })
const Country = Loadabler({ loader: () => import('../../views/Components/Setup/Country/Country') })
const Currency = Loadabler({ loader: () => import('../../views/Components/Setup/Currency/Currency') })
const Language = Loadabler({ loader: () => import('../../views/Components/Setup/Language/Language') })
const States = Loadabler({ loader: () => import('../../views/Components/Setup/States/States') })
const Platform = Loadabler({ loader: () => import('../../views/Components/Setup/GamePlatform/Platform') })
const SupportedCurrency = Loadabler({ loader: () => import('../../views/Components/Setup/SupportedCurrency/SupportedCurrency') })
const Games = Loadabler({ loader: () => import('../../views/Components/Setup/Games/Games') })
const VipLevel = Loadabler({ loader: () => import('../../views/Components/Setup/VipLevel/VipLevel') })
const SecurityQuestion = Loadabler({ loader: () => import('../../views/Components/Setup/SecurityQuestion/SecurityQuestion') })
const Notification = Loadabler({ loader: () => import('../../views/Components/Setup/Notification/Notification') })
const BetLimitLevel = Loadabler({ loader: () => import('../../views/Components/Setup/BetLimitLevel/BetLimitLevel') })
const BetLimitSetting = Loadabler({ loader: () => import('../../views/Components/Setup/BetLimitSettings/BetLimitSetting') })
const MarketBrand = Loadabler({ loader: () => import('../../views/Components/Setup/MarketBrand/MarketBrand') })
const Credential = Loadabler({ loader: () => import('../../views/Components/Setup/Credential/Credential') })
const PlayerNoteCategory = Loadabler({ loader: () => import('../../views/Components/Setup/PlayerNoteCategory/PlayerNoteCategory') })
const PlayerNoteTypeSetup = Loadabler({ loader: () => import('../../views/Components/Setup/PlayerNoteTypeSetup/PlayerNoteTypeSetup') })

const Bank = Loadabler({ loader: () => import('../../views/Components/Setup/Bank/Bank') })
const BankAccount = Loadabler({ loader: () => import('../../views/Components/Setup/BankAccount/BankAccount') })
const PaymentMethod = Loadabler({ loader: () => import('../../views/Components/Setup/PaymentMethod/PaymentMethod') })
const PaymentRiskLevel = Loadabler({ loader: () => import('../../views/Components/Setup/PaymentRiskLevel/PaymentRiskLevel') })
const FraudRiskLevel = Loadabler({ loader: () => import('../../views/Components/Setup/FraudRiskLevel/FraudRiskLevel') })
const WithdrawalLevel = Loadabler({ loader: () => import('../../views/Components/Setup/WithdrawalLevel/WithdrawalLevel') })
const PaymentGatewayBank = Loadabler({ loader: () => import('../../views/Components/Setup/PaymentGatewayBank/PaymentGatewayBank') })
const UniqueDepositAmountRule = Loadabler({ loader: () => import('../../views/Components/Setup/UniqueDepositAmountRule/UniqueDepositAmountRule') })
const UniqueDepositAmount = Loadabler({ loader: () => import('../../views/Components/Setup/UniqueDepositAmount/UniqueDepositAmount') })
const PaymentGateway = Loadabler({ loader: () => import('../../views/Components/Setup/PaymentGateway/PaymentGateway') })
const OnlineBank = Loadabler({ loader: () => import('../../views/Components/Setup/OnlineBank/OnlineBank') })
const OnlineBankType = Loadabler({ loader: () => import('../../views/Components/Setup/OnlineBankType/OnlineBankType') })
const OnlineBankSupportedCurrency = Loadabler({ loader: () => import('../../views/Components/Setup/OnlineBankSupportedCurrency/OnlineBankSupportedCurrency') })

const Rebate = Loadabler({ loader: () => import('../../views/Components/Setup/Rebates/Rebate') })
const RebateDetail = Loadabler({ loader: () => import('../../views/Components/Setup/RebateDetail/RebateDetail') })

const EarningPlan = Loadabler({ loader: () => import('../../views/Components/Setup/EarningPlan/EarningPlan') })
const IMPlatform = Loadabler({ loader: () => import('../../views/Components/Setup/IMPlatform/IMPlatform') })
const BannedWord = Loadabler({ loader: () => import('../../views/Components/Setup/BannedWord/BannedWord') })
const EmailNotification = Loadabler({ loader: () => import('../../views/Components/Setup/EmailNotification/EmailNotification') })

const Team = Loadabler({ loader: () => import('../../views/Components/Setup/Teams/Team') })
const TicketCategory = Loadabler({ loader: () => import('../../views/Components/Setup/TicketCategory/TicketCategory') })

const EmailService = Loadabler({ loader: () => import('../../views/Components/Setup/EmailService/EmailService') })
const CmsManagement = Loadabler({ loader: () => import('../../views/Components/WebCMS/CmsManagement') })
const PogoPortal = Loadabler({ loader: () => import('../../views/Components/PogoPortal/PogoPortal') })

// BONUS
const Bonus = Loadabler({ loader: () => import('../../views/Components/Bonus/Bonuses/Bonus') })
const PlayerRebate = Loadabler({ loader: () => import('../../views/Components/Bonus/PlayerRebates/PlayerRebate') })

const BonusesEdit = Loadabler({ loader: () => import('../../views/Components/Bonus/Bonuses/BonusesEdit') })

// AFFILIATE
const Affiliate = Loadabler({ loader: () => import('../../views/Components/AffiliateManager/Affiliate/Affiliate') })
const AffiliateTransaction = Loadabler({ loader: () => import('../../views/Components/AffiliateManager/AffiliateTransaction/AffiliateTransaction') })
const Commission = Loadabler({ loader: () => import('../../views/Components/AffiliateManager/Commission/Commission') })
const AffiliateTrackingLinks = Loadabler({ loader: () => import('../../views/Components/AffiliateManager/AffiliateTrackingLinks/AffiliateTrackingLinks') })

const AffiliateEdit = Loadabler({ loader: () => import('../../views/Components/AffiliateManager/Affiliate/AffiliateEdit') })
const AffiliateTransactionEdit = Loadabler({ loader: () => import('../../views/Components/AffiliateManager/AffiliateTransaction/AffiliateTransactionEdit') })

// TICKET
const Ticket = Loadabler({ loader: () => import('../../views/Components/TicketManager/Tickets/Ticket') })

// MARKETING
const EmailBlast = Loadabler({ loader: () => import('../../views/Components/Marketing/EmailBlast/EmailBlast') })
const EmailBlastMonitoring = Loadabler({ loader: () => import('../../views/Components/Marketing/EmailBlastMonitoring/EmailBlastMonitoring') })

// 404
const NoMatch = Loadabler({ loader: () => import('../../views/Pages/Page404') })

const networkInterfaceSetup = new createNetworkInterface({
	uri: LocalConfiguration.ApiEndPoint() + '/graphql'
})

networkInterfaceSetup.use([{
	applyMiddleware(req, next) {
		let authToken = DocCookies.getItem('authToken')
		if (!req.options.headers) req.options.headers = {}
		if (authToken) req.options.headers.Authorization = `Bearer ${authToken}`
		next()
	}
}])
networkInterfaceSetup.useAfter([ {
	applyAfterware({ response }, next) {
		if (response.status === 401 && DocCookies.getItem('authToken')) {
			// RemoveLocalData('authToken')
			DocCookies.removeItem('authToken')
			RemoveLocalData('currUserInformations')
			alert('Your session has expired')
			window.location.href = '/#/'
		}
		next()
	}
} ])

const client = new ApolloClient({
	networkInterface: networkInterfaceSetup,
	shouldBatch: true,
})

class Full extends Component {

	static propTypes = {
		history: PropTypes.object,
		location: PropTypes.object
	}

	static childContextTypes = {
		userAccess: PropTypes.array,
		userInfo: PropTypes.object,
		currentPlayer: PropTypes.object,
		handleElementAccess: PropTypes.func,
		handleSetCurrentPlayer: PropTypes.func,
		onAlert: PropTypes.func,
		onGoBack: PropTypes.func,
		onRequestComponent: PropTypes.func
	}

	state = {
		isLogged: DocCookies.getItem('authToken'),
		alert: {
			isOpen: false,
			type: '',
			message: ''
		},
		currentUser: {
			access: [],
			userInfo: {}
		},
		currentPlayer: {
			id: '',
			name: ''
		},
		soundState: Sound.status.STOPPED,
		notificationList: []
	}

	handleLogInSuccess() {
		window.location.reload()
	}

	handleLogOutSuccess() {
		window.location.reload()
	}

	handleAlertNotif(data) {
		this.setState({
			alert: { ...this.state.alert, ...data }
		}, () => setTimeout(() => { this.handleHideAlertNotif() }, 5000))
	}

	handleHideAlertNotif() {
		this.setState({
			alert: {
				isOpen: false,
				type: '',
				message: ''
			}
		})
	}

	handleElementAccess(method) {
		if (method == '') return false
		if (this.state.currentUser.userInfo.userRole == 'ROLE_ADMIN') return true
		const accessList = this.state.currentUser.access
		if (accessList) {
			for (var itr = 0; itr < accessList.length; itr++) {
				if (accessList[itr].Method == method) return true
			}
		}
		return false
	}

	handleSoundStop() {
		this.setState({
			soundState: Sound.status.STOPPED,
			notificationList: []
		})
	}

	handleGoBack = () => this.props.history.goBack()

	handleSetCurrentPlayer(player) {
		this.setState({ 
			currentPlayer: {
				id: player.id,
				name: player.name
			}
		})
	}

	componentWillMount() {
		const currUserInfo = GetLocalData('currUserInformations')
		if (currUserInfo) {
			// let accessList = []
			let parsedJson = JSON.parse(currUserInfo)

			this.setState({
				currentUser: {
					...this.state.currentUser,
					access: parsedJson.accessInfo,
					userInfo: parsedJson.userInfo
				}
			})
		}
		window.handleReceivedNotification = function (playSound, notifData) {
			this.setState({
				soundState: (playSound) ? Sound.status.PLAYING : Sound.status.STOPPED,
				notificationList: [ notifData ]
			})
		}.bind(this)
	}

	componentDidMount() {
		// var currUserInfo = GetLocalData('currUserInformations')
		// if (currUserInfo) {
		// 	currUserInfo = JSON.parse(currUserInfo)
		// 	if (currUserInfo.wsPort) {
		// 		try {
		// 			var ab = require('../../components/Autobahn')
		// 		} catch (e) {
		// 			// throw error
		// 		}
				
		// 		var conn = new ab.Session(LocalConfiguration.ApiEndPoint().replace('http', 'ws')+':'+currUserInfo.wsPort,
		// 			function () {
		// 				if (this.handleElementAccess('walletDeposit')) {
		// 					conn.subscribe('new_deposits', function (topic, data) {
		// 						window.handleReceivedNotification(true, data)
		// 					})
		// 				}
		// 				if (this.handleElementAccess('walletWithdrawal')) {
		// 					conn.subscribe('new_withdrawals', function (topic, data) {
		// 						window.handleReceivedNotification(true, data)
		// 					})
		// 				}
		// 				if (this.handleElementAccess('playerProfile')) {
		// 					conn.subscribe('new_registrations', function (topic, data) {
		// 						window.handleReceivedNotification(true, data)
		// 					})
		// 				}
		// 			}.bind(this),
		// 			function () {
		// 				/* eslint-disable no-console */
		// 				console.warn('WebSocket connection has been closed!')
		// 			},
		// 			{ 'skipSubprotocolCheck': true }
		// 		)
		// 	}
		// }
	}

	getChildContext() {
		return {
			userAccess: this.state.currentUser.access,
			userInfo: this.state.currentUser.userInfo,
			currentPlayer: {
				id: this.state.currentPlayer.id,
				name: this.state.currentPlayer.name
			},
			handleElementAccess: this.handleElementAccess.bind(this),
			handleSetCurrentPlayer: this.handleSetCurrentPlayer.bind(this),
			onAlert: this.handleAlertNotif.bind(this),
			onGoBack: this.handleGoBack.bind(this)
		}
	}

	render() {
		// console.log(process.env.CMS);
		// console.log(process.env.NODE_ENVIRONMENT);
		const { isOpen, type, message } = this.state.alert
		const { pathname } = this.props.location
		
		if (!this.state.isLogged || !DocCookies.getItem('authToken')) {
			return <Login hasLogged={this.handleLogInSuccess.bind(this)} />
		}
		
		let passProps = {
			userAccess: this.state.currentUser.access,
			userInfo: this.state.currentUser.userInfo,
			handleElementAccess: this.handleElementAccess.bind(this)
		}

		return (
			<ApolloProvider client={client}>
				<div className="app">
					{(this.props.location.pathname.indexOf('/recordlookup/') > -1) ? (
						<ErrorBoundary key={pathname}>
							<Switch>
								<Route path="/recordlookup/profile/:action/:targetField" name="RecordLookUp" render={routeProps => (<PlayerProfile {...routeProps} {...passProps} />)} />
								<Route path="/recordlookup/affiliate/:action/:targetField" name="RecordLookUp" render={routeProps => (<Affiliate {...routeProps} {...passProps} />)} />
							</Switch>
						</ErrorBoundary>
					) : (
						<Fragment>
							{/* <Header {...passProps} hasLogged={this.handleLogOutSuccess.bind(this)} /> */}
							<div className="app-body">
								<ErrorBoundary>
									<Sidebar {...this.props} {...passProps} />
								</ErrorBoundary>
								<main className="main">

									{/* <Breadcrumb /> */}

									<SubMenuNav />

									<Container fluid>
										<ErrorBoundary key={pathname}>
											<Switch>
												<Redirect exact from="/" to="/player_manager/profile/list" />
												<Route path="/reports/dashboards" name="Dashboard" render={routeProps => (<Dashboard {...routeProps} {...passProps} />)} />
												<Route path="/reports/tabular/:action/:id?" name="Tabular" render={routeProps => (<Tabular {...routeProps} {...passProps} />)} />
												<Route path="/web_cms/:index" render={routeProps => (<CmsManagement {...routeProps} {...passProps} />)} />
												<Route path="/pogo-portal" render={routeProps => (<PogoPortal {...routeProps} {...passProps} />)} />

												{/* ADMIN  */}
												<Route path="/admin/access_rights" render={routeProps => (<RoleAccessRights {...routeProps} {...passProps} />)} />
												{/* <Route path="/admin/user/add" render={routeProps => (<UserCreate {...routeProps} {...passProps} />)} /> */}
												<Route path="/admin/user/f/:action/:id?" render={routeProps => (<UserEdit {...routeProps} {...passProps} />)} />
												<Route path="/user_personal_info/edit/:Id" render={routeProps => (<UserPersonalInfoEdit {...routeProps} {...passProps} />)} />
												<Route path="/admin/user/:action/:id?" render={routeProps => (<Users {...routeProps} {...passProps} />)} />

												{/* PLAYER MANAGER */}
												<Route path="/player_manager/profile/f/edit/:id" render={routeProps => (<PlayerProfileEdit {...routeProps} {...passProps} />)} />
												<Route path="/player_manager/profile/f/add" render={routeProps => (<PlayerProfileAdd {...routeProps} {...passProps} />)} />

												<Route path="/player_manager/profile/:action/:id?" component={PlayerProfile} />
												<Route path="/player_manager/bank_account/:action/:id?" component={PlayerBank} />
												<Route path="/player_manager/wallet/:action/:id?" component={PlayerWallet} />
												<Route path="/player_manager/wallet_win/:action/:id?" component={PlayerWin} />
												<Route path="/player_manager/wallet_loss/:action/:id?" component={PlayerLoss} />
												<Route path="/player_manager/wallet_ledger/:action/:id?" component={PlayerLedger} />
												<Route path="/player_manager/access_log/:action/:id?" component={PlayerAccessLog} />
												<Route path="/player_manager/player_fingerprint/:action/:id?" component={PlayerFingerprint} />
												<Route path="/player_manager/messages_monitoring/:action/:id?" component={PlayerMessageMonitoring} />
												{/* <Route path="/player_manager/wagering_fulfillment/:action/:id?" component={PlayerWageringFulfillment} /> */}
												<Route path="/player_manager/bet/:action/:id?" component={PlayerBet} />
												<Route path="/player_manager/player_note/:action/:id?" component={PlayerNote} />
												<Route path="/player_manager/player_document/:action/:id?" component={PlayerDocument} />
												<Route path="/player_manager/player_notification/:action/:id?" component={PlayerNotification} />
												<Route path="/player_manager/player_messages/add" component={PlayerMessagesAdd} />
												{/* <Route path="/player_manager/player_messages/edit" component={PlayerMessagesEdit} /> */}
												<Route path="/player_manager/player_messages/:action/:id?" component={PlayerMessages} />
												<Route path="/player_manager/messages/add" component={MessagesAdd} />
												<Route path="/player_manager/messages/edit/:id" component={MessagesEdit} />
												<Route path="/player_manager/messages/:action/:id?" component={Messages} />

												{/* PAYMENT MANAGER*/}
												<Route path="/payment_manager/deposit/f/:action/:id?" component={DepositForm} />
												<Route path="/payment_manager/deposit/:action/:id?" component={Deposit} />
												<Route path="/payment_manager/withdrawal/:action/:id?" component={Withdrawal} />
												<Route path="/payment_manager/credit_memo/:action/:id?" component={CreditMemo} />
												<Route path="/payment_manager/debit_memo/:action/:id?" component={DebitMemo} />
												<Route path="/payment_manager/fund_transfer/:action/:id?" component={FundTransfer} />

												{/* SETUP */}
												<Route path="/setup/setup/list" component={Setup} />
												<Route path="/setup/brand/:action/:id?" component={Brand} />
												<Route path="/setup/country/:action/:id?" component={Country} />
												<Route path="/setup/currency/:action/:id?" component={Currency} />
												<Route path="/setup/language/:action/:id?" component={Language} />
												<Route path="/setup/states/:action/:id?" component={States} />
												<Route path="/setup/platform/:action/:id?" component={Platform} />
												<Route path="/setup/game/:action/:id?" component={Games} />
												<Route path="/setup/supportedcurrency/:action/:id?" component={SupportedCurrency} />
												<Route path="/setup/viplevel/:action/:id?" component={VipLevel} />
												<Route path="/setup/question/:action/:id?" component={SecurityQuestion} />
												<Route path="/setup/notification/:action/:id?" component={Notification} />
												<Route path="/setup/betlimitsetting/:action/:id?" component={BetLimitSetting} />
												<Route path="/setup/betlimitlevel/:action/:id?" component={BetLimitLevel} />
												<Route path="/setup/market/:action/:id?" component={MarketBrand} />
												<Route path="/setup/credential/:action/:id?" component={Credential} />
												<Route path="/setup/email_notification/:action/:id?" component={EmailNotification} />
												<Route path="/setup/playernotecategory/:action/:id?" component={PlayerNoteCategory} />
												<Route path="/setup/playernotetypesetup/:action/:id?" component={PlayerNoteTypeSetup} />

												<Route path="/setup/bank/:action/:id?" component={Bank} />
												<Route path="/setup/bank_accounts/:action/:id?" component={BankAccount} />
												<Route path="/setup/payment_method/:action/:id?" component={PaymentMethod} />
												<Route path="/setup/payment_risk_level/:action/:id?" component={PaymentRiskLevel} />
												<Route path="/setup/withdrawal_level/:action/:id?" component={WithdrawalLevel} />
												<Route path="/setup/online_payment_bank/:action/:id?" component={PaymentGatewayBank} />
												<Route path="/setup/unique_deposit_amount_rule/:action/:id?" component={UniqueDepositAmountRule} />
												<Route path="/setup/unique_deposit_amounts/:action/:id?" component={UniqueDepositAmount} />
												<Route path="/setup/fraud_risk_level/:action/:id?" component={FraudRiskLevel} />
												<Route path="/setup/payment_gateway/:action/:id?" component={PaymentGateway} />
												<Route path="/setup/online_bank/:action/:id?" component={OnlineBank} />
												<Route path="/setup/online_bank_type/:action/:id?" component={OnlineBankType} />
												<Route path="/setup/online_bank_currency/:action/:id?" component={OnlineBankSupportedCurrency} />

												<Route path="/setup/team/:action/:id?" component={Team} />
												<Route path="/setup/ticket_category/:action/:id?" component={TicketCategory} />
												<Route path="/setup/earningplan/:action/:id?" component={EarningPlan} />

												<Route path="/setup/implatform/:action/:id?" component={IMPlatform} />
												<Route path="/setup/bannedword/:action/:id?" component={BannedWord} />

												<Route path="/setup/rebates/:action/:id?" component={Rebate} />
												<Route path="/setup/rebate_detail/:action/:id?" component={RebateDetail} />

												<Route path="/setup/email_template/:action/:id?" component={EmailService} />
												
												{/* BONUS  */}
												<Route path="/bonus/bonuses/f/:action/:id?" component={BonusesEdit} />

												<Route path="/bonus/bonuses/:action/:id?" component={Bonus} />
												<Route path="/bonus/player_rebate/:action/:id?" component={PlayerRebate} />

												{/* AFFILIATE */}
												<Route path="/affiliate_manager/affiliate/f/:action/:id?" render={routeProps => (<AffiliateEdit {...routeProps} {...passProps} />)} />
												<Route path="/affiliate_manager/affiliate_transaction/f/:action/:id?" render={routeProps => (<AffiliateTransactionEdit {...routeProps} {...passProps} />)} />

												<Route path="/affiliate_manager/affiliate/:action/:id?" component={Affiliate} />
												<Route path="/affiliate_manager/affiliate_transaction/:action/:id?" component={AffiliateTransaction} />
												<Route path="/affiliate_manager/affiliate_commission/:action/:id?" component={Commission} />
												<Route path="/affiliate_manager/affiliate_tracking/:action/:id?" component={AffiliateTrackingLinks} />

												{/*  MARKETING */}
												<Route path="/marketing/email_blast/:action/:id?" component={EmailBlast} />
												<Route path="/marketing/email_blast_monitoring/:action/:id?" component={EmailBlastMonitoring} />

												{/* TICKET */}
												<Route path="/ticket_manager/ticket/:action/:id?" component={Ticket} />

												{/* 404 */}
												<Route component={NoMatch} />

											</Switch>
										</ErrorBoundary>
									</Container>

									{ isOpen &&
										<FormAlert
											onAlert={this.handleAlertNotif.bind(this)}
											isOpen={isOpen}
											type={type}
											data={message}
										/>
									}

									<NotificationAlert notificationList={this.state.notificationList} />

									<Sound
										url="/sounds/door_chime.mp3"
										playStatus={this.state.soundState}
										onFinishedPlaying={() => this.handleSoundStop()}
									/>

								</main>
							</div>
							{/* <Footer /> */}
						</Fragment>
					)}
				</div>
			</ApolloProvider>
		)
	}
}

export default Full