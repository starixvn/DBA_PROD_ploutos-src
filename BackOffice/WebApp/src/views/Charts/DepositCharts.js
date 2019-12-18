import React, { Component } from 'react'
import { Bar } from 'react-chartjs-2'
import { graphql } from 'react-apollo'
import gql from 'graphql-tag'
import PropTypes from 'prop-types'
import {
	Card,
	CardColumns,
	CardHeader,
	CardBody
} from 'reactstrap'
import Loader from '../../components/Loader'
import moment from 'moment'

// convert Hex to RGBA
function getStatusRGBA(status) {
	var rgbaPalette = {
		0: 'rgb(172,177,203)',
		2: 'rgb(104,139,80)',
		3: 'rgb(242,92,84)'
	}
	return rgbaPalette[status]
}

const mainChartOpts = {
	maintainAspectRatio: false,
	legend: {
		display: true,
		labels: {
			fontColor: 'rgb(255, 99, 132)'
		},
		position: 'bottom'
	},
	scales: {
		xAxes: [{
			gridLines: {
				drawOnChartArea: false,
			}
		}],
		yAxes: [{
			ticks: {
				beginAtZero: true,
				maxTicksLimit: 5,
				stepSize: Math.ceil(250 / 5),
				max: 250
			}
		}]
	},
	elements: {
		point: {
			radius: 0,
			hitRadius: 10,
			hoverRadius: 4,
			hoverBorderWidth: 3,
		}
	}
}

class DepositCharts extends Component {

	constructor() {
		super()
		let endDate = moment(new Date())
		let startDate = moment(endDate)
		startDate.subtract(3, 'MONTH')
		this.state = {
			x_axis: 'TransactionDate',
			y_axis: 'Status',
			y_axis_filter: '2,3',
			formula_field: 'Id',
			formula_computation: 'COUNT',
			chart_view: 'YEAR_MONTH',
			filter_date: 'TransactionDate',
			start_date: startDate,
			end_date: endDate
		}
	}

	mainChart() {
		let entity = this.state
		let chartData = {
			labels: [],
			datasets: []
		}

		let labelDateTracker = moment(entity.start_date)
		while (Number(labelDateTracker.format('YYYYMM')) <= Number(entity.end_date.format('YYYYMM'))) {
			// ADD LABEL
			chartData.labels.push(labelDateTracker.format('YYYY-MM'))
			labelDateTracker.add(1, 'MONTH')
		}

		let serverData = JSON.parse(this.props.data.dashboardDeposit.jsonResult)
		if (serverData.length > 0) {
			this.props.data.enumRepository[0].WalletDepositStatusTypeEnum.map(status => {
				if (entity.y_axis_filter != '') {
					let selectedXaxisFilter = entity.y_axis_filter.split(',')
					if (typeof selectedXaxisFilter.find(x => x == status.value) == 'undefined') {
						return
					}
				}

				let perStatus = {
					label: status.name,
					backgroundColor: getStatusRGBA(status.value),
					borderColor: '#c2cfd6',
					pointHoverBackgroundColor: '#c2cfd6',
					borderWidth: 2,
					data: []
				}

				let dateTracker = moment(entity.start_date)
				while (Number(dateTracker.format('YYYYMM')) <= Number(entity.end_date.format('YYYYMM'))) {
					// ADD DATA SETS
					let tempData = 0
					serverData.map(serverDataset => {
						if (dateTracker.format('YYYY-MM') == serverDataset[entity.x_axis] && Number(status.value) == Number(serverDataset[entity.y_axis])) {
							tempData = serverDataset[entity.formula_field]
							return
						}
					})
					perStatus.data.push(tempData)
					dateTracker.add(1, 'MONTH')
				}

				chartData.datasets.push(perStatus)
			})
		}
		return chartData
	}

	render() {
		const loader = <Loader />
		const errorLoad = 'An unexpected error occurred'

		if (this.props.data.loading) return loader
		if (this.props.data.error) return errorLoad

		return (
			<CardColumns className="cols-2">
				<Card>
					<CardHeader>
						Deposit Chart
						<div className="card-actions">
							<a href="#">
								<small className="text-muted">#</small>
							</a>
						</div>
					</CardHeader>
					<CardBody className="card-body">
						<div className="chart-wrapper">
							<div className="chart-wrapper" style={{ height: 300 + 'px', marginTop: 40 + 'px' }}>
								<Bar data={this.mainChart()} options={mainChartOpts} height={300} />
							</div>
						</div>
					</CardBody>
				</Card>
			</CardColumns>
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
				x_axis: 'TransactionDate', 
				y_axis: 'Status',
				y_axis_type: 'MULTI',
				y_axis_filter: '2,3',
				formula_field: 'Id',
				formula_computation: 'COUNT',
				chart_view: 'YEAR_MONTH',
				filter_date: 'TransactionDate',
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
	enumRepository{
	  WalletDepositStatusTypeEnum
	}
	dashboardDeposit(
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

DepositCharts.propTypes = {
	data: PropTypes.object
}

export default graphql(query, queryOptions)(DepositCharts)
