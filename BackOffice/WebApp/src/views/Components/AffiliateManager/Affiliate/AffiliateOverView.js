import React, { Component, Fragment } from 'react'
// import { graphql, compose } from 'react-apollo'
import {
	Row,
	Col
} from 'reactstrap'
import PropTypes from 'prop-types'

// import Loader from '../../../../components/Loader'
// import * as helper from '../../../../utils/CoreHelpers'
// import TableData from '../../../../components/TableData'

// import { getCommissions } from '../Commission/Commission.gql'
// import { getAffiliateTransactions } from '../AffiliateTransaction/AffiliateTransaction.gql'
// import { Commission } from '../../../../data/TableHeaders'
// import { AffiliateTransaction } from '../../../../data/TableHeaders'

class AffiliateOverView extends Component {

	// componentWillMount() {
	// 	this.setState({
	// 		entity: { ...this.props.data.affiliate[0] }
	// 	})
	// }

	render() {
		// const loader = <Loader />
		// const errorLoad = 'An unexpected error occurred' 

		// if (this.props.data.loading) return loader
		// if (this.props.data.error) return errorLoad

		const data = this.props.affData

		return (
			<Fragment>
				<Row>
					<Col xs="12" sm="5">
						Chart here
					</Col>
					<Col xs="12" sm="7" lg="3">
						<dl className="c-dl--inline">
							<dt>Affiliate Code</dt>
							<dd><span>{data.AffiliateCode}</span></dd>
							<dt>Username</dt>
							<dd><span>{data.UserName}</span></dd>
							<dt>Full Name</dt>
							<dd><span>{data.FullName}</span></dd>
							<dt>Primary Email</dt>
							<dd><span>{data.PrimaryEmail}</span></dd>
							<dt>IM1 Platform</dt>
							<dd><span>{data.IM1}</span></dd>
							<dt>IM1 UserName</dt>
							<dd><span>{data.IM1UserName}</span></dd>
							<dt>Affiliate Type</dt>
							<dd><span>{data.AffiliateType}</span></dd>
							{/*<dt>Earning Plan</dt>
							<dd><span>{data.EarningPlanId}</span></dd>*/}
							<dt>Bonus Code</dt>
							<dd><span>{data.BonusCode}</span></dd>
						</dl>
					</Col>
				</Row>
				<Row className="my-3">
					<Col xs="12">
						<h3 className="mb-3 c-table__title">Commissions</h3>
						<p>Table here</p>						
					</Col>
				</Row>
				<Row className="my-3">
					<Col xs="12">
						<h3 className="mb-3 c-table__title">Players</h3>
						<p>Table here</p>
					</Col>
				</Row>
			</Fragment>
		)
	}
}

AffiliateOverView.propTypes = {
	// data: PropTypes.object,
	affData: PropTypes.object
}

// const queryListOptions = { 
// 	options: props => {
// 		const affiliateID = props.affiliateId
// 		const q = ''
// 		return {
// 			variables: {
// 				offset: 0,
// 				limit: 5,
// 				sortBy: 'DateModified',
// 				sortOrder: 'DESC',
// 				...helper.GetQueryMeta('getQueryVariables', AffiliateTransaction, 'AffiliateTransaction', q),
// 				...helper.GetQueryMeta('getQueryVariables', Commission, 'Commission', q),

// 				// Page Specific Variables
// 				AffiliateId: affiliateID ? affiliateID : null,
// 				export: false
// 			},
// 			notifyOnNetworkStatusChange: true,
// 			fetchPolicy: 'network-only',
// 		}
// 	}
// }

// export default compose(
// 	graphql(getCommissions(), queryListOptions, {name: 'commissionsQuery'}),
// 	graphql(getAffiliateTransactions(), queryListOptions, {name: 'affTransactionsQuery'}),
// )(AffiliateOverView)

export default AffiliateOverView