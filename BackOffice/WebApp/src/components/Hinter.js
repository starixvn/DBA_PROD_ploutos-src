import React, { Component, Fragment } from 'react'
import PropTypes from 'prop-types'

import Tooltip from 'reactstrap/lib/Tooltip'

export default class Hinter extends Component {

	static propTypes = {
		content: PropTypes.string,
		hintId: PropTypes.string
	}

	constructor() {
		super()

		this.toggle = this.toggle.bind(this)
		this.state = {
			tooltipOpen: false
		}
	}

	toggle() {
		this.setState({
			tooltipOpen: !this.state.tooltipOpen
		})
	}

	render() {
		const { hintId, content } = this.props

		return (
			<Fragment>
				<i className="fa fa-question-circle-o" aria-hidden="true" id={hintId}></i>
				<Tooltip 
					placement="bottom" 
					isOpen={this.state.tooltipOpen} 
					target={hintId} 
					toggle={this.toggle}
				>
					{ content }
				</Tooltip>
			</Fragment>
		)
	}
}