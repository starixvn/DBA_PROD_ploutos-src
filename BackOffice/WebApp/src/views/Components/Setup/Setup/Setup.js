import React, { Component, Fragment } from 'react'
import { Link } from 'react-router-dom'
import {
	Row,
	Col,
	Card,
	CardHeader,
	CardBody,
} from 'reactstrap'
import { GetLocalData } from '../../../../utils/CoreHelpers'

class Setup extends Component {

	state = {
		dropdown: {
			PlayerManager: true,
			PaymentManager: false,
			BonusManager: false,
			AffiliateManager: false,
			TicketManager: false,
			UserManager: false
		}
	}

	handleToggle(card) {
		for (var key in this.state.dropdown) {
			if (key !== card) return this.setState({ dropdown: { ...this.state.dropdown.key, [card]: !this.state.dropdown[card] } })
		}
	}	
	
	render() {		
		const toogleClass = card => this.state.dropdown[card] ? 'is-expanded' : 'is-collapsed'
		const toogleIconClass = card => this.state.dropdown[card] ? 'fa fa-chevron-up' : 'fa fa-chevron-down'
		const managedCMSList = JSON.parse(GetLocalData('currUserInformations')).cmsManagement

		return (
			<Fragment>
				<Card className={toogleClass('PlayerManager')}>
					<CardHeader>
						<i className="fa fa-users"></i> 
						<strong>Player Manager Setup</strong>
						<button 
							className="btn btn-sm btn-outline-secondary float-right" 
							onClick={this.handleToggle.bind(this, 'PlayerManager')}
							title="Toggle View">
							<i className={toogleIconClass('PlayerManager')}></i>
						</button>
					</CardHeader>
					<CardBody>
						<Row>

							<Col xs="12" sm="6" lg="3">								
								<Link to={'/setup/brand/list'}>Brands</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/country/list'}>Countries</Link>
							</Col>							
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/currency/list'}>Currencies</Link>
							</Col>						
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/language/list'}>Language</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/states/list'}>State Province</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/platform/list'}>Platforms</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/game/list'}>Games</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/supportedcurrency/list'}>Supported Currencies</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/viplevel/list'}>VIP Levels</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/question/list'}>Security Questions</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/notification/list'}>Notifications</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/email_notification/list'}>Email Notifications</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/betlimitlevel/list'}>Bet Limit Level</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/betlimitsetting/list'}>Bet Limit Settings</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/market/list'}>Market Brands</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/credential/list'}>Product OAuth Credential Setup</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/playernotecategory/list'}>Player Note Category</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/playernotetypesetup/list'}>Player Note Type Setup</Link>
							</Col>
						</Row>
					</CardBody>
				</Card>

				<Card className={toogleClass('PaymentManager')}>
					<CardHeader>
						<i className="fa fa-credit-card-alt"></i> 
						<strong>Payment Manager Setup</strong>
						<button 
							className="btn btn-sm btn-outline-secondary float-right" 
							onClick={this.handleToggle.bind(this, 'PaymentManager')}
							title="Toggle View">
							<i className={toogleIconClass('PaymentManager')}></i>							
						</button>						
					</CardHeader>
					<CardBody>
						<Row>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/payment_risk_level/list'}>Payment Risk Level</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/withdrawal_level/list'}>Withdrawal Levels</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/fraud_risk_level/list'}>Fraud Risk Levels</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/unique_deposit_amount_rule/list'}>Unique Deposit Amount Rule</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/payment_gateway/list'}>Payment Gateway</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/payment_method/list'}>Payment Method</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/bank/list'}>Bank</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/bank_accounts/list'}>Bank Accounts</Link>
							</Col>

							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/online_bank_type/list'}>Online Bank Types</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/online_bank/list'}>Online Banks</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/online_bank_currency/list'}>Online Bank Supported Currency</Link>
							</Col>
						</Row>
					</CardBody>
				</Card>

				<Card className={toogleClass('BonusManager')}>
					<CardHeader>
						<i className="fa fa-money"></i> 
						<strong>Bonus Manager Setup</strong>
						<button 
							className="btn btn-sm btn-outline-secondary float-right" 
							onClick={this.handleToggle.bind(this, 'BonusManager')}
							title="Toggle View">
							<i className={toogleIconClass('BonusManager')}></i>
						</button>
					</CardHeader>
					<CardBody>
						<Row>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/rebates/list'}>Rebates</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/rebate_detail/list'}>Rebate Details</Link>
							</Col>
						</Row>
					</CardBody>
				</Card>

				<Card className={toogleClass('AffiliateManager')}>
					<CardHeader>
						<i className="fa fa-share-alt"></i> 
						<strong>Affiliate Manager Setup</strong>
						<button 
							className="btn btn-sm btn-outline-secondary float-right" 
							onClick={this.handleToggle.bind(this, 'AffiliateManager')}
							title="Toggle View">
							<i className={toogleIconClass('AffiliateManager')}></i>
						</button>
					</CardHeader>
					<CardBody>
						<Row>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/earningplan/list'}>Earning Plan</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/rewards/list'}>Rewards</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/implatform/list'}>IM Platform</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/bannedword/list'}>Banned Word</Link>
							</Col>
						</Row>
					</CardBody>
				</Card>

				<Card className={toogleClass('TicketManager')}>
					<CardHeader>
						<i className="fa fa-ticket"></i> 
						<strong>Ticket Manager Setup</strong>
						<button 
							className="btn btn-sm btn-outline-secondary float-right" 
							onClick={this.handleToggle.bind(this, 'TicketManager')}
							title="Toggle View">
							<i className={toogleIconClass('TicketManager')}></i>
						</button>
					</CardHeader>
					<CardBody>
						<Row>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/team/list'}>Team</Link>
							</Col>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/ticket_category/list'}>Ticket Category</Link>
							</Col>
						</Row>
					</CardBody>
				</Card>

				<Card className={toogleClass('Email Template')}>
					<CardHeader>
						<i className="fa fa-envelope"></i> 
						<strong>Email Template Setup</strong>
						<button 
							className="btn btn-sm btn-outline-secondary float-right" 
							onClick={this.handleToggle.bind(this, 'Email Template')}
							title="Toggle View">
							<i className={toogleIconClass('Email Template')}></i>
						</button>
					</CardHeader>
					<CardBody>
						<Row>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/email_template/list'}>Email Template</Link>
							</Col>
						</Row>
					</CardBody>
				</Card>

				{/*<Card className={toogleClass('Payment Gateway')}>
					<CardHeader>
						<i className="fa fa-envelope"></i> 
						<strong>Payment Gateway Setup</strong>
						<button 
							className="btn btn-sm btn-outline-secondary float-right" 
							onClick={this.handleToggle.bind(this, 'Payment Gateway')}
							title="Toggle View">
							<i className={toogleIconClass('Payment Gateway')}></i>
						</button>
					</CardHeader>
					<CardBody>
						<Row>
							<Col xs="12" sm="6" lg="3">
								<Link to={'/setup/payment_gateway/list'}>Payment Gateway</Link>
							</Col>
						</Row>
					</CardBody>
				</Card>*/}

				{managedCMSList &&
					<Card className={toogleClass('Web CMS')}>
						<CardHeader>
							<i className="fa fa-globe"></i> 
							<strong>Web CMS Setup</strong>
							<button 
								className="btn btn-sm btn-outline-secondary float-right" 
								onClick={this.handleToggle.bind(this, 'Web CMS')}
								title="Toggle View">
								<i className={toogleIconClass('Web CMS')}></i>
							</button>
						</CardHeader>
						<CardBody>
							<Row>
								{managedCMSList.map((cms, i) => {
									return (<Col xs="12" sm="6" lg="3" key={i}>
										<Link to={`/web_cms/${cms.index}`}>{cms.title}</Link>
									</Col>)
								})}
							</Row>
						</CardBody>
					</Card>
				}
			</Fragment>
		)
	}
}

export default Setup