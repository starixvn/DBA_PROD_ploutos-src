import React, { Component, Fragment } from 'react'
import { graphql, compose, withApollo } from 'react-apollo'
import pagination from 'pagination-object-generator'
import PropTypes from 'prop-types'

import ListView from '../../../ListView'
import DetailView from '../../../DetailView'
import FormView from '../../../FormView'

import Loadabler from '../../../../components/Loadabler'
import Loader from '../../../../components/Loader'
import ModalPortal from '../../../../components/ModalPortal'

import * as helper from '../../../../utils/CoreHelpers'
import * as table from '../../../../utils/TableHelpers'
import * as search from '../../../../utils/SearchHelpers'
import * as form from '../../../../utils/FormHelpers'

import * as query from './PlayerProfile.gql'
import * as action from './PlayerProfile.actions'
import { PlayerProfile as tableHeaders } from '../../../../data/TableHeaders'

const AuditTrailList = Loadabler({ loader: () => import('../../../../components/AuditTrailList') })
const CommentList = Loadabler({ loader: () => import('../../../../components/CommentList') })
const SystemInfo = Loadabler({ loader: () => import('../../../../components/SystemInfo') })

const PlayerInfo = Loadabler({ loader: () => import('./PlayerProfileInfo') })
const PlayerBank = Loadabler({ loader: () => import('../PlayerBank/PlayerBank') })
const PlayerBonus = Loadabler({ loader: () => import('../PlayerBonus/PlayerBonus') })
const PlayerBet = Loadabler({ loader: () => import('../PlayerBet/PlayerBet') })
const PlayerWin = Loadabler({ loader: () => import('../PlayerWin/PlayerWin') })
const PlayerLoss = Loadabler({ loader: () => import('../PlayerLoss/PlayerLoss') })
const PlayerAccessLog = Loadabler({ loader: () => import('../PlayerAccessLog/PlayerAccessLog') })
const PlayerLedger = Loadabler({ loader: () => import('../PlayerLedger/PlayerLedger') })
const PlayerNote = Loadabler({ loader: () => import('../PlayerNote/PlayerNote') })
const PlayerDocument = Loadabler({ loader: () => import('../PlayerDocument/PlayerDocument') })
const PlayerNotification = Loadabler({ loader: () => import('../PlayerNotification/PlayerNotification') })
const PlayerMessages = Loadabler({ loader: () => import('../PlayerMessages/PlayerMessages') }) 

const Deposit = Loadabler({ loader: () => import('../../PaymentManager/Deposit/Deposit') })
const Withdrawal = Loadabler({ loader: () => import('../../PaymentManager/Withdrawal/Withdrawal') })
const CreditMemo = Loadabler({ loader: () => import('../../PaymentManager/WalletAdjustment/CreditMemo') })
const DebitMemo = Loadabler({ loader: () => import('../../PaymentManager/WalletAdjustment/DebitMemo') })

const PlayerRebate = Loadabler({ loader: () => import('../../Bonus/PlayerRebates/PlayerRebate') })

class PlayerProfile extends Component {

	static defaultProps = {
		component: 'PlayerProfile'
		,sortBy: 'RegistrationDate'
		,sortOrder: 'DESC'
	
		,createLink: '/player_manager/profile/f/add'
	
		,listTitle: 'Player Profile List'
		,listWithSearch: true
		,listWithComments: true
		,listWithExport: true
	
		,displayTitle: 'Player'
		,displayTitleField: 'UserName'
		,displayWithComments: true
	
		,schemaKey: {
			list: 'playerProfileList'
			,detail: 'playerProfile'
			,addMutate: ''
			,editMutate: 'actionEditPlayerProfileMutation'
			,comment: 'Playerprofiles'
			,auditTrail: 'Playerprofiles'
		}
	
		,export: {
			query: query.getProfiles()
			,targetSchemaKey: 'playerProfileList'
			,customFilename: ''
		}
	}

	static propTypes = {
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
	
	static contextTypes = {
		userAccess: PropTypes.array,
		userInfo: PropTypes.object,
		handleElementAccess: PropTypes.func,
		handleSetCurrentPlayer: PropTypes.func,
		onAlert: PropTypes.func,
		onGoBack: PropTypes.func
	}

	static childContextTypes = {
		onTableSort: PropTypes.func,
		onTablePaginate: PropTypes.func,
		onTableChangeLimit: PropTypes.func,
		onTableChangeColumn: PropTypes.func,
		onSearchSubmit: PropTypes.func,
		onSearchReset: PropTypes.func,
		onSearchFieldsChange: PropTypes.func,
		onFormSubmit: PropTypes.func,
	
		onModalToggle: PropTypes.func,
		onModalClose: PropTypes.func,
	
		fields: PropTypes.array,
		data: PropTypes.object,
		extradata: PropTypes.object,
		component: PropTypes.string,
		variables: PropTypes.object,
		matchParams: PropTypes.object
	}

	state = {
		sortBy: this.props.sortBy,
		sortOrder: this.props.sortOrder,
		modal: {
			isOpen: false,
			action: '',
		}
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

	//===== Modal Functions
		handleModalToggle = action => {
			this.setState({
				modal: {
					isOpen: !this.state.modal.isOpen, 
					action: action
				}
			})
		}
		handleModalClose = () => {
			this.setState({
				modal: { isOpen: false },
				isSubmitting: false
			})
		}

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
				createLink={!rest.isTabDisplayed ? createLink : ''}

			/>
		)
	}
	templateDetailView = data => {
		const { displayTitle, displayTitleField, displayWithComments, ...rest } = this.props
		const item = data[rest.schemaKey.detail][0]
		const passProps = {
			playerId: item.Id,
			playerRegId: item.PlayerRegistrationId,
			playerUsername: item.UserName,
			isTabDisplayed: true,

			// Explicitly redefine route props for Comps inside tabs
			history: this.props.history,
			match: { 
				params: { action: 'list' }
			},
			location: { search: this.props.location.search }
		}

		const mainTabs = {
			section: 'main',
			tabs: [
				{
					'title': 'General Info',
					'content': <PlayerInfo {...this.props} handleElementAccess={this.context.handleElementAccess}/>
				},
				{
					'title': 'Notes',
					'content': <PlayerNote {...passProps} />
				},
				{ 
					'title': 'Bank Accounts',
					'content': <PlayerBank {...passProps} />
				},
				{ 
					'title': 'Deposits',
					'content': <Deposit {...passProps} />
				},
				{ 
					'title': 'Withdrawals',
					'content': <Withdrawal {...passProps} />
				},
				{ 
					'title': 'Credit Memos',
					'content': <CreditMemo {...passProps} />
				},
				{ 
					'title': 'Debit Memos',
					'content': <DebitMemo {...passProps} />
				},
				{ 
					'title': 'Bonus',
					'content': <PlayerBonus {...passProps} />
				},
				{ 
					'title': 'Bets',
					'content': <PlayerBet {...passProps} />
				},
				{ 
					'title': 'Wins',
					'content': <PlayerWin {...passProps} />
				},
				{ 
					'title': 'Losses',
					'content': <PlayerLoss {...passProps} />
				},
				{ 
					'title': 'Rebates',
					'content': <PlayerRebate {...passProps} />
				},
				{ 
					'title': 'Ledger',
					'content': <PlayerLedger {...passProps} />
				},
				{
					'title': 'Documents',
					'content': <PlayerDocument {...passProps} />
				},
				{ 
					'title': 'Access Logs',
					'content': <PlayerAccessLog  {...passProps} />
				},
				{ 
					'title': 'Notifications',
					'content': <PlayerNotification  {...passProps} />
				},
				{ 
					'title': 'Player Messages',
					'content': <PlayerMessages  {...passProps} />
				}
			],
		}
		const secondaryTabs = {
			section: 'secondary',
			tabs: []
		}

		localStorage.setItem('currentPlayer', JSON.stringify({ playerId: item.Id, playerUsername: item.UserName }))

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

		// const tabIndex = JSON.parse(localStorage.getItem('tabs:main'))		
		return (
			<DetailView 
				displayTitle={`${displayTitle}: ${item[displayTitleField]}`}
				displayMainTab={mainTabs}
				displaySecondaryTab={secondaryTabs}
				displayActions={action.actions(item, this.context, this.props)}
				displayAccountStatus={this.props.data.playerProfile[0].AccountStatus}
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
			onModalToggle: this.handleModalToggle,
			onModalClose: this.handleModalClose,
			fields: tableHeaders,
			data: this.props.data,
			extradata: this.props.extradata,
			component: this.props.component,
			variables: this.props.match.params.action !== 'add' ? this.props.data.variables : {},
			matchParams: this.props.match
		}
	}
	
	render() {
		const { match } = this.props
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred.'

		if (match.params.action !== 'add') {
			if (this.props.data.loading) return loader
			if (this.props.data.error) return errorLoad
		}
		if (this.props.extradata !== undefined) {
			if (this.props.extradata.loading) return loader
			if (this.props.extradata.error) return errorLoad
		}

		return (
			<Fragment>
			
				{ this._displayMode() }

				<ModalPortal 
					isOpen={this.state.modal.isOpen}
					onClose={this.handleModalToggle}
				>
					{ this.state.modal.isOpen && 
						action.renderModalContent({
							props: this.props,
							context: this.context, 
							action: this.state.modal.action,
							onModalClose: this.handleModalClose
						})
					}
				</ModalPortal>

			</Fragment>
		)
	}
}

const queryListOptions = { 
	skip: props => props.match !== undefined && props.match.params.action !== 'list',
	options: props => {
		const { component, sortBy, sortOrder } = PlayerProfile.defaultProps
		const q = props.location !== undefined ? props.location.search : ''
		const pageNumber = helper.GetInitSearchValue(q, 'pg', 0)
		const affiliateID = props.affiliateId
		return {   
			variables: {
				offset: helper.GetInitOffsetValue(pageNumber),
				limit: parseInt(helper.GetInitLimitValue()),
				sortBy: sortBy,
				sortOrder: sortOrder,
				export: false,
				...helper.GetQueryMeta('getQueryVariables', tableHeaders, component, q),

				// Page Specific Variables
				AffiliateId: affiliateID ? affiliateID : null,
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
	options: () => {
		return {
			variables: {
				Id: 0,
			},
			notifyOnNetworkStatusChange: true,
			fetchPolicy: 'network-only'
		}
	}
}

export default compose(
	graphql(query.getExtraQuery(), { name: 'extradata' }),
	graphql(query.mutateVerifyProfile(), (mutationOptions, { name: 'verifyProfileMutation' })),
	graphql(query.mutateLockProfile(), (mutationOptions, { name: 'lockProfileMutation' })),
	graphql(query.mutateUnlockProfile(), (mutationOptions, { name: 'unLockProfileMutation' })),
	graphql(query.mutateActivateProfile(), (mutationOptions, { name: 'activateProfileMutation' })),
	graphql(query.mutateDeactivateProfile(), (mutationOptions, { name: 'deactivateProfileMutation' })),
	graphql(query.mutateEnableProfile(), (mutationOptions, { name: 'enableProfileMutation' })),
	graphql(query.mutateArchiveProfile(), (mutationOptions, { name: 'archiveProfileMutation' })),
	graphql(query.mutateResetCodeProfile(), (mutationOptions, { name: 'resetCodeProfileMutation' })),
	graphql(query.mutateResetPasswordProfile(), (mutationOptions, { name: 'resetPasswordProfileMutation' })),
	graphql(query.mutateChangeTypeProfile(), (mutationOptions, { name: 'changeTypeProfileMutation' })),
	graphql(query.mutateFRLevelProfile(), (mutationOptions, { name: 'fraudRiskLevelProfileMutation' })),
	graphql(query.mutateBLLevelProfile(), (mutationOptions, { name: 'betLimitLevelProfileMutation' })),
	graphql(query.mutateVIPLevelProfile(), (mutationOptions, { name: 'vipLevelProfileMutation' })),
	graphql(query.mutatePRLevelProfile(), (mutationOptions, { name: 'paymentRiskLevelProfileMutation' })),
	// graphql(query.mutateProfile(), mutationOptions),
	graphql(query.getProfile(), queryDetailOptions),
	graphql(query.getProfiles(), queryListOptions),
)(withApollo(PlayerProfile))