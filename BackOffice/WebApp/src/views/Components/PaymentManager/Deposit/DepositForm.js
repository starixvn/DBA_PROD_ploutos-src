import React, {	Component, Fragment } from 'react'
import PropTypes from 'prop-types'
import { graphql, compose, withApollo } from 'react-apollo'

import Card from 'reactstrap/lib/Card'
import Form from 'reactstrap/lib/Form'
import FormGroup from 'reactstrap/lib/FormGroup'
import Button from 'reactstrap/lib/Button'

import Loader from '../../../../components/Loader'
import * as form from '../../../../utils/FormHelpers'
import ErrorBoundary from '../../../../utils/ErrorBoundary'

import * as query from './Deposit.gql'

const rawFields = [
	{
		'field': 'PlayerLoginName',
		'label': 'Player',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': true,
		'options': query.getAsyncQuery.playerProfileList,
		'optionKeyName': 'UserName',
		'optionKeyValue': 'UserName',
		'optionQueryKey': 'playerProfileList',
		'lookupUrl': 'profile',
		'lookupField': 'UserName',
		'varType': 'String!',
		'onChangeFunc': 'onChangePlayer',
		'isDisabled': false
	},
	{
		'field': 'DepositType',
		'label': 'Deposit Type',
		'inputType': 'select',
		'isEnum': true,
		'isAsyncMode': false,
		'options': 'WalletDepositTypeTypeEnum',
		'optionKeyName': 'name',
		'optionKeyValue': 'name',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID',
		'onChangeFunc': '',
		'isDisabled': true
	},
	{
		'field': 'PaymentMethodId',
		'label': 'Payment Method',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'paymentMethodList',
		'optionKeyName': 'PaymentMethodName',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID!',
		'onChangeFunc': 'onChangePaymentMethod',
		'isDisabled': 'this.state.entity.PlayerLoginName === ""'
	},
	{
		'field': 'BankAccountId',
		'label': 'Bank Account',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'bankAccountPaymentMethodList',
		'optionKeyName': 'AccountNameAndNo',
		'optionKeyValue': 'BankAccountId',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID',
		'onChangeFunc': '',
		'isDisabled': 'this.state.entity.PaymentMethodId === null|| this.state.entity.PaymentMethodId === ""'
	},
	{
		'field': 'BonusCode',
		'label': 'Bonus Code',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'bonusList',
		'optionKeyName': 'BonusCode',
		'optionKeyValue': 'BonusCode',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String',
		'onChangeFunc': '',
		'isDisabled': 'this.state.entity.PlayerLoginName === ""'
	},
	{
		'field': 'DepositAmount',
		'label': 'Deposit Amount',
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
		'field': 'Notes',
		'label': 'Notes',
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
]

class DepositForm extends Component {

	static propTypes = {
		match: PropTypes.object,
		history: PropTypes.object,
		mutate: PropTypes.func,
		client: PropTypes.object,
		method: PropTypes.string,
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
			PaymentMethodId: '',
			BankAccountId: 0,
			DepositType: 'Offline',
			DepositAmount: '',
			BonusCode: '',
			PlayerLoginName: '',
			Notes: ''
		},
		inputFields: [],
		options: {
			paymentMethodList: [],
			bonusList: [],
			bankAccountPaymentMethodList: [],
			WalletDepositTypeTypeEnum: []
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

		entity.DepositAmount = parseFloat(entity.DepositAmount)

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
	onChangePlayer = e => {
		const extradata = this.props.extradata
		const UserName = e.target.value || ''

		// SET VALUE
		this.setState({ 
			entity: { ...this.state.entity, PlayerLoginName: UserName } 
		}, async () => {
			// THEN, Query based on selected UserName
			try {
				await this.props.client.query({
					query: query.playerQuery(),
					variables: {
						UserName
					},
					fetchPolicy: 'network-only'
				})
					// THEN, Filter PaymentMethods and Bonus based on selected Player's profile
					.then( async res => {						
						const data = res.data.playerProfile[0]
						this.setState({
							options: {
								...this.state.options,
								bonusList: //form.filterOptionList(data['bonusList'], 'BrandId', UserName),
									extradata.bonusList.items.filter(l => {
										return l.CurrencyCode === data.CurrencyCode && l.BrandCode === data.BrandCode && l.ActiveRecord
									}),
								paymentMethodList: extradata.paymentMethodList.items.filter(l => {
									return l.CurrencyCode === data.CurrencyCode
								}),
							},
							entity: {
								...this.state.entity,
								PaymentMethodId: '',
								BonusCode: ''
							}
						})
					})
			} 
			catch (error) {
				/* eslint-disable no-console */
				console.log(error)
			}

		})
	}
	onChangePaymentMethod = e => {
		const extradata = this.props.extradata

		// SET VALUE
		this.setState({ 
			entity: { ...this.state.entity, PaymentMethodId: e.target.value } 
		}, async () => {			
			// THEN, Filter Bank Accounts List based on selected Payment Method ID
			await this.setState({
				options: {
					...this.state.options,
					bankAccountPaymentMethodList: extradata.bankAccountPaymentMethodList.items.filter(l => {
						return l.PaymentMethodId === e.target.value && l.BankAccountActiveRecord
					})
				},
				entity: {
					...this.state.entity,
					BankAccountId: 0
				}
			})
		})
	}

	handleGoBack = () => this.context.onGoBack()

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
	componentWillReceiveProps(nextProps) {
		if (!nextProps.extradata.loading) {
			this.setState({ 
				options: {
					...this.state.options,
					WalletDepositTypeTypeEnum: nextProps.extradata.enumRepository[0].WalletDepositTypeTypeEnum,
				}
			})
		}
	}

	componentDidMount() {
		// const fields = form.getInputFields({ props: this.props, context: { fields: tableHeaders }  }) //this.context
		const method = this.props.match.params.action

		// this.initInputValues(rawFields)
		this.initInputFields(rawFields)

		localStorage.setItem('pageAction', method)
	}

	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'

		const method = this.props.match.params.action
		const { entity, inputFields, options } = this.state

		if (method !== 'add') {
			if (this.props.data.loading) return loader
			if (this.props.data.error) return errorLoad(this.props.data.error)
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
					formTitle: 'Offline Deposit',
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

const mutationOptions = { 
	options: () => ({
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

export default compose(
	graphql(query.mutateDeposit(), mutationOptions),
	graphql(query.getExtraQuery(), { name: 'extradata' })
)(withApollo(DepositForm))