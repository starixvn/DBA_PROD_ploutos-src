/* eslint-disable react/no-deprecated */
import React, { Component, Fragment } from 'react'
import { Link } from 'react-router-dom'
import {
	Row, 
	Col, 
} from 'reactstrap'
import PropTypes from 'prop-types'

import Loader from '../../../../components/Loader'
import { FormatCurrency } from '../../../../utils/CoreHelpers'

class PlayerProfileInfo extends Component {
	constructor() {
		super()
		this.state = {
			entity: {},
			loading: true
		}
	}

	componentWillMount() {
		this.setState({ entity: { ...this.props.data.playerProfile[0] }, loading: false })
	}

	render() {
		if (this.state.loading) return <Loader />

		if (this.props.data.error) return (<div>An unexpected error occurred</div>)

		const playerProfile = this.state.entity
		const brandPath = '/setup/brand/view/' + playerProfile.BrandId
		const countryPath = '/setup/country/view/' + playerProfile.CountryCode
		const viplevelPath = '/setup/viplevel/view/' + playerProfile.VipLevelId
		const withdrawalPath = '/setup/withdrawal_level/view/' + playerProfile.WithdrawalLevelId
		const fraudLevelPath = '/setup/fraud_risk_level/view/' + playerProfile.FraudRiskLevelId
		const paymentRiskLevelPath = '/setup/payment_risk_level/view/' + playerProfile.PaymentRiskLevelId
		const betLimitLevelPath = '/setup/betlimitlevel/view/' + playerProfile.GameBetLimitLevelId
		const securityPath = '/setup/question/view/' + playerProfile.SecurityQuestionId1
		const currencyPath = '/setup/currency/view/' + playerProfile.CurrencyCode

		return (
			<Fragment>
				<div className="mb-3 c-table__title">Account Info</div>
				<Row>
					<Col xs="12" sm="6" lg="3">
						<div className="c-list__title">Account Info</div>
						<dl className="c-dl--inline">
							<dt>Account No</dt><dd>{playerProfile.UserAccountNo}</dd>
							<dt>Brand</dt><dd><Link to={brandPath}>{playerProfile.BrandCode}</Link></dd>
							<dt>Player Type</dt><dd>{playerProfile.PlayerType}</dd>
							<dt>User Name</dt><dd>{playerProfile.UserName}</dd>
							<dt>Country</dt><dd><Link to={countryPath}>{playerProfile.Country}</Link></dd>
							<dt>VIP Level</dt><dd><Link to={viplevelPath}>{playerProfile.VipLevelName}</Link></dd>
							<dt>Withdrawal Level</dt><dd><Link to={withdrawalPath}>{playerProfile.WithdrawalLevelName}</Link></dd>
							<dt>Fraud Level</dt><dd><Link to={fraudLevelPath}>{playerProfile.FraudRiskLevelName}</Link></dd>
							<dt>Payment Risk Level</dt><dd><Link to={paymentRiskLevelPath}>{playerProfile.PaymentRiskLevelName}</Link></dd>
							<dt>Bet Limit</dt><dd><Link to={betLimitLevelPath}>{playerProfile.BetLimitLevelDesc}</Link></dd>
							{/*<dt>Deposit Bank Account</dt><dd>{playerProfile.DepositBankName}</dd>
							<dt>Withdrawal Bank Account</dt><dd>{playerProfile.WithdrawalBankName}</dd>*/}
							<dt>Check for Fraud</dt><dd>{(playerProfile.CheckForFraud) ? <i className="fa fa-check fa-lg"></i> : <i className="fa fa-close fa-lg"></i>}</dd>
							<dt>Profile Status</dt><dd>{playerProfile.AccountStatus}</dd>
							<dt>Registration Status</dt><dd>{playerProfile.PlayerRegisterStatus}</dd>
							<dt>Source URL</dt><dd>{playerProfile.SourceUrl}</dd>
						</dl>
					</Col>
					<Col xs="12" sm="6" lg="3">
						<div className="c-list__title">Identity Info</div>
						<dl className="c-dl--inline">
							<dt>Full Name</dt><dd>{playerProfile.FullName}</dd>
							{/*<dt>First Name</dt><dd>{playerProfile.FirstName}</dd>
							<dt>Last Name</dt><dd>{playerProfile.LastName}</dd>*/}
							<dt>Birth Date</dt><dd>{(playerProfile.BirthDate == '0001-01-01 00:00:00') ? '' : playerProfile.BirthDate.substring(0, 10)}</dd>
							<dt>Gender</dt><dd>{(playerProfile.Gender == 'Not_Defined') ? '' : playerProfile.Gender }</dd>
							<dt>Security Question</dt><dd><Link to={securityPath}>{playerProfile.SecurityQuestionDesc}</Link></dd>
						</dl>
						<div className="c-list__title">Contact Info</div>
						<dl className="c-dl--inline">
							<dt>Email</dt><dd>{(this.props.handleElementAccess('FieldPlayerEmail')) ? playerProfile.Email : '*****' }</dd>
							<dt>Mobile No</dt><dd>{(this.props.handleElementAccess('FieldPlayerMobile')) ? playerProfile.MobileNo : '*****' }</dd>
							<dt>Is Email Verified</dt><dd>{(playerProfile.IsEmailVerified) ? <i className="fa fa-check fa-lg"></i> : <i className="fa fa-close fa-lg"></i>}</dd>
							<dt>Is Mobile Verified</dt><dd>{(playerProfile.IsMobileVerified) ? <i className="fa fa-check fa-lg"></i> : <i className="fa fa-close fa-lg"></i>}</dd>
							<dt>WeChat Username</dt><dd>{playerProfile.WebChatUserName}</dd>
							<dt>QQ Username</dt><dd>{playerProfile.QQUserName}</dd>
							<dt>KaKao Talk ID</dt><dd>{playerProfile.KakaoTalkId}</dd>
							<dt>Skype ID</dt><dd>{playerProfile.SkypeId}</dd>
							<dt>WhatsApp ID</dt><dd>{playerProfile.WhatsappId}</dd>
							<dt>Line ID</dt><dd>{playerProfile.LineId}</dd>
						</dl>
						<div className="c-list__title">Restrictions</div>
						<dl className="c-dl--inline">
							<dt>Do Not Allow Bonus</dt><dd>{playerProfile.IsDoNotAllowBonus}</dd>
							<dt>Platform</dt><dd>{playerProfile.Platform}</dd>
							<dt>Locked Account on GP</dt><dd></dd>
						</dl>
					</Col>
					<Col xs="12" sm="6" lg="3">
						<div className="c-list__title">Login/Registration Info</div>
						<dl className="c-dl--inline">
							<dt>Registration TimeStamp</dt><dd><span className="text-truncate">{playerProfile.RegistrationDate}</span></dd>
							<dt>Registration IP</dt><dd>{playerProfile.IPAddress}</dd>
							<dt>Last Login</dt><dd>{playerProfile.LastLoginTime}</dd>
							<dt>Last Login IP</dt><dd>{playerProfile.LastLoginIPAddress}</dd>
							<dt>Days Registered</dt><dd>{playerProfile.DaysRegistered}</dd>
							<dt>Last Wallet Update</dt><dd>{playerProfile.WalletLastUpdated}</dd>
						</dl>
					</Col>
					<Col xs="12" sm="6" lg="3">
						<div className="c-list__title">Financial Info</div>
						<dl className="c-dl--inline">
							<dt>Currency</dt><dd><span className="text-truncate"><Link to={currencyPath}>{playerProfile.CurrencyCode}</Link></span></dd>
							<dt>Balance</dt><dd>{FormatCurrency(playerProfile.Balance)}</dd>
							<dt>Withdrawable Balance</dt><dd>{FormatCurrency(playerProfile.WithdrawableAmount)}</dd>
							<dt>Locked Balance</dt><dd>{FormatCurrency(playerProfile.LockedBalance)}</dd>
							<dt>Total TurnOver</dt><dd>{FormatCurrency(Number(playerProfile.TotalWins) + Number(playerProfile.TotalLoss))}</dd>
							<dt>Total Win / Loss</dt><dd>{FormatCurrency(Number(playerProfile.TotalWins) - Number(playerProfile.TotalLoss))}</dd>
							<dt>Total Deposits</dt><dd>{FormatCurrency(playerProfile.TotalDeposits)}</dd>
							<dt>Total Deposit Count</dt><dd>{playerProfile.TotalDepositCount}</dd>
							<dt>Total Deposit Count with Bonus</dt><dd>{playerProfile.TotalDepositCountWithBonus}</dd>
							<dt>Total Credit Memo</dt><dd><span>{FormatCurrency(playerProfile.TotalCreditMemo)}</span></dd>
							<dt>Company Profit</dt><dd>{FormatCurrency((Number(playerProfile.TotalDeposits) - Number(playerProfile.TotalWithdrawals)) + Number(playerProfile.TotalWithdrawals))}</dd>
							<dt>Total Withdrawals</dt><dd>{FormatCurrency(playerProfile.TotalWithdrawals)}</dd>
							<dt>Total Withdrawal Count</dt><dd>{playerProfile.TotalWithdrawalCount}</dd>
							<dt>Total Debit Memo</dt><dd><span>{FormatCurrency(playerProfile.TotalDebitMemo)}</span></dd>
							<dt>Total Bonuses</dt><dd>{FormatCurrency(playerProfile.TotalBonus)}</dd>
						</dl>
					</Col>
				</Row>
			</Fragment>
		)
	}
}

PlayerProfileInfo.propTypes = {
	data: PropTypes.object,
	handleElementAccess: PropTypes.func
}

export default PlayerProfileInfo