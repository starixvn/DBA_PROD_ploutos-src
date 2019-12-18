/* eslint-disable react/no-deprecated */
import React, { Component, Fragment } from 'react'
import { graphql, compose } from 'react-apollo'
import gql from 'graphql-tag'
import PropTypes from 'prop-types'

import { Card, Button, FormGroup, Form } from 'reactstrap'

import Loader from '../../../../components/Loader'
import * as form from '../../../../utils/FormHelpers'
import ErrorBoundary from '../../../../utils/ErrorBoundary'

import * as query from './User.gql'

const rawFields = [
	{
		'field': 'roles',
		'label': 'Role',
		'inputType': 'select',
		'isEnum': true,
		'isAsyncMode': false,
		'options': 'UserRoleTypeEnum',
		'optionKeyName': 'name',
		'optionKeyValue': 'name',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'UserRoleTypeEnum!',
		'onChangeFunc': '',
		'isDisabled': 'this.props.userInfo.userRole !== "ROLE_ADMIN"'
	},
	{
		'field': 'TeamId',
		'label': 'Team',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'teamsList',
		'optionKeyName': 'TeamName',
		'optionKeyValue': 'Id',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'ID',
		'onChangeFunc': '',
		'isDisabled': 'this.props.userInfo.userRole !== "ROLE_ADMIN"'
	},
	{
		'field': 'BrandMarkets',
		'label': 'Brand Markets',
		'inputType': 'select',
		'isEnum': false,
		'isAsyncMode': false,
		'options': 'brandMarketList',
		'optionKeyName': 'BrandCode',
		'optionKeyValue': 'BrandMarketCode',
		'optionQueryKey': '',
		'optionsMulti': true,
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'String!',
		'onChangeFunc': '',
		'isDisabled': 'this.props.userInfo.userRole !== "ROLE_ADMIN"'
	},
	{
		'field': 'username',
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
		'isDisabled': 'this.props.userInfo.userRole !== "ROLE_ADMIN"'
	},
	{
		'field': 'email',
		'label': 'Email',
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
		'isDisabled': 'this.props.userInfo.userRole !== "ROLE_ADMIN"'
	},
	{
		'field': 'default_password',
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
		'isDisabled': false//'this.props.match.params.action !== "add" && (this.props.userInfo.userRole !== "ROLE_ADMIN" || this.props.userInfo.userName !== this.state.data.username)'
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
		'isDisabled': false//'this.props.match.params.action !== "add" && (this.props.userInfo.userRole !== "ROLE_ADMIN" || this.props.userInfo.userName !== this.state.data.username)'
	},
	{
		'field': 'FirstName',
		'label': 'First Name',
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
		'field': 'LastName',
		'label': 'Last Name',
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
		'field': 'enabled',
		'label': 'Status',
		'inputType': 'checkbox',
		'isEnum': false,
		'isAsyncMode': false,
		'options': '',
		'optionKeyName': '',
		'optionKeyValue': '',
		'optionQueryKey': '',
		'lookupUrl': '',
		'lookupField': '',
		'varType': 'Boolean',
		'onChangeFunc': '',
		'isDisabled': '(this.props.match.params.action === "edit") ? false :true'
	},
]

class UserEdit extends Component {

	static propTypes = {
		match: PropTypes.object,
		history: PropTypes.object,
		data: PropTypes.object,
		extradata: PropTypes.object,
		userInfo: PropTypes.object
	}

	static contextTypes = {
		onAlert: PropTypes.func,
		onGoBack: PropTypes.func
	}

	state = {
		data: {},
		entity: {
			roles: 'ROLE_APP_SUPPORT',
			BrandMarkets: '',
			TeamId: 0,
			username: '',
			email: '',
			FirstName: '',
			LastName: '',
			default_password: '',
			ConfirmPassword: '',
			enabled: true
		},
		inputFields: [],
		options: {},
		isSubmitting: false,
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
		if (entity['Id']!== undefined){
			delete entity['Id']
			delete entity['BirthDate']
			delete entity['Gender']
			delete entity['Street1']
			delete entity['Street2']
			delete entity['CityCode']
			delete entity['RegionCode']
			delete entity['StateProvinceCode']
			delete entity['Zip']
		}
		const callback = () => this.setState({ isSubmitting: !this.state.isSubmitting })
		const submitCheck = form.shouldSubmit({ entity, fields: rawFields })

		const passIsEmpty = entity.default_password === '' || entity.ConfirmPassword === ''
		const passIsSame = entity.default_password === entity.ConfirmPassword
		const isEnabled = entity.enabled

		if ( (props.match.params.action === 'add' && !passIsEmpty && !passIsSame)
			|| (props.match.params.action === 'edit'  && !passIsEmpty && !passIsSame)
			|| (props.match.params.action === 'edit'  && passIsEmpty && passIsSame && isEnabled)
		) {

			this.context.onAlert({
				isOpen: true,
				type: 'error',
				message: 'Passwords are empty or does not match.'
			})

		} else {
			if (submitCheck || entity.enabled === false) {
				this.setState({ isSubmitting: !this.state.isSubmitting }, () => {
					
					entity.id = props.match.params.action === 'edit' ? this.props.data.user[0].id : 0,
					entity.enabled = props.match.params.action === 'add' ? true : entity.enabled ,
					entity.BirthDate = null,
					entity.Gender = null,
					entity.Street1 = '',
					entity.Street2 = '',
					entity.CityCode = '',
					entity.RegionCode = '',
					entity.StateProvinceCode = '',
					entity.Zip = ''

					// OVERRIDE BrandMarkets
					if (Array.isArray(entity.BrandMarkets)){
						entity.BrandMarkets = entity.BrandMarkets.join(',')
					}
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
			this.props.history.replace('/admin/user/list')
		}
		if (params.action === 'add' && params.id) {
			this.props.history.replace('/admin/user/f/add')
		}
	}

	componentWillReceiveProps(newProps) {
		const { action } = newProps.match.params
		// if (params.action === 'add') this.handleReset()
		if (action === 'edit') {
			if (!newProps.data.loading) {
				this.setState({ 
					data: { ...this.state.data, ...newProps.data.user[0] },
					entity: { ...this.state.entity, 
						...mapFields(newProps.data.user[0]),
						// Manula Add these
						'default_password': '',
						'ConfirmPassword': '',
					} 
				})
			}
		}

		function mapFields(values) {
			let data = {}
			rawFields.map(f => data[f.field] = values[f.field])
			return data
		}

		if (!newProps.extradata.loading) {

			const brandMarketList = newProps.extradata.brandMarketList.items.slice()

			this.setState({ 
				options: {
					...this.state.options,
					UserRoleTypeEnum: newProps.extradata.enumRepository[0].UserRoleTypeEnum,
					teamsList: newProps.extradata.teamsList.items,
					brandMarketList: brandMarketList.map(brand => {
						brand.BrandCode = `${brand.BrandCode} - ${brand.CurrencyCode}`
						return brand
					})
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

		if (!Array.isArray(entity.BrandMarkets)){
			entity.BrandMarkets = entity.BrandMarkets.split(',')
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
					formTitle: `User ${isEdit ? `: ${data.username}` : ''}`,
					goBack: this.handleGoBack
				}) }

				<Card>

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
			username: props.match.params.id,
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

const mutationOptions = {
	options: () => ({
		variables: {
			// Id: props.match.params.id || 0
		},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}


const mutation = gql`
  mutation MUTATE_ADMINUSER_EDIT(
      $id: ID!
      $username: String!,
      $email: String!,
      $enabled: Boolean,
      $roles: UserRoleTypeEnum!
      $LastName: String,
      $FirstName: String,
      $BirthDate: DateTime,
      $Gender: GenderTypeEnum,
      $Street1: String,
      $Street2: String,
      $CityCode: String,
      $RegionCode: String,
      $StateProvinceCode: String,
      $Zip: String,
      $BrandMarkets: String!,
      $default_password: String,
	  $TeamId: ID
    ){
      userMutation(
        id:$id
        enabled:$enabled
        username:$username
        email:$email
        LastName:$LastName
        FirstName:$FirstName
        BirthDate:$BirthDate
        Gender:$Gender
        Street1:$Street1
        Street2:$Street2
        CityCode:$CityCode
        RegionCode:$RegionCode
        StateProvinceCode:$StateProvinceCode
        Zip:$Zip
        roles: $roles
        BrandMarkets: $BrandMarkets,
        default_password: $default_password,
        TeamId: $TeamId
      ){
        id
        username
        email
        LastName
        FirstName
        BirthDate
        Gender
        Street1
        Street2
        CityCode
        RegionCode
        StateProvinceCode
        Zip
        enabled
        BrandMarkets
				TeamId
      }
    }
`

export default compose(
	graphql(mutation, mutationOptions),
	graphql(query.getExtraQuery(), { name: 'extradata' }),
	graphql(query.getAdminUser(), queryOptions)
)(UserEdit)