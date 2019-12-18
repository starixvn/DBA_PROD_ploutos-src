import React, { Component } from 'react'
import { graphql, compose } from 'react-apollo'
import gql from 'graphql-tag'
import {
	// Row,
	Col,
	Button,
	Card,
	CardHeader,
	CardFooter,
	CardBody,
	// Form,
	FormGroup,
	Label,
	Input,
} from 'reactstrap'
import PropTypes from 'prop-types'

import Loader from '../../../../components/Loader'
import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'

class UserPersonalInfoEdit extends Component {
	constructor() {
		super()
		this.state = {
			entity: {},
			passwordChange: '',
			passwordChangeConfirm: '',
			ErrorMessage: ''
		}
		this.formSubmit = this.formSubmit.bind(this)
		this.handleInputChange = this.handleInputChange.bind(this)
		// this.handleBrandsChange = this.handleBrandsChange.bind(this)
		// this.handleEnabledChange = this.handleEnabledChange.bind(this)
	}

	componentWillReceiveProps(newProps) {
		if (!newProps.data.loading) {
			this.setState({ entity: { ...newProps.data.userPersonalInfo[0] } })
		}
	}

	handleInputChange = f => e => {
		this.setState({
			entity: { ...this.state.entity, [f]: e.target.value }
		})
	}

	// handleEnabledChange = (f) => (e) => {
	//     this.setState({
	//         entity: {...this.state.entity, ['enabled']: e.target.checked }
	//     })
	// }

	handlePasswordChange = f => e => {
		this.setState({
			[f]: e.target.value
		})
	}

	// handleBrandsChange = (f) => (e) => {
	//     let existingBrands = this.state.entity.BrandMarkets !== null ? String(this.state.entity.BrandMarkets).split(',') : []
	//     if(e.target.checked){
	//         existingBrands.push(e.target.value)
	//     }else{
	//         for(var itr = 0; itr < existingBrands.length; itr++){
	//             if(existingBrands[itr] == e.target.value){
	//                 existingBrands.splice(itr, 1)
	//             }
	//         }
	//     }
	//     existingBrands = Array.from(new Set(existingBrands))
	//     this.setState({
	//         entity: {...this.state.entity, ['BrandMarkets']: existingBrands.join(',') }
	//     })
	// }

	formSubmit(context) {
		const { entity } = context.state
		if (this.state.passwordChange != this.state.passwordChangeConfirm) {
			alert('Password does not match!')
		} else {
			context.props.mutate({
				variables: {
					Id: entity.id,
					username: entity.username,
					email: entity.email,
					enabled: entity.enabled,
					default_password: context.state.passwordChange,
					LastName: entity.LastName,
					FirstName: entity.FirstName,
					BirthDate: null,
					Gender: 'Male',
					Street1: '',
					Street2: '',
					CityCode: '',
					RegionCode: '',
					StateProvinceCode: '',
					Zip: '',
					BrandMarkets: entity.BrandMarkets,
					roles: entity.roles || 'ROLE_APP_SUPPORT'
				}
			})
				.then(() => SuccessHandler({
					context: this.context, 
					callback: null
				}))
				.catch(error => ErrorHandler({
					context: this.context,
					error: { error }
				}))
		}
	}

	// isBrandMarketChecked(BrandMarket){
	//     let existingBrands = String(this.state.entity.BrandMarkets).split(',')
	//     for(var itr = 0; itr < existingBrands.length; itr++){
	//         if(existingBrands[itr] == BrandMarket){
	//             return true
	//         }
	//     }
	//     return false
	// }

	// isRoleChecked(role){
	//     let roleList = String(this.state.entity.roles)
	//     for(var itr = 0; itr < roleList.length; itr++){
	//         if(roleList[itr] == role){
	//             return true
	//         }
	//     }
	//     return false
	// }
	
	isAdmin() {
		return this.props.userInfo.userRole == 'ROLE_ADMIN'
	}

	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'

		if (this.props.data.loading) return loader
		if (this.props.data.error) return errorLoad

		const { entity } = this.state

		return (
			<Card>
				<CardHeader>
					<strong>Edit Your Personal Information:</strong>
					<small> All fields with asterisk (*) is required.</small>
				</CardHeader>
				<CardBody className="card-body">
					<FormGroup>
						<Label htmlFor="email">Email</Label>
						<Input type="text" id="email" placeholder="juan.dela.cruz@gmail.com"
							readOnly
							value={entity.email || ''} />
					</FormGroup>
					<FormGroup>
						<Label htmlFor="username">UserName</Label>
						<Input type="text" id="username" placeholder="juan_dela_cruz"
							readOnly
							value={entity.username || ''} />
					</FormGroup>
					<FormGroup row>
						<Col xs="6">
							<FormGroup>
								<Label htmlFor="passwordChange">Password (*)</Label>
								<Input type="password" id="passwordChange" placeholder="********"
									value={this.state.passwordChange || ''}
									onChange={this.handlePasswordChange('passwordChange')} />
							</FormGroup>
						</Col>
						<Col xs="6">
							<FormGroup>
								<Label htmlFor="passwordChangeConfirm">Confirm Password (*)</Label>
								<Input type="password" id="passwordChangeConfirm" placeholder="********"
									value={this.state.passwordChangeConfirm || ''}
									onChange={this.handlePasswordChange('passwordChangeConfirm')} />
							</FormGroup>
						</Col>
					</FormGroup>
					<FormGroup row>
						<Col xs="6">
							<FormGroup>
								<Label htmlFor="LastName">Last Name</Label>
								<Input type="text" id="LastName" placeholder="Dela Cruz"
									value={entity.LastName || ''}
									onChange={this.handleInputChange('LastName')} />
							</FormGroup>
						</Col>
						<Col xs="6">
							<FormGroup>
								<Label htmlFor="FirstName">First Name</Label>
								<Input type="text" id="FirstName" placeholder="Juan"
									value={entity.FirstName || ''}
									onChange={this.handleInputChange('FirstName')} />
							</FormGroup>
						</Col>
					</FormGroup>
				</CardBody>
				<CardFooter>
					<Button type="submit" size="sm" color="primary" onClick={() => this.formSubmit(this)}><i className="fa fa-dot-circle-o"></i> Submit</Button>{' '}
					<Button type="reset" size="sm" color="danger"><i className="fa fa-ban"></i> Reset</Button>
				</CardFooter>
			</Card>
		)
	}
}

UserPersonalInfoEdit.propTypes = {
	data: PropTypes.object,
	userInfo: PropTypes.object
}

UserPersonalInfoEdit.contextTypes = {
	onAlert: PropTypes.func
}

const queryOptions = {
	options: () => ({
		variables: {},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

const query = gql`
  query QUERY_VIEW{
	userPersonalInfo{
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
	  roles
	}
  }
`

const mutation = gql`
  mutation MUTATE_ADMINUSER_EDIT(
	  $Id: ID!
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
	  $default_password: String
	){
	  userPersonalInfoMutation(
		id:$Id
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
		default_password: $default_password
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
	  }
	}
`

export default compose(
	graphql(query, queryOptions), 
	graphql(mutation)
)(UserPersonalInfoEdit)