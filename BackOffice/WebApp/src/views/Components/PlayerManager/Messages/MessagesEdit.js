/* eslint-disable react/no-deprecated */
import React, {	Component, Fragment } from 'react'
import PropTypes from 'prop-types'
import gql from 'graphql-tag'
import { graphql, compose, withApollo } from 'react-apollo'
import moment from 'moment'

import { Card, Button, FormGroup, Form } from 'reactstrap'

import Loader from '../../../../components/Loader'
import { GetQueryMeta } from '../../../../utils/CoreHelpers'
import * as form from '../../../../utils/FormHelpers'
import ErrorBoundary from '../../../../utils/ErrorBoundary'
import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'

import * as query from './Messages.gql'

// import * as action from './Messages.actions'

const rawFields = [	
	{
		'field': 'SentToAll',
		'label': 'Send to all',
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
		'onChangeFunc': 'onChangeSentToAll',
		'isDisabled': false
	},
	{
		'field': 'PlayerProfileId',
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
		'varType': 'Int',
		'onChangeFunc': 'onChangePlayer',
		'isDisabled': 'this.state.entity.SentToAll === true'
	},
	{
		'field': 'BrandCode',
		'label': 'Brand',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'brandList',
		'optionKeyName': 'BrandCode',
		'optionKeyValue': 'BrandCode',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String!',
		'onChangeFunc': 'onChangeBrand',
		'isDisabled': 'this.state.entity.SentToAll === false'
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
		'isDisabled': 'this.state.entity.SentToAll === false'
	},
	{
		'field': 'MessageType',
		'label': 'Message Type',
		'inputType': 'select',
		'isEnum': true,
		'isAsyncMode': false,
		'options': 'MessagesTypeEnum',
		'optionKeyName': 'name',
		'optionKeyValue': 'name',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'MessagesTypeEnum!',
		'onChangeFunc': '',
		'isDisabled': false
	},
	{
		'field': 'MessageContent',
		'label': 'Message',
		'inputType': 'textarea',
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
]

class MessagesEdit extends Component {
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
			SentToAll: false,
			PlayerProfileId: '',
			BrandCode: '',
			CurrencyCode: '',
			MessageType: '',
			MessageContent: ''
		},
		options: {
			brandList: [],
			currencyList: [],
			MessagesTypeEnum: [],
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
			const entity =  {	
				Id: this.state.data.Id,	
				MessageNumber: this.state.data.MessageNumber,	
				SentToAll: this.state.entity.SentToAll,
				PlayerProfileId: this.state.entity.PlayerProfileId !== undefined ? this.state.entity.PlayerProfileId : 0,
				BrandCode: this.state.entity.BrandCode,
				CurrencyCode: this.state.entity.CurrencyCode,
				MessageType: this.state.entity.MessageType,
				MessageContent: this.state.entity.MessageContent
			}
			this.setState({ isSubmitting: !this.state.isSubmitting }, () => {
				// form.submitForm({ props, context, entity, callback })
				props.messageUpdate({
					variables: entity
				}).then(() => SuccessHandler({
					context: context, 
					callback: context.onGoBack()
				})).catch(error => {
					ErrorHandler({
						context: context,
						error: { error },
						callback: typeof callback === 'function' ? callback() : ''
					})
				})
			})
		} else {
			this.context.onAlert({
				isOpen: true,
				type: 'error',
				message: 'Fill up required fields.'
			})
		}
	}

	saveAndSend = e => {
		e.preventDefault()
		const { props, context, state: { entity } } = this

		const callback = () => this.setState({ isSubmitting: !this.state.isSubmitting })
		const submitCheck = form.shouldSubmit({ entity, fields: rawFields })

		if (submitCheck) {

			const entity =  {		
				Id: this.state.data.Id,	
				MessageNumber: this.state.data.MessageNumber,	
				SentToAll: this.state.entity.SentToAll,
				PlayerProfileId: this.state.entity.PlayerProfileId !== undefined ? this.state.entity.PlayerProfileId : 0,
				BrandCode: this.state.entity.BrandCode,
				CurrencyCode: this.state.entity.CurrencyCode,
				MessageType: this.state.entity.MessageType,
				MessageContent: this.state.entity.MessageContent				
			}
				
			this.setState({ isSubmitting: !this.state.isSubmitting }, () => {
				// form.submitForm({ props, context, entity, callback })
				props.messageUpdateAndSendToAll({
					variables: entity
				}).then(() => SuccessHandler({
					context: context, 
					callback: context.onGoBack()
				})).catch(error => {
					ErrorHandler({
						context: context,
						error: { error },
						callback: typeof callback === 'function' ? callback() : ''
					})
				})
			})
		} else {
			this.context.onAlert({
				isOpen: true,
				type: 'error',
				message: 'Fill up required fields.'
			})
		}
	}

	onChangeSentToAll = e => {

		const validate = this.state.entity.SentToAll
		
		const SentToAll = (validate === false) ? true : false
		
		// SET VALUE
		this.setState({ 
			entity: { ...this.state.entity, SentToAll	}
		}, () => {
			if (SentToAll === true) {
				if (document.getElementsByClassName('Select-value-label')[0].innerText !== '') {					
					document.getElementsByClassName('Select-value-label')[0].innerText = ''
				}
				
				this.setState({ 
					entity: {
						SentToAll: SentToAll === true ? true : false,
						PlayerProfileId: 0,
						BrandCode: '',
						CurrencyCode: '',
						MessageType: '',
						MessageContent: ''
					}
				})
			}			
		})
	}

	onChangePlayer = e => {
		const UserName = e.target.value || ''		
		try {
			//GET PLAYER PROFILE ID 
			this.props.client.query({
				query: query.playerQuery(),
				variables: {
					UserName
				},
				fetchPolicy: 'network-only'
			})
				.then( async res => {						
					const data = res.data.playerProfile[0]
					
					// CREATE OBJECT
					const newValue = {
						PlayerProfileId: data.Id,
						BrandCode: data.BrandCode,
						CurrencyCode: data.CurrencyCode
					}

					//SET PLAYER PROFILE ID | BRAND CODE | CURRENCY CODE  - USING SPREAD OPERATOR
					this.setState({ 
						entity: { ...this.state.entity, ...newValue } 
					})
				})
		} 
		catch (error) {
			/* eslint-disable no-console */
			console.log(error)
		}		
	}

	onChangeBrand = e => {
		const BrandCode = e.target.value

		// SET VALUE
		this.setState({ 
			entity: { ...this.state.entity, BrandCode } 
		})
	}

	onChangeCurrency = e => {
		const CurrencyCode = e.target.value

		// SET VALUE
		this.setState({ 
			entity: { ...this.state.entity, CurrencyCode } 
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

		localStorage.setItem('pageAction', 'edit')
	}

	componentWillReceiveProps(nextProps) {
		if (!nextProps.data.loading) {
			this.setState({ 
				data: { ...this.state.data, ...nextProps.data.messages[0] },
				entity: { ...this.state.entity, 
					...mapFields(nextProps.data.messages[0]),
				},	
			})
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
					brandList: nextProps.extradata.brandList.items,
					currencyList: nextProps.extradata.currencyList.items,
					MessagesTypeEnum: nextProps.extradata.enumRepository[0].MessagesTypeEnum
				}
			})
		}
	}
	
	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'
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
					method: 'edit',
					formTitle: 'Message',
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
							<Button color="info" className="btn btn-info">
								<i className="fa fa-check"></i>{' '}
								{ this.state.isSubmitting ? 'Submitting ...' : 'Update' }
							</Button>{' '}
							<Button color="primary" className="btn btn-primary" onClick={this.saveAndSend} >
								<i className="fa fa-check"></i>{' '}
								{ this.state.isSubmitting ? 'Submitting ...' : 'Save & Send' }
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


export default compose(
	// graphql(mutation, mutationOptions),
	graphql(query.getExtraQuery(), { name: 'extradata' }), 
	graphql(query.mutatePlayerMessages(), mutationOptions),
	graphql(query.mutatePlayerMessagesUpdateAndSendToAll(), (mutationOptions, { name: 'messageUpdateAndSendToAll' })),
	graphql(query.mutatePlayerMessagesUpdate(), (mutationOptions, { name: 'messageUpdate' })),
	graphql(query.getPlayerMessage(), queryOptions)
)(withApollo(MessagesEdit))