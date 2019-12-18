import React, { Component } from 'react'
import { CSVLink } from 'react-csv'
import { withApollo } from 'react-apollo'
import PropTypes from 'prop-types'
import moment from 'moment'
import { Button } from 'reactstrap'

class Export extends Component {

	state = {
		headers: null,
		data: null,
		downloading: false
	}

	executeExport = async () => {
		// console.log('executeExport')
		if (this.state.headers == null && this.state.data == null) {
			this.setState({
				downloading: true
			})

			let formatedHeader = []
			const variablesConfig = {
				query: this.props.exportQuery,
				variables: {
					...this.props.exportQueryVariables,
					limit: this.props.exportItemCount,
					export: true
				},
				fetchPolicy: 'network-only'
			}
			try {
				await this.props.client.query(variablesConfig).then(res => {
					// GENERATE HEADER
					this.props.exportDataHeader.map(h => {
						formatedHeader.push({
							label: h.title,
							key: h.field
						})
					})
					this.setState({
						headers: formatedHeader,
						data: res.data[this.props.exportQueryDataKey].items,
						downloading: false
					})
					this.triggerLinkClick.link.click()
				})
			} 
			catch (error) {
				// console.log(error)
			}
		} else {
			this.triggerLinkClick.link.click()
		}
	}
	render() {
		return (
			<Button
				color="secondary"
				size="sm"
				disabled={this.state.downloading}
				title="Export Data"
				className="float-right ml-1 my-1 px-2 py-1"
				onClick={this.executeExport}>
				<CSVLink
					ref={input => { this.triggerLinkClick = input }}
					style={{ display: 'none' }}
					filename={String(this.props.exportQueryDataKey) + this.props.exportQueryCustomFileName + '-' + String(moment().format('YYYY-MM-DD-h-mm-ss-a')) + '.csv' || 'UnNamedFile.csv'}
					headers={this.state.headers || []}
					data={this.state.data || []}>
				</CSVLink>
				<i className="fa fa-download"></i>{' '}
				{(this.state.downloading) ? ' Processing' : ' Export'}
			</Button>
		)
	}
}

Export.propTypes = {
	data: PropTypes.object,
	client: PropTypes.object,
	exportQuery: PropTypes.object,
	exportQueryVariables: PropTypes.object,
	exportQueryDataKey: PropTypes.string,
	exportQueryCustomFileName: PropTypes.string,
	exportDataHeader: PropTypes.array,
	exportItemCount: PropTypes.number
}

export default withApollo(Export)