/* eslint-disable react/no-deprecated */
import React, { Component, Fragment } from 'react'
import gql from 'graphql-tag'
import { graphql, compose, withApollo } from 'react-apollo'
import PropTypes from 'prop-types'
import moment from 'moment'

import { Card, Button, FormGroup, Form } from 'reactstrap'

import Loader from '../../../../components/Loader'
import * as form from '../../../../utils/FormHelpers'
import ErrorBoundary from '../../../../utils/ErrorBoundary'

import * as query from './Bonus.gql'

const rawFields = [
	{
		'field': 'BonusCode',
		'label': 'Bonus Code',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'BonusName',
		'label': 'Bonus Name',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'BonusDesc',
		'label': 'Bonus Description',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'BrandId',
		'label': 'Brand',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'brandList',
		'optionKeyName': 'BrandCode',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String!',
		'onChangeFunc': 'onChangeBrand',
		'isDisabled': false
	},
	{
		'field': 'VIPLevelId',
		'label': 'VIP Level',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'vIPLevelList',
		'optionKeyName': 'VipLevelCode',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String!',
		'onChangeFunc': '',
		'isDisabled': 'this.state.entity.BrandId === null || this.state.entity.BrandId === ""'
	},
	{
		'field': 'CurrencyId',
		'label': 'Currency',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'currencyList',
		'optionKeyName': 'CurrencyCode',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'BonusType',
		'label': 'Bonus Type Code',
		'inputType': 'select',
		'isEnum': true,
		'isAsyncMode': false,
		'options': 'BonusTypeEnum',
		'optionKeyName': 'name',
		'optionKeyValue': 'name',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'BonusTypeEnum!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'BonusValueType',
		'label': 'Bonus Value Type',
		'inputType': 'select',
		'isEnum': true,
		'isAsyncMode': false,
		'options': 'BonusValueTypeEnum',
		'optionKeyName': 'name',
		'optionKeyValue': 'name',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'BonusValueTypeEnum!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'PercentAmount',
		'label': 'Percent Amount',
		'inputType': 'number',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Float!',
		'onChangeFunc': '',
		'isDisabled': 'this.state.entity.BonusValueType === null || this.state.entity.BonusValueType !== "Percentage"'
	},
	{
		'field': 'BonusAmount',
		'label': 'Bonus Amount',
		'inputType': 'number',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Float!',
		'onChangeFunc': '',
		'isDisabled': 'this.state.entity.BonusValueType === null || this.state.entity.BonusValueType !== "Amount"'
	},
	{
		'field': 'LimitAmount',
		'label': 'Limit Amount',
		'inputType': 'number',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Float!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'MinDepositAmount',
		'label': 'Min Deposit Amount',
		'inputType': 'number',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Float!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'MinDaysRegistered',
		'label': 'Min Days Registered',
		'inputType': 'number',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Int!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'MaxNumberOfPlayer',
		'label': 'Max No. of Players',
		'inputType': 'number',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Int!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'ValidStartDate',
		'label': 'Valid Start Date',
		'inputType': 'date',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'DateTime!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'ValidEndDate',
		'label': 'Valid End Date',
		'inputType': 'date',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'DateTime!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'WageringFactor',
		'label': 'Wagering Factor',
		'inputType': 'number',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Float!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'BonusFactorBasis',
		'label': 'Factor Basis',
		'inputType': 'select',
		'isEnum': true,
		'isAsyncMode': false,
		'options': 'BonusFactorBasisTypeEnum',
		'optionKeyName': 'name',
		'optionKeyValue': 'name',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Float!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'IsOneTimeUsed',
		'label': 'Is One Time Used?',
		'inputType': 'checkbox',
		'isEnum': false,
		'isAsyncMode': false,
		'options': ['Yes', 'No'],
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Boolean',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'ShowToPlayer',
		'label': 'Show To Player?',
		'inputType': 'checkbox',
		'isEnum': false,
		'isAsyncMode': false,
		'options': ['Yes', 'No'],
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Boolean',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'IsActiveBonus',
		'label': 'Is Active Bonus?',
		'inputType': 'checkbox',
		'isEnum': false,
		'isAsyncMode': false,
		'options': ['Yes', 'No'],
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Boolean',
		'onChangeFunc': '',
		'isDisabled': false
	},]

class BonusesEdit extends Component {

	static propTypes = {
		data: PropTypes.object,
		extradata: PropTypes.object,
		history: PropTypes.object,
		client: PropTypes.object,
		match: PropTypes.object,
		mutate: PropTypes.func
	}

	static contextTypes = {
		onAlert: PropTypes.func,
		onGoBack: PropTypes.func
	}

	state = {
		data: {},
		entity: {
			BonusCode: '',
			BonusName: '',
			BonusDesc: '',
			ValidStartDate: moment().format('YYYY-MM-DD HH:mm:ss'),
			ValidEndDate: moment().format('YYYY-MM-DD HH:mm:ss'),
			BonusType: '',
			// BonusTypeCode: '',
			BonusValueType: '',
			BonusFactorBasis: '',
			MinDepositAmount: 0.00,
			BonusAmount: 0.00,
			PercentAmount: 0.00,
			LimitAmount: 0.00,
			MaxNumberOfPlayer: 1,
			MinDaysRegistered: 0,
			WageringFactor: 0.00,
			BrandId: '',
			VIPLevelId: '',
			CurrencyId: '',
			IsOneTimeUsed: false,
			ShowToPlayer: false,
			IsActiveBonus: false
		},
		inputFields: [],
		options: {
			brandList: [],
			currencyList: [],
			vIPLevelList: [],
			BonusTypeEnum: [],
			BonusValueTypeEnum: [],
			BonusFactorBasisTypeEnum: []
		},
		isSubmitting: false
	}
	
	//===== Form Methods
	handleInputChange = f => event => {
		const field = event.target.name || f.field
		const value = form.inputChange({ type: f.type, event })
		this.setState({ entity: { ...this.state.entity, [field]: value } })
	}
	handleSelectEnumChange = f => event => {
		const value = form.selectEnumChange({ event })
		this.setState({ entity: { ...this.state.entity, [f]: value } })
	}
	handleSubmit = e => {
		e.preventDefault()

		const { props, context, state: { entity } } = this
		const callback = () => this.setState({ isSubmitting: !this.state.isSubmitting })
		const submitCheck = form.shouldSubmit({ entity, fields: rawFields })

		// entity.DepositAmount = parseFloat(entity.DepositAmount)

		if (submitCheck) {
			this.setState({ isSubmitting: !this.state.isSubmitting }, () => {
				form.submitForm({ props, context, entity, callback })
			})
		} else {
			this.context.onAlert({
				isOpen: true,
				type: 'error',
				message: 'Fill up required fields.'
			})
		}
	}

	//===== Custom Methods
	onChangeBrand = e => {
		const data = this.props.extradata
		const BrandId = e.target.value

		// SET VALUE
		this.setState({ 
			entity: { ...this.state.entity, BrandId } 
		}, async () => {
			// THEN, Filter vIPLevelList based on selected Brand
			await this.setState({
				options: {
					...this.state.options,
					vIPLevelList: form.filterOptionList(data['vIPLevelList'], 'BrandId', BrandId),
				},
				entity: {
					...this.state.entity,
					VIPLevelId: ''
				}
			})
		})
	}


	//===== Initialize States
	// Map Form Inputs and Values
	// Make form inputs "controlled" by setting them up as entity states
	// initInputValues(fields) {

	// 	// Set List of Values for Form Submit
	// 	this.setState({ entity: { ...this.state.entity, ...mapFields()  } })
		
	// 	function mapFields() {
	// 		let data = {}
	// 		fields.map(f => data[f.field] = f.value)
	// 		return data
	// 	}
	// }

	// Set List of Input Fields for displaying
	initInputFields(fields) {
		// Split fields into two arrays for two-column display
		const array_chunks = (array, chunk_size) => {
			return (
				Array(2)
					.fill()
					.map((_, index) => index * chunk_size)
					.map(begin => array.slice(begin, begin + chunk_size))
			)
		}
		this.setState({ inputFields: array_chunks(fields, Math.ceil(fields.length / 2)) })		
	}

	//===== Lifecycle
	redirect() {
		const { params } = this.props.match
		if (params.action === 'edit' && params.id === undefined) {
			this.props.history.replace('/bonus/bonuses/list')
		}
		if (params.action === 'add' && params.id) {
			this.props.history.replace('/bonus/bonuses/add')
		}
	}

	componentWillReceiveProps(newProps) {
		const { action } = newProps.match.params
		if (action === 'edit') {
			if (!newProps.data.loading) {
				this.setState({ entity: { ...this.state.entity, ...mapFields(newProps.data.bonus[0]) } })
			}
		}

		function mapFields(values) {
			let data = {}
			rawFields.map(f => data[f.field] = values[f.field])
			return data
		}

		if (!newProps.extradata.loading) {
			this.setState({ 
				options: {
					...this.state.options,
					brandList: newProps.extradata.brandList.items,
					currencyList: newProps.extradata.currencyList.items,
					vIPLevelList: newProps.extradata.vIPLevelList.items,
					BonusTypeEnum: newProps.extradata.enumRepository[0].BonusTypeEnum,
					BonusValueTypeEnum: newProps.extradata.enumRepository[0].BonusValueTypeEnum,
					BonusFactorBasisTypeEnum: newProps.extradata.enumRepository[0].BonusFactorBasisTypeEnum
				}
			})
		}
	}

	componentDidMount() {
		// const fields = form.getInputFields({ props: this.props, context: this.context })
		const method = this.props.match.params.action

		// this.initInputValues(rawFields)
		this.initInputFields(rawFields)

		localStorage.setItem('pageAction', method)

		this.redirect()
	}

	componentDidUpdate() {
		this.redirect()
	}

	handleGoBack = () => this.context.onGoBack()

	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'

		const method = this.props.match.params.action
		const { entity, inputFields, options } = this.state

		if ( method === 'edit') {
			if (this.props.data.loading) return loader
			if (this.props.data.error) return errorLoad
		}

		if (this.props.extradata !== undefined) {
			if (this.props.extradata.loading) return loader
			if (this.props.extradata.error) return errorLoad
		}

		const fieldMapper = fields => fields.map(f => {
			return ( 
				<ErrorBoundary key={f.field}>
					<FormGroup>
						{ form.inputLabel(f) }
						{ form.inputField({ 
							input: f,
							options: //f.inputType === 'select' ? f.options : null,
								f.inputType === 'select' 
									? f.isAsyncMode 
										? f.options
										: options[f.options] 
									: null,
							onChange: (f.onChangeFunc !== undefined && f.onChangeFunc !== '') 
								? this[f.onChangeFunc]
								: f.inputType === 'select' 
									? f.isEnum 
										? this.handleSelectEnumChange(f.field)
										: this.handleInputChange({ field: f.field, type: f.varType })
									: this.handleInputChange({ field: f.field, type: f.varType }),
							value: entity[f.field],
							disabled: typeof f.isDisabled !== 'boolean' 
								? new Function(`return ${f.isDisabled}`).bind(this)()
								: f.isDisabled
						}) }
					</FormGroup>
				</ErrorBoundary>
			)
		})

		return (
			<Fragment>

				{ form.formHeaderTemplate({
					method,
					formTitle: 'Bonus',
					goBack: this.handleGoBack
				}) }
				
				<Card body>

					<Form onSubmit={this.handleSubmit} className="c-form">
						<div className="c-form__fields">
							{ inputFields.map((fields, index) => (
								<div key={index}>
									{ fieldMapper(fields, entity) }
								</div>
							)) }
						</div>
						<div className="c-form__submit">
							<Button color="primary"
								className="btn btn-primary">
								<i className="fa fa-pencil"></i>{' '}
								{ this.state.isSubmitting ? 'Submitting ...' : 'Save' }
							</Button>{' '}
							<Button color="secondary" onClick={this.handleGoBack}>
								<i className="fa fa-close"></i>{' '}Cancel
							</Button>
						</div>
					</Form>

				</Card>
			</Fragment>
		)
	}
}

const queryOptions = { 
	skip: props => props.match.params.action === 'add',
	options: props => ({
		variables: {
			Id: props.match.params.id,
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

const mutationOptions = { 
	options: props => ({
		variables: {
			Id: props.match.params.id || 0,
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}
const mutation = gql`
	mutation MUTATION_VARS(
		$Id: ID!,
		$BonusCode: String!
		$BonusName: String!
		$BonusDesc: String!
		$BrandId: ID!
		$VIPLevelId: ID!
		$CurrencyId: ID!
		$ValidStartDate: DateTime!
		$ValidEndDate: DateTime!
		$BonusType: BonusTypeEnum!
		$BonusValueType: BonusValueTypeEnum!
		$BonusFactorBasis: BonusFactorBasisTypeEnum!
		$MinDepositAmount: Float!
		$BonusAmount: Float!
		$PercentAmount: Float
		$LimitAmount: Float
		$MaxNumberOfPlayer: Int
		$MinDaysRegistered: Int
		$WageringFactor: Float
		$IsOneTimeUsed: Boolean!
		$ShowToPlayer: Boolean!
		#$ActiveRecord: Boolean!
		$IsActiveBonus: Boolean
	){
		bonusMutation(
			entity: {
				Id:$Id
				BonusCode: $BonusCode
				BonusName: $BonusName
				BonusDesc: $BonusDesc
				BrandId: $BrandId
				VIPLevelId: $VIPLevelId
				CurrencyId: $CurrencyId
				ValidStartDate: $ValidStartDate
				ValidEndDate: $ValidEndDate
				BonusType: $BonusType
				BonusValueType: $BonusValueType
				BonusFactorBasis: $BonusFactorBasis
				MinDepositAmount: $MinDepositAmount
				BonusAmount: $BonusAmount
				PercentAmount: $PercentAmount
				LimitAmount: $LimitAmount
				MaxNumberOfPlayer: $MaxNumberOfPlayer
				MinDaysRegistered: $MinDaysRegistered
				WageringFactor: $WageringFactor
				IsOneTimeUsed: $IsOneTimeUsed
				ShowToPlayer: $ShowToPlayer
				#ActiveRecord: $ActiveRecord
				IsActiveBonus: $IsActiveBonus
			}
		){
			Id
			BonusCode
			BonusName
			BonusDesc
			BrandId
			VIPLevelId
			ValidStartDate
			ValidEndDate
			BonusType
			BonusValueType
			MinDepositAmount
			BonusAmount
			PercentAmount
			LimitAmount
			MaxNumberOfPlayer
			MinDaysRegistered
			WageringFactor
			BonusFactorBasis
			NumberOfPlayersAvailed
			IsOneTimeUsed
			ShowToPlayer
			CurrencyId
			IsActiveBonus
			#ActiveRecord
		}
	}
`

export default compose(
	graphql(mutation, mutationOptions),
	graphql(query.getExtraQuery(), { name: 'extradata' }), 
	graphql(query.getBonus(), queryOptions)
)(withApollo(BonusesEdit))