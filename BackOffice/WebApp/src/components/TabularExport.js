import React, { Component } from 'react'
import { CSVLink } from 'react-csv'
import { withApollo } from 'react-apollo'
import PropTypes from 'prop-types'
import moment from 'moment'
import { Button } from 'reactstrap'

class TabularExport extends Component {

	state = {
		headers: null,
		data: null,
		downloading: false
	}

	executeExport = async () => {
		if (this.state.headers == null && this.state.data == null) {
			this.setState({
				downloading: true
			})

			let formatedHeader = []
			const variablesConfig = {
				query: this.props.exportQuery,
				variables: {
					config: { ...this.props.exportQueryVariables, export: true, count: false}
				},
				fetchPolicy: 'network-only'
			}
			try {
				await this.props.client.query(variablesConfig).then(res => {
					// GENERATE HEADER
					this.props.exportQueryVariables.tabularColumns.map(h => {
						if(h.display){
							formatedHeader.push({
								label: h.field,
								key: h.field
							})
						}
					})

					// INSERT TOTALs AT THE BOTTOM
					const { TabularData } = res.data.tabularReportGenerator[0];
					const { items, pagingInfo } = TabularData;
					
					let dataSets = items;
					if(pagingInfo.sums.length > 0){
						dataSets.push(pagingInfo.sums[0]);
					}
					
					this.setState({
						headers: formatedHeader,
						data: dataSets,
						downloading: false
					})
					this.triggerLinkClick.link.click()
				})
			} 
			catch (error) {
				console.log(error)
			}
		} else {
			this.triggerLinkClick.link.click()
		}
	}

	render() {
		return (
			<Button
				disabled={(this.state.downloading) ? true : false}
				title="Export Data"
				className="badge badge-secondary ml-2 px-2 py-1"
				onClick={this.executeExport}>
				<CSVLink
					ref={input => { this.triggerLinkClick = input }}
					style={{ display: 'none' }}
					filename={String(this.props.exportQueryVariables.reportName) + '-' + String(moment().format('YYYY-MM-DD-h-mm-ss-a')) + '.csv' || 'UnNamedFile.csv'}
					headers={this.state.headers || []}
					data={this.state.data || []}>
				</CSVLink>
				<i className="fa fa-download"></i>{' '}
				{(this.state.downloading) ? ' Processing' : ' Export'}
			</Button>
		)
	}
}

TabularExport.propTypes = {
	exportQuery: PropTypes.object,
	exportQueryVariables: PropTypes.object,
}

export default withApollo(TabularExport)