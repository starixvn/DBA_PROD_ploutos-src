import React, { Component } from 'react'
import { Line } from 'react-chartjs-2'
import { graphql } from 'react-apollo'
import gql from 'graphql-tag'
import PropTypes from 'prop-types'
import {
	Col,
	Card,
	CardBody
} from 'reactstrap'

import Loader from '../../components/Loader'
import moment from 'moment'

class ChartAffiliatePlayerRegistration extends Component {
	
	constructor() {
		super()
		let endDate = moment(new Date())
		let startDate = moment(endDate)
		startDate.subtract(3, 'MONTH')
		this.state = {
			x_axis: 'DateCreated', 
			y_axis: 'Id',
			y_axis_type: 'SINGLE',
			y_axis_filter: '',
			formula_computation: 'COUNT',
			formula_field: 'Id',
			filter_date: 'DateCreated',
			brand_market: '',
			chart_view: 'MONTH',
			start_date: startDate,
			end_date: endDate
		}
	}

	mainChartOption(margin){
		let cardChartOpts = {
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			scales: {
				xAxes: [{
					gridLines: {
						color: 'transparent',
						zeroLineColor: 'transparent'
					},
					ticks: {
						fontSize: 2,
						fontColor: 'transparent',
					}

				}],
				yAxes: [{
					display: false,
					ticks: {
						display: false,
						min: Math.min.apply(Math, margin) - 5,
						max: Math.max.apply(Math, margin) + 10,
					}
				}],
			},
			elements: {
				line: {
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4,
				},
			}
		}
		return cardChartOpts
	}

	mainChart(){
		let entity = this.state
		let chartData = {
			labels: [],
			datasets: []
		}

		let serverData = JSON.parse(this.props.data.dashboardPlayerProfile.jsonResult)
		if (serverData.length > 0){
			let perStatus = {
				label: 'Members',
				backgroundColor: '#20a8d8',
				borderColor: '#c2cfd6',
				pointHoverBackgroundColor: '#c2cfd6',
				borderWidth: 2,
				data: []
			}
	
			let dateTracker = moment(entity.start_date)
			while (Number(dateTracker.format('YYYYMM')) <= Number(entity.end_date.format('YYYYMM'))) {
				// ADD LABEL
				chartData.labels.push(dateTracker.format('YYYY-MM'))
				// ADD DATA SETS
				let tempData = 0
				serverData.map(serverDataset => {
					if (Number(dateTracker.format('YYYYMM')) == Number(serverDataset[entity.x_axis])){
						tempData = serverDataset[entity.y_axis]
						return
					}
				})
				perStatus.data.push(tempData)
				dateTracker.add(1, 'MONTH')
			}

			chartData.datasets.push(perStatus)
		}
		return chartData
	}

	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'
	
		if (this.props.data.loading) return loader
		if (this.props.data.error) return errorLoad

		const mainChartData = this.mainChart()

		return (
			<Col xs="12" sm="6" lg="3">
				<Card className="text-white bg-primary">
					<CardBody className="card-body pb-0">
						<h4 className="mb-0">{mainChartData.datasets[0].data[mainChartData.datasets[0].data.length - 1]}</h4>
						<p>Lastest Members Count</p>
					</CardBody>
					<div className="chart-wrapper px-3" style={{ height: '70px' }}>
						<Line data={mainChartData} options={this.mainChartOption(mainChartData.datasets[0].data)} height={70}/>
					</div>
				</Card>
			</Col>
		)
	}
}

const queryOptions = {
	options: () => {
		let endDate = moment(new Date())
		let startDate = moment(endDate)
		startDate.subtract(3, 'MONTH')
		return {
			variables: {
				x_axis: 'DateCreated', 
				y_axis: 'Id',
				y_axis_type: 'SINGLE',
				y_axis_filter: '',
				formula_computation: 'COUNT',
				formula_field: 'Id',
				filter_date: 'DateCreated',
				brand_market: '',
				chart_view: 'MONTH',
				start_date: startDate.format('YYYY-MM-DD hh:mm:ss'),
				end_date: endDate.format('YYYY-MM-DD hh:mm:ss')
			},
			notifyOnNetworkStatusChange: true,
			fetchPolicy: 'network-only'
		}
	}
}

const query = gql`
  query QUERY(
	$x_axis: FilterFieldsAsEnum!, 
	$y_axis: FilterFieldsAsEnum!,
	$y_axis_type: YAxisTypeEnum!
	$y_axis_filter: String,
	$formula_field: FilterFieldsAsEnum!,
	$formula_computation: QueryFormulaTypeEnum!,
	$chart_view: DateTimeGroupByTypeEnum!,
	$filter_date: FilterFieldsAsEnum!,
	$start_date: DateTime!, 
	$end_date: DateTime!
  ){
	dashboardPlayerProfile(
	  x_axis: $x_axis, 
	  y_axis: $y_axis,
	  y_axis_type: $y_axis_type,
	  y_axis_filter: $y_axis_filter,
	  formula_field: $formula_field,
	  formula_computation: $formula_computation,
	  chart_view: $chart_view,
	  filter_date: $filter_date,
	  start_date: $start_date, 
	  end_date: $end_date)
	{
	  jsonResult
	}
  }
`

ChartAffiliatePlayerRegistration.propTypes = {
	data: PropTypes.object
}

export default graphql(query, queryOptions)(ChartAffiliatePlayerRegistration)