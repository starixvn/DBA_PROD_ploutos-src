import React, { Component } from 'react'
import PropTypes from 'prop-types'
import {
	Row,
	Col,
	Card,
	CardBody
} from 'reactstrap'
import ChartRegistrationPerCurrency from '../../Charts/ChartRegistrationPerCurrency'
import ChartDepositPerCurrency from '../../Charts/ChartDepositPerCurrency'
import ChartDepositPerStatus from '../../Charts/ChartDepositPerStatus'
import ChartWithdrawalPerCurrency from '../../Charts/ChartWithdrawalPerCurrency'
import ChartAutomaticBonusPerCurrency from '../../Charts/ChartAutomaticBonusPerCurrency'
import ChartPlayerWinPerCurrency from '../../Charts/ChartPlayerWinPerCurrency'
import ChartPlayerLossPerCurrency from '../../Charts/ChartPlayerLossPerCurrency'

class Dashboard extends Component {
	render() {
		return (
			<div className="animated fadeIn">
				{/*<Row>
					<Col xs="12" sm="12" lg="12">
						<div className="chart-wrapper" style={{ height: '900px', marginBottom: '20px'}}>
							<iframe src="https://bi-prod.globalcomrci.com/zoomdata/visualization/596700354f0c79f24f2409a5+5b21bf09a9aa44ac994cf5d9?__target=embedded&key=cuP2RXR6ar"style={{ border: '0px'}} width="100%" height="900"/>
						</div>
					</Col>
				</Row>*/}
				<Row>
					{ this.props.handleElementAccess('walletWinChart') && <ChartPlayerWinPerCurrency /> }
					{ this.props.handleElementAccess('walletLossChart') && <ChartPlayerLossPerCurrency /> }
					{ this.props.handleElementAccess('walletDepositChart') && <ChartDepositPerCurrency /> }
					{ this.props.handleElementAccess('walletDepositChart') && <ChartDepositPerStatus /> }
					{ this.props.handleElementAccess('walletDepositChart') && <ChartAutomaticBonusPerCurrency /> }
					{ this.props.handleElementAccess('walletWithdrawalChart') && <ChartWithdrawalPerCurrency /> }
					{ this.props.handleElementAccess('playerProfileChart') && <ChartRegistrationPerCurrency /> }
				</Row>
			</div>
		)
	}
}

Dashboard.propTypes = {
	handleElementAccess: PropTypes.func
}

export default Dashboard
