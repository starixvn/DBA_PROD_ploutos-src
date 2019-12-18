import React, { Component } from 'react'
import PropTypes from 'prop-types'
import moment from 'moment'
// import DateTimeField from 'react-bootstrap-datetimepicker-custom-icons'
// import 'react-bootstrap-datetimepicker-custom-icons/css/bootstrap-datetimepicker.min.css'

import DateTime from 'react-datetime'
import 'react-datetime/css/react-datetime.css'

class DateAndTime extends Component {
	
	state = {
		dateTimePickerDefaults: {
			class: 'fa',
			time: 'fa-clock-o',
			calendar: 'fa-calendar',
			up: 'fa-chevron-up',
			down: 'fa-chevron-down',
			right: 'fa-chevron-right',
			left: 'fa-chevron-left',
			dateInputFormat: 'MM/DD/YYYY',
			inputFormat: 'YYYY-MM-DD HH:mm:ss'
		}
	}

	handleInputChange = () => e => {
		const { dateTimePickerDefaults } = this.state
		const momentDate = moment(e, dateTimePickerDefaults.dateInputFormat)
		let dateValue = (e != '') ? momentDate.format(dateTimePickerDefaults.inputFormat) : ''
		let objectValue = {
			target: {
				value: dateValue
			}
		}
		this.props.onChange(objectValue)
	}

	render() {
		// const dateDefaults = this.state.dateTimePickerDefaults
		const { value, position, disabled } = this.props;
		const placeHolderText = this.props.placeholder || 'Select Date';
		// const defaultInputValue = (value || value !== '') ? moment(value) : moment()
		
		return (
			// <DateTimeField
			// 	id={name}
			// 	iconStyle={dateDefaults}
			// 	format={dateDefaults.dateInputFormat}
			// 	inputFormat={dateDefaults.dateInputFormat}
			// 	mode="date"
			// 	viewMode="days"
			// 	dateTime={defaultInputValue.format(dateDefaults.dateInputFormat)}
			// 	// defaultText={defaultInputValue.format(dateDefaults.dateInputFormat) || defaultText } 
			// 	// defaultText='Select Date'
			// 	onChange={this.handleInputChange()}
			// 	inputProps={{ 'disabled': true, 'style': { 'backgroundColor': '#fff' } }} 
			// />

			<DateTime
				disabled={disabled}
				timeFormat={false}
				dateFormat='YYYY-MM-DD'
				value={
					position === 'search' 
						? moment(value)
						: (value || value !== '') ? moment(value) : moment()
				}
				onChange={this.handleInputChange()}
				inputProps={{ placeholder: placeHolderText, disabled: disabled }} 
			/>
		)
	}
}

DateAndTime.propTypes = {
	placeholder: PropTypes.string,
	disabled: PropTypes.bool,
	onChange: PropTypes.func,
	value: PropTypes.string,
	position: PropTypes.string,
}

export default DateAndTime