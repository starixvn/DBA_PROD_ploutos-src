/* eslint-disable react/no-deprecated */
import React, {	Component, Fragment } from 'react'
import PropTypes from 'prop-types'
import gql from 'graphql-tag'
import { graphql, compose } from 'react-apollo'
import moment from 'moment'

import { Card, Button, FormGroup, Form } from 'reactstrap'

import Loader from '../../../../components/Loader'
import { GetQueryMeta } from '../../../../utils/CoreHelpers'
import * as form from '../../../../utils/FormHelpers'
import ErrorBoundary from '../../../../utils/ErrorBoundary'

import * as query from './PlayerProfile.gql'

const rawFields = [
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
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'BirthDate',
		'label': 'Birth Date',
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
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'WebChatUserName',
		'label': 'WeChat Username',
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
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'QQUserName',
		'label': 'QQ Username',
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
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'KakaoTalkId',
		'label': 'Kakao Talk ID',
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
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'SkypeId',
		'label': 'Skype ID',
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
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'WhatsappId',
		'label': 'WhatsApp ID',
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
		'showFormDefault': true,
		'isDisabled': false
	},
	{
		'field': 'LineId',
		'label': 'Line ID',
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
		'showFormDefault': true,
		'isDisabled': false
	},

]

class PlayerProfileEdit extends Component {

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
			FullName: '',
			BirthDate: moment().format('YYYY-MM-DD HH:mm:ss'),
			WebChatUserName: '',
			QQUserName: '',
			KakaoTalkId: '',
			SkypeId: '',
			WhatsappId: '',
			LineId: '',
		},
		options: {},
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

		const { props, context, state: { entity, data } } = this
		const callback = () => this.setState({ isSubmitting: !this.state.isSubmitting })
		const submitCheck = form.shouldSubmit({ entity, fields: rawFields })

		if (submitCheck) {
			// console.log('not empty. go on!')
			this.setState({ isSubmitting: !this.state.isSubmitting }, () => {

				// Additional entity fields
				entity.UserName = data.UserName
				entity.Email = data.Email || ''
				entity.MobileNumber = data.MobileNo || ''

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
				data: { ...this.state.data, ...nextProps.data.playerProfile[0] },
				entity: { ...this.state.entity, 
					...mapFields(nextProps.data.playerProfile[0]),
				}
				// entity: { ...this.state.data, ...nextProps.data.playerProfile[0] },
			})
		}

		function mapFields(values) {
			let data = {}
			rawFields.map(f => data[f.field] = values[f.field])
			return data
		}
	}
	
	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'

		// const method = this.props.match.params.action
		const { data, entity, options, inputFields } = this.state

		if (this.props.data !== undefined) {
			if (this.props.data.loading) return loader
			if (this.props.data.error) return errorLoad
		}

		const getdate = new Date()
		const dd = String(getdate.getDate()).padStart(2, '0')
		const mm = String(getdate.getMonth() + 1).padStart(2, '0')
		const yyyy = getdate.getFullYear()- 18 		
		const birtdateSet = yyyy + '-' + mm + '-' + dd + ' 00:00:00'
		
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
							value: (f.field=== 'BirthDate' && entity[f.field].substring(0,10) === '0001-01-01' )? birtdateSet :  entity[f.field] || '',
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
					formTitle: `Player Profile ${data.UserName}`,
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
			Id: props.match.params.id,
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

const mutation = gql`
	mutation MUTATION_VARS(
		${String(GetQueryMeta('getEntityTypes', rawFields))}
		$UserName: String!
		$Email: String!
		$MobileNumber: String!
	){
		actionEditPlayerProfileMutation(
			${String(GetQueryMeta('getEntityFilters', rawFields))}
			UserName: $UserName
			Email: $Email
			MobileNumber: $MobileNumber
		){
			apiResult
		}
	}
`

export default compose(
	graphql(mutation, mutationOptions),
	graphql(query.getProfile(), queryOptions)
)(PlayerProfileEdit)