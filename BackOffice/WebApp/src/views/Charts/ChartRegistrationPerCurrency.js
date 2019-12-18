import React, { Component } from 'react'
import { Bar } from 'react-chartjs-2'
import { graphql } from 'react-apollo'
import gql from 'graphql-tag'
import PropTypes from 'prop-types'
import { Label, FormGroup, Form, Row, Col, CardTitle, Card, CardHeader, CardBody, ButtonToolbar, ButtonGroup, Button, Modal, ModalBody, Input } from 'reactstrap'
import moment from 'moment'
import DateAndTime from '../../components/DateAndTime'
import SelectSearch from '../../components/SelectSearch'
import { generateDateAxislabel, mainBarChartOpts } from '../../utils/ChartHelpers';
import { camelCaseToWords } from '../../utils/CoreHelpers';

class ChartRegistrationPerCurrency extends Component {
	constructor(props) {
		super(props);
		this.state = {
			isModelOpen: false,
			chartDefaults: {...this.props.defaultValues},
		}
	}

	getStatusRGBA(key) {
		let rgbaPalette = {
			0: 'rgb(172,177,203)',
			1: 'rgb(104,139,80)',
			2: 'rgb(121,65,32)',
			3: 'rgb(242,92,84)',
			4: 'rgb(65,123,132)',
			5: 'rgb(242,92,84)',
			6: 'rgb(242,92,84)',
			7: 'rgb(242,92,84)',
			8: 'rgb(242,92,84)'
		}
		return rgbaPalette[key];
	}

	mainChart() {
		let entity = this.state.chartDefaults;
		let chartData = {
			labels: [],
			datasets: []
		}
		chartData.labels = generateDateAxislabel(entity.chart_view, moment(entity.start_date), moment(entity.end_date));
		let serverData = JSON.parse(this.props.data.playerProfileChart.jsonResult)
		
		if (serverData.datasets.length > 0) {
			serverData.labels.map((label, i) => {
				let perYAxis = {
					label: label,
					backgroundColor: this.getStatusRGBA(i),
					borderColor: '#c2cfd6',
					pointHoverBackgroundColor: '#c2cfd6',
					borderWidth: 2,
					data: []
				}

				chartData.labels.map((clabel, ci) => {
					let tmpData = 0;
					serverData.datasets.map((dataset, is) => {
						if (label == dataset[entity.y_axis] && clabel == dataset[entity.x_axis]) {
							tmpData = dataset[entity.formula_field];
							return;
						}
					});
					perYAxis.data.push(tmpData);
				});
				chartData.datasets.push(perYAxis);
			});
		}

		return chartData;
	}

	handleModelStateChange(v){
		this.setState({ isModelOpen : v });
	}
	
	handleInputChange = (f, v) => e => {
		this.setState({
			chartDefaults:{
				...this.state.chartDefaults, [f] : (v || e.target.value)
			}
		});
	}

	componentWillUpdate(nProps, nState){
		const cState = this.state.chartDefaults;
		Object.keys(cState).map((chartDef, i) => {
			if(cState[chartDef] != nState.chartDefaults[chartDef]){
				this.props.data.refetch({
					...nState.chartDefaults
				});
				return;
			}
		});
	}

	render() {
		const { isModelOpen } = this.state;
		const { chart_view, start_date, end_date, brand_code, x_axis, y_axis, formula_computation, y_axis_type } = this.state.chartDefaults;
		const isLoading = this.props.data.loading;

		const mainChartData = (!isLoading) ? this.mainChart() : [];
		const mainChartOpts = (!isLoading) ? mainBarChartOpts(mainChartData.datasets) : [];
		const brandList = (!isLoading) ? this.props.data.brandList.items : [];

		return (
			<Col xs="12" sm="6" lg="6">
				<Card>
					<CardBody className="card-body">
						<Row>
		                  <Col sm="5">
		                    <CardTitle className="mb-0">Registration Count Per Currency</CardTitle>
		                    <div className="medium text-muted">{moment(start_date).format('MMMM DD, YYYY')} - {moment(end_date).format('MMMM DD, YYYY')}</div>
		                    <div className="medium text-muted">{brand_code ? brand_code : 'All Brands'}</div>
		                  </Col>
		                  <Col sm="7" className="d-none d-sm-inline-block">
		                    <Button color="primary" onClick={e => this.handleModelStateChange(!isModelOpen)} className="float-right"><i className="icon-settings"></i></Button>
		                    <ButtonToolbar className="float-right" aria-label="Toolbar with button groups">
		                      <ButtonGroup className="mr-3" aria-label="First group">
		                        <Button color="outline-secondary" onClick={this.handleInputChange('chart_view', 'MONTH_DAY')} active={chart_view == 'MONTH_DAY'}>Day</Button>
		                        <Button color="outline-secondary" onClick={this.handleInputChange('chart_view', 'YEAR_MONTH')} active={chart_view == 'YEAR_MONTH'} >Month</Button>
		                        <Button color="outline-secondary" onClick={this.handleInputChange('chart_view', 'YEAR')} active={chart_view == 'YEAR'}>Year</Button>
		                      </ButtonGroup>
		                    </ButtonToolbar>
		                  </Col>
		                </Row>
						<div className="chart-wrapper" style={{ height: 300 + 'px', marginTop: 40 + 'px' }}>
							{(this.props.data.loading) && 'Loading...' }
							{(!this.props.data.loading) && <Bar data={mainChartData} options={mainChartOpts} height={300} />}
						</div>
					</CardBody>
				</Card>

				<Modal isOpen={isModelOpen}>
					<ModalBody>
						<Form>
							<FormGroup>
								<Label htmlFor={'x_axis'}>X-Axis</Label>{' '}
								<Input
									value={camelCaseToWords(x_axis)}
									disabled={true}
								/>
							</FormGroup>
							<FormGroup>
								<Label htmlFor={'y_axis'}>Y-Axis</Label>{' '}
								<Input
									value={camelCaseToWords(y_axis)}
									disabled={true}
								/>
							</FormGroup>
							<FormGroup>
								<Label htmlFor={'y_axis_type'}>Y-Axis Type</Label>{' '}
								<Input
									value={y_axis_type}
									disabled={true}
								/>
							</FormGroup>
							<FormGroup>
								<Label htmlFor={'x_axis'}>Formula Computation</Label>{' '}
								<Input
									value={formula_computation}
									disabled={true}
								/>
							</FormGroup>
							<FormGroup>
								<Label htmlFor={'start_date'}>Start Date</Label>{' '}
								<DateAndTime value={start_date} onChange={this.handleInputChange('start_date')}/>
							</FormGroup>
							<FormGroup>
								<Label htmlFor={'end_date'}>End Date</Label>{' '}
								<DateAndTime value={end_date} onChange={this.handleInputChange('end_date')}/>
							</FormGroup>
							<FormGroup>
								<Label htmlFor={'end_date'}>Brand</Label>{' '}
									<SelectSearch 
										type={'select'}
										searchKey={{ value: 'BrandCode', label: 'BrandCode', variables: ''}}
										multi={false}
										searchQuery={brandList}
										searchValue={brand_code}
										searchOnChange={this.handleInputChange('brand_code')}
									/>
							</FormGroup>
							<Button color="secondary" onClick={e => this.handleModelStateChange(!isModelOpen)}>
								<i className="fa fa-close"></i>{' '}Close
							</Button>
						</Form>
					</ModalBody>
					<Button 
						color="dark"
						style={{ position: 'absolute', top: '-15px', right: '-15px' }}
						className="rounded-circle"
						title="Close"
						onClick={e => this.handleModelStateChange(!isModelOpen)}>
						&times;
					</Button>

				</Modal>

			</Col>
		)
	}
}

const queryOptions = {
	options: (ownProps) => {
		const defProps = ChartRegistrationPerCurrency.defaultProps.defaultValues;
		return {
			variables: {
				x_axis: defProps.x_axis, 
				y_axis: defProps.y_axis, 
				y_axis_type: defProps.y_axis_type, 
				formula_field: defProps.formula_field, 
				formula_computation: defProps.formula_computation, 
				chart_view: defProps.chart_view, 
				start_date: defProps.start_date, 
				end_date: defProps.end_date, 
				brand_code: defProps.brand_code
			},
			notifyOnNetworkStatusChange: true,
			fetchPolicy: 'network-only'
		}
	}
}

const query = gql`
  query QUERY(
	$x_axis: playerProfileChart!, 
	$y_axis: playerProfileChart!,
	$y_axis_type: YAxisTypeEnum!
	$formula_field: playerProfileChart!,
	$formula_computation: QueryFormulaTypeEnum!,
	$chart_view: DateTimeGroupByTypeEnum!
	$start_date: DateTime!,
	$end_date: DateTime!,
	$brand_code: String
  ){
	playerProfileChart(
		x_axis: $x_axis
		y_axis: $y_axis
		y_axis_type: $y_axis_type
		formula_computation: $formula_computation
		formula_field: $formula_field
		chart_view: $chart_view
		filter:{
		  DateCreated:{
		    parameter: $start_date
		    parameter_one: $end_date
		    expression:BETWEEN
		  }
		  BrandCode:{
		    parameter: $brand_code
		    expression:EQUALS
		  }
		}
	){
		jsonResult
	}
	brandList(count:false, paging:{
		offset:0
		limit:100
	}){
		pagingInfo{
			offset
			limit
			totalCount
		}
		items{
			Id
			BrandCode
		}
	}
  }
`

ChartRegistrationPerCurrency.defaultProps = {
	defaultValues : {
		x_axis: 'DateCreated', 
		y_axis: 'CurrencyCode',
		y_axis_type: 'MULTI',
		formula_field: 'Id',
		formula_computation: 'COUNT',
		chart_view: 'MONTH_DAY',
		start_date: moment(new Date()).subtract(1, 'MONTH').format('YYYY-MM-DD HH:mm:ss'),
		end_date: moment(new Date()).format('YYYY-MM-DD HH:mm:ss'),
		brand_code: null
	}
}

export default graphql(query, queryOptions)(ChartRegistrationPerCurrency)