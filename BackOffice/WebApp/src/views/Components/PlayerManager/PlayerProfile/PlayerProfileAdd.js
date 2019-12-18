/* eslint-disable react/no-deprecated */
import React, {	Component, Fragment } from 'react'
import PropTypes from 'prop-types'
import gql from 'graphql-tag'
import { graphql, compose } from 'react-apollo'

import { Card, Button, FormGroup, Form } from 'reactstrap'

import Loader from '../../../../components/Loader'
import { GetQueryMeta } from '../../../../utils/CoreHelpers'
import * as form from '../../../../utils/FormHelpers'
import ErrorBoundary from '../../../../utils/ErrorBoundary'

import * as query from './PlayerProfile.gql'

const rawFields = [
	{
		'field': 'UserName',
		'label': 'Username',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'varType': 'String!',
		'onChangeFunc': '' ,
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'PlayerTypeCode',
		'label': 'Player Type',
		'inputType': 'select',
		'isEnum': true,
		'isAsyncMode': false,
		'options': 'PlayerTypeEnum',
		'optionKeyName': 'name',
		'optionKeyValue': 'name',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String!',
		'onChangeFunc': '',
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'MobileCountryCodeNumber',
		'label': 'Mobile Country Code',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'varType': 'String!',
		'onChangeFunc': '' ,
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'MobileNumber',
		'label': 'Mobile Number',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'varType': 'String',
		'onChangeFunc': '' ,
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'EmailAddress',
		'label': 'Email Address',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'varType': 'String!',
		'onChangeFunc': '' ,
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'CountryId',
		'label': 'Country',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'countryList',
		'optionKeyName': 'CountryName',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': '',
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'CurrencyId',
		'label': 'Currency',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'currencyList',
		'optionKeyName': 'CurrencyName',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': '',
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'LanguageId',
		'label': 'Language',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'languageList',
		'optionKeyName': 'LanguageName',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': '',
		'showFormDefault': true,
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
		'optionQueryKey': 'brandList',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': 'onChangeBrand',
		'showFormDefault': true,
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
		'optionQueryKey': 'vIPLevelList',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': '',
		'showFormDefault': true,
		'isDisabled': 'this.state.entity.BrandId === null || this.state.entity.BrandId === ""'
	},
	{
		'field': 'PaymentRiskLevelId',
		'label': 'Payment Risk Level',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'paymentRiskLevelList',
		'optionKeyName': 'PaymentRiskLevelCode',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': '',
		'showFormDefault': true,
		'isDisabled': 'this.state.entity.BrandId === null || this.state.entity.BrandId === ""'
	},
	{
		'field': 'FraudRiskLevelId',
		'label': 'Fraud Risk Level',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'fraudRiskLevelList',
		'optionKeyName': 'FraudRiskLevelCode',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': '',
		'showFormDefault': true,
		'isDisabled': 'this.state.entity.BrandId === null || this.state.entity.BrandId === ""'
	},
	{
		'field': 'WithdrawalLevelId',
		'label': 'Withdrawal Level',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'withdrawalLevelList',
		'optionKeyName': 'WithdrawalLevelCode',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': '',
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'BetLimitLevelId',
		'label': 'Bet Limit Level',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'gameBetLimitLevelList',
		'optionKeyName': 'BetLimitLevelDesc',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': '',
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'AffiliateCode',
		'label': 'Affiliate Code',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'varType': 'String',
		'onChangeFunc': '' ,
		'showFormDefault': true,
		'isDisabled': false
	},
	// {
	// 	'field': 'SrcUrl',
	// 	'label': 'Source URL',
	// 	'inputType': 'text',
	// 	'isEnum': false,
	// 	'isAsyncMode': false,
	// 	'varType': 'String',
	// 	'onChangeFunc': '' ,
	// 	'showFormDefault': true,
	// 	'isDisabled': false
	// },
]

class PlayerProfileAdd extends Component {

	static propTypes = {
		match: PropTypes.object,
		history: PropTypes.object,
		mutate: PropTypes.func,
		client: PropTypes.object,
		data: PropTypes.object,
		extradata: PropTypes.object,
	}

	static contextTypes = {
		onAlert: PropTypes.func,
		onGoBack: PropTypes.func
	}

	state = {
		data: {},
		entity: {
			BrandId: '',
			UserName: '',
			PlayerTypeCode: '',
			MobileCountryCodeNumber: '',
			MobileNumber: '',
			EmailAddress: '',
			CountryId: '',
			CurrencyId: '',
			LanguageId: '',
			VIPLevelId: '',
			PaymentRiskLevelId: '',
			FraudRiskLevelId: '',
			WithdrawalLevelId: '',
			BetLimitLevelId: '',
			AffiliateCode: '',
			// SrcUrl: '',
		},
		options: {
			brandList: [],
			vIPLevelList: [],
			fraudRiskLevelList: [],
			paymentRiskLevelList: [],
			withdrawalLevelList: [],
			gameBetLimitLevelList: [],
			languageList: [],
			currencyList: [],
			countryList: [],
			PlayerTypeEnum: []
		},
		inputFields: [],
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

		if (submitCheck) {
			// console.log('not empty. go on!')
			this.setState({ isSubmitting: !this.state.isSubmitting }, () => {
				form.submitForm({ props, context, entity, callback })
			})
		} else {
			// console.log('empty! no continue')
			this.context.onAlert({
				isOpen: true,
				type: 'error',
				message: 'Fill up required fields.'
			})
		}
	}

	// Custom Methods
	onChangeBrand = e => {
		const data = this.props.extradata
		const BrandId = e.target.value

		// SET VALUE
		this.setState({ 
			entity: { ...this.state.entity, BrandId	}
		}, async () => {
			// THEN, filter based on selected Brand
			await this.setState({
				options: {
					...this.state.options,
					vIPLevelList: form.filterOptionList(data['vIPLevelList'], 'BrandId', BrandId),
					fraudRiskLevelList: form.filterOptionList(data['fraudRiskLevelList'], 'BrandId', BrandId),
					paymentRiskLevelList: form.filterOptionList(data['paymentRiskLevelList'], 'BrandId', BrandId),
				},
				entity: {
					...this.state.entity,
					VIPLevelId: '',
					FraudRiskLevelId: '',
					PaymentRiskLevelId: ''
				}
			})
		})
	}


	handleGoBack = () => this.context.onGoBack()

	//===== Initialize States
	// Set List of Input Fields for displaying
	initInputFields(fields) {

		// Split fields into two arrays for two-column display
		const array_chunks = (array, chunk_size) => {
			return (
				Array(2)
					.fill()
					.map((_, index) => index * chunk_size)
					.map(begin => array.slice(begin, begin + chunk_size))
			)}
		this.setState({ inputFields: array_chunks(fields, Math.ceil(fields.length / 2)) })
		
	}

	//===== Lifecycle
	componentDidMount() {
		// const method = this.props.match.params.action

		this.initInputFields(rawFields)

		localStorage.setItem('pageAction', 'add')
	}

	componentWillReceiveProps(nextProps) {
		const data = nextProps.extradata

		if (!data.loading) {
			this.setState({
				options: { 
					...this.state.options, 
					brandList: data.brandList.items,
					// vIPLevelList: data.vIPLevelList.items,
					// fraudRiskLevelList: data.fraudRiskLevelList.items,
					// paymentRiskLevelList: data.paymentRiskLevelList.items,
					withdrawalLevelList: data.withdrawalLevelList.items,
					gameBetLimitLevelList: data.gameBetLimitLevelList.items,
					languageList: data.languageList.items,
					currencyList: data.currencyList.items,
					countryList: data.countryList.items,
					PlayerTypeEnum: data.enumRepository[0].PlayerTypeEnum,
				}
			})
		}
	}
	
	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'

		// const method = this.props.match.params.action
		const { entity, options, inputFields } = this.state
		
		if (this.props.data !== undefined) {
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
					method: 'add',
					formTitle: 'Player Profile',
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
							<Button color="primary" className="btn btn-primary">
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

// const queryOptions = { 
// 	skip: props => props.match.params.action === 'add',
// 	options: props => ({
// 		variables: {
// 			Id: props.match.params.id,
// 		},
// 		notifyOnNetworkStatusChange: true,
// 		fetchPolicy: 'network-only'
// 	}),
// }

const mutationOptions = { 
	options: () => ({
		// variables: {
		// 	Id: props.match.params.id,
		// },
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

const mutation = gql`
	mutation MUTATION_VARS(
		${String(GetQueryMeta('getEntityTypes', rawFields))}
	){
		actionCreatePlayerProfileMutation(
			${String(GetQueryMeta('getEntityFilters', rawFields))}
		){
			apiResult
		}
	}
`

export default compose(
	graphql(mutation, mutationOptions),
	graphql(query.getExtraQuery(), { name: 'extradata' }), 
	// graphql(query.getProfile(), queryOptions)
)(PlayerProfileAdd)