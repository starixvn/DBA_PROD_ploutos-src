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
import SelectSearch from '../../../../components/SelectSearch'
import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'

class UserCreate extends Component {
	constructor() {
		super()
		this.state = {
			entity: {
				username: '',
				email: '',
				LastName: '',
				FirstName: '',
				BirthDate: '1988-01-01 00:00:00',
				Gender: 'Male',
				Street1: '',
				Street2: '',
				CityCode: '',
				RegionCode: '',
				StateProvinceCode: '',
				Zip: '',
				enabled: true,
				default_password: '',
				confirm_default_password: '',
				roles: 'ROLE_APP_SUPPORT',
				BrandMarkets: '',
				TeamId: 0
			},
			ErrorMessage: '',
			SuccessUserCreated: false,
			isSuccess: false,
			errorMsg: [],
			intervalId: 0
		}
		this.formSubmit = this.formSubmit.bind(this)
		this.handleInputChange = this.handleInputChange.bind(this)
		this.handleBrandsChange = this.handleBrandsChange.bind(this)
		this.handleEnabledChange = this.handleEnabledChange.bind(this)
	}

	handleInputChange = f => e => {
		this.setState({
			entity: { ...this.state.entity, [f]: e.target.value }
		})
	}

	// handleRoleChange = (f) => (e) => {
	//     this.setState({
	//         entity: {...this.state.entity, [f]: [e.target.value] }
	//     })
	// }

	handleEnabledChange = () => e => {
		this.setState({
			entity: { ...this.state.entity, ['enabled']: e.target.checked }
		})
	}

	isBrandMarketChecked(BrandMarket) {
		let existingBrands = String(this.state.entity.BrandMarkets).split(',')
		for (var itr = 0; itr < existingBrands.length; itr++) {
			if (existingBrands[itr] == BrandMarket) return true
		}
		return false
	}


	isRoleChecked(role) {
		let roleList = String(this.state.entity.roles)
		for (var itr = 0; itr < roleList.length; itr++) {
			if (roleList[itr] == role) return true
		}
		return false
	}

	handleBrandsChange = () => e => {
		let existingBrands = (this.state.entity.BrandMarkets == null || this.state.entity.BrandMarkets == '') ? [] : String(this.state.entity.BrandMarkets).split(',')
		if (e.target.checked) {
			existingBrands.push(e.target.value)
		} else {
			for (var itr = 0; itr < existingBrands.length; itr++) {
				if (existingBrands[itr] == e.target.value) {
					existingBrands.splice(itr, 1)
				}
			}
		}
		existingBrands = Array.from(new Set(existingBrands))
		this.setState({
			entity: { ...this.state.entity, ['BrandMarkets']: existingBrands.join(',') }
		})
	}

	formSubmit(context) {
		const { entity } = context.state
		context.props.mutate({
			variables: {
				username: entity.username,
				email: entity.email,
				enabled: entity.enabled,
				default_password: entity.default_password,
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
				roles: entity.roles || 'ROLE_APP_SUPPORT',
				BrandMarkets: entity.BrandMarkets,
				TeamId: parseInt(entity.TeamId)
			}
		})
			.then(() => SuccessHandler({
				context: this.context,
				callback: this.props.history.goBack()
			}))
			.catch(error => ErrorHandler({
				context: this.context,
				error: { error }
			}))
	}

	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'

		if (this.props.data.loading) return loader
		if (this.props.data.error) return errorLoad

		const { entity } = this.state
		const teams = this.props.extradata.teamsList.items

		return (
			<Card>
				<CardHeader>
					<strong>New User</strong>
					<small> All fields with asterisk (*) is required.</small>
				</CardHeader>
				<CardBody className="card-body">
					<FormGroup check>
						<div className="checkbox">
							<Label check htmlFor="enabled">
								<Input type="checkbox" id="enabled" name="enabled"
									defaultChecked="true"
									value={entity.enabled}
									onChange={this.handleEnabledChange('enabled')}
								/> Active
							</Label>
						</div>
					</FormGroup>
					<FormGroup>
						<Label htmlFor="roles"><strong>Role</strong></Label>
						<Input
							type="select"
							name="roles"
							id="roles"
							size="sm"
							value={entity.roles}
							onChange={this.handleInputChange('roles')}>
							{
								this.props.data.enumRepository[0].UserRoleTypeEnum.map((role, i) => (
									<option key={i} checked={this.isRoleChecked(role.name)} value={role.name}>{role.value}</option>
								))
							}
						</Input>
					</FormGroup>
					<FormGroup>
						<Label htmlFor="TeamId">Team (*)</Label>
						<SelectSearch 
							type="select"
							searchKey={{ value: 'Id', label: 'TeamName', variables: '' }}
							searchQuery={teams}  
							searchValue={entity.TeamId}
							searchOnChange={this.handleInputChange('TeamId')}
						/>
					</FormGroup>
					<FormGroup check>
						<Label htmlFor="roles"><strong>Brands Markets(*)</strong></Label>
						{
							this.props.data.brandMarketList.items.map((brandMarket, i) => (
								<div key={i} className="checkbox">
									<Label check htmlFor={brandMarket.BrandId + '-' + brandMarket.CurrencyId}>
										<Input type="checkbox" checked={this.isBrandMarketChecked(brandMarket.BrandCode + '-' + brandMarket.CurrencyCode)} onChange={this.handleBrandsChange('BrandMarkets')} id={brandMarket.BrandCode} name={brandMarket.BrandCode} value={brandMarket.BrandCode + '-' + brandMarket.CurrencyCode} /> {brandMarket.BrandCode}-{brandMarket.CurrencyCode}
									</Label>
								</div>
							))
						}
					</FormGroup>
					<FormGroup>
						<Label htmlFor="email"><strong>Email (*)</strong></Label>
						<Input type="text" id="email" placeholder="juan.dela.cruz@gmail.com"
							value={entity.email}
							onChange={this.handleInputChange('email')} />
					</FormGroup>
					<FormGroup>
						<Label htmlFor="username"><strong>UserName (*)</strong></Label>
						<Input type="text" id="username" placeholder="juan_dela_cruz"
							value={entity.username}
							onChange={this.handleInputChange('username')} />
					</FormGroup>
					<FormGroup row>
						<Col xs="6">
							<FormGroup>
								<Label htmlFor="default_password"><strong>Password (*)</strong></Label>
								<Input type="password" id="default_password" placeholder="********"
									value={entity.default_password}
									onChange={this.handleInputChange('default_password')} />
							</FormGroup>
						</Col>
						<Col xs="6">
							<FormGroup>
								<Label htmlFor="confirm_default_password"><strong>Confirm Password (*)</strong></Label>
								<Input type="password" id="confirm_default_password" placeholder="********"
									value={entity.confirm_default_password}
									onChange={this.handleInputChange('confirm_default_password')} />
							</FormGroup>
						</Col>
					</FormGroup>
					<FormGroup row>
						<Col xs="6">
							<FormGroup>
								<Label htmlFor="LastName"><strong>Last Name</strong></Label>
								<Input type="text" id="LastName" placeholder="Dela Cruz"
									value={entity.LastName}
									onChange={this.handleInputChange('LastName')} />
							</FormGroup>
						</Col>
						<Col xs="6">
							<FormGroup>
								<Label htmlFor="FirstName"><strong>First Name</strong></Label>
								<Input type="text" id="FirstName" placeholder="Juan"
									value={entity.FirstName}
									onChange={this.handleInputChange('FirstName')} />
							</FormGroup>
						</Col>
					</FormGroup>
				</CardBody>
				<CardFooter>
					<Button type="submit" size="sm" color="primary" onClick={() => this.formSubmit(this)}><i className="fa fa-dot-circle-o"></i> Submit</Button>
					<Button type="reset" size="sm" color="danger"><i className="fa fa-ban"></i> Reset</Button>
				</CardFooter>
			</Card>
		)
	}
}

UserCreate.propTypes = {
	data: PropTypes.object,
	extradata: PropTypes.object,
	history: PropTypes.object
}

UserCreate.contextTypes = {
	onAlert: PropTypes.func
}

const queryOptions = {
	options: () => ({
		variables: {},
		// notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

const query = gql`
  query QUERY_VIEW{
	  enumRepository{
		UserRoleTypeEnum
	  }
	  brandMarketList(count:true, paging:{
		offset:0
		limit:100
	  }){
		pagingInfo{
		  offset
		  limit
		  totalCount
		}
		items{
		  Id
		  BrandId
		  BrandCode
		  CountryId
		  CountryName
		  CurrencyId
		  CurrencyCode
		}
	  }
	}
`

const extraQuery = gql`
	query EXTRAQUERY_VIEW {
		teamsList(
			count: false,
			paging:{
				offset: 0
				limit: 100
			}
		){
			pagingInfo{
				offset
				limit
				totalCount
			}
			items {
			  Id
			  TeamName
			}
		}
	}
`

const mutation = gql`
  mutation MUTATE_ADMINUSER_CREATE(
	  $username: String!,
	  $email: String!,
	  $enabled: Boolean,
	  $default_password: String!,
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
	  $roles: UserRoleTypeEnum!,
	  $BrandMarkets: String!,
	  $TeamId: ID
	){
	  userMutation(
		id:0
		enabled:$enabled
		username:$username
		email:$email
		default_password:$default_password
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
		roles:$roles
		BrandMarkets:$BrandMarkets,
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
		TeamId
	  }
	}
`

export default compose(
	graphql(query, queryOptions),
	graphql(extraQuery, { name: 'extradata' }),
	graphql(mutation)
)(UserCreate)