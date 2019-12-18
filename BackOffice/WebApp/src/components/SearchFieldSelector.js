/* eslint-disable react/no-deprecated */

// Get All Fields from tableHeader 
// Select which Field to show
// Then, set Each Field's Props (Type and Expression)
// Save the selected fields to localStorage for gql queries
// If already saved, amend to reflect new query


import React, { Component, Fragment } from 'react'
import PropTypes from 'prop-types'

import Row from 'reactstrap/lib/Row'
import Col from 'reactstrap/lib/Col'
import Button from 'reactstrap/lib/Button'
import Table from 'reactstrap/lib/Table'
import Form from 'reactstrap/lib/Form'
import Input from 'reactstrap/lib/Input'

import { SelectFieldsToSearch, SetLocalData, RemoveLocalData } from '../utils/CoreHelpers'

export default class SearchFieldSelector extends Component {

	static defaultProps = {
		expressions: [
			'CONTAINS',
			'EQUALS',
			'GREATER_THAN',
			'GREATER_THAN_OR_EQUAL',
			'LESS_THAN',
			'LESS_THAN_OR_EQUAL',
			'BETWEEN'
		],
		preSelectedValues: { 
			field: '',
			title: '',
			searchType: '',
			expression: '',
			isPicklist: false
		}
	}
	
	static propTypes = {
		onCloseModal: PropTypes.func,
		preSelectedValues: PropTypes.object,
		expressions: PropTypes.array
	}
	
	static contextTypes = {
		onSearchFieldsChange: PropTypes.func,
		fields: PropTypes.array,
		component: PropTypes.string
	}	

	state = {
		availableFields: [],
		selectedFields: [],
		preSelectedValues: this.props.preSelectedValues,
		error: false
	}

	handlePreselect = field => e => { 
		const { fields } = this.context

		const title = () => {
			if (field === 'field') {
				const searchField = fields.find(f => f.field === e.target.value)
				// Circumvent searchType to disallow async type select fields;
				// Force searchType as 'text'
				const searchType = searchField.searchType && (searchField.searchType === 'select' && searchField.searchModeAsync) ? 'text' : searchField.searchType
				const searchExpression = searchField.searchExpression

				return { 
					title: e.target.options[e.target.selectedIndex].text,
					searchType: searchType,
					isPicklist: searchType === 'select',
					expression: searchExpression ? searchExpression : 'CONTAINS'
				}
			}
			return false
		}
		
		this.setState({ 
			preSelectedValues: {
				...this.state.preSelectedValues,
				[field]: e.target.type === 'checkbox' ? e.target.checked : e.target.value,
				...title()
			}
		})
	}

	handleOnChangeExpression = f => e => {
		let { selectedFields } = this.state
		selectedFields[this._getIndex(f.field)][f.key] = e.target.value
		this.setState({ selectedFields: selectedFields })
	}

	handleAddField = () => {
		const { fields } = this.context
		let { selectedFields, preSelectedValues, error } = this.state

		if (preSelectedValues.field !== '') {
			const newEntry = {
				field: preSelectedValues.field,
				title: preSelectedValues.title,
				searchType: preSelectedValues.searchType,
				expression: preSelectedValues.expression
			}
			selectedFields.push(newEntry)
			this.setState({ 
				selectedFields: selectedFields,
				preSelectedValues: this.props.preSelectedValues, // reset default values
				error: false,          
				availableFields: getAvailableFields(fields, selectedFields) // refresh the list
			})
		} else {
			this.setState({ error: !error })
		}  
	}

	handleDeleteField(fieldItem) {        
		const { fields } = this.context
		let { selectedFields } = this.state
		selectedFields.splice(this._getIndex(fieldItem), 1)
		
		this.setState({ 
			selectedFields: selectedFields,
			availableFields: getAvailableFields(fields, selectedFields)
		})
	}

	handleSubmit = e => {
		e.preventDefault()

		Promise.all([
			// save to localStorage for co-reference 
			SetLocalData(`sfld_${this.context.component}`, JSON.stringify(this.state.selectedFields)),
			this.props.onCloseModal()
		]).then(() => this.context.onSearchFieldsChange())
	}

	handleResetDefault = () => {
		Promise.all([
			// save to localStorage for co-reference 
			RemoveLocalData(`sfld_${this.context.component}`),
			this.props.onCloseModal()
		]).then(() => this.context.onSearchFieldsChange())
	}

	// Get Array Index
	_getIndex = field => {
		let index = this.state.selectedFields.findIndex(s => s.field === field)
		return index
	}

	// Lifecycle
	componentWillMount() {  
		const { fields, component } = this.context
		const selectedFields = SelectFieldsToSearch(fields, component)

		this.setState({ 
			// Set list of already selected or default searchale fields
			selectedFields: selectedFields,
			// Then, set list of fields for dropdown options
			availableFields: getAvailableFields(fields, selectedFields)
		})
	}

	render() {
		const { availableFields, selectedFields, preSelectedValues, error } = this.state
		
		let content = ''

		if (selectedFields.length == 0) {
			content = (
				<tr>
					<td colSpan="4" className="p-3 text-center">No search fields selected.</td>
				</tr>
			)
		} else {
			content = selectedFields.map((f, i) => {
				return (
					<tr key={i}>
						<td>
							{ f.title }
						</td>
						<td>
							<input type="checkbox" name="" id="" disabled checked={f.searchType === 'select'} />
						</td>
						<td>
							<Input type="select" id={`${f.field}_selector`} size="sm"
								value={f.expression}
								onChange={this.handleOnChangeExpression({ field: f.field, key: 'expression' })}
							>
								{ this.props.expressions.map((e, i) => {
									return (
										<option key={i} value={e}>
											{ e.replace(/_/g, ' ') }
										</option>
									)
								})}
							</Input>
						</td>
						<td>    
							<Button color="danger" size="sm" onClick={this.handleDeleteField.bind(this, f.field)} type="button" title="Remove">
								<i className="fa fa-minus"></i>
							</Button>
						</td>
					</tr>
				)
			})
		}

		return (
			<Fragment>
				<p>Configure search fields to display.</p>

				<Form className="form-horizontal" onSubmit={this.handleSubmit}>
					<Table responsive className="table-sm table-outline">
						<thead className="thead-default">
							<tr>
								<th>Search Field</th>
								<th>Picklist</th>
								<th>Expression</th>
								<th style={{ width: '40px' }}>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							{/* Loop of searchable fields */}
							{ content }

							{/*  ADD FIELD */}
							<tr style={{ backgroundColor: 'rgba(0, 0, 0, 0.075)' }}>
								<td>
									<Input type="select" size="sm"
										value={preSelectedValues.field}
										onChange={this.handlePreselect('field')}
									>
										<option value="">Select field</option>
										{ availableFields.map((option, i) => {
											return (
												<option key={i} value={option.field}>
													{ option.title }
												</option>
											)
										})}
									</Input>
								</td>
								<td>
									<input type="checkbox" name="" id=""
										disabled
										checked={preSelectedValues.isPicklist}
										onChange={this.handlePreselect('isPicklist')}
									/>
								</td>
								<td>
									<Input type="select" size="sm" 
										value={preSelectedValues.expression}
										onChange={this.handlePreselect('expression')}
										disabled={preSelectedValues.field === ''}>
										<option value="#">---</option>
										{ this.props.expressions.map((e, i) => {
											return (
												<option key={i} value={e}>
													{ e.replace(/_/g, ' ') }
												</option>
											)
										})}
									</Input>
								</td>
								<td>
									<Button color="success" size="sm" onClick={this.handleAddField.bind(this)} type="button" title="Add">
										<i className="fa fa-plus"></i>
									</Button>
								</td>
							</tr>
						</tbody>
					</Table>

					{ error && <p style={{ color: 'red' }}>You must select a field.</p>}

					<Row className="mb-3">
						<Col>
							<Button color="link" size="sm" type="button" title="Reset" onClick={this.handleResetDefault}>
								Reset Default
							</Button>
						</Col>
						<Col>
							<Button color="primary" size="sm" type="submit" className="float-right" title="Save">
								<i className="fa fa-pencil"></i>{' '}Save
							</Button>
						</Col>
					</Row>
					
				</Form>

			</Fragment>
		)
	}
}

// Used for list options .....
const getAvailableFields = (fields, selectedFields) => {
	let availableFields = []    
	
	const getUnselectedFields = fields.filter(itm => {
		let match = false
		selectedFields.forEach(itm1 => {
			if (itm.field == '' || itm.field == itm1.field) {
				match = true
				return
			}
		})
		return !match
	})

	getUnselectedFields.map(f => {
		// Push  only if 'hidden.search' setting is undefined or set to false
		if (f.hidden === undefined || !f.hidden.searchFieldSelection) {
			availableFields.push({
				field: f.field,
				title: f.title
			})
		}
	})

	return availableFields
}