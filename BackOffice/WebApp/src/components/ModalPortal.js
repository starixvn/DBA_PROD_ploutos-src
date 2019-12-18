import React, { Component } from 'react'
import ReactDOM from 'react-dom' 
import PropTypes from 'prop-types'
import {
	Button, Modal, ModalBody
} from 'reactstrap' 

const modalRoot = document.getElementById('modal-root')

export default class ModalPortal extends Component {
	
	el = document.createElement('div')        

	handleClose() {
		this.props.onClose()
	}
	
	componentDidMount() {
		modalRoot.appendChild(this.el)
	}
	
	componentWillUnmount() {
		modalRoot.removeChild(this.el)
	}

	render() {
		const modalTemp = (
			<Modal 
				isOpen={this.props.isOpen} 
				size={this.props.size} 
				style={this.props.style}>

				<ModalBody style={this.props.bodyStyle}>
					{ this.props.children }
				</ModalBody>

				<Button 
					color="dark"
					style={{ position: 'absolute', top: '-15px', right: '-15px' }}
					className="rounded-circle"
					title="Close"
					onClick={this.handleClose.bind(this)}>
					&times;
				</Button>

			</Modal>
		)

		return (
			ReactDOM.createPortal(
				modalTemp,
				this.el,
			)            
		)
	}
}

ModalPortal.propTypes = {
	onClose: PropTypes.func,
	isOpen: PropTypes.bool,
	size: PropTypes.string,
	style: PropTypes.object,
	bodyStyle: PropTypes.object,
	children: PropTypes.node
}