import React, { Component } from 'react'
import PropTypes from 'prop-types'
import Alert from 'reactstrap/lib/Alert'

class FormAlert extends Component {

	onDismiss = () => {
		this.props.onAlert({
			isOpen: false,
			type: '',
			message: ''        
		})
	}    

	render() {
		let content = ''
		let errContent = ''
		let alertColor = type => {
			switch (type) {
			case 'success': return 'success'
			case 'error': return 'danger'
			default: return ''
			}
		}

		if ( Array.isArray(this.props.data) ) {
			errContent = (
				this.props.data.map((err, i) => (
					<li key={i} className="text-danger">{err}</li>
				))
			)
		}
		
		if (typeof this.props.data === 'string') {
			errContent = <li className="text-danger">{this.props.data}</li>
		}

		if (this.props.type === 'error') {
			content = (
				<ul className="mb-0">
					{ errContent }
				</ul>
			)
		}

		if (this.props.type === 'success') {
			content = (
				<div>
					<strong>Success!</strong> 
				</div>
			)
		}

		return (
			<Alert 
				color={ alertColor(this.props.type) } 
				isOpen={ this.props.isOpen } 
				toggle={ this.onDismiss } 
				className="c-notifAlert">
				{ content }
			</Alert>
		)
	}
}

FormAlert.propTypes = {
	data: PropTypes.string,
	onAlert: PropTypes.func,
	isOpen: PropTypes.bool,
	type: PropTypes.string
}

export default FormAlert