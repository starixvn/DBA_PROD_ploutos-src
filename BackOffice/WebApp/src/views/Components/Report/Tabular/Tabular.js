/* eslint-disable react/no-deprecated */
import React, { Component, Fragment } from 'react'
import { graphql, compose } from 'react-apollo'
import pagination from 'pagination-object-generator'
import PropTypes from 'prop-types'

import TabularReportResult from './TabularReportResult'
import TabularEdit from './TabularEdit'

import ListView from '../../../ListView'
import DetailView from '../../../DetailView'
import FormView from '../../../FormView'

import Loadabler from '../../../../components/Loadabler'
import Loader from '../../../../components/Loader'

import * as helper from '../../../../utils/CoreHelpers'
import * as table from '../../../../utils/TableHelpers'
import * as search from '../../../../utils/SearchHelpers'
import * as form from '../../../../utils/FormHelpers'
import * as action from './Tabular.actions'

import * as query from './Tabular.gql'
import { TabularReport as tableHeaders } from '../../../../data/TableHeaders'

// const AuditTrailList = Loadabler({ loader: () => import('../../../../components/AuditTrailList') })
const CommentList = Loadabler({ loader: () => import('../../../../components/CommentList') })
const SystemInfo = Loadabler({ loader: () => import('../../../../components/SystemInfo') })
const GeneralInfoTab = Loadabler({ loader: () => import('../../../../components/GeneralInfoTab') })

class Tabular extends Component {

	state = {
		sortBy: this.props.sortBy,
		sortOrder: this.props.sortOrder
	}

	//===== Table Functions
	handleSortBy = sort => {this.setState({ sortBy: sort.field,sortOrder: sort.order }, () => table.changeSort({ props: this.props.data, sort }))}
	handleListLimitChange = limit => table.changeLimit({ props: this.props.data, limit })
	handlePaginateListing = page => table.changePage({ props: this.props, page })
	handleColumnChange = () => table.changeColumns()

	//===== Search Functions
	handleSubmitQuickSearch = fields => search.submitSearch({ props: this.props, fields })
	handleResetQuickSearch = () => search.resetSearch({ props: this.props })
	handleSearchFieldsChange = () => search.changeFields()

	//===== Form Functions
	// handleSubmitForm = entity => form.submitForm({ props: this.props, context: this.context, entity })  
	//===== Context
	getChildContext() {
		return { 
			onTableSort: this.handleSortBy,
			onTablePaginate: this.handlePaginateListing,
			onTableChangeLimit: this.handleListLimitChange,
			onTableChangeColumn: this.handleColumnChange,
			onSearchSubmit: this.handleSubmitQuickSearch,
			onSearchReset: this.handleResetQuickSearch,
			onSearchFieldsChange: this.handleSearchFieldsChange,
			fields: tableHeaders,
			extradata: this.props.extradata,
			component: this.props.component,
			matchParams: this.props.match
		}
	}

	//===== Templates
	templateListView = data => {
		const { listTitle, location, listWithSearch, handleElementAccess, ...rest } = this.props
		const { sortBy, sortOrder } = this.state
		const { items, pagingInfo: { offset, limit, totalCount } } = data[rest.schemaKey.list]
		const pager = pagination(offset, limit, totalCount, 5)
		const createLink = handleElementAccess('tabularReportMutation') ? this.props.createLink : ''
		return (
			<ListView 

				// Table Props
				tableTitle={listTitle}
				tableData={items}
				tableSortby={sortBy}
				tableSortorder={sortOrder}
				tablePager={pager}
				tableCount={totalCount}
				tableExport={rest.listWithExport && rest.export}

				// Search Props (Optional)
				includeSearch={!rest.isTabDisplayed ? listWithSearch : false }
				searchQuery={!rest.isTabDisplayed ? location : ''}

				// Etc
				createLink={createLink}

			/>
		)
	}
	templateDetailView = data => {
		const { displayTitle, displayTitleField, displayWithComments, ...rest } = this.props;
		const item = data[rest.schemaKey.detail][0]
		const reportConfig = { ReportConfig: JSON.parse(this.props.data.tabularReport[0].ReportConfig) }
		const mainTabs = {
			section: 'main',
			tabs: [
				{ 
					'title': 'Report Result',
					'content': <TabularReportResult renderMode={'view'} {...reportConfig}/>
				}
			],
		}
		const secondaryTabs = {
			section: 'secondary',
			tabs: []
		}

		{ displayWithComments && secondaryTabs.tabs.push(
			{
				title: 'Comments',
				content: 
					<CommentList
						itemID={item.Id || this.props.match.params.id}
						type={rest.schemaKey.comment}
						context={this.context}
					/>
			},
			// { 
			// 	'title': 'Audit Trail',
			// 	'content': 
			// 		<AuditTrailList 
			// 			itemID={item.Id || this.props.match.params.id}
			// 			type={rest.schemaKey.auditTrail}
			// 			context={this.context}
			// 		/>
			// },
			{ 
				'title': 'System Info',
				'content': 
					<SystemInfo 
						createdById={item.CreatedById} 
						createdDate={item.DateCreated} 
						modifiedById={item.ModifiedById} 
						modifiedDate={item.DateModified}
					/>
			}
		)}

		return (
			<DetailView 
				displayTitle={`${displayTitle}: ${item[displayTitleField]}`}
				displayMainTab={mainTabs}
				displaySecondaryTab={secondaryTabs}
				displayActions={action.actions(item, this.context)}
			/>
		)
	}

	templateFormView = (data, type) => {
		return (
			<TabularEdit {...this.props}/>
		)
	}

	// Return Appropriate View Component
	_displayMode() {
		const { data, match } = this.props 

		if (match === undefined) {
			return this.templateListView(data)
		} else {
			const { action } = match.params
			switch (action) {
			case 'list': return this.templateListView(data)
			case 'view': return this.templateDetailView(data)
			case 'add': return this.templateFormView(data, 'add')
			case 'edit': return this.templateFormView(data, 'edit')
			}
		}        
	}

	_redirect() {
		const { params } = this.props.match
		if (params.action === 'edit' && params.id === undefined) {
			window.location.reload()
			this.props.history.replace('/reports/tabular/list')
		}
		if (params.action === 'add' && params.id) {
			this.props.history.replace('/reports/tabular/add')
		}
	}

	componentWillReceiveProps() {
		this._redirect()
	}
	componentDidMount() {
		this._redirect()
	}
	render() {
		const { match } = this.props
		const loader = <Loader />
		const errorLoad = err => `An unexpected error occurred. --> ${err.message}`

		if (match.params.action == 'list' || match.params.action == 'view') {
			if (this.props.data.loading) return loader
			if (this.props.data.error) return errorLoad(this.props.data.error)
		}

		return (
			<Fragment>
				{ this._displayMode() }
			</Fragment>
		)
	}
}

Tabular.defaultProps = {
	component: 'TabularReport'
	,sortBy: 'DateModified'
	,sortOrder: 'DESC'

	,createLink: '/reports/tabular/add'

	,listTitle: 'Tabular Reports'
	,listWithSearch: true
	,listWithComments: false
	,listWithExport: false

	,displayTitle: 'Tabular Report'
	,displayTitleField: 'ReportName'
	,displayWithComments: true

	,schemaKey: {
		list: 'tabularReportList'
		,detail: 'tabularReport'
		,mutate: 'tabularReportMutation'
		,comment: 'TabularReport'
		// ,auditTrail: 'TabularReport'
	}

	,export: {
		query: query.getTabularReports()
		,targetSchemaKey: 'tabularReportList'
		,customFilename: ''
	}
}

Tabular.propTypes = {
	component: PropTypes.string,
	sortBy: PropTypes.string,
	sortOrder: PropTypes.string,
	createLink: PropTypes.string,
	listTitle: PropTypes.string,
	listWithSearch: PropTypes.bool,
	listWithComments: PropTypes.bool,
	displayTitle: PropTypes.string,
	displayWithComments: PropTypes.bool,
	displayTitleField: PropTypes.string,
	data: PropTypes.object,
	extradata: PropTypes.object,
	history: PropTypes.object,
	location: PropTypes.object,
	match: PropTypes.object
}

Tabular.childContextTypes = {
	onTableSort: PropTypes.func,
	onTablePaginate: PropTypes.func,
	onTableChangeLimit: PropTypes.func,
	onTableChangeColumn: PropTypes.func,
	onSearchSubmit: PropTypes.func,
	onSearchReset: PropTypes.func,
	onSearchFieldsChange: PropTypes.func,
	onFormSubmit: PropTypes.func,
	fields: PropTypes.array,
	extradata: PropTypes.object,
	component: PropTypes.string,
	// variables: PropTypes.object,
	matchParams: PropTypes.object
}

Tabular.contextTypes = {
	userAccess: PropTypes.array,
	userInfo: PropTypes.object,
	handleElementAccess: PropTypes.func,
	onAlert: PropTypes.func,
	onGoBack: PropTypes.func
}

const queryListOptions = { 
	skip: props => props.match !== undefined && props.match.params.action !== 'list',
	options: props => {
		const { component, sortBy, sortOrder } = Tabular.defaultProps
		const q = props.location !== undefined ? props.location.search : ''
		const pageNumber = helper.GetInitSearchValue(q, 'pg', 0)
		return {
			variables: {
				offset: helper.GetInitOffsetValue(pageNumber),
				limit: parseInt(helper.GetInitLimitValue()),
				sortBy: sortBy,
				sortOrder: sortOrder,
				...helper.GetQueryMeta('getQueryVariables', tableHeaders, component, q)
			},
			notifyOnNetworkStatusChange: true,
			fetchPolicy: 'network-only',
		}
	}
}

const queryDetailOptions = { 
	skip: props => props.isTabDisplayed || props.match !== undefined && props.match.params.action === 'list' || props.match.params.action === 'add',
	options: props => ({
		variables: {
			Id: props.match.params.id
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	})
}

export default compose(
	// graphql(query.getExtraQuery(), { name: 'extradata' }),
	// graphql(query.mutateTabularReport(), mutationOptions),
	graphql(query.getTabularReport(), queryDetailOptions),
	graphql(query.getTabularReports(), queryListOptions)
)(Tabular)