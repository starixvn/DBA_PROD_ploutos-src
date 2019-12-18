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
import { camelCaseToWords } from '../utils/CoreHelpers';

import Paginator from './Paginator'
import Loader from './Loader'

class AuditTrailList extends Component {
	constructor() {
		super();
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
			
			const dataSrc = this.props.data.auditTrailList
			const { items } = dataSrc 
			const { offset, limit, totalCount } = dataSrc.pagingInfo
			const pager = pagination(offset, limit, totalCount, 5)
			const paginatorProps = {
				pager: pager, 
				count: totalCount,
				align: 'right',
				paginate: this.paginateListing.bind(this)
			}
			let auditTrailContent = ''

			if (items.length === 0) {
				auditTrailContent = (
					<ListGroupItem className="p-4">No Audit trail to display.</ListGroupItem>
				)
			} else {
				auditTrailContent =  items.map((d, i) => {
					const trailItem = JSON.parse(d.AuditDescription);
					const lastIndex = trailItem.items.length - 1;

					let trailItemDisplay = trailItem.items.map((td, k) => {
						if(td.nv !== '' || td.ov !== ''){
							return (
								<span key={k} className="text-muted"><b>{camelCaseToWords(td.fld)}</b> changed from <u>{td.ov || 'null'}</u> to <u>{td.nv || 'null'}</u>{(lastIndex !== k && ' and ')}</span>
							)
						}
					});

					return (
						<ListGroupItem key={i}>
							{trailItemDisplay}
							<br/>
							<span className="text-muted">{d.RevisionBy} - {d.DateCreated}</span>
						</ListGroupItem>
					)
				})
			}
			
			return (
				<Fragment>
					<Row>
						<Col xs="6"></Col>
						<Col xs="6">
							<Paginator {...paginatorProps}/>
						</Col>
					</Row>
					<Row className="my-2">
						<Col xs="12">
							<ListGroup>
								{ auditTrailContent }                            
							</ListGroup>
						</Col>
					</Row>
					<Row>
						<Col xs="6"></Col>
						<Col xs="6">
							<Paginator {...paginatorProps}/>
						</Col>
					</Row>
				</Fragment>
			)
		}

}

AuditTrailList.propTypes = {
	data: PropTypes.object,
	context: PropTypes.object
}

AuditTrailList.contextTypes = {
	userInfo: PropTypes.object
}

const queryOptions = {
	options: ownProps => ({
		variables: {
			offset: 0,
			limit: 10,
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
	query QUERY_AUDIT_TRAIL_LIST(
		$offset: Int!,
		$limit: Int!,
		$SourceObject: SystemModulesTypeEnum
		$SourceObjectId: ID
		$sortBy: AuditTrailSortingFields!
		$sortOrder: SortingOrder!
	){
		auditTrailList(
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
		        AuditDescription
		        RevisionBy
		        DateCreated
			}
		}
	}
`

export default compose(
	graphql(query, queryOptions),
)(AuditTrailList)