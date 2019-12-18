import React, { Component } from 'react'
import { Input } from 'reactstrap'
import PropTypes from 'prop-types'
import { GetLocalData, SetLocalData } from '../utils/CoreHelpers'

export default class ListLimiter extends Component {

	// Handle Limit Change
	handleListLimitChange = e => {
		SetLocalData('setListLimit', e.target.value)
		this.props.onChangeLimit(e.target.value)
	}

	// Get Initial Limit Value
	// Get from LocalStorage or set default 
	getInitLimitValue = () => {
		if(this.props.defaultValue){return this.props.defaultValue;}
		return GetLocalData('setListLimit') ? GetLocalData('setListLimit') : '10'
	}

	render() {
		const offsetViewClass = {    
			display: 'inline-block',
			width: 'auto',
			margin: '0 5px',
			padding: '0',
			fontSize: '10px',
			height: '1.5rem',
		}

		return (
			<div className="my-2 text-muted">
				View
				<Input type="select"
					value={ this.getInitLimitValue() }
					onChange={ this.handleListLimitChange.bind(this) }
					style={ offsetViewClass }>
					<option value="10">10</option>
					<option value="25">25</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</Input>
				items.
			</div>
		)
	}
}

ListLimiter.propTypes = {
	onChangeLimit: PropTypes.func,
	defaultValue: PropTypes.number
}