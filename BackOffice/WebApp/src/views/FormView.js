import React, { Component, Fragment } from 'react'
import PropTypes from 'prop-types'
import { Card, Button, FormGroup, Form } from 'reactstrap'
// import moment from 'moment'

import * as form from '../utils/FormHelpers'
import ErrorBoundary from '../utils/ErrorBoundary'

import '../../scss/custom/_formView.scss'

class FormView extends Component {

	static propTypes = {
		formTitle: PropTypes.string,
		method: PropTypes.string,
		extradata: PropTypes.object,
		entity: PropTypes.object,
		asyncQuery: PropTypes.object
	}

	static contextTypes = {
		onAlert: PropTypes.func,
		onFormSubmit: PropTypes.func,
		fields: PropTypes.array,
		onGoBack: PropTypes.func,
	}

	state = {
		entity: {},
		inputFields: [],
		options: {},
		isSubmitting: false
	}

	handleGoBack = () => this.context.onGoBack()

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
	
		handleReset = () => this.initInputValues()

		handleSubmit = e => {
			// EXTENDED CLASSES IS UNABLE TO PASS CURRENT EVENT
			// https://reactjs.org/docs/events.html#event-pooling
			if (e) { e.preventDefault() }

			const { fields } = this.context			
			const { props, context, state: { entity } } = this // eslint-disable-line no-unused-vars
			const callback = () => this.setState({ isSubmitting: !this.state.isSubmitting }) // eslint-disable-line no-unused-vars
			const submitCheck = form.shouldSubmit({ entity, fields })
			
			if (entity.FileIds !== undefined)
			{				
				if (submitCheck && entity.FileIds.length > 0)
				{
					this.context.onFormSubmit(entity)
				}
				else
				{
					this.context.onAlert({
						isOpen: true,
						type: 'error',
						message: 'Document File is required field.'
					})
				}
			} 
			else
			{
				if (submitCheck) {
					this.context.onFormSubmit(entity)
					// TODO: Create a way to pass mutate props
					// to use the method below directly from FormHelper
					// this.setState({ isSubmitting: !this.state.isSubmitting }, () => {
					// form.submitForm({ props, context, entity, callback })
					// })
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
		initInputValues(fields) {

			// Set List of Values for Form Submit
			this.setState({ entity: { ...this.state.entity, ...mapFields()  } })
			
			function mapFields() {
				let data = {}
				fields.map(f => data[f.field] = f.value)
				return data
			}
		}

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
			const fields = form.getInputFields({ props: this.props, context: this.context })

			this.initInputValues(fields)
			this.initInputFields(fields)

			localStorage.setItem('pageAction', this.props.method)
		}

		// NESTED FUNCTION HAS BEEN MOVED HERE TO BE ABLE TO REUSE ON ITS EXTENDING-CHILD
		fieldMapper(fields, entity){
			const mappedFields = fields.map(f => {
				return (
					<ErrorBoundary key={f.field}>
						<FormGroup>
							{ form.inputLabel(f) }
							{ form.inputField({ 
								input: f,
								options: f.inputType === 'select' ? f.options : null,
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
			return mappedFields
		}

		render() {
			const { method, formTitle }  = this.props
			const { entity, inputFields } = this.state
			return (
				<Fragment>

					{ form.formHeaderTemplate({
						method,
						formTitle,
						goBack: this.handleGoBack
					}) }
				
					<Card body>

						<Form onSubmit={this.handleSubmit} className="c-form">
							<div className="c-form__fields">
								{ inputFields.map((fields, index) => (
									<div key={index}>
										{ this.fieldMapper(fields, entity) }
									</div>
								)) }
							</div>
							{formTitle === 'Player Messages'
								?
								<div className="c-form__submit">
									<Button color="primary" className="btn btn-info">
										<i className="fa fa-check"></i>{' '}
										{this.state.isSubmitting ? 'Submitting ...' : 'Save'}
									</Button>{' '}
									<Button color="primary" className="btn btn-primary">
										<i className="fa fa-check"></i>{' '}
										{this.state.isSubmitting ? 'Submitting ...' : 'Save & Send'}
									</Button>{' '}
									<Button color="secondary" onClick={this.handleGoBack.bind(this)}>
										<i className="fa fa-close"></i>{' '}Cancel
									</Button>
								</div>
								:
								<div className="c-form__submit">
									<Button color="primary" className="btn btn-primary">
										<i className="fa fa-pencil"></i>{' '}
										{this.state.isSubmitting ? 'Submitting ...' : 'Save'}
									</Button>{' '}
									<Button color="secondary" onClick={this.handleGoBack.bind(this)}>
										<i className="fa fa-close"></i>{' '}Cancel
									</Button>
								</div>
							}
						</Form>

					</Card>
				</Fragment>
			)
		}
}

// TODO: Note, withRouter(FormView) removed so we could use the extend feature. withRouter provides history of the component.
export default FormView