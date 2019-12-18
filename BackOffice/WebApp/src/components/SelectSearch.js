/* eslint-disable react/no-deprecated */
import React, { Component, Fragment } from 'react'
import { Button } from 'reactstrap'
import { withApollo } from 'react-apollo'
import PropTypes from 'prop-types'
import Select, { Async } from 'react-select'

import Loadable from 'react-loadable'
import Loader from './Loader'

import 'react-select/dist/react-select.css'

class SelectSearch extends Component {

	static propTypes = {
		multi: PropTypes.bool,
		disabled: PropTypes.bool,
		searchable: PropTypes.bool,
		searchQuery: PropTypes.oneOfType([PropTypes.object, PropTypes.array]),
		searchQueryKey: PropTypes.string,
		searchKey: PropTypes.object,
		client: PropTypes.object,
		searchOnChange: PropTypes.func,
		searchValue: PropTypes.oneOfType([PropTypes.string, PropTypes.number, PropTypes.object, PropTypes.array, PropTypes.bool]),
		searchLookupField: PropTypes.string,
		searchLookupUrl: PropTypes.string,
		type: PropTypes.string,
	}
	
	timer = null

	state = {
		modal: {
			isOpen: false,
			backdrop: true
		},
		selectedOption: null,
		multi: this.props.multi !== undefined && this.props.multi,                   					  // default: undefined
		searchable: this.props.searchable === 'true' || this.props.searchable === undefined && true,    // default: true
		disabled: this.props.disabled && this.props.disabled !== undefined && true,            		  // default: false
	}

	handleModalToggle = () => {
		this.setState({
			modal: {
				isOpen: !this.state.modal.isOpen
			}
		})
	}

	handleChange = selectedOptions => {
		let returnValues = []
		if (selectedOptions){
			if (selectedOptions.constructor === Array){
				selectedOptions.map(v => {
					returnValues.push(v.value)
				})
				this.setState({
					selectedOption: selectedOptions
				})
			} else {
				let selectedValue = selectedOptions ? selectedOptions.value : ''
				returnValues = selectedValue
				this.setState({
					selectedOption: {
						value: selectedValue,
						label: selectedOptions ? selectedOptions.label : ''
					}
				})
			}
		} else {
			returnValues = null
		}

		// TRIGGER FIELD UPDATE
		let optionval = {
			target: {
				value: returnValues
			}
		}
		this.props.searchOnChange(optionval)
	}

	getAsyncOptions = (input, callback) => {
		clearTimeout(this.timer)

		// Search texct input must be at least 3 characters
		if (input.length >= 3) {
			this.timer = setTimeout(() => {
				var variablesConfig = {
					query: this.props.searchQuery,
					variables: {
						offset: 0,
						limit: 100,
					},
				}
				variablesConfig.variables[this.props.searchKey.label] = input
				this.props.client.query(variablesConfig).then(res => {
					let options = {
						options: [],
						complete: true
					}
					res.data[this.props.searchQueryKey].items.map(option => {
						options.options.push({
							value: option[this.props.searchKey.value], 
							label: option[this.props.searchKey.label]
						})
					})
					callback(null, options)
				})
			}, 1500)
		} else {
			callback(null, {
				options: []
			})
		}
	}

	getSelectOptions = () => {
		const { searchValue, searchKey, searchQuery } = this.props
		let defaultValues = []
		let options = []

		searchQuery.map(option => {
			if (searchValue !== null && searchValue !== undefined){
				if (searchValue.constructor === Array){
					searchValue.map(values => {
						if (option[searchKey.value] == values && option !== null){
							defaultValues.push({
								value: option[searchKey.value],
								label: option[searchKey.label]
							})
						}
					})
				} else {
					if (searchValue == option[searchKey.value]){
						defaultValues = {
							value: option[searchKey.value],
							label: option[searchKey.label]
						}
					}
				}
			}
			options.push({
				value: option[searchKey.value],
				label: option[searchKey.label]
			})
		})

		if (defaultValues.constructor === Array && defaultValues.length == 0){
			defaultValues = {}
		}
		return { options: options, defaultValues: defaultValues }
	}

	// Lifecycle
	componentWillMount() {
		if (typeof this.props.searchValue === 'object') {
			this.setState({
				selectedOption: this.props.searchValue,
			})
		} else {
			this.setState({
				selectedOption: {
					value: this.props.searchValue, label: this.props.searchValue
				},
			})
		}
	}

	componentDidMount() {
		const { searchLookupField } = this.props

		// ATTACH LISTENER
		if (searchLookupField !== undefined && searchLookupField.length !== 0) {
			window['handleLookup' + searchLookupField] = function (optionId, optionValue) {
				let optionval = {
					target: {
						value: optionValue
					}
				}
				this.props.searchOnChange(optionval)
				this.setState({
					selectedOption: {
						value: (optionId) ? optionId : optionValue, label: optionValue
					},
					modal: {
						isOpen: false
					}
				})
			}.bind(this)
		}
	}

	render() {
		const { selectedOption, multi, searchable, modal } = this.state
		const { searchLookupUrl, searchLookupField } = this.props
		const handleChange = this.handleChange
		const handleModalToggle = this.handleModalToggle
		
		const lookupBtn = (
			<Button 
				size="sm" 
				color="link" 
				onClick={this.handleModalToggle.bind(this)} 
				style={{
					backgroundColor: '#c2cfd6',
					borderRadius: '0',
					color: '#fff'
				}}
				title="Advanced Search Lookup">
				<i className="fa fa-search"></i>
			</Button>
		)

		const ModalWindow = Loadable.Map({
			loader: {
				ModalPortal: () => import('./ModalPortal'),
				Iframe: () => import('react-iframe')
			},
			loading: Loader,
			render(loaded) {
				let ModalPortal = loaded.ModalPortal.default
				let Iframe = loaded.Iframe.default
				return (
					<ModalPortal
						isOpen={modal.isOpen}
						onClose={handleModalToggle}
						style={{ maxWidth: '95%' }}
						bodyStyle={{ backgroundColor: '#e4e5e6' }}
					>
						<Iframe url={`#/recordlookup/${searchLookupUrl}/list/${searchLookupField}`}
							width="100%"
							height="500px"
							id="modal-selector"
							className="modal-selector"
							display="initial"
							position="relative"
							allowFullScreen
						/>
					</ModalPortal>
				)
			}
		})

		const selectRender = () => {
			let isDisabled = (this.props.disabled !== undefined && this.props.disabled)
			let optionsAndValues = (this.props.type == 'select') ? this.getSelectOptions() : {}
			switch (this.props.type) {
			case 'select':
				return <Select
					value={optionsAndValues.defaultValues}
					multi={multi}
					searchable={searchable}
					onChange={handleChange}
					disabled={isDisabled}
					options={optionsAndValues.options} // expects an object
				/>
			case 'async':
				return <div style={{ display: 'grid', gridTemplateColumns: '1fr 30px' }}>
					<Async
						value={selectedOption}
						multi={multi}
						searchable={searchable}
						onChange={handleChange}
						disabled={isDisabled}
						loadOptions={debounce(this.getAsyncOptions, 1000)} // expects a function
					/>
					{(searchLookupUrl.length !== 0 && !isDisabled) && lookupBtn}
				</div>
			default: return ''
			}
		}

		return (
			<Fragment>
				{selectRender()}
				{this.state.modal.isOpen && <ModalWindow />}
			</Fragment>
		)
	}
}

export default withApollo(SelectSearch)

function debounce(a, b, c) {
	var d, e
	return function() {
		function h() {
			d = null, c || (e = a.apply(f, g))
		}
		var f = this,
			g = arguments
		return clearTimeout(d), d = setTimeout(h, b), c && !d && (e = a.apply(f, g)), e
	}
}
