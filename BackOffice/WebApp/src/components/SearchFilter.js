/* eslint-disable react/no-deprecated */
import React, { Component, Fragment } from 'react'
import {
	Row,
	Col,
	Button,
	Card,
	CardHeader,
	CardBody,
	Form,
	FormGroup,
	Label,
	Input
} from 'reactstrap'
import PropTypes from 'prop-types'

import ModalPortal from './ModalPortal'
import SearchFieldSelector from './SearchFieldSelector'
import SelectSearch from './SelectSearch'
import DateAndTime from './DateAndTime'
import Hinter from './Hinter'
import { GetInitSearchValue, GetLocalData } from '../utils/CoreHelpers'
import ErrorBoundary from '../utils/ErrorBoundary'

export default class SearchFilter extends Component {

	static propTypes = {
		query: PropTypes.string
	}
	
	static contextTypes = {
		onSearchSubmit: PropTypes.func,
		onSearchReset: PropTypes.func,
		fields: PropTypes.array,
		extradata: PropTypes.object,
		component: PropTypes.string,
		matchParams: PropTypes.object
	}
	

	state = {
		quickSearch: {},
		searchableFields: [],
		toggleQuickSearch: '',
		modal: {
			isOpen: false
		}
	}

	
	handleToggle = () => {
		this.setState({ toggleQuickSearch: !this.state.toggleQuickSearch })
	}

	handleModalToggle = () => {
		this.setState({ modal: { isOpen: !this.state.modal.isOpen } })
	}

	handleInputChange = f => e => {
		let value = e.target === undefined ? e : (e.target.type === 'checkbox' ? e.target.checked : e.target.value )
		this.setState({
			quickSearch: { ...this.state.quickSearch, [f]: value }
		})
	}

	handleSelectChange = f => e => {
		function value(v) {
			switch (v.toLowerCase().trim()) {
			case 'true': case 'yes': case '1': return true
			case 'false': case 'no': case '0': case null: return false
			default: return Boolean('')
			}
		}
		this.setState({
			quickSearch: { ...this.state.quickSearch, [f]: value(e.target.value) }
		})
	}

	handleSelectEnumChange = f => e => {
		let value = e.target.value === '' ? null : e.target.value
		this.setState({
			quickSearch: { ...this.state.quickSearch, [f]: value }
		})
	}
	
	handleRangeInputChange = f => e => {
		const param1 = f.field
		const param2 = `${f.field}1`
		const fieldName = f.param === '1' ? param1 : param2
		const value = e.target === undefined ? e : e.target.value

		this.setState({
			quickSearch: { ...this.state.quickSearch, [fieldName]: value }
		})
	}

	handleSubmit() {
		const filters = this.state.quickSearch

		/**
		 * Filter only the fields that has a 'search value',
		 * then inject in 'searchFilters' object variable
		 * 
		 * @returns {Object} Filtered object of 'filters'
		 * @author Jonathan
		 */
		function filterSearches() {
			let searchFilters = {}
			Object.keys(filters).map(k => {
				if ((filters[k] !== 'undefined' && filters[k] !== null) && (filters[k] !== '')) {
					searchFilters[k] = filters[k]
				}
			})
			
			return searchFilters
		}

		/**
		 * Deny search form submission if nothing was entered
		 * 
		 * @param {Object} obj - this.state.quickSearch
		 * @returns {Boolean} True/False
		 * @author Jonathan
		 */
		function checkIfSearchFiltersNoEmpty(obj) {
			for (var key in obj) {
				if (obj[key] !== '') return true
			}
			return false
		}

		if (checkIfSearchFiltersNoEmpty(filters)) this.context.onSearchSubmit(filterSearches())
	}

	handleResetInput = () => {
		this._initSearchQueryStates()
		this.context.onSearchReset({})
	}

	/**
	 * Get all search input fields
	 * 
	 * @param {any} query: value of props.location.search
	 * @returns {Object[]} Array of objects
	 * @author Jonathan
	 */
	getSearchableFields = query => {
		let searchable = []
		const { fields, component, extradata } = this.context

		// GET currently stored searchable fields from localStorage, if any
		const currFields = GetLocalData(`sfld_${component}`)
		// If exists, SET it as variable.
		// Otherwise, GET fields from parent's context
		const inputFields = !currFields ? fields : JSON.parse(currFields)
		// SET expression key label
		const expressionKey = !currFields ? 'searchExpression' : 'expression'
		
		// MAP the acquired fields
		// console.log('searchable fields', inputFields)
		inputFields.map(f => {
			const value = GetInitSearchValue(query, f.field, null)

			const varType = !currFields ? `${f.varType}` : matchIndex().varType
			const searchType = !currFields ? `${f.searchType}` : matchIndex().searchType
			const option = !currFields ? `${f.searchOptions}` : matchIndex().searchOptions
			const optionKey = !currFields ? `${f.searchOptionKey}` : matchIndex().searchOptionKey
			
			const isEnum = /Enum*/g.test(varType)
			const isBool = varType === 'Boolean'
			const isInt = varType === 'Int' || varType === 'Int!'
			const isFloat = varType === 'Float' || varType === 'Float!'
			const isNumber = isInt || isFloat
			// const isDate = varType === 'DateTime' || varType === 'DateTime!'
			const isAsyncMode = !currFields ? f.searchModeAsync : matchIndex().searchModeAsync

			const options = () => {
				const data = extradata

				// if (f.searchType !== undefined && f.searchType === 'select' || f.searchType === 'checkbox') {
				// 	if (isEnum) {
				// 		return data.enumRepository[0][option]
				// 	} else {
				// 		if (isBool) {
				// 			return option
				// 		} else {
				// 			if (isAsyncMode !== undefined && isAsyncMode) { 
				// 				return []
				// 			}
				// 			return data[option].items || []
				// 		}
				// 	}
				// }
				// return []

				if (searchType !== undefined && searchType === 'select') {
					if (isEnum) return data.enumRepository[0][option]
					if (isBool) return option
					if (isAsyncMode) return []
					return data[option].items || []
				}
				return ''
			}

			const inputType = () => {
				// if searchType undefined, 
				// determine form input type via the vartype. 
				// Default is 'text'
				if (f.searchType === undefined) {
					if (isNumber) return 'number'
					return 'text'
				}

				// else return the pre-set type
				// return f.searchType

				// Circumvent searchType to disallow async type select fields;
				// Force searchType as 'text'
				return f.searchType && (f.searchType === 'select' && f.searchModeAsync) ? 'text' : f.searchType
			}

			function matchIndex() {
				return fields.find(t => t.field === f.field)
			}

			const field = {
				input: f.field,
				value: (value !== '' && value !== 'undefined' && value !== null) ? value : '',
				label: f.title,
				inputType: inputType(),  //f.searchType !== undefined ? f.searchType : 'text',
				isEnum: isEnum,
				isFloat: isFloat,
				options: options(),
				optionName: isEnum || isBool ? 'name' : optionKey,
				optionValue: isEnum ? 'name' 
					: isBool ? 'value'
						: (f.varType === 'ID' || f.varType === 'ID!') 
							? 'Id' 
							: optionKey, 
				expression: f[expressionKey] || 'CONTAINS'
			}

			if (!currFields) {
				if (f.hidden !== undefined && (f.hidden.form.search !== undefined && f.hidden.form.search === false)) searchable.push(field)
			} else {
				searchable.push(field)
			}
		})

		return searchable
	}
	
	/**
	 * Initialize States
	 * 
	 * - Map Form Inputs and Values
	 * - Set List of Searchable Fields for displaying
	 * @returns {undefined} nothing
	 */
	_initSearchQueryStates() {
		const getFields = this.getSearchableFields(this.props.query)
		let queries = {}  
		// console.log('input fields', getFields)
		getFields.map(f => {
			if (f.expression === 'BETWEEN') queries[`${f.input}1`] = GetInitSearchValue(this.props.query, `${f.input}1`, '')
			return queries[f.input] = f.value
		})

		// Set List of Values for search submit
		this.setState({ quickSearch: { ...this.state.quickSearch, ...queries  } })
	}
	_initSearchableInputFields() {		
		this.setState({ searchableFields: this.getSearchableFields(this.props.query) })
	}

	// Lifecycle
	componentWillMount() {
		this._initSearchQueryStates()
		this._initSearchableInputFields()

		this.setState({ 
			toggleQuickSearch: (this.context.matchParams.url.indexOf('recordlookup') == -1 && true)
		})
	}
	componentWillReceiveProps() {
		this._initSearchQueryStates()
		this._initSearchableInputFields()
	}

	render() {
		const { toggleQuickSearch, searchableFields, quickSearch } = this.state
		const quickSearchToggleClass = `c-search-filter mb-0 border-0 ${toggleQuickSearch ? 'is-expanded' : 'is-collapsed'}`

		let content = ''

		if (searchableFields.length === 0) {
			content = (
				<Row>
					<Col className="p-3 text-center">No search fields to display.</Col>
				</Row>
			)
		} else {
			content = (
				<Fragment>
					<FormGroup row>
						{ searchableFields.map((field, i) => {
							let value = this.state.quickSearch[field.input]

							function searchHint() {
								switch (field.expression) {
								case 'CONTAINS': return 'May contain this keyword'
								case 'EQUALS': return 'Must match exactly'
								case 'GREATER_THAN': return 'Must be greater than'
								case 'GREATER_THAN_OR_EQUAL': return 'Must be greater than or equal'
								case 'LESS_THAN': return 'Must be less than'
								case 'LESS_THAN_OR_EQUAL': return 'Must be less than or equal'
								case 'BETWEEN': return 'Must be between this range'
								}
							}

							return (
								<Col key={i} sm="12" md="6" lg={field.expression === 'BETWEEN' ? '6' : '3'}>
									<div style={{ 
										'display': 'flex', 
										// 'justifyContent': 'space-between',
										'alignItems': 'baseline', 
										'margin': '5px 0'
									}}>
										<Label htmlFor={field.input} className="pr-2 my-auto">
											{field.label}{' '}
											<Hinter hintId={`${field.input}-${field.expression}`} content={searchHint()} />
										</Label>

										<ErrorBoundary>

											{(field.inputType === 'select' || field.inputType === 'checkbox') && (
												<SelectSearch 
													type="select"
													searchKey={{
														value: field.optionValue,
														label: field.optionName, 
														variables: ''
													}}
													searchQuery={field.options}  
													searchValue={value}
													searchOnChange={field.isEnum 
														? this.handleSelectEnumChange(field.input) 
														: this.handleInputChange(field.input)
													}
												/>

											// <Input 
											//     type={field.inputType}
											//     id={field.input}
											//     placeholder={field.label}
											//     value={value}
											//     onChange={ field.optionEnum ? this.handleSelectEnumChange(field.input) : this.handleInputChange(field.input)}
											//     >
											//     <option value="" disabled>Select option</option>
											//     { field.options.map((option, i) => {
											//         return (
											//         <option key={i} value={field.optionEnum ? option.name : option.Id}>
											//             { option[field.optionName].replace(/_/g, " ") }
											//         </option>
											//         )
											//     })}
											// </Input>
											)}

											{(field.inputType === 'text' || field.inputType === 'number' || field.inputType === 'textarea') && (
												field.expression === 'BETWEEN'
													? (
														<Fragment>
															<div>
																<Input 
																	type={field.inputType}
																	id={field.input}
																	value={quickSearch[field.input]} 
																	step={field.isFloat ? '0.01' : '1'}
																	onChange={this.handleRangeInputChange({ field: field.input, param: '1' })}
																/>
															</div>
															&nbsp;&nbsp;-&nbsp;&nbsp;
															<div>
																<Input 
																	type={field.inputType}
																	id={`${field.input}1`}
																	value={quickSearch[`${field.input}1`]}
																	step={field.isFloat ? '0.01' : '1'}
																	onChange={this.handleRangeInputChange({ field: field.input, param: '2' })}
																/>
															</div>
														</Fragment>
													) : (
														<Input 
															type={field.inputType}
															id={field.input}
															// placeholder={field.label}
															value={value}
															onChange={this.handleInputChange(field.input)}
														/>
													)
											)}

											{field.inputType === 'date' && (
												field.expression === 'BETWEEN'
													? (
														<Fragment>
															<DateAndTime 
																position="search"
																value={quickSearch[field.input]} //{value} 
																onChange={this.handleRangeInputChange({ field: field.input, param: '1' })}
															/>
															&nbsp;&nbsp;-&nbsp;&nbsp;
															<DateAndTime 
																position="search"
																value={quickSearch[`${field.input}1`]} //{value} 
																onChange={this.handleRangeInputChange({ field: field.input, param: '2' })}
															/>
														</Fragment>
													) : (
														<DateAndTime
															position="search" 
															value={value} 
															onChange={this.handleInputChange(field.input)}
														/>
													)
											)}
										</ErrorBoundary>
									</div>
								</Col>
							)
						})}
					</FormGroup>
					<FormGroup row>
						<Col sm="12">
							<button className="btn btn-sm btn-primary" type="submit"><i className="fa fa-search"></i> Search</button>
							{' '}
							<Button type="reset" size="sm" color="danger" onClick={this.handleResetInput}>
								<i className="fa fa-ban"></i> Reset
							</Button>
						</Col>
					</FormGroup>
				</Fragment>
			)
		}

		return (
			<Fragment>

				<Card className={quickSearchToggleClass}>
					<CardHeader className="d-flex justify-content-between align-items-center">
						<div>
							<i className="fa fa-filter"></i>{' '}
							<strong>Quick Search Filter</strong>
						</div>
						<div>
							<button 
								className="btn btn-sm btn-outline-secondary float-right" 
								onClick={this.handleToggle}
								title="Toggle View">
								{toggleQuickSearch ? <i className="fa fa-chevron-up"></i> : <i className="fa fa-chevron-down"></i>}
							</button>
							<button 
								className="btn btn-sm btn-outline-secondary float-right mr-1" 
								onClick={this.handleModalToggle}
								title="Configure Search Filters">
								<i className="fa fa-cog"></i>
							</button>
						</div>
					</CardHeader>
					<CardBody>
						<hr className="mt-0" />
						<Form className="form-horizontal" onSubmit={this.handleSubmit.bind(this, 'search')}>
							{ content }
						</Form>
					</CardBody>
				</Card>

				<ModalPortal 
					isOpen={this.state.modal.isOpen}
					onClose={this.handleModalToggle}
					size="lg"
				>
					<SearchFieldSelector onCloseModal={this.handleModalToggle}/>
				</ModalPortal>

			</Fragment>
		)
	}
}