/* eslint-disable react/no-deprecated */
import React, { Component, Fragment } from 'react'
import { graphql, compose } from 'react-apollo'
import PropTypes from 'prop-types'

import { Card, Button, FormGroup, Form } from 'reactstrap'

import Loader from '../../../../components/Loader'
import * as form from '../../../../utils/FormHelpers'
import ErrorBoundary from '../../../../utils/ErrorBoundary'

import * as query from './AffiliateTransaction.gql'

const rawFields = [
	{
		'field': 'TxnType',
		'label': 'Transaction Type',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'AffiliateTransactionUITypeEnum',
		'optionKeyName': 'name',
		'optionKeyValue': 'name',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'AffiliateTransactionUITypeEnum!',
		'onChangeFunc': '',
		'isDisabled': 'this.props.match.params.action === "edit"'
	},
	{
		'field': 'AffiliateUserName',
		'label': 'Affiliate Username',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': true,
		'options': query.getAsyncQuery.affiliateList,
		'optionKeyName': 'UserName',
		'optionKeyValue': 'UserName',
		'optionQueryKey': 'affiliateList',
		'lookupUrl': 'affiliate',
		'lookupField': 'UserName',
		'varType': 'String!',
		'onChangeFunc': '',
		'isDisabled': 'this.props.match.params.action === "edit"'
	},
	{
		'field': 'TransactionAmount',
		'label': 'Transaction Amount',
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
		'isDisabled': 'this.props.match.params.action === "edit" && (this.state.entity.TxnType !== "Credit_Memo" || this.state.entity.TxnType !== "Debit_Memo") && this.state.data.Status === "Approved"'
	},
]

class AffiliateTransactionEdit extends Component {

	static propTypes = {
		match: PropTypes.object,
		history: PropTypes.object,
		data: PropTypes.object,
		extradata: PropTypes.object,
		mutate: PropTypes.func,
	}

	static contextTypes = {
		onAlert: PropTypes.func,
		onGoBack: PropTypes.func
	}
	
	state = {
		data: {},
		entity: {
			TxnType: null,
			AffiliateUserName: '',
			TransactionAmount: 0
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
			this.props.history.replace('/affiliate_manager/affiliate_transaction/list')
		}
		if (params.action === 'add' && params.id) {
			this.props.history.replace('/affiliate_manager/affiliate_transaction/f/add')
		}
	}

	componentWillReceiveProps(newProps) {
		const { action } = newProps.match.params
		// if (params.action === 'add') this.handleReset()
		if (action === 'edit') {
			if (!newProps.data.loading) {
				this.setState({ 
					data: { ...this.state.data, ...newProps.data.affiliateTransaction[0] },
					entity: { ...this.state.entity, ...mapFields(newProps.data.affiliateTransaction[0]) } 
				})
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
					// AffiliateTransactionTypeEnum: newProps.extradata.enumRepository[0].AffiliateTransactionTypeEnum,
					AffiliateTransactionUITypeEnum: action === 'add' 
						? newProps.extradata.enumRepository[0].AffiliateTransactionUITypeEnum
						: newProps.extradata.enumRepository[0].AffiliateTransactionTypeEnum,
					// AffiliateTransactionStatusTypeEnum: newProps.extradata.enumRepository[0].AffiliateTransactionStatusTypeEnum
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
					formTitle: `Affiliate Transaction ${isEdit ? `: ${data.TransactionNo}` : ''}`,
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
								className="btn btn-primary"
								disabled={isEdit && data.TxnType !== 'Credit_Memo' && data.TxnType !== 'Debit_Memo'}>
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
			Id: props.match.params.id || 0
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

export default compose(
	graphql(query.mutateAffiliateTransaction(), mutationOptions),
	graphql(query.getExtraQuery(), { name: 'extradata' }), 
	graphql(query.getAffiliateTransaction(), queryOptions)
)(AffiliateTransactionEdit)