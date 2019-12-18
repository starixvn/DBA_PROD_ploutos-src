import React, { Component, Fragment } from 'react'
import { Link } from 'react-router-dom'
import { Row, Col } from 'reactstrap'
import { graphql } from 'react-apollo'
import gql from 'graphql-tag'
import pagination from 'pagination-object-generator'
import PropTypes from 'prop-types'

import Paginator from '../../../../components/Paginator'
import TableData from '../../../../components/TableData'
import Loader from '../../../../components/Loader'
import { CampaignLevelList as tableHeaders } from '../../../../data/TableHeaders'

class CampaignLevelList extends Component {
	constructor() {
		super()
		this.state = {
			sortBy: 'DateModified',
			sortOrder: 'DESC'
		}
	}

	paginateListing = (v) => {
		this.props.data.refetch({
			offset: v
		})
	}

	// table column sorting
	handleSortBy = (f) => {
		const order = (this.state.sortBy === f) && (this.state.sortOrder === 'ASC') ? 'DESC' : 'ASC'

		if (f.length === 0) return

		this.setState({
			sortBy: f,
			sortOrder: order
		}, () => {
			this.props.data.refetch({
				sortBy: this.state.sortBy, // new value
				sortOrder: this.state.sortOrder
			})
		})
	}

	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'

		if (this.props.data.loading) return loader
		if (this.props.data.error) return errorLoad

		const dataSrc = this.props.data.campaignDetailLevelList
		const { items } = dataSrc
		const { offset, limit, totalCount } = dataSrc.pagingInfo
		const pager = pagination(offset, limit, totalCount, 5)

		return (
			<Fragment>

				<div className="mb-3 c-table__title">
					Campaign Level List
					<span className="text--tiny float-right">
						Showing <strong>{totalCount}</strong> items
					</span>
				</div>

				<Row className="mb-3">
					<Col>
						<Link to="/bonus/campaignlevel/add"><button className="btn btn-sm btn-primary">Add New</button></Link>
					</Col>
				</Row>

				<TableData
					data={items}
					headers={tableHeaders}
					sortby={this.state.sortBy}
					sortorder={this.state.sortOrder}
					sort={this.handleSortBy}
				/>

				<Paginator
					pager={pager}
					paginate={this.paginateListing}
				/>

			</Fragment>
		)
	}
}

CampaignLevelList.propTypes = {
	data: PropTypes.object
}

const queryOptions = {
	options: () => ({
		variables: {
			offset: 0,
			limit: 10,
			sortBy: 'DateModified',
			sortOrder: 'DESC'
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

const query = gql`
  query QUERY_LIST(
	  $offset: Int!,
	  $limit: Int!,
	  $sortBy: CampaignDetailLevelSortingFields!,
	  $sortOrder: SortingOrder!,
	){
	  campaignDetailLevelList(
		count:true,
		paging:{
		  offset:$offset
		  limit:$limit
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
		  LevelCode
		  LevelDescription
		  DateModified
		  ModifiedById
		  ActiveRecord
		}
	  }
  }
`

export default graphql(query, queryOptions)(CampaignLevelList)
