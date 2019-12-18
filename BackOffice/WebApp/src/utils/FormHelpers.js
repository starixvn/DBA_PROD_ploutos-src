import React from 'react'
import { Input, Label } from 'reactstrap'
import moment from 'moment'

import { SuccessHandler, ErrorHandler } from './ResponseHandler'

import DateAndTime from '../components/DateAndTime'
import FileManager from '../components/FileManager'
import SelectSearch from '../components/SelectSearch'

/** @module FormHelpers */


/**
 * Generate form header template
 * 
 * @returns {Object[]} Array of objects
 * @author Jonathan
 */
export function formHeaderTemplate({ method, formTitle, goBack } = {}) {
	return (
		<div className="c-table__title d-flex justify-content-between align-items-center mb-3">
			<div className="d-flex">
				<button className="btn btn-sm btn-secondary mr-1" title="Back to List"
					onClick={goBack}>
					<i className="fa fa-arrow-left"></i>
				</button>
				<span className="c-view__title">
					<span className="legend">
						{method === 'edit' && <i className="icon-pencil"></i> }
						{method === 'add' && <i className="icon-plus"></i> }
					</span>
					<span className="name">
						{method === 'edit' && 'Edit'}
						{method === 'add' && 'Add New'}
						{' '}
						{formTitle}
					</span>
				</span>
			</div>
		</div>
	)
}


/**
 * Get all input fields
 * 
 * @returns {Object[]} Array of objects
 * @author Jonathan
 */
export function getInputFields({ props, context }) {
	let fieldsToInput = []
	const { fields } = context
	const { entity, asyncQuery, method } = props

	fields.forEach(f => {
		if (f.field !== '')  {

			const varType = f.varType
			const searchType = f.searchType
			const options = f.searchOptions
			const searchOptionKey = f.searchOptionKey

			const isEnum = isFieldEnum(varType) // /Enum*/g.test(varType)
			const isRequired = f.isRequired || isFieldRequired(varType) //varType.includes('!')

			const isBool = varType === 'Boolean'
			const isInt = varType === 'Int' || varType === 'Int!'
			const isFloat = varType === 'Float' || varType === 'Float!'
			const isFloatInt = isInt || isFloat
			const isDate = varType === 'DateTime' || varType === 'DateTime!'
			const isNumber = searchType === 'number'
			const isAsyncMode = f.searchModeAsync

			const inputOptions = () => {
				const data = props.extradata
				
				if (searchType !== undefined && searchType === 'select') {
					if (isEnum) return data.enumRepository[0][options]
					if (isBool) return options
					if (isAsyncMode) return asyncQuery[options]
					return data[options].items || []
				}
				return ''
			}

			const inputValue = () => {
				const value = entity[f.field]

				// current value is undefined, show default values
				if (value === undefined || value === null) {

					// if form.defaultValue exists, use the value from this.props
					if (isDate) {
						if (f.form !== undefined) return moment(f.form.defaultValue ).format('YYYY-MM-DD HH:mm:ss')
						return moment().format('YYYY-MM-DD HH:mm:ss')
					}
					if (f.form !== undefined && f.form.defaultValue !== undefined && props[f.form.defaultValue] !== undefined) return props[f.form.defaultValue]

					// else use default values
					if (isBool) return false
					if (isEnum) return null
					if (isFloat) return 0.00
					if (isInt || isNumber) return 0
					return ''
				}
				
				return value
			}

			const inputType = () => {
				// if searchType undefined, 
				// determine form input type via the vartype. 
				// Default is 'text'
				if (searchType === undefined) {
					if (isFloatInt) return 'number'
					return 'text'
				}

				// else return the pre-set type
				return searchType
			}

			const optionKeyValue = () => {
				if (isEnum) {
					return 'name'
				} else {
					if (isBool) return 'value'
					if (varType === 'ID' 
						|| varType === 'ID!'
						|| varType === 'Serialized' 
						|| varType === 'Serialized!'
					) return 'Id'

					return searchOptionKey
				}
			}

			const isDisabled = () => {
				if (f.form !== undefined) {
					if (typeof f.form.readOnly.add !== 'boolean' || typeof f.form.readOnly.edit !== 'boolean') {
						if (method === 'add') {
							return new Function('props', `return ${f.form.readOnly.add}`)(props)
						}
						if (method === 'edit') {
							return new Function('props', `return ${f.form.readOnly.edit}`)(props)
						}
					} else {
						return method === 'add' && f.form.readOnly.add || method === 'edit' && f.form.readOnly.edit
					}
				}
				return false
			}

			const field = {
				field: f.field,
				value: inputValue(),
				label: f.title,
				inputType: inputType(), //searchType !== undefined ? searchType : 'text',
				options: inputOptions(),
				optionKeyName: isEnum || isBool ? 'name' : (searchOptionKey || null),
				optionKeyValue: optionKeyValue(),
				optionQueryKey: options,
				lookupUrl: f.searchLookupComponent !== undefined ? f.searchLookupComponent : '',
				lookupField: f.searchLookupComponent !== undefined ? f.searchOptionKey : '',
				varType,
				isRequired,
				isEnum,
				isAsyncMode,
				isDisabled: isDisabled(), 
				// f.form !== undefined 
				// ? (method === 'add' && f.form.readOnly.add) || (method === 'edit' && f.form.readOnly.edit)
				// : false,
				isHidden: f.hidden !== undefined 
					? (method === 'add' && f.hidden.form.add) || (method === 'edit' && f.hidden.form.edit) 
					: false,
				optionsMulti: f.searchMulti !== undefined && f.searchMulti,
				fileOptions: f.fileOptions !== undefined && f.fileOptions
			}
			
			// if (f.showFormDefault) fieldsToInput.push(field)
			if (f.hidden !== undefined) {
				if ((method === 'add' && !f.hidden.form.add) || (method === 'edit' && !f.hidden.form.edit)) {
					fieldsToInput.push(field)
				}
			}
		}
	})

	return fieldsToInput
}


/**
 * Form input label displayer
 *
 * @returns {Element} <Label />
 * @author Jonathan
 */
export function inputLabel({ input, label, varType  } = {}) {
	return (
		<Label htmlFor={input}>
			{label}
			{' '}
			{ isFieldRequired(varType) && <span className="text-danger">*</span> }
		</Label>
	)
}


/**
 * Form input field displayer
 *
 * @returns {Element} Input Element
 * @author Jonathan
 */
export function inputField({ input, options, onChange, value, disabled } = {}) {
	const f = input
	const fieldName = f.field || f.input
	const type = f.inputType

	if (type === 'select') {
		return (
			<SelectSearch 
				type={f.isAsyncMode ? 'async' : 'select'}
				name={fieldName}
				searchKey={{
					value: f.optionKeyValue,
					label: f.optionKeyName,
					variables: ''
				}}
				searchQuery={options}
				searchQueryKey={f.optionQueryKey}
				multi={f.optionsMulti}

				searchValue={value} // current value if exists
				searchOnChange={onChange}
				searchLookupField={f.lookupField}
				searchLookupUrl={f.lookupUrl}
				disabled={disabled}
			/>
		)
	}
	if (type === 'text' || type === 'password' || type === 'tel' || type === 'number' || type === 'textarea') {
		return (
			<Input type={f.inputType}
				name={fieldName}
				placeholder={f.label}
				value={value}
				onChange={onChange}
				disabled={disabled}
			/>
		)
	}
	if (type === 'checkbox') {
		return (                                        
			<Label className="switch switch-icon switch-pill switch-success-outline-alt">
				<Input type="checkbox" 
					className="switch-input"
					checked={value}
					onChange={onChange} 
					disabled={disabled}
				/>
				<span className="switch-label" data-on={'\uf00c'} data-off={'\uf00d'}></span>
				<span className="switch-handle"></span>
			</Label>
		)
	}
	if (type === 'date') {
		if (disabled) {
			return (
				<Input type='text' id="" 
					placeholder={f.label}
					value={value}
					disabled={disabled}
				/>
			)
		}
		return (
			<DateAndTime 
				value={value} 
				onChange={onChange} 
			/>
		)
	}
	if (type === 'file') {
		return (
			<FileManager 
				value={value || []} 
				onChange={onChange} 
				fileLimit={f.fileOptions.fileLimit || 1}
			/>
		)
	}
	return null
}


/**
 * Handle Input Value
 * 
 * @returns {string} Result value
 * @author Jonathan
 */
export function inputChange({ type, event }) {
	const { target } = event
	const value = () => {
		if (target === undefined) return event

		if (target.type === 'checkbox') {
			return target.checked 
		} else {
			if (type.includes('Int')) return parseInt(target.value) || 0
			if (type.includes('Float')) return parseFloat(target.value) || 0
		}

		return target.value
	}

	return value()
}


/**
 * Handle Select Value
 * 
 * @returns {string} Result value
 * @author Jonathan
 */
export function selectChange({ event }) {
	const value = v => {
		switch (v.toLowerCase().trim()) {
		case 'true': case 'yes': case '1': return true
		case 'false': case 'no': case '0': case null: return false
		default: return Boolean('')
		}
	}

	return value(event.target.value)
}


/**
 * Handle Enum Select Value
 * 
 * @returns {string} Result value
 * @author Jonathan
 */
export function selectEnumChange({ event }) {
	return event.target.value === '' ? null : event.target.value
}


/**
 * Submit the form
 * 
 * @param {object} data Form Data
 * @returns {Promise} Callback Suuccess or Error Handler
 * @author Jonathan
 */
export function submitForm({ props, context, entity, callback }) {
	props.mutate({
		variables: entity
	})
		.then(() => SuccessHandler({
			context: context, 
			callback: context.onGoBack()
		}))
		.catch(error => {
			ErrorHandler({
				context: context,
				error: { error },
				callback: typeof callback === 'function' ? callback() : ''
			})
		})
}


/**
 * Check if all required fields have value
 * before submitting the form
 * 
 * @returns {Boolean} True / False
 * @author Jonathan
 */
export function shouldSubmit({ entity, fields }) {
	let required = []

	Object.keys(entity).forEach(e => {
		if (e !== '__typename') {
			const varType = fields.find(f => f.field == e).varType
			if (isFieldRequired(varType)) required.push(e)
		}
	})
	
	return required.every(r => (entity[r] !== null && entity[r] !== '' && entity[r] !== undefined))
}


/**
 * Check if field is required
 * 
 * @param {String} varType VarType
 * @returns {Boolean} True / False
 * @author Jonathan
 */
export function isFieldRequired(varType) {
	return varType.includes('!')
}


/**
 * Check if field is an Enum
 * 
 * @param {String} varType VarType
 * @returns {Boolean} True / False
 * @author Jonathan
 */
export function isFieldEnum(varType) {
	return /Enum*/g.test(varType)
}


/**
 * Filter a search option list
 * 
 * @param {Array} list List to be filtered
 * @param {String} field Field to match
 * @param {String} value Current value need to match
 * @returns {Object[]} Array of objects
 * @author Jonathan
 * @todo Allow multiple conditions/fields to match
 */
export function filterOptionList(list, field, value) {
	return list.items.filter(l => l[field] === value)
}

/**
 * EXPORT ACTIONS
 * 
 * @param {string} path - Get the Edit Page Path
 * @param {string} data - Get the record detail
 * @param {string} context - Get the Context detail of the page
 * @returns {boolean} Path with Id to be edit
 */
export function actions(path, data, context) {
	return ([
		{
			task: 'Edit',
			action: 'edit',
			icon: 'edit',
			color: 'warning',
			linkTo: (data.username === undefined) ? `${path + data.Id}` : `${path + data.username}`,
			isVisible: isActionVisibile('All', 'edit', '', data, context)
		}
	])
}

/**
 * ACTION DISPLAY VISIBILITY
 * 
 * @param {string} a - Current status/es to match against
 * @param {string} b - Action to be done
 * @param {string} c - Required Access the user must have
 * @param {object} d - Current data item
 * @param {object} e - Inherited context from parent
 * @returns {boolean} True / False
 */
function isActionVisibile(a, b, c, d, e) {
	return (a.indexOf(d.Status) !== -1 || a.indexOf('All') !== -1) && e.handleElementAccess(b) && true
}
