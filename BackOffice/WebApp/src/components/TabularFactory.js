import React, { Component, Fragment } from 'react'
import PropTypes from 'prop-types'
import { graphql, compose, withApollo } from 'react-apollo'
import gql from 'graphql-tag'
import { Table, Button, Form, FormGroup, Label, Col, Row, Input} from 'reactstrap'
import Select, { Async } from 'react-select'
import SelectSearchRecordsAsync from '../components/SelectSearchRecordsAsync'
import DateAndTime from './DateAndTime'
import { SelectFieldsToSearch, SetLocalData, RemoveLocalData, getExpressionsPerFieldType, reOrderIndexes, HumanReadableFieldName } from '../utils/CoreHelpers'

class TabularFactory extends Component {
	state = {
		reportName: '',
		candidateModule: '',
		roles: [],
		candidateFields: [],
		tabularColumns: [],
		orderColumns: [],
		groupByColumns: [],
		offset: 0,
		limit: 10,
		count: true,
		export: false
	}

	handleSubmit = e => {
		e.preventDefault();
		this.props.onSave(this.state);
	}

	handlePreview = e => {
		e.preventDefault();
		this.props.onPreview(this.state);
	}

	handleCancel = e => {
		e.preventDefault();
		this.context.onGoBack();
	}

	// Lifecycle
	componentWillMount() {
		this.setState({
			...this.props.tabularConfig
		})
	}

	// STATE HANDLERs
	_handleOnChange = f => e => {
		if(f == 'candidateModule'){
			this.setState({
				[f] : e.value,
				tabularColumns: [],
				orderColumns: [],
				groupByColumns: []
			});
		}else if(f == 'roles'){
			this.setState({
				[f] : e
			});
		}else{
			this.setState({
				[f] : e.target.value
			});
		}
	}
	_addTabularFieldColumn = selectedOptions => {
		this.setState({ 
			tabularColumns: [
				...this.state.tabularColumns, {
					order: (this.state.tabularColumns.length + 1),
					field: selectedOptions.value,
					fieldType: this._getFieldProperty(selectedOptions.value).type,
					expression: '',
					parameter: '',
					parameter_one: '',
					display: true,
					subTotal: false,
					grandTotal: false
				}
			]
		})
	}
	_addTabularFieldOrder = selectedOptions => {
		this.setState({ 
			orderColumns: [
				...this.state.orderColumns, {
					field: selectedOptions.value,
					fieldType: this._getFieldProperty(selectedOptions.value).type,
					order: 'ASC'
				}
			]
		})
	}
	_addTabularFieldGroup = selectedOptions => {
		this.setState({
			groupByColumns: [
				...this.state.groupByColumns, {
					field: selectedOptions.value,
					fieldType: this._getFieldProperty(selectedOptions.value).type
				}
			]
		})
	}
	_editTabularFieldColumn = field => e => {
		this.setState({ 
			tabularColumns: this.state.tabularColumns.map((col, i) => {
				if(i === field.idx){
					col[field.col] = e.target.type === 'checkbox' ? e.target.checked : e.target.value;
					return col;
				}
				return col;
			})
		})
	}
	_editTabularRecordsAndEnumFieldColumn = field => e => {
		this.setState({ 
			tabularColumns: this.state.tabularColumns.map((col, i) => {
				if(i === field.idx){
					col[field.col] = e;
					return col;
				}
				return col;
			})
		})
	}
	_editTabularFieldColumnExpression = field => e => {
		this.setState({ 
			tabularColumns: this.state.tabularColumns.map((col, i) => {
				if(i === field.idx){
					col['expression'] = (e) ? (e.value || e.target.value) : '';
					col['parameter'] = '';
					col['parameter_one'] = '';
					return col;
				}
				return col;
			})
		})
	}
	_editTabularFieldOrder = field => e => {
		this.setState({ 
			orderColumns: this.state.orderColumns.map((col, i) => {
				if(i === field.idx){
					col[field.col] =  (e) ? (e.value || e.target.value) : '';
					return col;
				}
				return col;
			})
		})
	}
	_removeTabularField = object => {
		let filteredArray = this.state[object.section].filter(function(item) {
			return item.field !== object.field
		});
		this.setState({[object.section] : filteredArray});
	}

	// HELPERs
	_getSelectedModuleFields(module){
		let mFields = this.props.data.systemMetaDataList.find((md) => md.item.resolver == module);
		return (mFields) ? mFields.item.fields : [];
	}
	_getFieldProperty(field){
		const module = this.state.candidateModule;
		const moduleMetas = this.props.data.systemMetaDataList.find((md) => md.item.resolver == module);
		let targetFields = moduleMetas.item.fields.find((fld) => fld.fieldName == field);
		return targetFields;
	}
	_getAvailableModules(){
		let moduleList = [];
		this.props.data.systemMetaDataList.map((e, i) => {
			moduleList.push({value:e.item.resolver, label:e.item.moduleName});
		});
		return moduleList;
	}
	_getAvailableRoles(){
		let roleList = [];
		this.props.data.userRoleList.items.map((e, i) => {
			roleList.push({value:e.role_code, label:e.role_name_readable});
		});
		return roleList;
	}
	_getAvailableFields(tabularSection){
		let options = [];
		const fieldsTaken = this.state[tabularSection];
		const fieldList = this._getSelectedModuleFields(this.state.candidateModule);
		if(fieldsTaken.length > 0){
			fieldList.map((option, i) => {
				let fldIsSelected = false;
				fieldsTaken.map((ft, i) => {
					if(ft.field == option.fieldName){
						fldIsSelected = true;
						return;
					}
				})
				if(!fldIsSelected){
					options.push({value:option.fieldName, label:HumanReadableFieldName(option.type, option.fieldName)});
				}
			});
		}else{
			fieldList.map((option, i) => {
				options.push({value:option.fieldName, label:HumanReadableFieldName(option.type, option.fieldName)});
			});
		}
		return options;
	}
	_getExpressionOptions(fieldProps){
		let options = [];
		getExpressionsPerFieldType(fieldProps).map((option, i) => {
			options.push({value:option, label:option});
		});
		return options;
	}
	_getEnumFormatOptions(enumsArray){
		let options = [];
		enumsArray.map((option, i) => {
			options.push({value:option.value, label:option.name});
		});
		return options;
	}

	// DRAG & DROPS
	_dragOver = section => elem => {
		elem.preventDefault();
		window['targetStat'+section] = elem.target.parentNode;
	}
	_dragEnd = section => elem => {
		elem.preventDefault();
		this.setState({
			[section]: [...reOrderIndexes(this.state[section], elem.target.id, window['targetStat'+section].id)]
		})
	}

	// RENDERERs
	_renderTabularFieldColumnSelector(){
		const { tabularColumns } = this.state
		const _renderFieldParameter = (fldProperty, col, i) => {
			return (
				<Row>
					{col.fieldType == 'String' && 
						<Col xs="6" lg="6">
							<Input type="text" disabled={col.expression == ''} onChange={this._editTabularFieldColumn({idx:i,col:'parameter'})} value={col.parameter}/>
						</Col>
					}
					{col.fieldType == 'Float' && 
						<Col xs="6" lg="6">
							<Input type="number" disabled={col.expression == ''} onChange={this._editTabularFieldColumn({idx:i,col:'parameter'})} value={col.parameter}/>
						</Col>
					}
					{(col.fieldType == 'Float' && col.expression == 'BETWEEN') &&
						<Col xs="6" lg="6">
							<Input type="number" disabled={col.expression == ''} onChange={this._editTabularFieldColumn({idx:i,col:'parameter_one'})} value={col.parameter_one}/>
						</Col>
					}
					{col.fieldType == 'ID' && 
						<Col xs="6" lg="6">
							<SelectSearchRecordsAsync disabled={col.expression == ''} value={col.parameter} multi={col.expression == 'IS_ONE_OF'} searchable={true} searchConfig={fldProperty.searchConfig} onChange={this._editTabularRecordsAndEnumFieldColumn({idx:i,col:'parameter'})} />
						</Col>
					}
					{col.fieldType == 'Boolean' && 
						<Col xs="6" lg="6">
							<input type="checkbox" disabled={col.expression == ''} onChange={this._editTabularFieldColumn({idx:i,col:'parameter'})} checked={col.parameter} />
						</Col>
					}
					{col.fieldType == 'DateTime' &&
						<Col xs="6" lg="6">
							<DateAndTime disabled={col.expression == ''} placeholder={(col.expression == 'BETWEEN') ? 'Start Date' : 'Select Date'} position="search" value={col.parameter} onChange={this._editTabularFieldColumn({idx:i,col:'parameter'})}/>
						</Col>
					}
					{(col.fieldType == 'DateTime' && col.expression == 'BETWEEN') &&
						<Col xs="6" lg="6">
							<DateAndTime disabled={col.expression == ''} placeholder={'End Date'} position="search" value={col.parameter_one} onChange={this._editTabularFieldColumn({idx:i,col:'parameter_one'})}/>
						</Col>
					}
					{fldProperty.enumValues.length > 0 && 
						<Col xs="6" lg="6">
							<Select disabled={col.expression == ''} value={col.parameter} multi={col.expression == 'IS_ONE_OF'} searchable={true} onChange={this._editTabularRecordsAndEnumFieldColumn({idx:i,col:'parameter'})} options={this._getEnumFormatOptions(fldProperty.enumValues)}/>
						</Col>
					}
				</Row>
			);
		}

		let content = (
			<div>
				<Label>Select Fields:</Label>
				<Table className="table-sm table-outline">
					<thead className="thead-default">
						<tr>
							<th style={{ width:'80px',textAlign:'center'}}>Re-Order</th>
							<th>Field</th>
							<th>Display</th>
							<th>Grand Total</th>
							<th style={{ width: '240px' }}>Expression</th>
							<th>Parameter(s)</th>
							<th style={{ width: '40px' }}>&nbsp;</th>
						</tr>
					</thead>
					<tbody onDragOver={this._dragOver('tabularColumns')}>
						{(tabularColumns.length > 0) ? (
							tabularColumns.map((col, i) => {
								const fldProperty = this._getFieldProperty(col.field)
								return <tr key={i} id={i}
									draggable="true"
									onDragEnd={this._dragEnd('tabularColumns')}>
									<td style={{ width:'80px',textAlign:'center'}}>
										<i className="fa fa-arrows fa-md"></i>
									</td>
									<td>
										{HumanReadableFieldName(col.fieldType, col.field)}
									</td>
									<td>
										<input type="checkbox" id={`${col.field}_display`} onChange={this._editTabularFieldColumn({idx:i,col:'display'})} checked={col.display} />
									</td>
									<td>
										<input type="checkbox" id={`${col.field}_grandTotal`} disabled={!col.display || fldProperty.type !== 'Float'} onChange={this._editTabularFieldColumn({idx:i,col:'grandTotal'})} checked={col.grandTotal} />
									</td>
									<td>
										<Select value={{label: col.expression, value: col.expression}} multi={false} searchable={true} onChange={this._editTabularFieldColumnExpression({idx:i,col:'expression'})} options={this._getExpressionOptions(fldProperty)}/>
									</td>
									<td>
										{_renderFieldParameter(fldProperty, col, i)}
									</td>
									<td>
										<Button color="danger" size="sm" onClick={() => {this._removeTabularField({section:'tabularColumns',field:col.field}) }} type="button" title="Remove">
											<i className="fa fa-minus"></i>
										</Button>
									</td>
								</tr>
							})
						) : (<tr><td colSpan="7" className="p-3 text-center">No Columns fields selected.</td></tr>) }
					</tbody>
				</Table>
				<div style={{ width: '180px', marginTop:'-10px' }}>
					<Select
						value={''}
						multi={false}
						searchable={true}
						onChange={this._addTabularFieldColumn}
						options={this._getAvailableFields('tabularColumns')}
					/>
				</div>
			</div>
		);
		return content;
	}
	_renderTabularFieldOrderSelector(){
		const { orderColumns } = this.state
		let content = (
			<div>
				<Label>Order Fields:</Label>
				<Table className="table-sm table-outline">
					<thead className="thead-default">
						<tr>
							<th style={{ width:'80px',textAlign:'center'}}>Re-Order</th>
							<th>Field</th>
							<th>Sort Direction</th>
							<th style={{ width: '40px' }}>&nbsp;</th>
						</tr>
					</thead>
					<tbody onDragOver={this._dragOver('orderColumns')}>
						{(orderColumns.length > 0) ? (
							orderColumns.map((col, i) => {
								return <tr key={i} id={i}
									draggable="true"
									onDragEnd={this._dragEnd('orderColumns')}>
									<td style={{ width:'80px',textAlign:'center'}}>
										<i className="fa fa-arrows fa-md"></i>
									</td>
									<td>
										{HumanReadableFieldName(col.fieldType, col.field)}
									</td>
									<td>
										<Select value={{label: col.order, value: col.order}} multi={false} searchable={true} onChange={this._editTabularFieldOrder({idx:i,col:'order'})} options={[{label:'ASC',value:'ASC'},{label:'DESC',value:'DESC'}]}/>
									</td>
									<td>
										<Button color="danger" size="sm" onClick={() => {this._removeTabularField({section:'orderColumns',field:col.field}) }} type="button" title="Remove">
											<i className="fa fa-minus"></i>
										</Button>
									</td>
								</tr>
							})
						) : (<tr><td colSpan="4" className="p-3 text-center">No Order Field selected.</td></tr>) }
					</tbody>
				</Table>
				<div style={{ width: '180px', marginTop:'-10px' }}>
					<Select
						value={''}
						multi={false}
						searchable={true}
						onChange={this._addTabularFieldOrder}
						options={this._getAvailableFields('orderColumns')}
					/>
				</div>
			</div>
		);
		return content;
	}
	_renderTabularFieldGroupSelector(){
		const { groupByColumns } = this.state
		let content = (
			<div>
				<Label>Grouping Fields:</Label>
				<Table className="table-sm table-outline">
					<thead className="thead-default">
						<tr>
							<th style={{ width:'80px',textAlign:'center'}}>Re-Order</th>
							<th>Field</th>
							<th style={{ width: '40px' }}>&nbsp;</th>
						</tr>
					</thead>
					<tbody onDragOver={this._dragOver('groupByColumns')}>
						{(groupByColumns.length > 0) ? (
							groupByColumns.map((col, i) => {
								return <tr key={i} id={i}
									draggable="true"
									onDragEnd={this._dragEnd('groupByColumns')}>
									<td style={{ width:'80px',textAlign:'center'}}>
										<i className="fa fa-arrows fa-md"></i>
									</td>
									<td>
										{HumanReadableFieldName(col.fieldType, col.field)}
									</td>
									<td>
										<Button color="danger" size="sm" onClick={() => {this._removeTabularField({section:'groupByColumns',field:col.field}) }} type="button" title="Remove">
											<i className="fa fa-minus"></i>
										</Button>
									</td>
								</tr>
							})
						) : (<tr><td colSpan="3" className="p-3 text-center">No Grouping Field selected.</td></tr>) }
					</tbody>
				</Table>
				<div style={{ width: '180px', marginTop:'-10px' }}>
					<Select
						value={''}
						multi={false}
						searchable={true}
						onChange={this._addTabularFieldGroup}
						options={this._getAvailableFields('groupByColumns')}
					/>
				</div>
			</div>
		);
		return content;
	}

	render() {
		if(this.props.data.loading){
			return (
				<Fragment>
					<p>Loading...</p>
				</Fragment>
			)
		}

		const { availableFields, selectedFields, preSelectedValues, error, candidateModule, reportName, roles } = this.state;

		return (
			<Fragment>
				<p>Configure search fields to display.</p>
				<Form className="form-horizontal" onSubmit={this.handleSubmit}>
					<Row>
						<Col xs="4" lg="4">
							<FormGroup>
								<Label>Report Name: *</Label>
								<Input type="text" value={reportName || ''} onChange={this._handleOnChange('reportName')}/>
							</FormGroup>
						</Col>
						<Col xs="4" lg="4">
							<FormGroup>
								<Label>Source Module: *</Label>
								<Select value={candidateModule || '--'} multi={false} searchable={true} onChange={this._handleOnChange('candidateModule')} options={this._getAvailableModules()}/>
							</FormGroup>
						</Col>
						<Col xs="4" lg="4">
							<FormGroup>
								<Label>Roles:</Label>
								<Select value={roles || '--'} multi={true} searchable={true} onChange={this._handleOnChange('roles')} options={this._getAvailableRoles()}/>
							</FormGroup>
						</Col>
					</Row>
					<p></p>
					<Row>
						<Col>
							{this._renderTabularFieldColumnSelector()}
						</Col>
					</Row>
					<p></p>
					<Row>
						<Col xs="6" lg="6">
							{this._renderTabularFieldOrderSelector()}
						</Col>
						<Col xs="6" lg="6">
							{this._renderTabularFieldGroupSelector()}
						</Col>
					</Row>

					<p></p>
					<p></p>
					<Row className="mb-3">
						<Col>
							<Button color="primary" size="sm" type="submit" className="float-left" title="Save">
								<i className="fa fa-pencil"></i>{' '}Save
							</Button>
							<Button onClick={this.handlePreview} color="primary" size="sm" type="button" className="float-left" title="Save" style={{marginLeft:'10px'}}>
								<i className="fa fa-pencil"></i>{' '}Preview
							</Button>
							<Button onClick={this.handleCancel} color="danger" size="sm" type="button" className="float-right" title="Save" style={{marginLeft:'10px'}}>
								<i className="fa fa-pencil"></i>{' '}Cancel
							</Button>
						</Col>
					</Row>
					
				</Form>
			</Fragment>
		)
	}
}

TabularFactory.propTypes = {
	onPreview: PropTypes.func,
	onSave: PropTypes.func,
	tabularConfig: PropTypes.object
}

TabularFactory.contextTypes = {
	onGoBack: PropTypes.func
}

export default compose(
	graphql(gql`
	    query SYSTEM_METAs {
	    	systemMetaDataList {
    			item
			}
			userRoleList{
				items{
					role_name
					role_code
					role_name_readable
				}
			}
	    }`
	,{
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only',
	}),
)(withApollo(TabularFactory));