import React, { Component, Fragment } from 'react'
import PropTypes from 'prop-types'

export default class TableColumnSelector extends Component {
	
	state = {
		selectedColumns: []
	}
   
	handleSelect = e => {
		// Get Index of Matched object to modify
		let { selectedColumns } = this.state
		let index = selectedColumns.findIndex(c => c.field === e.target.value)
		selectedColumns[index]['visible'] = !selectedColumns[index]['visible']

		// Set new data
		this.setState({ selectedColumns: selectedColumns })
	}

	handleSelectAll = () => {
		// Need to trigger click on input checkbox
		this.state.selectedColumns.forEach(c => {
			if (c.visible === false || c.visible === undefined) this[`column_${c.field}`].click()
		})
	}

	handleSubmit = () => {
		let updatedColumns = []
		this.state.selectedColumns.forEach(c => {
			if (c.visible === true) updatedColumns.push(c.field)
		})

		this.props.onCloseModal()
		this.props.onChange(updatedColumns)
	}

	handleResetDefault = () => this.props.onReset()

	componentDidMount() {
		this.setState({ selectedColumns: this.props.columns })
	}


	render() {
		return (
			<Fragment>
				<p>Select table columns to display.</p>
				<div style={{ display: 'flex', flexWrap: 'wrap' }}>
					{
						this.props.columns.map((c, i) => (
							<label htmlFor={`fld-${c.field}`} key={i} style={{ backgroundColor: '#f5f5f5',
								margin: '2px',
								padding: '2px 5px',
								lineHeight: '1.5',
								flexBasis: '48%' }}>
								<input type="checkbox" id={`fld-${c.field}`} name=""
									value={c.field}
									defaultChecked={c.visible}
									onChange={this.handleSelect}
									ref={input => this[`column_${c.field}`] = input}
								/> {' '}
								{c.title}
							</label>
						))
					}
				</div>
				
				<div className="mt-4">
					<button type="submit" className="btn btn-sm btn-primary" onClick={this.handleSubmit}>Submit</button>{' '}
					<button type="submit" className="btn btn-sm" onClick={this.handleSelectAll}>Select All</button>
					<button type="button" className="btn btn-sm btn-link" title="Reset" onClick={this.handleResetDefault}>
						Reset Default
					</button>
				</div>
			</Fragment>
		)
	}
}

TableColumnSelector.propTypes = {
	onCloseModal: PropTypes.func,
	onChange: PropTypes.func,
	onReset: PropTypes.func,
	columns: PropTypes.array
}