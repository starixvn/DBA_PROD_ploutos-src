import queryString from 'query-string'

/** @module CoreHelpers */


const pageAction = GetLocalData('pageAction', 'add') // ADD DEFAULT VALUE IN CASE NO VALUE HAS FOUND OR NOT-SET

/**
 * Manage Cookies
 * @namespace DocCookies
 * @author Kim
 */
export const DocCookies = {
	/* eslint-disable no-useless-escape */

	/**
	* Get Cookie Item
	* @param {String} sKey Key
	* @returns {String} value
	*/
	getItem: function (sKey) {
		return decodeURIComponent(document.cookie.replace(new RegExp('(?:(?:^|.*;)\\s*' + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, '\\$&') + '\\s*\\=\\s*([^;]*).*$)|^.*$'), '$1')) || null
	},

	/**
	* Set Cookie Item
	* @param {String} sKey Key
	* @param {String} sValue Key
	* @param {String} vEnd Key
	* @param {String} sPath Key
	* @param {String} sDomain Key
	* @param {String} bSecure Key
	* @returns {Boolean} True/False
	*/
	setItem: function (sKey, sValue, vEnd, sPath, sDomain, bSecure) {
		if (!sKey || /^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)) { return false }
		var sExpires = ''
		if (vEnd) {
			switch (vEnd.constructor) {
			case Number:
				sExpires = vEnd === Infinity ? '; expires=Fri, 31 Dec 9999 23:59:59 GMT' : '; max-age=' + vEnd
				break
			case String:
				sExpires = '; expires=' + vEnd
				break
			case Date:
				sExpires = '; expires=' + vEnd.toUTCString()
				break
			}
		}
		document.cookie = encodeURIComponent(sKey) + '=' + encodeURIComponent(sValue) + sExpires + encodeURIComponent(sDomain ? '; domain=' + sDomain : '') + (sPath ? '; path=' + sPath : '') + (bSecure ? '; secure' : '')
		return true
	},
	/**
	* Remove Cookie Item
	* @param {String} sKey Key
	* @param {String} sPath Path
	* @param {String} sDomain Domain
	* @returns {Boolean} True/False
	*/
	removeItem: function (sKey, sPath, sDomain) {
		if (!sKey || !this.hasItem(sKey)) { return false }
		document.cookie = encodeURIComponent(sKey) + '=; expires=Thu, 01 Jan 1970 00:00:00 GMT' + ( sDomain ? '; domain=' + sDomain : '') + ( sPath ? '; path=' + sPath : '')
		return true
	},
	/**
	* Check Cookie Existence
	* @param {String} sKey Key
	* @returns {Boolean} True/False
	*/
	hasItem: function (sKey) {
		return (new RegExp('(?:^|;\\s*)' + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, '\\$&') + '\\s*\\=')).test(document.cookie)
	},
	/* eslint-enable no-useless-escape */
}

/**
 * Manage Cookies
 * @namespace DocCookiesCMS
 * @author Mel
 */
export const DocCookiesCMS = {
	/* eslint-disable no-useless-escape */
	
	/**
	* Set Cookie Item
	* @param {String} sKey Key
	* @param {String} sValue Key
	* @param {String} vEnd Key
	* @param {String} sPath Key
	* @param {String} sDomain Key
	* @param {String} bSecure Key
	* @returns {Boolean} True/False
	*/
	setItem: function (sKey, sValue, vEnd, sPath, sDomain, bSecure) {
		if (!sKey || /^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)) { return false }
		var sExpires = ''
		if (vEnd) {
			switch (vEnd.constructor) {
			case Number:
				sExpires = vEnd === Infinity ? '; expires=Fri, 31 Dec 9999 23:59:59 GMT' : '; max-age=' + vEnd
				break
			case String:
				sExpires = '; expires=' + vEnd
				break
			case Date:
				sExpires = '; expires=' + vEnd.toUTCString()
				break
			}
		}
				
		document.cookie = encodeURIComponent(sKey) + '=' + encodeURIComponent(sValue) + sExpires + '; domain=globalcomrci.com' + (sPath ? '; path=' + sPath : '') + (bSecure ? '; secure' : '')
		return true
	}
	/* eslint-enable no-useless-escape */
}

/**
 * Get LocalStorage data by Key
 * 
 * @param {String} key Key to look for
 * @param {String} defaultValue Default Value if Key is non-existent
 * @returns {String} Value
 * @author Kim
 */
export function GetLocalData(key, defaultValue) {
	var item = localStorage.getItem(key)
	return (item) ? item : defaultValue
}

/**
 * Set LocalStorage data by Key
 * 
 * @param {String} key Key to Set
 * @param {String} value Value to Set
 * @returns {String} Value
 * @author Kim
 */
export function SetLocalData(key, value) {
	localStorage.setItem(key, value)
	return value
}

/**
 * Remove LocalStorage data by Key
 * 
 * @param {String} key Key to Remove
 * @returns {null} Null
 * @author Kim
 */
export function RemoveLocalData(key) {
	localStorage.removeItem(key)
	return
}

/**
 * Format Currency for Display
 * 
 * @param {String} value Value
 * @param {String} scale Scale
 * @returns {String} Formatted value
 * @author Kim
 */
export function FormatCurrency(value, scale) {
	let scaleInp = scale ? scale : 3
	return Number(value).toLocaleString(undefined, { minimumFractionDigits: scaleInp })
}

/**
 * Convert Search Object to String Params
 * 
 * @requires queryString
 * @param {Object} fields Search Object parameter/s
 * @returns {String} Formatted search string
 * @author Jonathan
 */
export function QueryStringify(fields) {
	return queryString.stringify(fields)
}

/**
 * Convert Search String Params to Object
 * 
 * @requires queryString
 * @param {String} query String Search parameter/s
 * @returns {Object} Formated object
 * @author Jonathan
 */
export function QueryParsefy(query) {
	return queryString.parse(query)
}

/**
 * Get Initial Search Values on Page Load
 * 
 * @param {String} query String Search parameter/s
 * @param {String} field Field to match
 * @param {String} initVal Initial value if actual value is non-existent
 * @returns {String} Value
 * @author Jonathan
 */
export function GetInitSearchValue(query, field, initVal) {
	const q = query !== '' && QueryParsefy(query)
	return q ? (q[field] !== undefined ? q[field] : initVal) : initVal
}

/**
 * Get Initial Table Limit on Page Load from LocalStorage
 * 
 * @default 10
 * @returns {String} Limit Value
 * @author Jonathan
 */
export function GetInitLimitValue() {
	return GetLocalData('setListLimit') ? GetLocalData('setListLimit') : 10
}

/**
 * Get Initial Offset Value on Page Load
 * 
 * @default 0
 * @param {String} pn Page Number
 * @returns {String} List Offset Value
 * @author Jonathan
 */
export function GetInitOffsetValue(pn) {
	return (pn && pn !== '0') ? (pn - 1) * GetInitLimitValue() : 0
}
export function HumanReadableFieldName(type, field){
	return (type == 'ID' && field !== 'Id') ? field.substring(0, field.length - 2) : field;
}

/**
 * Get Query Metas
 * 
 * @param {String} asType Type of Meta to query
 * @param {String} tableHeaders Data fields
 * @param {String} componentName Current Component Name
 * @param {String} searchQuery Search Query
 * @returns {any} Any
 * @author Jonathan
 */
export function GetQueryMeta(asType, tableHeaders, componentName, searchQuery) {
	const currFields = GetLocalData(`sfld_${componentName}`)
	const source = !currFields ? tableHeaders : JSON.parse(currFields)

	if (asType === 'getTypes') {
		let types = []
		source.forEach(th => { 
			const varType = !currFields
				? `${th.varType}`
				: (tableHeaders.find(t => t.field === th.field)).varType
			const entry = `$${th.field}: ${varType}`
			
			!currFields
				? (
					th.searchDefault || //&& types.push(entry)
					th.hidden !== undefined && (th.hidden.form.search !== undefined && th.hidden.form.search === false)) && types.push(entry)
				: types.push(entry)
			
			if (th.expression === 'BETWEEN') types.push(`$${th.field}1: ${varType}`)
		})
		return types
	}

	if (asType === 'getFilters') {
		let filters = {}
		source.forEach(th => {
			const field = th.field
			const expression = !currFields ? th.searchExpression : th.expression
			const entry = {
				parameter: `$${field}`,
				expression: expression !== undefined ? expression : (th.searchType === 'select' ? 'EQUALS' : 'CONTAINS')
			}

			!currFields
				? (
					th.searchDefault || //&& (filters[field] = entry)
					th.hidden !== undefined && (th.hidden.form.search !== undefined && th.hidden.form.search === false)) && (filters[field] = entry)
				: (filters[field] = entry)

			if (expression === 'BETWEEN') entry['parameter_one'] = `$${field}1`

		})
		return JSON.stringify(filters).replace(/"/g,'')
	}

	if (asType === 'getQueryVariables') {
		let variables = {}

		source.forEach(s => {
			const field = s.field

			const varType = !currFields
				? `${s.varType}`
				: (tableHeaders.find(t => t.field === s.field)).varType

			const isEnum = /Enum*/g.test(varType)

			const checkValue = type => {
				switch (type) {
				case 'Boolean': return null
				case 'Int': case 'Int!': return 0
				case 'String':
				case 'String!':
				case 'ID': 
				case 'ID!':
				case 'DateTime': return null
				default: return null
				}
			} 
			const initVal = isEnum ? null : checkValue(varType)
			const value = GetInitSearchValue(searchQuery, field, initVal)
			const boolValues = ['true', 'false']

			!currFields
				? (
					s.searchDefault || // && (variables[field] = value )
					s.hidden !== undefined && (s.hidden.form.search !== undefined && s.hidden.form.search === false)) && (variables[field] = value)
				: variables[field] = boolValues.includes(value) ? !value : value

			if (s.expression === 'BETWEEN') variables[`${field}1`] = GetInitSearchValue(searchQuery, `${field}1`, initVal) 
		})
		return variables
	}

	if (asType === 'getEntityTypes') {
		let filters = []
		source.forEach(th => { 
			const entry = `$${th.field}: ${th.varType}`
			// if (th.showFormDefault || th.isRequired) filters.push(entry) // || th.isRequired
			if (
				th.showFormDefault ||
				( th.hidden !== undefined && ((pageAction === 'add' && !th.hidden.form.add) || (pageAction === 'edit' &&!th.hidden.form.edit)) )
				|| th.isRequired
			) {
				filters.push(entry)
			}
		}) 
		return filters
	}

	if (asType === 'getEntityFilters') {
		let filters = []
		source.forEach(th => { 
			const entry = `${th.field}: $${th.field}`

			// if (th.showFormDefault || th.isRequired) filters.push(entry) // || th.isRequired
			if (
				th.showFormDefault ||
				( th.hidden !== undefined && ((pageAction === 'add' && !th.hidden.form.add) || (pageAction === 'edit' &&!th.hidden.form.edit)) )
				|| th.isRequired
			) {
				filters.push(entry)
			}
		}) 
		return filters
	}

	// if (asType === 'getEntityFormFields') {
	// 	let fieldsToQuery = []
	// 	tableHeaders.forEach(th => {
	// 		const type = th.searchType
	// 		if (
	// 			(th.showFormDefault !== undefined && th.showFormDefault) 
	// 			// ||
	// 			// th.hidden !== undefined && (!th.hidden.form.add || !th.hidden.form.edit)
	// 		) {
	// 			fieldsToQuery.push({
	// 				field: th.field,
	// 				title: th.title,
	// 				type: type !== undefined ? type : 'text'
	// 			})
	// 		}
	// 	})
	// 	return fieldsToQuery
	// }

}

/**
 * Select Fields To Display on Search Filter Component
 * 
 * @param {String} tableHeaders Data fields
 * @param {String} componentName Current Component Name
 * @returns {Object[]} Array of object fields
 * @author Jonathan
 */
export function SelectFieldsToSearch(tableHeaders, componentName) {
	const currFields = GetLocalData(`sfld_${componentName}`)
	const source = !currFields ? tableHeaders : JSON.parse(currFields)

	if (!currFields) {
		let fieldsToSearch = []
		source.forEach(th => {
			const expression = th.searchExpression
			const searchType = th.searchType

			if (th.field !== '' && 
				(th.searchDefault !== undefined && th.searchDefault) ||
				(th.hidden !== undefined && (th.hidden.form.search !== undefined && th.hidden.form.search === false) )
			) {
				fieldsToSearch.push({
					field: th.field,
					title: th.title,
					searchType: searchType !== undefined ? searchType : 'text',
					expression: expression !== undefined ? expression : (th.searchType === 'select' ? 'EQUALS' : 'CONTAINS')
				})
			}
		})
		return fieldsToSearch
	}
	return source
}

/**
 * Select Fields To Pass to GraphQl Query 
 * (e.g. For Table Listing's custom column selection)
 * 
 * @param {String} tableHeaders Data fields
 * @param {String} componentName Current Component Name
 * @returns {Object[]} Array of object fields
 * @author Jonathan
 */
export function SelectFieldsToQuery(tableHeaders, componentName) {
	const currFields = GetLocalData(`fld_${componentName}`)
	
	if (!currFields) {
		// Map fields to show default visible columns
		let fieldsToQuery = []
		tableHeaders.forEach(th => {
			if (
				th.field !== '' 
				&& (
					(th.showDefault !== undefined && th.showDefault) 
					|| ( th.hidden !== undefined && !th.hidden.list )
					|| th.isRequired
				)
			) {
				fieldsToQuery.push(th.field)
			}
		})
		return fieldsToQuery
	} else {
		// Add isRequired fields to selected table columns
		let fieldsToQuery = currFields.split(',')
		tableHeaders.forEach(th => th.isRequired && fieldsToQuery.push(th.field))
		return fieldsToQuery
	}
}

/**
 * Select Fields To Pass for GraphQl Mutation
 * 
 * @param {String} tableHeaders Data fields
 * @returns {Object[]} Array of object fields
 * @author Jonathan
 */
export function SelectFieldsToMutate(tableHeaders) {
	let fieldsToMutate = []
	tableHeaders.forEach(th => {
		if (
			// ( th.showFormDefault !== undefined && th.showFormDefault ) || // && th.isRequired // TODO delete line		
			( th.showFormDefault !== undefined && th.showFormDefault ) || 
			th.hidden !== undefined && ((pageAction === 'add' && !th.hidden.form.add) || (pageAction === 'edit' &&!th.hidden.form.edit))
		) {
			fieldsToMutate.push(th.field)
		}
	})
	return fieldsToMutate
}

/**
 * Get All Fields To Pass to GraphQl Query
 * (Except with empty fields value)
 * 
 * @param {String} tableHeaders Data fields
 * @returns {Object[]} Array of object fields
 * @author Jonathan
 */
export function GetAllFieldsToQuery(tableHeaders) {
	let fieldsToQuery = []
	tableHeaders.forEach(th => (th.field !== '') && fieldsToQuery.push(th.field))
	return fieldsToQuery
}

/**
 * Get All Fields To Pass to GraphQl Query
 * (Except with empty fields value)
 * 
 * @param {String} tableHeaders Data fields
 * @returns {Object[]} Array of Reshaped object fields
 * @author Jonathan
 */
export function GetAllFieldsToView(tableHeaders) {
	let fieldsToView = []
	tableHeaders.forEach(th => {
		// IF th.field is NOT empty and th.hidden is undefined, OR
		// IF th.hidden is NOT undefined and its value is false
		// THEN push to array variable 'fieldsToView'
		if ((th.field !== '' && th.hidden === undefined) || (th.hidden !== undefined && !th.hidden.detail)) {
			fieldsToView.push({
				'field': th.field,
				'title': th.title,
				'type': th.type,
				'varType': th.varType,
				'link': th.link,
				'params': th.params,
				'decimalPlace': th.decimalPlace
			})
		}
	})
	return fieldsToView
}

/**
 * Check if passed object is really an Object
 * 
 * @param {Object} obj Sample object
 * @returns {Boolean} True or False
 * @author Jonathan
 */
export function isObject(obj) {
	return (!!obj) && (obj.constructor === Object)
}

/**
 * Check if passed object is empty
 * 
 * @param {Object} obj Sample object
 * @returns {Boolean} True or False
 * @author Jonathan
 */
export function isObjectEmpty(obj) {
	return (Object.keys(obj).length === 0)
}

/**
 * Convert camel-cased string to separate words
 * 
 * @param {String} camelCase Sample string
 * @returns {String} Converted string
 * @author Kim
 */
export function camelCaseToWords(camelCase) {
	return camelCase.replace(/([A-Z])/g, function(match) {
		return ' ' + match
	}).replace(/^./, function(match) {
		return match.toUpperCase()
	})
}

/**
 * Return appropriate boolean field options
 * 
 * @param {String} type Type of Boolean options
 * @returns {Object[]} Array of objects
 * @author Jonathan
 */
export function BoolOpts(type) {
	switch (type) {
	case 'yes':
		return [{
			name: 'Yes',
			value: true
		},
		{
			name: 'No',
			value: false
		}
		]
	case 'active':
		return [{
			name: 'Active',
			value: true
		},
		{
			name: 'Inactive',
			value: false
		}
		]
	}
}

/**
 * Return proper expressions options per field type
 * 
 * @param {[]} Array of objects
 * @returns {Object[]} Array of objects
 * @author Kim
 */
export function getExpressionsPerFieldType(fieldProps){
	if(fieldProps.type == 'Float' || fieldProps.type == 'Integer' || fieldProps.type == 'DateTime'){
		return ['EQUALS', 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL', 'LESS_THAN', 'LESS_THAN_OR_EQUAL', 'BETWEEN'];
	}
	if(fieldProps.enumValues.length > 0 || fieldProps.type == 'ID'){ // THIS IS ENUM
		return ['EQUALS', 'IS_ONE_OF'];
	}
	switch(fieldProps.type) {
		case 'Boolean':
			return ['EQUALS'];
		case 'String':
			return ['CONTAINS', 'EQUALS'];
		// case 'ID':
		// 	return ['EQUALS', 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL', 'LESS_THAN', 'LESS_THAN_OR_EQUAL', 'BETWEEN', 'IS_IN_ARRAY'];
		default:
			return [];
	}
}

// export function getDateDefinedParams(){
// 	return ['CUSTOM', 'CURRENT_YEAR', 'CURRENCT_QUARTER', 'CURRENT_MONTH', 'CURRENT_WEEK', 'TODAY'];
// }

/**
 * Return formatted Currency
 * 
 * @param {String} unformatted number (int)
 * @returns {String} currency formatted string
 * @author Kim
 */
export const numberWithCommas = (x, decimal) => {
	// TODO: MAKE decimal BE PART OF THE REPLACE
  return x.toString().replace(/\B(?=(\d{4})+(?!\d))/g, ",");
}

/**
 * Return re-indexed array of html element
 * 
 * @param {[]} Array
 * @returns {[]} reindexed Array
 * @author Kim
 */
export const reOrderIndexes = (items, draggedElement, catcherElement) => { 
	const newItems = items.slice(0); // COPY
	newItems.splice(catcherElement, 0, newItems.splice(draggedElement, 1)[0]);
	return newItems; 
}