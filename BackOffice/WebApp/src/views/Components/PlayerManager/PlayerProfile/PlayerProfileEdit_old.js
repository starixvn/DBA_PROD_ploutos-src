import React, { Component, Fragment } from 'react'
import { graphql, compose } from 'react-apollo'
import gql from 'graphql-tag'
import {
	Card, 
	Button, 
	Input, 
	// FormGroup, 
	Form, 
	// Label, 
	Row, 
	Col 
} from 'reactstrap'
import PropTypes from 'prop-types'

import Loader from '../../../../components/Loader'
import DateAndTime from '../../../../components/DateAndTime'
import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'

class PlayerProfileEdit extends Component {
	constructor() {
		super()
		this.state = {
			entity: {},
		}
		this.handleInputChange = this.handleInputChange.bind(this)
		this.submitForm = this.submitForm.bind(this)
	}

	componentWillReceiveProps(newProps) {
		if (!newProps.data.loading) {
			this.setState({ entity: { ...newProps.data.playerProfile[0] } })
		}
	}

	submitForm(e) {
		e.preventDefault()
		const { entity } = this.state
		this.props.mutate({
			variables: {
				UserName: entity.UserName,
				FullName: entity.FullName,
				FirstName: entity.FirstName,
				LastName: entity.LastName,
				BirthDate: entity.BirthDate,
				Email: entity.Email,
				MobileNumber: entity.MobileNo,
				WebChatUserName: entity.WebChatUserName,
				QQUserName: entity.QQUserName,
				KakaoTalkId: entity.KakaoTalkId,
				SkypeId: entity.SkypeId,
				WhatsappId: entity.WhatsappId,
				LineId: entity.LineId
			}
		})
			.then(() => SuccessHandler({
				context: this.context, 
				callback: this.props.history.goBack()
			}))
			.catch(error => ErrorHandler({
				context: this.context,
				error: { error }
			}))
	}

	handleInputChange = f => e => {
		let value = e.target.type === 'checkbox' ? e.target.checked : e.target.value
		this.setState({
			entity: { ...this.state.entity, [f]: value }
		})
	}

	// handleSelectChange = (f) => (e) => {
	//     function value(v) {
	//         switch(v.toLowerCase().trim()){
	//             case "true": case "yes": case "1": return true
	//             case "false": case "no": case "0": case null: return false
	//             default: return Boolean(string)
	//         }
	//     }
	//     this.setState({
	//         entity: { ...this.state.entity, [f]: value(e.target.value) }
	//     })
	// }

	handleGoBack() {
		this.props.history.goBack()
	}

	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'

		if (this.props.data.loading) return loader
		if (this.props.data.error) return errorLoad
		
		const playerProfile = this.state.entity

		// console.log(this.props)
		return (
			<Fragment>
				<div className="mb-3 c-table__title">
					Edit Player Profile
					<span className="text--tiny float-right c-backlink" onClick={this.handleGoBack.bind(this)}>
						&laquo; Back
					</span>
				</div>
				<Card body>
					<Form onSubmit={this.submitForm}>
						<Row>
							<Col xs="12" sm="6" lg="3">
								<div className="c-list__title">Account Info</div>
								<dl className="c-dl--inline">
									<dt>Account No</dt><dd>{playerProfile.UserAccountNo}</dd>
									<dt>Brand</dt><dd>{playerProfile.BrandCode}</dd>
									<dt>Player Type</dt><dd>{playerProfile.PlayerType}</dd>
									<dt>User Name</dt><dd>{playerProfile.UserName}</dd>
									<dt>Country</dt><dd>{playerProfile.Country}</dd>
									<dt>VIP Level</dt><dd>{playerProfile.VipLevelName}</dd>
									<dt>Withdrawal Level</dt><dd>{playerProfile.WithdrawalLevelName}</dd>
									<dt>Fraud Level</dt><dd>{playerProfile.FraudRiskLevelName}</dd>
									<dt>Bet Limit</dt><dd>{playerProfile.BetLimitLevelDesc}</dd>
									<dt>Deposit Bank Account</dt><dd>{playerProfile.DepositBankName}</dd>
									<dt>Withdrawal Bank Account</dt><dd>{playerProfile.WithdrawalBankName}</dd>
									<dt>Check for Fraud</dt><dd>{(playerProfile.CheckForFraud) ? <i className="fa fa-check fa-lg"></i> : <i className="fa fa-close fa-lg"></i>}</dd>
									<dt>Profile Status</dt><dd>{playerProfile.AccountStatus}</dd>
									<dt>Registration Status</dt><dd>{playerProfile.PlayerRegisterStatus}</dd>
									<dt>Source URL</dt><dd>{playerProfile.SourceUrl}</dd>
								</dl>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<div className="c-list__title">Identity Info</div>
								<dl className="c-dl--inline">
									<dt>Full Name</dt>
									<dd>
										<Input type="text" id="FullName" placeholder="Full Name"
											value={playerProfile.FullName || ''}
											onChange={this.handleInputChange('FullName')}
										/>
									</dd>
									<dt>First Name</dt>
									<dd>
										<Input type="text" id="FirstName" placeholder="First Name"
											value={playerProfile.FirstName || ''}
											onChange={this.handleInputChange('FirstName')}
										/>
									</dd>
									<dt>Last Name</dt>
									<dd>
										<Input type="text" id="LastName" placeholder="Last Name"
											value={playerProfile.LastName || ''}
											onChange={this.handleInputChange('LastName')}
										/>
									</dd>
									<dt>Birth Date</dt>
									<dd>
										{
											(playerProfile.IsEmailVerified || playerProfile.IsMobileVerified)
												? 
													(playerProfile.BirthDate === '0001-01-01 00:00:00') 
														? <DateAndTime  value={'1900-01-01'}  onChange={this.handleInputChange('BirthDate')}/>
														: <DateAndTime  value={playerProfile.BirthDate}  onChange={this.handleInputChange('BirthDate')}/>
												: <DateAndTime  value={'1900-01-01'}  onChange={this.handleInputChange('BirthDate')}/>
										}
									</dd>
									<dt>Gender</dt><dd>{(playerProfile.Gender == 'Not_Defined') ? '' : playerProfile.Gender }</dd>
									<dt>Security Question</dt><dd>{playerProfile.SecurityQuestionDesc}</dd>
								</dl>
								<div className="c-list__title">Contact Info</div>
								<dl className="c-dl--inline">
									<dt>Email</dt>
									<dd>{/*(this.props.handleElementAccess('FieldPlayerEmail')) ? playerProfile.Email : '*****' */}
										{(this.props.handleElementAccess('FieldPlayerEmail'))
											? <Input disabled = "true" type="text" id="Email" placeholder="Email"
												value={playerProfile.Email || ''}
												onChange={this.handleInputChange('Email')}
											/>
											: <Input type="text" id="Email" placeholder="Email"
												value={playerProfile.Email || ''}
												onChange={this.handleInputChange('Email')}
											/>
										}
									</dd>
									<dt>Mobile No</dt>
									<dd>{/*(this.props.handleElementAccess('FieldPlayerMobile')) ? playerProfile.MobileNo : '*****' */}
										{(this.props.handleElementAccess('FieldPlayerMobile'))
											? <Input disabled = "true" type="text" id="MobileNo" placeholder="MobileNo"
												value={playerProfile.MobileNo || ''}
												onChange={this.handleInputChange('MobileNo')}
											/>
											: <Input type="text" id="MobileNo" placeholder="MobileNo"
												value={playerProfile.MobileNo || ''}
												onChange={this.handleInputChange('MobileNo')}
											/>
										}

									</dd>
									<dt>Is Email Verified</dt><dd>{(playerProfile.IsEmailVerified) ? <i className="fa fa-check fa-lg"></i> : <i className="fa fa-close fa-lg"></i>}</dd>
									<dt>Is Mobile Verified</dt><dd>{(playerProfile.IsMobileVerified) ? <i className="fa fa-check fa-lg"></i> : <i className="fa fa-close fa-lg"></i>}</dd>
									<dt>WeChat Username</dt>
									<dd>
										<Input type="text" id="WebChatUserName" placeholder="WeChat Username"
											value={playerProfile.WebChatUserName || ''}
											onChange={this.handleInputChange('WebChatUserName')}
										/>
									</dd>
									<dt>QQ Username</dt>
									<dd>
										<Input type="text" id="QQUserName" placeholder="QQ Username"
											value={playerProfile.QQUserName || ''}
											onChange={this.handleInputChange('QQUserName')}
										/>
									</dd>
									<dt>KaKao Talk ID</dt>
									<dd>
										<Input type="text" id="KakaoTalkId" placeholder="KaKao Talk ID"
											value={playerProfile.KakaoTalkId || ''}
											onChange={this.handleInputChange('KakaoTalkId')}
										/>
									</dd>
									<dt>Skype ID</dt>
									<dd>
										<Input type="text" id="SkypeId" placeholder="Skype ID"
											value={playerProfile.SkypeId || ''}
											onChange={this.handleInputChange('SkypeId')}
										/>
									</dd>
									<dt>WhatsApp ID</dt>
									<dd>
										<Input type="text" id="WhatsappId" placeholder="WhatsApp ID"
											value={playerProfile.WhatsappId || ''}
											onChange={this.handleInputChange('WhatsappId')}
										/>
									</dd>
									<dt>Line ID</dt>
									<dd>
										<Input type="text" id="LineId" placeholder="Line ID"
											value={playerProfile.LineId || ''}
											onChange={this.handleInputChange('LineId')}
										/>
									</dd>
									<dt></dt>
									<dd>
										<Button size="sm" color="primary" className="btn btn-primary">
											<i className="fa fa-pencil"></i>{' '}
											{ this.state.isSubmitting ? 'Submitting ...' : 'Save' }
										</Button>{' '}
										<Button size="sm" color="secondary" onClick={this.handleGoBack.bind(this)}>
											<i className="fa fa-close"></i>{' '}Cancel
										</Button>
									</dd>
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
									<dt>Currency</dt><dd><span className="text-truncate">{playerProfile.CurrencyCode}</span></dd>
									<dt>Balance</dt><dd>{Number(playerProfile.Balance).toFixed(4)}</dd>
									<dt>Withdrawable Balance</dt><dd>{Number(playerProfile.WithdrawableAmount).toFixed(4)}</dd>
									<dt>Locked Balance</dt><dd>{Number(playerProfile.LockedBalance).toFixed(4)}</dd>
									<dt>Total TurnOver</dt><dd>{Number(Number(playerProfile.TotalWins) + Number(playerProfile.TotalLoss)).toFixed(4)}</dd>
									<dt>Total Win / Loss</dt><dd>{Number(Number(playerProfile.TotalWins) - Number(playerProfile.TotalLoss)).toFixed(4)}</dd>
									<dt>Total Deposits</dt><dd>{Number(playerProfile.TotalDeposits).toFixed(4)}</dd>
									<dt>Total Deposit Count</dt><dd>{playerProfile.TotalDepositCount}</dd>
									<dt>Total Deposit Count with Bonus</dt><dd>{playerProfile.TotalDepositCountWithBonus}</dd>
									<dt>Total Credit Memo</dt><dd><span>{Number(playerProfile.TotalCreditMemo).toFixed(4)}</span></dd>
									<dt>Company Profit</dt><dd>{Number((Number(playerProfile.TotalDeposits) - Number(playerProfile.TotalWithdrawals)) + Number(playerProfile.TotalWithdrawals)).toFixed(4)}</dd>
									<dt>Total Withdrawals</dt><dd>{Number(playerProfile.TotalWithdrawals).toFixed(4)}</dd>
									<dt>Total Withdrawal Count</dt><dd>{playerProfile.TotalWithdrawalCount}</dd>
									<dt>Total Debit Memo</dt><dd><span>{Number(playerProfile.TotalDebitMemo).toFixed(4)}</span></dd>
									<dt>Total Bonuses</dt><dd>{Number(playerProfile.TotalBonus).toFixed(4)}</dd>
								</dl>
							</Col>
						</Row>
					</Form>
				</Card>
			</Fragment>
		)
	}
}

PlayerProfileEdit.propTypes = {
	data: PropTypes.object,
	history: PropTypes.object,
	mutate: PropTypes.func,
	handleElementAccess: PropTypes.func
}

PlayerProfileEdit.contextTypes = {
	onAlert: PropTypes.func
}
  
const queryOptions = {
	// skip: props => props.match.params.action === 'add',
	options: props => ({
		variables: {
			Id: props.match.params.id,
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}
const query = gql`
  query profileQuery($Id: ID!){
	playerProfile(Id:$Id){
	  Id
	  UserAccountNo
	  BrandCode
	  PlayerType
	  UserName
	  Country
	  VipLevelName
	  PaymentRiskLevelName
	  WithdrawalLevelName
	  FraudRiskLevelName
	  BetLimitLevelDesc
	  DepositBankName
	  WithdrawalBankName
	  CheckForFraud
	  AccountStatus
	  PlayerRegisterStatus
	  SourceUrl
	  IsDoNotAllowBonus
	  Platform
	  FullName
	  FirstName
	  LastName
	  BirthDate
	  Gender
	  SecurityQuestionDesc
	  Email
	  MobileNo
	  IsEmailVerified
	  IsMobileVerified
	  WebChatUserName
	  QQUserName
	  LineId
	  KakaoTalkId
	  SkypeId
	  WhatsappId
	  PlayerRegistrationId
	  FraudRiskLevelId
	  GameBetLimitLevelId
	  RegistrationDate
	  IPAddress
	  LastLoginTime
	  LastLoginIPAddress
	  DaysRegistered
	  WalletLastUpdated
	  CurrencyCode
	  Balance
	  WithdrawableAmount
	  TotalWins
	  TotalLoss
	  TotalDeposits
	  TotalDepositCount
	  TotalDepositCountWithBonus
	  TotalCreditMemo
	  TotalDebitMemo
	  TotalWithdrawals
	  TotalWithdrawalCount
	  TotalBonus
	  LockedBalance
	}
  }
`

const mutationOptions = {
	options: () => ({
		variables: {
			UserName: null,
			FullName: null,
			FirstName: null,
			LastName: null,
			BirthDate: null,
			Email: null,
			MobileNumber: null,
			WebChatUserName: null,
			QQUserName: null,
			KakaoTalkId: null,
			SkypeId: null,
			WhatsappId: null,
			LineId: null
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

const mutation = gql`
	mutation MUTATION_VARS(
		$UserName: String!
		$FullName: String!
		$FirstName: String
		$LastName: String
		$BirthDate: DateTime!
		$Email: String!
		$MobileNumber: String!
		$WebChatUserName: String
		$QQUserName: String
		$KakaoTalkId: String
		$SkypeId: String
		$WhatsappId: String
		$LineId: String
	){
		actionEditPlayerProfileMutation(
			UserName: $UserName
			FullName: $FullName
			FirstName: $FirstName
			LastName: $LastName
			BirthDate: $BirthDate
			Email: $Email
			MobileNumber: $MobileNumber
			WebChatUserName: $WebChatUserName
			QQUserName: $QQUserName
			KakaoTalkId: $KakaoTalkId
			SkypeId: $SkypeId
			WhatsappId: $WhatsappId
			LineId: $LineId
		){
			apiResult
		}
	}
`

export default compose(
	graphql(query, queryOptions),
	graphql(mutation, mutationOptions)
)(PlayerProfileEdit)