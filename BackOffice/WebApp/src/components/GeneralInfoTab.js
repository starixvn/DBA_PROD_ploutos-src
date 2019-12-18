import React, { Fragment } from 'react'
import { Link } from 'react-router-dom'
import PropTypes from 'prop-types'
import FileManagerView from './FileManagerView'
import * as helper from '../utils/CoreHelpers'

import '../../scss/custom/_infoTab.scss'

const GeneralInfoTab = props => {
	const { item, headers } = props

	const fieldsToDisplay = () => {
		const excludeThis = ['CreatedById', 'DateCreated', 'ModifiedById', 'DateModified']
		let fields = []

		helper.GetAllFieldsToView(headers).map(f => {
			if (!excludeThis.includes(f.field)) fields.push(f)
		})

		return fields
	}

	const displayColumnClass = () => {
		const length = fieldsToDisplay().length

		if (length >= 11 && length <= 20) return 'c-info__list--col-2'
		if (length >= 21 && length <= 30) return 'c-info__list--col-3'
		if (length >= 31) return 'c-info__list--col-4'

		return 'c-info__list'
	}

	const fields = fieldsToDisplay().map((f, i) => {
		const params = f.type === 'link' && f.params.map(p => item[p]).join('/')
		const fullPath = f.link + params
		let val = typeof item[f.field]
		let value = '' // eslint-disable-line no-unused-vars

		if(val == 'number' && (f.varType == 'Int' || f.varType == 'Int!')){
			val = 'string';
		}
		
		switch (val) {		
		case 'boolean':
			if (f.title === 'Status' || f.title === 'Record Status') {
				value = item[f.field] ? 'Active' : 'Inactive'
			} else {
				value = item[f.field] ? 'Yes' : 'No'
			}
			break
		case 'number':
			value = helper.FormatCurrency(item[f.field], f.decimalPlace)
			break
		default: 
			if (f.field === 'CountryIds') 
			{
				let getCountry = ''
				Object.keys(item[f.field]).map((key, index) => {
					let country = item[f.field][key]

					let count = item[f.field].length-1
					if (index === count) {
						country = country.slice(0, -2)
					}
					getCountry = getCountry + country
				})
				value = getCountry
			}
			else
			{
				value = item[f.field]
			}
		}

		if (f.type === 'link') value = <Link to={`${fullPath}`} replace={fullPath === fullPath}> {value} </Link>

		return (			
			<Fragment key={i}>
				<li className="c-info__item">
					<span><b>{f.title}</b></span>
					<span>
						{ f.field === 'FileInfos'
							? <FileManagerView fileInfos={value}/>
							: value
						}
					</span>
				</li>
			</Fragment>
		)
	})

	return (
		<ul className={`list-unstyled ${displayColumnClass()}`}>
			{ fields }
		</ul>
	)
}

GeneralInfoTab.propTypes = {
	item: PropTypes.object,
	headers: PropTypes.array
}

export default GeneralInfoTab