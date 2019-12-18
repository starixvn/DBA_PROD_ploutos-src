import React, { Component, Fragment } from 'react'
import { graphql } from 'react-apollo'
import gql from 'graphql-tag'
import PropTypes from 'prop-types'
import { Card } from 'reactstrap'

import Loader from '../../../../components/Loader'

class CampaignLevelView extends Component {

	handleGoBack() {
		this.props.history.goBack()
	}

	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'
    
		if (this.props.data.loading) return loader
		if (this.props.data.error) return errorLoad

		const data = this.props.data.campaignDetailLevel[0]
        
		return (
			<Fragment>            
				<div className="mb-3 c-table__title">
                    Campaign Level: { data.LevelDescription }
					<span className="text--tiny float-right c-backlink" onClick={this.handleGoBack.bind(this)}>
                        &laquo; Back
					</span>
				</div>
				<Card body>
					<dl className="c-dl--inline">
						<dt>Level Code</dt>
						<dd><span>{data.LevelCode}</span></dd>
						<dt>Level Description</dt>
						<dd><span>{data.LevelDescription}</span></dd>
						<dt>Date Created</dt>
						<dd><span>{data.DateCreated}</span></dd>
						<dt>Created By</dt>
						<dd><span>{data.CreatedById}</span></dd>
						<dt>Date Created</dt>
						<dd><span>{data.DateCreated}</span></dd>
						<dt>Modified By</dt>
						<dd><span>{data.ModifiedById}</span></dd>
						<dt>Status</dt>
						<dd><span>{data.ActiveRecord ? 'Active' : 'Inactive'}</span></dd>
					</dl>
				</Card>
			</Fragment>
		)
	}
}

CampaignLevelView.propTypes = {
	data: PropTypes.object,
	history: PropTypes.object
}

const queryOptions = { 
	options: props => ({
		variables: {
			Id: props.match.params.id,
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

const query = gql`
  query QUERY_VIEW(
        $Id: ID!,
    ){
        campaignDetailLevel(Id:$Id){
            Id
            LevelCode
            LevelDescription
            DateCreated
            CreatedById
            DateModified
            ModifiedById
            ActiveRecord
        }
    }
`

export default graphql(query, queryOptions)(CampaignLevelView)