/* eslint-disable react/no-deprecated */
import React, { Component, Fragment } from 'react'
import { graphql, compose } from 'react-apollo'
import pagination from 'pagination-object-generator'
import PropTypes from 'prop-types'

import ListView from '../../../ListView'
import DetailView from '../../../DetailView'
import FormView from '../../../FormView'

import Loadabler from '../../../../components/Loadabler'
import Loader from '../../../../components/Loader'

import * as helper from '../../../../utils/CoreHelpers'
import * as table from '../../../../utils/TableHelpers'
import * as search from '../../../../utils/SearchHelpers'
import * as form from '../../../../utils/FormHelpers'

import * as query from './PlayerNoteCategory.gql'
import { PlayerNoteCategory as tableHeaders } from '../../../../data/TableHeaders'

const AuditTrailList = Loadabler({ loader: () => import('../../../../components/AuditTrailList') })
const CommentList = Loadabler({ loader: () => import('../../../../components/CommentList') })
const SystemInfo = Loadabler({ loader: () => import('../../../../components/SystemInfo') })
const GeneralInfoTab = Loadabler({ loader: () => import('../../../../components/GeneralInfoTab') })

class PlayerNoteCategory extends Component {
	
	state = {
		sortBy: this.props.sortBy,
		sortOrder: this.props.sortOrder
	}

	//===== Table Functions
		handleSortBy = sort => {
			this.setState({
				sortBy: sort.field,
				sortOrder: sort.order
			}, () => table.changeSort({ props: this.props.data, sort }) )
		}
		handleListLimitChange = limit => table.changeLimit({ props: this.props.data, limit })
		handlePaginateListing = page => table.changePage({ props: this.props, page })
		handleColumnChange = () => table.changeColumns()

	//===== Search Functions
		handleSubmitQuickSearch = fields => search.submitSearch({ props: this.props, fields })
		handleResetQuickSearch = () => search.resetSearch({ props: this.props })
		handleSearchFieldsChange = () => search.changeFields()

	//===== Form Functions
		handleSubmitForm = entity => form.submitForm({ props: this.props, context: this.context, entity })

	//===== Templates
	templateListView = data => {
		const { listTitle, createLink, location, listWithSearch, ...rest } = this.props
		const { sortBy, sortOrder } = this.state
		const { items, pagingInfo: { offset, limit, totalCount } } = data[rest.schemaKey.list]
		const pager = pagination(offset, limit, totalCount, 5)

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
		const { displayTitle, displayTitleField, displayWithComments, ...rest } = this.props
		const item = data[rest.schemaKey.detail][0]
		const path = '/setup/playernotecategory/edit/'
		const mainTabs = {
			section: 'main',
			tabs: [
				{ 
					'title': 'General Info',
					'content': 
						<GeneralInfoTab 
							item={item}
							headers={tableHeaders}
						/>
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
			{
				'title': 'Audit Trail',
				'content': 
					<AuditTrailList 
						itemID={item.Id || this.props.match.params.id}
						type={rest.schemaKey.auditTrail}
						context={this.context}
					/>
			},
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
				displayActions={form.actions(path, item, this.context, this.props)}
			/>
		)
	}
	templateFormView = (data, type) => {		
		const { displayTitle, displayTitleField, ...rest } = this.props
		const isEdit = rest.match.params.action === 'edit'
		const item = isEdit ? data[rest.schemaKey.detail][0] : {}

		return (
			<FormView 
				method={type}
				formTitle={`${displayTitle}${isEdit ? `: ${item[displayTitleField]}` : ''}`}
				entity={item}
				extradata={this.props.extradata}
			/>
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
			this.props.history.replace('/setup/playernotecategory/list')
		}
		if (params.action === 'add' && params.id) {
			this.props.history.replace('/setup/playernotecategory/add')
		}
	}

	componentWillReceiveProps() {
		this._redirect()
	}
	componentDidMount() {
		this._redirect()
	}

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
			onFormSubmit: this.handleSubmitForm,
			fields: tableHeaders,
			extradata: this.props.extradata,
			component: this.props.component,
			variables: this.props.match.params.action !== 'add' ? this.props.data.variables : {},
			matchParams: this.props.match
		}
	}
	
	render() {
		const { match } = this.props
		const loader = <Loader />
		const errorLoad = err => `An unexpected error occurred. --> ${err.message}`

		if (match.params.action !== 'add') {
			if (this.props.data.loading) return loader
			if (this.props.data.error) return errorLoad(this.props.data.error)
		}
		if (this.props.extradata !== undefined) {
			if (this.props.extradata.loading) return loader
			if (this.props.extradata.error) return errorLoad
		}

		return (
			<Fragment>
			
				{ this._displayMode() }

			</Fragment>
		)
	}
}

PlayerNoteCategory.defaultProps = {
	component: 'PlayerNoteCategorySetup'
	,sortBy: 'DateModified'
	,sortOrder: 'DESC'

	,createLink: '/setup/playernotecategory/add'

	,listTitle: 'Player Note Category'
	,listWithSearch: true
	,listWithComments: true
	,listWithExport: true

	,displayTitle: 'Player Note Category'
	,displayTitleField: 'PlayerNoteCategoryCode'
	,displayWithComments: true

	,schemaKey: {
		list: 'playerNoteCategoryList'
		,detail: 'playerNoteCategory'
		,mutate: 'playerNoteCategoryMutation'
		,comment: 'Playernotecategory'
		,auditTrail: 'Playernotecategory'
	}

	,export: {
		query: query.getPlayerNoteCategory()
		,targetSchemaKey: 'playerNoteCategoryList'
		,customFilename: ''
	}
}

PlayerNoteCategory.propTypes = {
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

PlayerNoteCategory.childContextTypes = {
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
	variables: PropTypes.object,
	matchParams: PropTypes.object
}

PlayerNoteCategory.contextTypes = {
	userAccess: PropTypes.array,
	userInfo: PropTypes.object,
	handleElementAccess: PropTypes.func,
	onAlert: PropTypes.func,
	onGoBack: PropTypes.func
}

const queryListOptions = { 
	skip: props => props.match !== undefined && props.match.params.action !== 'list',
	options: props => {
		const { component, sortBy, sortOrder } = PlayerNoteCategory.defaultProps
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
	// props: ({ data }) => ({ ...data }),
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

const mutationOptions = { 
	skip: props => props.isTabDisplayed || props.match !== undefined && props.match.params.action === 'list',
	options: props => {
		return {
			variables: {
				Id: props.match.params.id || 0,
			},
			notifyOnNetworkStatusChange: true,
			fetchPolicy: 'network-only'
		}
	}
}

export default compose(
	graphql(query.getExtraQuery(), { name: 'extradata' }),
	graphql(query.mutatePlayerNoteCategory(), mutationOptions),
	graphql(query.getPlayerNoteCategory(), queryDetailOptions),
	graphql(query.getPlayerNoteCategories(), queryListOptions),
)(PlayerNoteCategory)