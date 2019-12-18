import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import PropTypes from 'prop-types'
import {
	Table,
	Badge,
	Button
} from 'reactstrap'

import Paginator from './Paginator'
import Export from './Export'
import ListLimiter from './ListLimiter'
import ModalPortal from './ModalPortal'
import TableColumnSelector from './TableColumnSelector'
import { withTranslation } from 'react-i18next'

import { SetLocalData, RemoveLocalData } from '../utils/CoreHelpers'

class TableData extends Component {

	state = {
		modal: {
			isOpen: false
		}
	}

	// Table
	handleSortBy(field) {
		const { sortBy, sortOrder } = this.props
		const order = (sortBy === field) && (sortOrder === 'ASC') ? 'DESC' : 'ASC'
		if (field.length === 0) return

		this.context.onTableSort({ field, order })
	}

	handlePaginateListing(page) {
		this.context.onTablePaginate(page)
	}

	handleListLimitChange(limit) {
		this.context.onTableChangeLimit(limit)
	}

	handleColumnChange = cols => {
		SetLocalData(`fld_${this.context.component}`, cols)
		this.context.onTableChangeColumn()
	}

	handleResetDefaultColumns = () => {
		RemoveLocalData(`fld_${this.context.component}`)
		this.context.onTableChangeColumn()
	}

	handleViewToggle = data => e => {
		// prevent function on double click
		if (!e.detail || e.detail == 1) this.context.onTableViewRecord(data)
	}

	handleModalToggle = () => {
		this.setState({ modal: { isOpen: !this.state.modal.isOpen } })
	}

	componentDidMount() {
		const { fields, component } = this.context
		this.setState({ selectedColumns: getTableColumns(fields, component) })
	}

	render() {
		const { title, data, sortBy, sortOrder, pager, count, exporter, createLink } = this.props
		const { fields, extradata, variables, matchParams } = this.context
		const paginatorProps = {
			pager: pager,
			count: count,
			align: 'right',
			paginate: this.handlePaginateListing.bind(this)
		}
		const dataHeader = fields.filter(function (th) {
			return isColumnVisible(th)
		})
		
		let tblContent = ''
		if (data.length == 0) {
			tblContent = (
				<tr>
					<td colSpan={fields.length + 1} className="p-3 text-center">No data available.</td>
				</tr>
			)
		} else {
			tblContent = data.map((d, i) => {
				return (
					<tr key={i}>
						{this.props.viewer &&
							<td>
								<Button
									color="link"
									title={d.isViewed.length === 0 ? 'Mark as Viewed' : 'Unmark as Viewed'}
									onClick={this.handleViewToggle({ 'recordID': d.Id, 'viewID': d.isViewed })}>
									{d.isViewed.length === 0 ? (
										<i className="fa fa-eye text-secondary"></i>
									) : (
										<i className="fa fa-eye text-dark"></i>
									)}
								</Button>
							</td>
						}
						{fields.map(function (th, idx) {
							let params = ''
							let cellContent = ''
							let cellValue = getValue(th.field)

							function getValue(v) {
								if (Array.isArray(v)) return joinFields(v)
								if (typeof v === 'string') return d[v]
							}

							function joinParams(array) {
								params = array.map(p => d[p]).join('/')
							}

							function joinFields(array) {
								return array.map(f => d[f]).join('-')
							}

							function getIcon(i) {
								switch (i) {
								case 'Edit': return <i className="fa fa-pencil"></i>
								case 'Delete': return <i className="fa fa-trash"></i>
								case 'True': case 'Yes': return <i className="fa fa-check"></i>
								case 'False': case 'No': return <i className="fa fa-close text-secondary"></i>
								case 'Active': return <i className="fa fa-circle text-success"></i>
								case 'Inactive': case 'InActive': return <i className="fa fa-circle-o text-secondary"></i>
								default: return <i className="fa fa-eye"></i>
								}
							}

							function mapThis() {
								let { items } = extradata[th.mapTo]
								let mapBy = th.mapByField
								let match = items.find(item => item.Id === (d[th.field]))
								return (match !== undefined ? match[mapBy] : '')
							}

							function statusColor(status) {
								switch (status) {
								case 'Approved': case 'Open': case 'Sent': return 'success'
								case 'Cancelled': case 'Closed': case 'Archived': return 'danger'
								case 'Requested': case 'Acknowledged': case 'Seen': return 'info'
								default: return 'secondary'
								}
							}

							if (isColumnVisible(th) || th.title === 'Action') {
								if (matchParams.params !== undefined) {
									if (matchParams.params.targetField !== undefined && matchParams.params.targetField === th.field) {
										th.type = 'lookup'
									}
								}

								if (th.type === 'action') {
									cellContent = (
										th.actions.map((a, i) => {

											joinParams(a.params)

											return (
												<Link key={i}
													to={a.link + params}
													title={a.title}
													className="c-table-action">
													{getIcon(a.title)}
												</Link>
											)
										})
									)
								} else if (th.type === 'link') {

									if (th.params) joinParams(th.params)

									if (th.shouldMap === true && th.shouldMap !== undefined) {
										cellContent = <Link to={th.link + params}>{mapThis()}</Link>
									} else {
										cellContent = <Link to={th.link + params}>{cellValue}</Link>
									}

								} else if (th.type === 'lookup') {
									if (th.params !== undefined) joinParams(th.params)
									cellContent = <Badge color="secondary"
										onClick={() => window.parent['handleLookup' + th.field](params, cellValue)}
										className="badge--status text-uppercase"
										style={{ cursor: 'pointer' }}
									>
										{cellValue}
									</Badge>
								} else if (th.type === 'status') {
									cellContent = <Badge color={statusColor(cellValue)} className="badge--status text-uppercase">{cellValue.replace(/_/g, ' ')}</Badge>
								} else if (th.type === 'boolean') {
									cellContent = (cellValue ? getIcon(th.boolOptions[0]) : getIcon(th.boolOptions[1]))
								} else if (th.type === 'currency') {
									cellValue = (cellValue) ? cellValue : 0
									cellContent = cellValue.toLocaleString(undefined, { minimumFractionDigits: 3 })
								} else {
									if (th.shouldMap === true && th.shouldMap !== undefined) {										
										cellContent = mapThis()
									} else {										
										if ((th.field === 'CreatedByUserName' && cellValue === null) || (th.field === 'ModifiedByUserName' && cellValue === null) ){
											cellContent = 'System'
										} else {
											cellContent = cellValue
										}										
									}
								}
								return (
									<td key={idx} className={th.type === 'boolean' || th.type === 'action' ? 'text-center' : (th.type === 'currency') ? 'text-right' : ''}>
										{cellContent}
									</td>
								)
							}
						})}
					</tr>
				)
			})
		}

		return (
			<div className="c-table ">

				<div className="c-table__header d-flex justify-content-between align-items-center px-2 py-1">
					<div className="c-table__title">
						<i className="fa fa-table"></i>{' '}{title}
					</div>
					<ul className="list-unstyled d-flex justify-content-end mb-0">
						{/* <li>
							<Paginator {...paginatorProps} />
						</li> */}
						{ createLink.length !== 0 &&
							<li>
								<Link to={createLink}>
									<button className="btn btn-sm btn-primary my-1">
										<i className="fa fa-plus"></i> Add New
									</button>
								</Link>
							</li>
						}
						{exporter &&
							<li>
								<Export
									exportQuery={exporter.query}
									exportQueryVariables={variables}
									exportDataHeader={dataHeader}
									exportQueryDataKey={exporter.targetSchemaKey}
									exportQueryCustomFileName={exporter.customFilename}
									exportItemCount={count}
								/>
							</li>
						}
						<li>
							<button
								className="btn btn-sm btn-outline-secondary float-right ml-1 my-1"
								onClick={this.handleModalToggle}
								title="Configure Table Columns">
								<i className="fa fa-cog"></i>
							</button>
						</li>
					</ul>
				</div>

				{/* <hr className="mt-0" /> */}

				<Table striped responsive size="sm" style={{ 'background': '#fff' }} className="mb-0">
					<thead className="thead-default">
						<tr>
							{this.props.viewer &&
								<th>{''}</th>
							}
							{fields.map((th, i) => {
								const isSortable = th.sortable || th.sortable === undefined ? true : false
								const isSortableClass = data.length > 1 ? (isSortable ? 'is-sortable' : '') : ''
								const isActiveClass = (th.field === sortBy) ? 'is-sort-active' : ''
								const isSortOrderClass = (th.field === sortBy && sortOrder === 'DESC') ? 'is-sort-desc' : ''
								const isTextCenter = (th.type === 'boolean' || th.type === 'action' ? 'text-center' : (th.type === 'currency') ? 'text-right' : '')

								if (isColumnVisible(th) || th.title === 'Action') {
									return (
										<th key={i}
											onClick={isSortable ? this.handleSortBy.bind(this, th.field) : null}
											className={`${isSortableClass} ${isActiveClass} ${isSortOrderClass} ${isTextCenter}`}
											title={th.title}
										>
											<span className="th-text">{th.title}</span>
										</th>
									)
								}
							})}
						</tr>
					</thead>
					<tbody>
						{tblContent}
					</tbody>
				</Table>

				<div className="c-table__footer p-2 d-flex justify-content-between">
					<div>
						<ListLimiter
							onChangeLimit={this.handleListLimitChange.bind(this)}
						/>
					</div>
					<div>
						<Paginator {...paginatorProps} />
					</div>
				</div>

				<ModalPortal
					isOpen={this.state.modal.isOpen}
					onClose={this.handleModalToggle}>
					<TableColumnSelector
						columns={this.state.selectedColumns}
						onChange={this.handleColumnChange}
						onReset={this.handleResetDefaultColumns}
						onCloseModal={this.handleModalToggle}
					/>
				</ModalPortal>

			</div>
		)
	}
}

export default withTranslation()(TableData);

TableData.propTypes = {
	sortBy: PropTypes.string,
	sortOrder: PropTypes.string,
	title: PropTypes.string,
	data: PropTypes.array,
	pager: PropTypes.object,
	count: PropTypes.number,
	exporter: PropTypes.oneOfType([PropTypes.object, PropTypes.bool]),
	viewer: PropTypes.bool,
	createLink: PropTypes.string
}

TableData.contextTypes = {
	onTableSort: PropTypes.func,
	onTablePaginate: PropTypes.func,
	onTableChangeLimit: PropTypes.func,
	onTableChangeColumn: PropTypes.func,
	onTableViewRecord: PropTypes.func,
	fields: PropTypes.array,
	extradata: PropTypes.object,
	component: PropTypes.string,
	variables: PropTypes.object,
	matchParams: PropTypes.object
}

let currComponent = ''

const isColumnVisible = col => {
	const currFields = localStorage.getItem(`fld_${currComponent}`)

	return !currFields 
		? ( col.showDefault !== undefined && col.showDefault )
			|| ( col.hidden !== undefined && !col.hidden.list )
		: currFields.split(',').find(c => c === col.field) && true
}

const getTableColumns = (fields, component) => {
	let columns = []
	currComponent = component

	fields.map(th => {
		const field = {
			field: th.field,
			title: th.title,
			visible: isColumnVisible(th)
		}
		if (th.field !== '') {
			if (th.hidden !== undefined && !th.hidden.tableColumnSelection) columns.push(field)
		}
	})

	return columns
}