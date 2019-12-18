/* eslint-disable react/no-deprecated */
import React, { Component, Fragment } from 'react'
import PropTypes from 'prop-types'
import gql from 'graphql-tag'
import { graphql, compose } from 'react-apollo'

import { Card, Button, FormGroup, Form } from 'reactstrap'

import Loader from '../../../../components/Loader'
import * as form from '../../../../utils/FormHelpers'
import ErrorBoundary from '../../../../utils/ErrorBoundary'

import * as query from './Affiliate.gql'

const rawFields = [
	{
		'field': 'AffiliateStatus',
		'label': 'Affiliate Status',
		'inputType': 'select',
		'isEnum': true,
		'isAsyncMode': false,
		'options': 'AffiliateStatusTypeEnum',
		'optionKeyName': 'name',
		'optionKeyValue': 'name',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID',
		'onChangeFunc': '',
		'isDisabled': 'this.props.match.params.action === "edit"'
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
		'varType': 'ID!',
		'onChangeFunc': 'onChangeBrand',
		'isDisabled': 'this.props.match.params.action === "edit"'
	},
	{
		'field': 'AffiliateCode',
		'label': 'Affiliate Code',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String',
		'onChangeFunc': '',
		'isDisabled': true
	},
	{
		'field': 'AffiliateType',
		'label': 'Affiliate Type',
		'inputType': 'select',
		'isEnum': true,
		'isAsyncMode': false,
		'options': 'AffiliateTypeEnum',
		'optionKeyName': 'name',
		'optionKeyValue': 'name',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'AffiliateTypeEnum!',
		'onChangeFunc': '',
		'isDisabled': 'this.props.match.params.action === "edit"'
	},
	{
		'field': 'FullName',
		'label': 'Full Name',
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
		'field': 'CurrencyCode',
		'label': 'Currency',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'currencyList',
		'optionKeyName': 'CurrencyCode',
		'optionKeyValue': 'CurrencyCode',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String!',
		'onChangeFunc': 'onChangeCurrency',
		'isDisabled': 'this.state.entity.BrandId === null || this.state.entity.BrandId === "" || this.props.match.params.action === "edit"'
	},
	{
		'field': 'CountryCode',
		'label': 'Country',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'countryList',
		'optionKeyName': 'CountryName',
		'optionKeyValue': 'CountryCode',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String',
		'onChangeFunc': '',
		'isDisabled': 'this.state.entity.BrandId === null || this.state.entity.BrandId === "" || this.props.match.params.action === "edit"'
	},
	{
		'field': 'PhoneCountryCodeNo',
		'label': 'Phone Country Code No',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String',
		'onChangeFunc': '',
		'isDisabled': 'this.props.match.params.action === "edit"'
	},
	{
		'field': 'PhoneNo',
		'label': 'Phone No',
		'inputType': 'number',
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
		'isDisabled': 'this.props.match.params.action === "edit"'
	},
	{
		'field': 'PrimaryEmail',
		'label': 'Primary Email',
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
		'isDisabled': 'this.props.match.params.action === "edit"'
	},
	{
		'field': 'SecondaryEmail',
		'label': 'Secondary Email',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'IM1',
		'label': 'IM1 Platform',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'iMPlatformList',
		'optionKeyName': 'IMPlatformName',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': '',
		'isDisabled': 'this.state.entity.BrandId === null || this.state.entity.BrandId === "" || this.props.match.params.action === "edit"'
	},
	{
		'field': 'IM1UserName',
		'label': 'IM1 Username',
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
		'isDisabled': 'this.state.entity.BrandId === null || this.state.entity.BrandId === "" || this.props.match.params.action === "edit"'
	},
	{
		'field': 'IM2',
		'label': 'IM2 Platform',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'iMPlatformList',
		'optionKeyName': 'IMPlatformName',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': '',
		'isDisabled': 'this.state.entity.BrandId === null || this.state.entity.BrandId === ""'
	},
	{
		'field': 'IM2UserName',
		'label': 'IM2 Username',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String',
		'onChangeFunc': '',
		'isDisabled': 'this.state.entity.BrandId === null || this.state.entity.BrandId === ""'
	},
	// {
	// 	'field': 'EarningPlanId',
	// 	'label': 'Earning Plan',
	// 	'inputType': 'select',
	// 	'isEnum': false,
	// 	'isAsyncMode': false,
	// 	'options': 'affiliateEarningPlanList',
	// 	'optionKeyName': 'EarningPlanName',
	// 	'optionKeyValue': 'Id',
	// 	'optionQueryKey': '',
	// 	'lookupUrl': '',
	// 	'lookupField': '',
	// 	'varType': 'ID',
	// 	'onChangeFunc': '',
	// 	'isDisabled': 'this.state.entity.BrandId === null || this.state.entity.BrandId === "" && this.state.entity.CurrencyCode === null || this.state.entity.CurrencyCode === ""'
	// },
	{
		'field': 'SettlementPeriod',
		'label': 'Settlement Period',
		'inputType': 'select',
		'isEnum': true,
		'isAsyncMode': false,
		'options': 'SettlementPeriodTypeEnum',
		'optionKeyName': 'name',
		'optionKeyValue': 'name',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'MarketingCost',
		'label': 'Marketing Cost',
		'inputType': 'text',
		'varType': 'Float',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'UserName',
		'label': 'Username',
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
		'isDisabled': 'this.props.match.params.action === "edit"'
	},
	{
		'field': 'Password',
		'label': 'Password',
		'inputType': 'password',
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
		'isDisabled': 'this.props.match.params.action === "edit"'
	},
	{
		'field': 'ConfirmPassword',
		'label': 'Confirm Password',
		'inputType': 'password',
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
		'isDisabled': 'this.props.match.params.action === "edit"'
	},
	{
		'field': 'WebsiteURL',
		'label': 'Website URL',
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
		'varType': 'String',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'SecurityQuestionId',
		'label': 'Security Question',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'securityQuestionList',
		'optionKeyName': 'SecurityQuestionDesc',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': '',
		'isDisabled': 'this.props.match.params.action === "edit"'
	},
	{
		'field': 'SecurityAnswer',
		'label': 'Security Answer',
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
		'isDisabled': 'this.props.match.params.action === "edit"'
	},
	{
		'field': 'BankId',
		'label': 'Bank',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'bankList',
		'optionKeyName': 'BankName',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': '',
		'isDisabled': 'this.state.entity.BrandId === null || this.state.entity.BrandId === ""'
	},
	{
		'field': 'BankAccountName',
		'label': 'Bank Account Name',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'BankAccountNumber',
		'label': 'Bank Account Number',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'BankAccountBranch',
		'label': 'Bank Account Branch',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'BankAccountCity',
		'label': 'Bank Account City',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'BankAccountProvince',
		'label': 'Bank Account Province',
		'inputType': 'text',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'IsLegalAge',
		'label': 'At least 18 years. old?',
		'inputType': 'checkbox',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Boolean!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'AgreedToCondition',
		'label': 'Accept Terms and Conditions?',
		'inputType': 'checkbox',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Boolean!',
		'onChangeFunc': '',
		'isDisabled': false
	},
]

class AffiliateEdit extends Component {

	static propTypes = {
		data: PropTypes.object,
		extradata: PropTypes.object,
		history: PropTypes.object,
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
			AffiliateType: '',
			AffiliateCode: '',
			BrandId: '',
			CurrencyCode: '',
			CountryCode: '',
			FullName: '',
			PhoneNo: '',
			PhoneCountryCodeNo: '',
			PrimaryEmail: '',
			SecondaryEmail: '',
			IM1: 0,
			IM1UserName: '',
			IM2: 0,
			IM2UserName: '',
			UserName: '',
			Password: '',
			ConfirmPassword: '',
			WebsiteURL: '',
			BonusCode: '',
			// SecurityQuestionId: '',
			// SecurityAnswer: '',
			// EarningPlanId: '',
			BankId: 0,
			BankAccountName: '',
			BankAccountNumber: '',
			BankAccountBranch: '',
			BankAccountCity: '',
			BankAccountProvince: '',
			SettlementPeriod: 'Semi_Monthly',
			MarketingCost: 0.00,
			AgreedToCondition: false,
			IsLegalAge: false,
		},
		inputFields: [],
		options: {},
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
		
		const passIsEmpty = entity.Password === '' || entity.ConfirmPassword === ''
		const passIsSame = entity.Password === entity.ConfirmPassword
	
		const dropDownListCheck = entity.BankId !== 0 && entity.BrandId !== 0 && entity.IM1 !== 0 && entity.IM2 !== 0 

		if ((props.match.params.action === 'add' && !passIsEmpty && !passIsSame)) {
			
			this.context.onAlert({
				isOpen: true,
				type: 'error',
				message: 'Passwords are empty or does not match.'
			})

		} else {
			if ((props.match.params.action === 'edit') || (submitCheck && dropDownListCheck)) {
				// entity.AffiliateTypeCode = entity.AffiliateType
				entity.AffiliateStatus = 'Activated'
				
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
	}

	//===== Custom Methods
	onChangeBrand = e => {
		const data = this.props.extradata
		const BrandId = e.target.value

		// SET VALUE
		this.setState({ 
			entity: { ...this.state.entity, BrandId } 
		}, async () => {
			// THEN, filter based on selected Brand
			await this.setState({
				options: {
					...this.state.options,
					iMPlatformList: form.filterOptionList(data['iMPlatformList'], 'BrandId', BrandId),
					currencyList: form.filterOptionList(data['currencyList'], 'BrandId', BrandId),
					bankList: form.filterOptionList(data['bankList'], 'BrandId', BrandId),
				},
				entity: {
					...this.state.entity,
					CountryCode: '',
					CurrencyCode: '',
					BankId: 0,
					IM1: 0,
					IM1UserName: '',
					IM2: 0,
					IM2UserName: '',
					// EarningPlanId: ''
				}
			})
		})
	}
	onChangeCurrency = e => {
		const data = this.props.extradata
		const CurrencyCode = e.target.value

		// SET VALUE
		this.setState({ 
			entity: { ...this.state.entity, CurrencyCode } 
		}, async () => {
			// THEN, filter based on selected Currency
			await this.setState({
				options: {
					...this.state.options,
					// affiliateEarningPlanList: data.affiliateEarningPlanList.items.filter(l => (l.BrandId === this.state.entity.BrandId && l.CurrencyCode === CurrencyCode)),
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
		const params = this.props.match.params
		if (params.action === 'edit' && params.id === undefined) {
			this.props.history.replace('/affiliate/list')
		}
		if (params.action === 'add' && params.id) {
			this.props.history.replace('/affiliate/add')
		}
	}
	componentWillReceiveProps(nextProps) {
		const { action } = nextProps.match.params
		// if (params.action === 'add') this.handleReset()
		if (action === 'edit') {
			if (!nextProps.data.loading) {
				this.setState({ 
					data: { ...this.state.data, ...nextProps.data.affiliate[0] },
					entity: { ...this.state.entity, 
						...mapFields(nextProps.data.affiliate[0]),
						// Manula Add these
						'Password': '',
						'ConfirmPassword': '',
						// 'SecurityQuestionId': '',
						// 'SecurityAnswer': '',
						// 'EarningPlanId': ''
					}
				})
			}
		}

		function mapFields(values) {
			let data = {}
			rawFields.map(f => data[f.field] = values[f.field])
			return data
		}

		if (!nextProps.extradata.loading) {
			this.setState({ 
				options: {
					...this.state.options,
					AffiliateTypeEnum: nextProps.extradata.enumRepository[0].AffiliateTypeEnum,
					SettlementPeriodTypeEnum: nextProps.extradata.enumRepository[0].SettlementPeriodTypeEnum,
					AffiliateStatusTypeEnum: nextProps.extradata.enumRepository[0].AffiliateStatusTypeEnum,
					brandList: nextProps.extradata.brandList.items,
					securityQuestionList: nextProps.extradata.securityQuestionList.items,
					// affiliateEarningPlanList: nextProps.extradata.affiliateEarningPlanList.items,
					currencyList: nextProps.extradata.currencyList.items,
					bankList: nextProps.extradata.bankList.items,
					countryList: nextProps.extradata.countryList.items,
					iMPlatformList: nextProps.extradata.iMPlatformList.items
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
		const { data, entity, inputFields, options } = this.state
		
		const isEdit = method === 'edit'

		if (isEdit) {
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
							value: entity[f.field] || '',
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
					formTitle: `Affiliate ${isEdit ? `: ${data.UserName}` : ''}`,
					goBack: this.handleGoBack
				}) }

				<Card body>

					<Form onSubmit={this.handleSubmit} className="c-form">
						<div className="c-form__fields">
							{ inputFields.map((fields, index) => {
								let filteredFields = fields.filter(function(item) {
									return ((item.field === 'SecurityAnswer' || item.field === 'SecurityQuestionId') && isEdit) ? false : true;
								});
								return <div key={index}>
									{ fieldMapper(filteredFields, entity) }
								</div>
							}) }
						</div>
						<div className="c-form__submit">
							<Button color="primary"
								className="btn btn-primary"
								disabled={false}>
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
		$BrandId: ID!,        
		$CurrencyCode: String!,
		$FullName: String!,
		$PhoneNo: String!,
		$PrimaryEmail: String!,       
		$IM1: ID!,        
		$IM1UserName: String!,
		$AgreedToCondition: Boolean!,
		$UserName: String!,
		$Password: String,
		$ConfirmPassword: String,
		$AffiliateCode: String,
		$AffiliateType: AffiliateTypeEnum, 
		#$AffiliateTypeCode: String,
		$AffiliateStatus: AffiliateStatusTypeEnum!,
		$SecurityQuestionId: ID!,
		$SecurityAnswer:String!,
		$SecondaryEmail: String,
		$WebsiteURL: String,
		#$EarningPlanId: ID,
		$BonusCode: String,   
		$PhoneCountryCodeNo: String,
		$BankAccountName: String,
		$BankAccountNumber: String,
		$BankAccountBranch: String,
		$BankAccountCity: String,
		$BankAccountProvince: String,
		$BankId: ID,
		$IM2UserName: String,
		$IM2: ID,
		$CountryCode: String,
		$SettlementPeriod: SettlementPeriodTypeEnum!,
		$MarketingCost: Float,  
		#$ActiveRecord: Boolean!
	){
		affiliateMutation(
			entity: {
				Id:$Id, 
				BrandId: $BrandId,      
				CurrencyCode: $CurrencyCode,
				FullName: $FullName,
				PhoneNo: $PhoneNo,
				PrimaryEmail: $PrimaryEmail,
				IM1: $IM1,
				IM1UserName: $IM1UserName,
				AgreedToCondition: $AgreedToCondition,
				IsLegalAge: $AgreedToCondition, 
				UserName: $UserName,
				Password: $Password,
				ConfirmPassword: $ConfirmPassword,
				SecurityQuestionId: $SecurityQuestionId,
				SecurityAnswer: $SecurityAnswer,
				AffiliateCode: $AffiliateCode,
				AffiliateType: $AffiliateType,
				#AffiliateTypeCode: $AffiliateTypeCode,
				AffiliateStatus: $AffiliateStatus,
				SecondaryEmail: $SecondaryEmail,
				WebsiteURL: $WebsiteURL,
				#EarningPlanId: $EarningPlanId,
				BonusCode: $BonusCode,
				PhoneCountryCodeNo: $PhoneCountryCodeNo,               
				BankAccountName: $BankAccountName,
				BankAccountNumber: $BankAccountNumber,
				BankAccountBranch: $BankAccountBranch,
				BankAccountCity: $BankAccountCity,
				BankAccountProvince: $BankAccountProvince,
				BankId: $BankId,
				IM2UserName: $IM2UserName,
				IM2: $IM2,
				CountryCode: $CountryCode,
				SettlementPeriod: $SettlementPeriod,
				MarketingCost: $MarketingCost
				#ActiveRecord: $ActiveRecord,
			}
		){
			apiResult
		}
	}
`

export default compose(
	graphql(mutation, mutationOptions),
	graphql(query.getExtraQuery(), { name: 'extradata' }), 
	graphql(query.getAffiliate(), queryOptions)
)(AffiliateEdit)