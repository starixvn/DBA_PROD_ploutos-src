import React, { Component, Fragment } from  'react'
import {
	Row, Col,
	ListGroup, ListGroupItem,
	Form, FormGroup, Input,
	Button
} from 'reactstrap'
import { graphql, compose } from 'react-apollo'
import gql from 'graphql-tag'
import pagination from 'pagination-object-generator'
import PropTypes from 'prop-types'

import Paginator from './Paginator'
import Loader from './Loader'
import { SuccessHandler, ErrorHandler } from '../utils/ResponseHandler'

class CommentList extends Component {
	constructor() {
		super()
		this.state = {
			showForm: false
		}
		this.handleSubmitForm = this.handleSubmitForm.bind(this)
	}

	// Toggle Add Comment Form
	handleFormToggle() {
		this.setState(prevState => ({
			showForm: !prevState.showForm
		}))
	}

	// Submit New Comment
	handleSubmitForm(e) {
		e.preventDefault()
		const data = new FormData(e.target)
			
		if (data.get('comment').length !== 0) {
			this.props.mutate({
				variables: {
					Note: data.get('comment')
				}
			})
				.then(() => SuccessHandler({
					context: this.props.context, 
					callback: this.props.data.refetch(),
					message: 'Comment added successfully.'
				}))
				.catch(error => ErrorHandler({
					context: this.props.context,
					error: { error }
				}))
		} else {
			ErrorHandler({
				context: this.props.context,
				error: 'No text added.'
			})
		}
	}

	// Pagination
		paginateListing = v => {
			const { offset } = v

			this.props.data.refetch({
				offset: offset
			})
		} 
	
	// Handle Limit Change
		handleListLimitChange(limit) {
			this.props.data.refetch({
				limit: parseInt(limit),
				offset: 0 // Reset 'offset' to 0 to prevent error
			})
		}
	
		render() {
			const loader = <Loader />
			const errorLoad = 'An unexpected error occurred'

			if (this.props.data.loading) return loader
			if (this.props.data.error) return errorLoad
		
			const dataSrc = this.props.data.commentList
			const { items } = dataSrc 
			const { offset, limit, totalCount } = dataSrc.pagingInfo
			const pager = pagination(offset, limit, totalCount, 5)
			const paginatorProps = {
				pager: pager, 
				count: totalCount,
				align: 'right',
				paginate: this.paginateListing.bind(this)
			}
			let commentContent = ''

			if (items.length === 0) {
				commentContent = (
					<ListGroupItem className="p-4">No comment to display.</ListGroupItem>
				)
			} else {
				commentContent =  items.map((d, i) => {
					return (
						<ListGroupItem key={i}>
							{d.Note}
							<br/>
							<span className="text-muted">{d.CommentedBy} - {d.DateCreated}</span>
						</ListGroupItem>
					)
				})
			}
		
			return (
				<Fragment>
					<Row>
						<Col xs="6">
							<Button className="btn btn-outline-info btn-sm" onClick={this.handleFormToggle.bind(this)}>
								<i className="fa fa-plus"></i>{' '}
							Add New Comment
							</Button>
						</Col>
						<Col xs="6">
							<Paginator {...paginatorProps}/>
						</Col>
					</Row>
					{ this.state.showForm && (                    
						<Form onSubmit={this.handleSubmitForm} className="my-2">
							<FormGroup>
								<Input 
									type="textarea" 
									rows="5" 
									autoFocus 
									name="comment" 
									id="commentBox" 
									className="mb-2"
									style={{ 'resize': 'vertical' }}
								/>
								<Button size="sm" color="success">Submit</Button>{' '}
								<Button size="sm" color="light" onClick={this.handleFormToggle.bind(this)}>Cancel</Button>
							</FormGroup>
						</Form>
					)}
					<Row className="my-2">
						<Col xs="12">
							<ListGroup>
								{ commentContent }                            
							</ListGroup>
						</Col>
					</Row>
					<Row>
						<Col xs="6">
							{/* <ListLimiter onChangeLimit={this.handleListLimitChange.bind(this)} /> */}
						</Col>
						<Col xs="6">
							<Paginator {...paginatorProps}/>
						</Col>
					</Row>
				</Fragment>
			)
		}

}

CommentList.propTypes = {
	data: PropTypes.object,
	context: PropTypes.object,
	mutate: PropTypes.func
}

CommentList.contextTypes = {
	userInfo: PropTypes.object
}

const queryOptions = {
	options: ownProps => ({
		variables: {
			offset: 0,
			limit: 10, //parseInt(helper.GetInitLimitValue()),
			SourceObject: ownProps.type,
			SourceObjectId: ownProps.itemID,
			sortBy: 'DateCreated',
			sortOrder: 'DESC'
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	})
}
  
const query = gql`
	query QUERY_COMMENT_LIST(
		$offset: Int!,
		$limit: Int!,
		$SourceObject: SystemModulesTypeEnum
		$SourceObjectId: ID
		$sortBy: CommentSortingFields!
		$sortOrder: SortingOrder!
	){
		commentList(
			count: true, 
			paging: { offset: $offset, limit: $limit }
			filter: {
				SourceObject: { parameter: $SourceObject, expression: EQUALS }
				SourceObjectId: { parameter: $SourceObjectId, expression: EQUALS }
			},
			sort: {
				field: $sortBy
				order: $sortOrder
			}
		){
			pagingInfo{
				offset
				limit
				totalCount
			}
			items{
				Id
				SourceObject
				SourceObjectId
				SourceObjectName
				CommentedBy
				Note
				CreatedById
				DateCreated      
			}
		}
	}
`

const mutationOptions = {    
	options: props => ({
		variables: {
			Id: 0,
			SourceObject: props.type,
			SourceObjectId: props.itemID,
			CommentedBy: props.context.userInfo.userName
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

const mutation = gql`
	mutation MUTATE_NEW_COMMENT(
		$Id: ID!
		$SourceObject: SystemModulesTypeEnum!
		$SourceObjectId: ID!
		$Note: String!
		$CommentedBy: String!
	){
		commentMutation(
			entity: {
				Id: $Id
				SourceObject: $SourceObject
				SourceObjectId: $SourceObjectId
				Note: $Note
				CommentedBy: $CommentedBy
			}
		){
			Id
			SourceObject
			SourceObjectId
			SourceObjectName
			CommentedBy
			Note
			CreatedById
			ModifiedById
			DateCreated
			DateModified
			ActiveRecord
		}
	}
`

export default compose(
	graphql(query, queryOptions),
	graphql(mutation, mutationOptions)
)(CommentList)