import React, { Component, Fragment } from 'react'
import { withApollo } from 'react-apollo'
import PropTypes from 'prop-types'
import Select, { Async } from 'react-select'
import gql from 'graphql-tag'
import 'react-select/dist/react-select.css'

class SelectSearchRecordsAsync extends Component {
	constructor(props) {
		super(props)
		this.timer = null;
	}
	handleChange = selectedOptions => {
		this.props.onChange(selectedOptions);
	}
	getAsyncOptions = (input, callback) => {
		clearTimeout(this.timer)
		this.timer = setTimeout(() => {
			const searchConf = this.props.searchConfig
			var variablesConfig = {
				query: gql`
					query QUERY_SELECT_SEARCH{
						${searchConf.graphQLEndpoint}(
							count: false, 
							paging: {offset: 0, limit: 50}, 
							filter: {${searchConf.label}: {parameter: "${input}", expression: CONTAINS}}) {
							pagingInfo{
								offset
								limit
								totalCount
							}
							items {
								${searchConf.value}
								${searchConf.label}
							}
						}
					}
				`,
			}
			this.props.client.query(variablesConfig).then(res => {
				let options = {
					options: [],
					complete: true
				}
				res.data[searchConf.graphQLEndpoint].items.map(option => {
					options.options.push({
						value: option[searchConf.value], 
						label: option[searchConf.label]
					})
				})
				callback(null, options)
			})
		}, 500)
	}

	render() {
		const { multi, searchable, disabled, value } = this.props;
		return (
			<Fragment>
				<Async
					value={value}
					multi={multi}
					searchable={searchable}
					disabled={disabled}
					onChange={this.handleChange}
					loadOptions={this.getAsyncOptions}
				/>
			</Fragment>
		)
	}
}

SelectSearchRecordsAsync.propTypes = {
	value: PropTypes.oneOfType([PropTypes.object, PropTypes.array, PropTypes.string]),
	multi: PropTypes.bool,
	disabled: PropTypes.bool,
	searchable: PropTypes.bool,
	onChange: PropTypes.func,
	searchConfig: PropTypes.object
}

export default withApollo(SelectSearchRecordsAsync)