import React, { Component, Fragment } from 'react'
import PropTypes from 'prop-types'

class EmailFormatViewer extends Component {
	render() {
		return (
			<Fragment>
				<div dangerouslySetInnerHTML={{ __html: this.props.htmlString }} />
			</Fragment>
		)
	}
}

EmailFormatViewer.propTypes = {
	htmlString: PropTypes.string
}


EmailFormatViewer.defaultProps = {
	htmlString: '<div></div>'
}

export default EmailFormatViewer;