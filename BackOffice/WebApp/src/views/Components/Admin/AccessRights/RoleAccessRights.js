import React, { Component, Fragment } from 'react'
import {
	Table,
	Label,
	Input,
} from 'reactstrap'
import PropTypes from 'prop-types'
import { graphql, compose } from 'react-apollo'
import gql from 'graphql-tag'
import Loader from '../../../../components/Loader'
// import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'

class RoleAccessRights extends Component {
	
	state = {
		accessList: [],
		isChecking: false
	}

	// TODO: 
	// Improve 2-sec delay on changing checkbox state
	//

	componentWillReceiveProps(newProps) {
		if (!newProps.data.loading) {

			this.setState({ accessList: newProps.data.userAccessList.items })

			//   newProps.data.userAccessModuleList.items.map((module, i) => {
			//     newProps.data.userRoleList.items.map((mrole, k) => {
			//       this.setState({ [module.ModuleName+'_'+mrole.role_code]: this.isAccessChecked(module.ModuleName, mrole.role_code) })
			//     })
			//   })
		}
	}

	handleEnabledChange = (access, role) => e => {

		this.setState({ isChecking: true }, () => {
			this.handleSubmit(access, role, checkValue)
		})
		
		let checkValue = e.target.checked
		let currentAccess = this.state.accessList.find(matchMethod)

		if (currentAccess !== undefined) {

			let newAccessList = this.state.accessList.filter(item => item !== currentAccess)
			let roles = currentAccess.Roles.split(',')
			roles.indexOf(role) !== -1 ? roles.splice(roles.indexOf(role), 1) : roles.push(role)

			this.setState({
				accessList: [
					...newAccessList,
					{
						Id: currentAccess.Id,
						Method: currentAccess.Method,
						MethodName: currentAccess.MethodName,
						Roles: String(roles)
					}
				]
			})

		} else {
			const accessList = this.state.accessList
			this.setState({
				accessList: [
					...this.state.accessList,
					{
						Id: String(accessList.length + 1),
						Method: access,
						MethodName: access,
						Roles: role
					}
				]
			})
		}
		
		// this.handleSubmit(access, role, checkValue)

		function matchMethod(accessList) {
			return accessList.Method === access
		}
	}

	handleSubmit = (access, role, value) => {
		this.props.mutate({
			variables: {
				Id: 0,
				Roles: role,
				Method: access,
				MethodName: access,
				Allow: value
			}
		})
			.then(({ data }) => this.handleSuccess(data))
			.catch(error => this.handleError(error))

			// .then(() => SuccessHandler({context: this.context, callback: this.setState({ isChecking: false }) }) )
			// .catch((error) => ErrorHandler({context: this.context, error: {error}}) )
	}

	handleSaveReload() {
		this.props.data.refetch()
			.then(() => {
				this.context.onAlert({
					isOpen: true,
					type: 'success',
					message: 'Success'
				})
			})
	}

	// Handle Success/Error Returned Data
	handleSuccess() {
		this.setState({ isChecking: false })
		// this.props.data.refetch()
		//     .then(() => {
		//         this.props.onAlert({
		//             isOpen: true,
		//             type: 'success',
		//             message: 'Success'
		//         })
		//     })
	}

	handleError(error) {
		// console.log(error)
		let errMsg = ''
		if (typeof error.graphQLErrors[0].message === 'string') {
			errMsg = error.graphQLErrors[0].message
		} else {
			let err = JSON.parse('[' + error.graphQLErrors[0].message + ']')
			errMsg = Object.keys(err[0]).map(key => err[0][key])
		}

		this.context.onAlert({
			isOpen: true,
			type: 'error',
			message: errMsg
		})
	}

	isAccessChecked(access, role) {
		const accessList = this.state.accessList

		for (var i = 0; i < accessList.length; i++) {
			if (accessList[i].Method === access) {
				if (String(accessList[i].Roles).indexOf(role) >= 0) {
					return true
				} else {
					return false
				}
			}
		}

		return false
	}

	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'

		if (this.props.data.loading) return loader
		if (this.props.data.error) return errorLoad

		const isChecking = this.state.isChecking

		return (
			<Fragment>

				<div className="mb-3 c-table__title">
					User Access Management                       
				</div>

				{ isChecking && (
					<div id="loading-bar-spinner">
						<div className="spinner-icon"></div>
					</div>
				)}

				<Table responsive hover className="table-sm table-outline">
					<thead className="thead-default">
						<tr className="text-center text-uppercase">
							<th rowSpan="2" style={{ 'verticalAlign': 'middle' }}>Modules</th>
							<th colSpan="19" className="text-center">Roles</th>
						</tr>
						<tr>
							{
								this.props.data.userRoleList.items.map((role, i) => (
									// let roleName = role.role_name.toLowerCase().replace(/role/g, '').replace(/_/g, " ");
									// console.log(role.role_name_readable);
									// if(roleName.includes('Cs_')){
									//     console.log('ohla');
									//     roleName = roleName.replace(/Cs/g, 'CS');
									// }
									// return (
									<th key={i} className="text-center">
										{role.role_name_readable}
									</th>
									// )
								))
							}
						</tr>
					</thead>
					<tbody>
						{
							this.props.data.userAccessModuleList.items.map((module, i) => (
								<tr key={i}>
									<td className="text-capitalize" modulename={module.ModuleName}>
										{(module.ModuleDescription != '') ? module.ModuleDescription : module.ModuleName.split(/(?=[A-Z])/).join(' ')}
									</td>
									{
										this.props.data.userRoleList.items.map((mrole, k) => {
											if (module.ModuleType != 'DIV') {
												return <td key={k} className="text-center">
													<Label check htmlFor={module.ModuleName + '-' + k}>
														<Input type="checkbox"
															id={module.ModuleName + '-' + k}
															name="enabled"
															checked={this.isAccessChecked(module.ModuleName, mrole.role_code)}
															onChange={this.handleEnabledChange(module.ModuleName, mrole.role_code)}
														/>
													</Label>
												</td>
											} else {
												return <td key={k} className="text-center"></td>
											}
										})
									}
								</tr>
							))
						}
					</tbody>
				</Table>

			</Fragment>
		)
	}
}


RoleAccessRights.propTypes = {
	data: PropTypes.object,
	mutate: PropTypes.func
}

RoleAccessRights.contextTypes = {
	onAlert: PropTypes.func
}

const queryOptions = {
	options: () => ({      
		variables: {},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

const QUERY = gql`
  query QUERY{
    userAccessList(
      count:true,
      paging:{
        offset:0
        limit:1000
      }
    ){
      pagingInfo{
        offset
        limit
        totalCount
      }
      items{
        Id
        Roles
        Method
        MethodName
      }
    }
    userRoleList{
      pagingInfo{
        offset
        limit
        totalCount
      }
      items{
        role_name
        role_code
        role_name_readable
      }
    }
    userAccessModuleList{
      items{
        ModuleName
        ModuleSystemName
        ModuleDescription
        ModuleType
      }
    }
  }`

const mutationOptions = { 
	options: () => ({
		variables: {},
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	}),
}

const mutation = gql`
  mutation MUTATE(
      $Id: ID!,
      $Roles: String!,
      $Method: String!,
      $MethodName: String!,
      $Allow: Boolean!
    ){
      userAccessMutation(
        Id:$Id
        Roles:$Roles
        Method:$Method
        MethodName:$MethodName
        Allow:$Allow
      ){
        Id
        Roles
        Method
        MethodName
        Success
      }
    }
`

export default compose(
	graphql(QUERY, queryOptions), 
	graphql(mutation, mutationOptions)
)(RoleAccessRights)