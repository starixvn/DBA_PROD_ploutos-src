import React, { Component, Fragment } from 'react'
import { graphql, compose } from 'react-apollo'
import gql from 'graphql-tag'
import PropTypes from 'prop-types'
import Loader from './Loader'

class SystemInfo extends Component {

	render(){
		const loader = <Loader />
		const errorLoad = err => `An unexpected error occurred. --> ${err.message}`

		if (this.props.data.loading) return loader
		if (this.props.data.error) return errorLoad(this.props.data.error)

		const { createdDate, modifiedDate } = this.props
		const { CreatedBy, UpdatedBy } = this.props.data.systemInfo[0];
		const items = [
			 { label: 'Created By', value: CreatedBy }
			,{ label: 'Created Date', value: createdDate }
			,{ label: 'Modified By', value: UpdatedBy }
			,{ label: 'Modified Date', value: modifiedDate }
		]

		const fields = items.map((item, i) => {
			return (
				<Fragment key={i}>
					<dt>{item.label}:</dt>
					<dd>
						<span>{item.value || '---'}</span>
					</dd>
				</Fragment>
			)
		})

		return (
			<dl className="c-dl--inline">
				{ fields }
			</dl>
		)
	}

}

// SystemInfo.propTypes = {
// 	createdById: PropTypes.string,
// 	createdDate: PropTypes.string,
// 	modifiedById: PropTypes.string,
// 	modifiedDate: PropTypes.string,
// }

// export default SystemInfo

const queryOptions = {
    options: ownProps => ({
        variables: {
            CreatedBy: ownProps.createdById,
            UpdatedBy: ownProps.modifiedById
        },
        notifyOnNetworkStatusChange: true,
        fetchPolicy: 'network-only'
    })
}
  
const query = gql`
    query USER_VIEW(
        $CreatedBy: String
        $UpdatedBy: String
    ){
        systemInfo(CreatedBy: $CreatedBy, UpdatedBy: $UpdatedBy){
            CreatedBy
            UpdatedBy
        }
  }
`

export default compose(
    graphql(query, queryOptions)
)(SystemInfo)