import React, { Component } from 'react'
import PropTypes from 'prop-types'

export default class ErrorBoundary extends Component {

	static propTypes = {
		children: PropTypes.node
	}

	state = {
		error: null,
		errorInfo: null
	}

	componentDidCatch(error, errorInfo) {
		this.setState({
			error: error,
			errorInfo: errorInfo
		})
		// You can also log error messages to an error reporting service here
	}

	render() {
		if (this.state.errorInfo) {
			return (
				<div className="app align-items-center" style={{ minHeight: 'auto' }}>
					<img src="/img/error.png" alt="Ooops, Error!" width="250" />
					<h3 className="my-3">Ooops! Something went wrong.</h3>
					<p>Please report to the awesome Dev Team so they can get the error fixed.</p>
					<div>
						<button className="btn btn-primary btn-sm" onClick={() => window.location.reload()}>Refresh page</button>{' '}
						<button className="btn btn-warning btn-sm" onClick={() => window.history.back()}>Go back</button>
					</div>
					<br/>
					<details style={{ whiteSpace: 'pre-wrap' }}>
						{this.state.error && <p>The error: {this.state.error.toString()}</p>}
						<p>Where it occured: {this.state.errorInfo.componentStack}</p>
					</details>
				</div>
			)
		}

		return this.props.children
	}	
}