import React, { Component, Fragment } from 'react'
import PropTypes from 'prop-types'
import Card from 'reactstrap/lib/Card'
import Row from 'reactstrap/lib/Row'
import Col from 'reactstrap/lib/Col'

import Loader from '../../../../components/Loader'

class AffiliateInfo extends Component {

	state = {
		entity: {},
		loading: true
	}
		
	componentDidMount() {
		this.setState({
			entity: { ...this.props.data.affiliate[0] }, 
			loading: false
		})
	}

	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred.' 

		if (this.state.loading) return loader
		if (this.props.data.error) return errorLoad

		const data = this.state.entity
		// const { data } = this.state
		// const data = this.props.data.affiliate[0]

		return (
			<Fragment>
				<div className="mb-3 c-table__title">Affiliate Info</div>
				<Card body>
					<Row>
						<Col xs="12" sm="6">
							<dl className="c-dl--inline">
								<dt>Affiliate Status :</dt>
								<dd><span>{data.AffiliateStatus}</span></dd>
								<dt>Affiliate Code :</dt>
								<dd><span>{data.AffiliateCode}</span></dd>
								<dt>Username :</dt>
								<dd><span>{data.UserName}</span></dd>
								<dt>Full Name :</dt>
								<dd><span>{data.FullName}</span></dd>
								<dt>Primary Email :</dt>
								<dd><span>{data.PrimaryEmail}</span></dd>
								<dt>Website URL :</dt>
								<dd><span>{data.WebsiteURL}</span></dd>
								<dt>IM1 :</dt>
								<dd><span>{data.IMPlatformName1}</span></dd>
								<dt>IM1UserName :</dt>
								<dd><span>{data.IM1UserName}</span></dd>
								<dt>IM2 :</dt>
								<dd><span>{data.IMPlatformName2}</span></dd>
								<dt>IM2 UserName :</dt>
								<dd><span>{data.IM2UserName}</span></dd> 
								<dt>Wallet Balance :</dt>
								<dd><span>{data.WalletBalance}</span></dd>
								<dt>Settlement Period :</dt>
								<dd><span>{data.SettlementPeriod}</span></dd>
								<dt>Last Login Date :</dt>
								<dd><span>{data.LastLoginDate}</span></dd>
								{/* <dt>Affiliate Link :</dt>
								<dd><span>{data.WebsiteURL + '/'+ data.CurrencyCode.toLowerCase() + '?afcode=' + data.AffiliateCode}</span></dd> */}
							</dl>
						</Col>
					</Row>
				</Card>

				<div className="mb-3 c-table__title">Settlement and commission settings</div>
				<Card body>
					<Row>
						<Col xs="12" sm="6" lg="4">
							<dl className="c-dl--inline">
								<dt>Phone Country Code :</dt>
								<dd><span>{data.PhoneCountryCodeNo}</span></dd>
								
								<dt>PhoneNo :</dt>
								<dd><span>{data.PhoneNo}</span></dd>
								
								<dt>Username :</dt>
								<dd><span>{data.UserName}</span></dd>
								
								<dt>Password :</dt>
								<dd><span>********</span></dd>
								
								<dt>Secondary Email :</dt>
								<dd><span>{data.SecondaryEmail}</span></dd>
							</dl>
						</Col>

						<Col xs="12" sm="6" lg="4">
							<dl className="c-dl--inline">
								<dt>Affiliate Type :</dt>
								<dd><span>{data.AffiliateType}</span></dd>
								
								<dt>Country Code :</dt>
								<dd><span>{data.CountryCode}</span></dd>
								
								<dt>Bonus Code :</dt>
								<dd><span>{data.BonusCode}</span></dd>
								
								<dt>Currency Code :</dt>
								<dd><span>{data.CurrencyCode}</span></dd>
							</dl>
						</Col>

						<Col xs="12" sm="6" lg="4">
							<dl className="c-dl--inline">
								{/*<dt>Earning Plan :</dt>
								<dd><span>{data.EarningPlanName}</span></dd>*/}
								
								<dt>Settlement Period :</dt>
								<dd><span>{data.SettlementPeriod}</span></dd>

								<dt>Marketing Cost :</dt>
								<dd><span>{data.MarketingCost}</span></dd>
							</dl>
						</Col>
					</Row>

				</Card>
			</Fragment>
		)
	}
}

AffiliateInfo.propTypes = {
	data: PropTypes.object
}

export default AffiliateInfo