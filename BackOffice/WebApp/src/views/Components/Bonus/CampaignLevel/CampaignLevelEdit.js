import React, { Component, Fragment } from 'react'
import { Card, Button, Input, FormGroup, Form, Label} from 'reactstrap'
import gql from 'graphql-tag'
import { graphql, compose } from 'react-apollo'
import PropTypes from 'prop-types'

import Loader from '../../../../components/Loader'
import { SuccessHandler, ErrorHandler } from '../../../utils/ResponseHandler'

class CampaignLevelEdit extends Component {
	constructor() {
		super()
		this.state = {
			entity: {
				Id: 0,
				LevelCode: '',
				LevelDescription: '',
				ActiveRecord: true
			}
		}
		this.handleInputChange = this.handleInputChange.bind(this)
		this.handleReset = this.handleReset.bind(this)
		this.submitForm = this.submitForm.bind(this)
	}
	
	componentWillReceiveProps(newProps) {
		const params = newProps.match.params
		if (params.action === 'add') {
			this.handleReset()
		}
		if (params.action === 'edit') {
			if (!newProps.data.loading) {
				this.setState({ entity: { ...newProps.data.campaignDetailLevel[0] }})
			}
		}
	}

	componentDidMount() {
		this.redirect()
	}

	componentDidUpdate() {
		this.redirect()
	}

	redirect() {
		const params = this.props.match.params
		if (params.action === 'edit' && params.id === undefined) {
			this.props.history.replace('/bonus/campaignlevel/list')
		}
		if (params.action === 'add' && params.id) {
			this.props.history.replace('/bonus/campaignlevel/add')
		}
	}

	submitForm(e) {
		e.preventDefault()
		const { entity } = this.state
		this.props.mutate({
			variables: {
				Id: entity.Id,
				LevelCode: entity.LevelCode,
				LevelDescription: entity.LevelDescription,
				ActiveRecord: entity.ActiveRecord
			}
		})
			.then(() => SuccessHandler({
				context: this.context, 
				callback: this.props.history.goBack()
			}))
			.catch((error) => ErrorHandler({
				context: this.context,
				error: {error}
			}))
	}

	handleReset() {
		this.setState({
			entity: {
				Id: 0,
				LevelCode: '',
				LevelDescription: '',
				ActiveRecord: true
			}
		})
	}

	handleInputChange = (f) => (e) => {
		this.setState({
			entity: { ...this.state.entity, [f]: e.target.value }
		})
	}


	handleSelectChange = (f) => (e) => {
		function value(v) {
			switch (v.toLowerCase().trim()){
			case 'true': case 'yes': case '1': return true
			case 'false': case 'no': case '0': case null: return false
			default: return Boolean('')
			}   
		}

		this.setState({
			entity: { ...this.state.entity, [f]: value(e.target.value) }
		})
	}

	handleGoBack() {
		this.props.history.goBack()
	}

	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'
		const pageAction = this.props.match.params.action

		if ( pageAction === 'edit') {
			if (this.props.data.loading) return loader
			if (this.props.data.error) return errorLoad
		}
		
		const data = this.state.entity

		return (
			<Fragment>                						              
				<div className="mb-3 c-table__title">
					{ pageAction === 'edit' && 'Edit '}
					{ pageAction === 'add' && 'Add New ' }
					Campaign Level
					<span className="text--tiny float-right c-backlink" onClick={this.handleGoBack.bind(this)}>
						&laquo; Back
					</span>
				</div>
				<Card body>

					<Form onSubmit={this.submitForm}>
						<FormGroup>
							<Label htmlFor="LevelCode">Level Code (*)</Label>
							<Input type="text" id="LevelCode" placeholder="Level Code"
								value={data.LevelCode}
								onChange={this.handleInputChange('LevelCode')}
							/>
						</FormGroup>
						<FormGroup>
							<Label htmlFor="LevelDescription">Level Description (*)</Label>
							<Input type="text" id="LevelDescription" placeholder="Level Description"
								value={data.LevelDescription}
								onChange={this.handleInputChange('LevelDescription')}
							/>
						</FormGroup>
						<FormGroup>
							<Label htmlFor="ActiveRecord">Is Status Active?</Label>
							<Input type="select" name="select" id="ActiveRecord" 
								value={data.ActiveRecord}
								onChange={this.handleSelectChange('ActiveRecord')}>
								<option value="true">Active</option>
								<option value="false">Inactive</option>
							</Input>
						</FormGroup>
						<FormGroup>
							<Button color="primary" className="btn btn-primary">
								<i className="fa fa-pencil"></i>{' '}
								{ this.state.isSubmitting ? 'Submitting ...' : 'Save' }
							</Button>{' '}
							<Button color="secondary" onClick={this.handleGoBack.bind(this)}>
								<i className="fa fa-close"></i>{' '}Cancel
							</Button>
						</FormGroup>
					</Form>

				</Card>
			</Fragment>
		)
	}
}

CampaignLevelEdit.propTypes = {
	data: PropTypes.object,
	history: PropTypes.object,
	match: PropTypes.object,
	mutate: PropTypes.func
}

CampaignLevelEdit.contextTypes = {
	onAlert: PropTypes.func
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
const query = gql`
  query QUERY_VIEW(
		$Id: ID!
	){
		campaignDetailLevel(Id:$Id){
			Id
			LevelCode
			LevelDescription
			DateCreated
			CreatedById
			DateModified
			ModifiedById
			ActiveRecord
		}
	}
`

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
		$Id: ID!,
		$LevelCode: String,
		$LevelDescription: String,
		$ActiveRecord: Boolean
	){
		campaignDetailLevelMutation(
			entity:{
				Id:$Id
				LevelCode:$LevelCode
				LevelDescription:$LevelDescription
				ActiveRecord:$ActiveRecord
			}
		){
			Id
			LevelCode
			LevelDescription
			ActiveRecord
		}
	}
`

export default compose(
	graphql(query, queryOptions), 
	graphql(mutation, mutationOptions)
)(CampaignLevelEdit)