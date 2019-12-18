import React, { Component } from 'react'
import { withApollo } from 'react-apollo'
import gql from 'graphql-tag'
import PropTypes from 'prop-types'

class GrabUnGrab extends Component {

	executeGrabUnGrab = () => {
		const variablesConfig = {
			mutation: grabUnGrabMutation,
			variables: {
				Id: this.props.transactionGrabId || 0,
				TransactionType: this.props.transactionModule,
				SourceObjectId: this.props.transactionId,
				Assignee: this.props.userInfo.userName,
				UserId: this.props.userInfo.userId,
				IsGrabbed: true
			},
			fetchPolicy: 'network-only'
		}
		try {
			this.props.client.mutate(variablesConfig).then(() => window.location.reload())
		} catch (error) {
			// console.log(error)
		}
	}

	render() {
		const buttonClassName = this.props.transactionGrabId 
			? 'btn btn-sm btn-outline-secondary btn-outline-warning' 
			: 'btn btn-sm btn-outline-secondary btn-outline-success'
		return  (
			<button className={buttonClassName} title="Grab" onClick={this.executeGrabUnGrab}>
				<i className={this.props.transactionGrabId ? 'fa fa-hand-lizard-o' : 'fa fa-hand-grab-o'}></i>
				{this.props.transactionGrabId ? ' UnGrab' : ' Grab'}
			</button>
		)
	}
}

const grabUnGrabMutation = gql`
  mutation grabUnGrab(
	$Id: ID!,
	$TransactionType: SystemModulesIntTypeEnum!,
	$SourceObjectId: ID!,
	$Assignee: String!,
	$UserId: String!
  ){
	actionTransactionGrabUnGrabMutation(
	  entity:{
		Id: $Id,
		TransactionType: $TransactionType,
		SourceObjectId: $SourceObjectId,
		Assignee: $Assignee,
		UserId: $UserId
	  }
	){
		Id
	}
  }
`

GrabUnGrab.propTypes = {
	transactionId: PropTypes.string,
	transactionGrabId: PropTypes.string,
	transactionModule: PropTypes.string,
	userInfo: PropTypes.object,
	client: PropTypes.object
}

export default withApollo(GrabUnGrab)