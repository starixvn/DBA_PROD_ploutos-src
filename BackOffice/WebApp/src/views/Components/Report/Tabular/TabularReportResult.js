/* eslint-disable react/no-deprecated */
import React, { Component, Fragment } from 'react'
import PropTypes from 'prop-types'
import { graphql, compose } from 'react-apollo'

import { Row, Col, Table, Card, CardHeader, CardBody, Form } from 'reactstrap'
import TabularFactory from '../../../../components/TabularFactory'

import Paginator from '../../../../components/Paginator'
import Loader from '../../../../components/Loader'
import TabularExport from '../../../../components/TabularExport'
import ListLimiter from '../../../../components/ListLimiter'

import * as query from './Tabular.gql'
import * as form from '../../../../utils/FormHelpers'
import { numberWithCommas, HumanReadableFieldName } from '../../../../utils/CoreHelpers'
import pagination from 'pagination-object-generator'

class TabularReportResult extends Component {
	state = {
		ReportConfig: []
	}
	componentWillMount(){
		this.setState({
			ReportConfig: this.props.ReportConfig
		})
	}
	componentWillReceiveProps(nextProps){
		if (this.props.refreshPreview !== nextProps.refreshPreview){
			this.props.data.refetch()
		}
	}
	_handlePageFlips(data){
		this.setState({
			ReportConfig: { ...this.props.ReportConfig, offset: data.offset }
		})
		this.props.data.refetch({
			config: { ...this.props.ReportConfig, offset: data.offset }
		})
	}
	_handleListLimitChange(limit){
		this.setState({
			ReportConfig: { ...this.props.ReportConfig, limit: limit }
		})		
		this.props.data.refetch({
			config: { ...this.props.ReportConfig, limit: limit }
		})
	}
	// HELPER
	_getSumExistence(sums, field){
		let returnResult = ''
		sums.map((sum, i) => {
			if (sum[field]){
				returnResult = numberWithCommas(sum[field], 4)
				return
			}
		})
		return returnResult
	}
	_isNumber(fieldType){
		return (fieldType == 'Float' || fieldType == 'Integer') ? { textAlign: 'right' } : {}
	}
	_fieldRender(data, fieldType){
		return ((fieldType == 'Boolean') ? ((data) ? <i className="fa fa-check"></i> : <i className="fa fa-close text-secondary"></i>) : data);
	}
	_fieldFilterRender(data, fieldType){
		if (fieldType == 'Boolean'){
			return ((data == '') ? data : ((data) ? <i className="fa fa-check"></i> : <i className="fa fa-close text-secondary"></i>));
		}
		if (fieldType == 'ID' || fieldType.includes('TypeEnum')){
			let dataItems = []
			if (Array.isArray(data)){
				data.map((d, i) => {
					dataItems.push(d.label)
				})
				return dataItems.join(', ')
			}
			if (Object.getPrototypeOf(data) === Object.prototype){
				return data.label
			}
			return
		}
		return data
	}
	_renderActiveFilters(fields){
		if (this.props.renderMode == 'edit'){
			return
		}
		return (
			<Table className="table-clear table">
				<thead>
					<tr>
						<th style={{ borderTop: '0px' }} colSpan={4}>Active Filters:</th>
					</tr>
				</thead>
				<tbody>
					{fields.map((field, i) => {
						if (field.expression !== ''){
							return (<tr key={i}>
								<td className="left"><strong>{HumanReadableFieldName(field.fieldType, field.field)}</strong></td>
								<td className="right">{field.expression}</td>
								<td className="right"><strong>{this._fieldFilterRender(field.parameter, field.fieldType)}</strong></td>
								<td className="right"><strong>{this._fieldFilterRender(field.parameter_one, field.fieldType)}</strong></td>
							</tr>)
						}
					})}
				</tbody>
			</Table>
		)
	}

	render() {
		const loader = <Loader />
		const errorLoad = err => `An unexpected error occurred. --> ${err.message}`
		let resultMsg = (Object.keys(this.props.ReportConfig).length === 0) ? resultMsg = '' : resultMsg = 'Empty Result'

		if (this.props.data.loading) return loader
		if (!this.props.data.tabularReportGenerator) return loader
		if (this.props.data.error) return errorLoad(this.props.data.error)

		if (this.props.data.tabularReportGenerator[0].TabularData.length === 0){
			return (
				<div className="animated fadeIn">
					<Fragment><p>{resultMsg}</p></Fragment>
				</div>
			)
		}
		const { tabularColumns } = this.props.ReportConfig
		const tabColumnDisplay = tabularColumns.filter(header => header.display) // GET ONLY TAGGED AS DISPLAY
		const { items, pagingInfo } = this.props.data.tabularReportGenerator[0].TabularData
		const { sums, totalCount, limit, offset } = pagingInfo
		const paginatorProps = {
			pager: pagination(offset, limit, totalCount, 5),
			count: totalCount,
			align: 'right',
			paginate: this._handlePageFlips.bind(this)
		}

		return (
			<div className="animated fadeIn">
				<Fragment>
					<Card>
						<CardBody>
							<Row>
								<Col xs="12" md="6" lg="6">
									{this._renderActiveFilters(tabularColumns)}
								</Col>
							</Row>
							<Row>
								<Col className="c-table__title my-auto">
									<TabularExport exportQuery={query.getTabularReportGeneretor()} exportQueryVariables={this.state.ReportConfig}/>
								</Col>
								<Col>
									<Paginator {...paginatorProps}/>
								</Col>
							</Row>
							<Table>
								<thead>
									<tr>
										{tabColumnDisplay.map((header, ith) => {
											return (<th key={ith} style={this._isNumber(header.fieldType)}>{HumanReadableFieldName(header.fieldType, header.field)}</th>)
										})}
									</tr>
								</thead>
								<tbody>
									{items.map((d, itr) => {
										return (
											<tr key={itr}>
												{tabColumnDisplay.map((header, itd) => {
													return (<td key={itd} style={this._isNumber(header.fieldType)}>{this._fieldRender(d[header.field], header.fieldType)}</td>)
												})}
											</tr>
										)
									})}
									{sums.length > 0 && 
										<tr><td colSpan={tabColumnDisplay.length}>&nbsp;</td></tr>
									}
									{sums.length > 0 && 
										<tr><td colSpan={tabColumnDisplay.length} style={{ textAlign: 'right', borderTop: 'none' }}>Grand Total(s)</td></tr>
									}
									{sums.length > 0 &&
										<tr>
											{tabColumnDisplay.map((header, itd) => {
												return (<td key={itd} style={this._isNumber(header.fieldType)}>{this._getSumExistence(sums, header.field)}</td>)
											})}
										</tr>
									}
								</tbody>
							</Table>
							<Row className="c-table__footer my-1">
								<Col>
									<ListLimiter
										onChangeLimit={this._handleListLimitChange.bind(this)}
										defaultValue={limit}
									/>
								</Col>
								<Col>
									<Paginator {...paginatorProps}/>
								</Col>
							</Row>
						</CardBody>
					</Card>
				</Fragment>
			</div>
		)
	}
}

const queryReportOptions = {
	skip: props => props.ReportConfig.length == 0,
	options: props => ({
		variables: {
			config: props.ReportConfig
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	})
}


TabularReportResult.propTypes = {
	ReportConfig: PropTypes.object,
	renderMode: PropTypes.string
}

export default compose(
	graphql(query.getTabularReportGeneretor(), queryReportOptions)
)(TabularReportResult)
