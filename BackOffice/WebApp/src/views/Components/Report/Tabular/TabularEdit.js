/* eslint-disable react/no-deprecated */
import React, {  Component, Fragment } from 'react'
import PropTypes from 'prop-types'
import {  Row, Col, Table, Card, CardHeader, CardBody, Form } from 'reactstrap'
import TabularFactory from '../../../../components/TabularFactory'
import TabularReportResult from './TabularReportResult'
import {  graphql, compose, withApollo } from 'react-apollo'
import * as query from './Tabular.gql'
import * as form from '../../../../utils/FormHelpers'
import {  ErrorHandler } from '../../../../utils/ResponseHandler'

class TabularEdit extends Component { 
	state = { 
		ReportConfig: { },
		refreshPreview: false
	}
	componentWillReceiveProps(nextProps){ 
		if (nextProps.data && !nextProps.data.loading){ 
			this.setState(
				{  ReportConfig:JSON.parse(nextProps.data.tabularReport[0].ReportConfig) }
			)
		}
	}

	handleTabularPreview(factoryStates){ 
		this.setState({ ReportConfig:factoryStates, refreshPreview: !this.state.refreshPreview })
	}

	handleTabularSave(factoryStates){ 
		let errorList = []
		if (factoryStates.length == 0){ 
			errorList.push('Please fill-up necessary fields.')
		}
		if (!factoryStates.reportName){ 
			errorList.push('Report Name is required.')
		}
		if (!factoryStates.candidateModule){ 
			errorList.push('Module is required.')
		}
		if (factoryStates.tabularColumns == 0){ 
			errorList.push('Please select at least 1 column for reports.')
		}

		if (errorList.length > 0){ 
			errorList.map(error => { 
				ErrorHandler({ 
					context: this.context,
					error: error,
					callback: typeof callback === 'function' ? callback() : ''
				})
			})
		} else { 
			const entity = { 
				Id: this.props.match.params.id || 0,
				ReportName: factoryStates.reportName,
				ReportConfig: JSON.stringify(factoryStates),
				Roles: this._formatRoles(factoryStates.roles),
				ActiveRecord: true
			}
			form.submitForm({  props: this.props, context: this.context, entity })
		}
	}
	// HELPER
	_formatRoles(roles){ 
		let roleList = []
		roles.map((role, i) => { 
			roleList.push(role.value)
		})
		return roleList.join(',')
	}
	render() { 
		if (this.props.data && this.props.data.loading){ 
			return (
				<Fragment>
					<p>Loading...</p>
				</Fragment>
			)
		}
		const reportConfig = { ReportConfig: this.state.ReportConfig, refreshPreview: this.state.refreshPreview }
		return (
			<div className="animated fadeIn">
				<Fragment>
					<Card>
						<CardHeader>
							<i className="fa fa-filter"></i> 
							<strong>Tabular Reports</strong>
						</CardHeader>
						<CardBody>
							<TabularFactory tabularConfig={ reportConfig.ReportConfig} onPreview={ e => this.handleTabularPreview(e) } onSave={ e => this.handleTabularSave(e) }/>
						</CardBody>
						<CardBody>
							<TabularReportResult renderMode={ 'edit'} { ...reportConfig}/>
						</CardBody>
					</Card>
				</Fragment>
			</div>
		)
	}
}

TabularEdit.contextTypes = { 
	userAccess: PropTypes.array,
	userInfo: PropTypes.object,
	handleElementAccess: PropTypes.func,
	onAlert: PropTypes.func,
	onGoBack: PropTypes.func
}

const queryDetailOptions = { 
	skip: props => props.isTabDisplayed || props.match !== undefined && props.match.params.action === 'list' || props.match.params.action === 'add',
	options: props => ({ 
		variables: { 
			Id: props.match.params.id
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	})
}

const mutationOptions = { 
	options: props => { 
		return { 
			variables: { 
				Id: props.match.params.id || 0,
			},
			notifyOnNetworkStatusChange: true,
			fetchPolicy: 'network-only'
		}
	}
}

export default compose(
	graphql(query.mutateTabularReport(), mutationOptions),
	graphql(query.getTabularReport(), queryDetailOptions),
)(TabularEdit)