import moment from 'moment'

export function generateDateAxislabel(dateFocus, startDate, endDate){
	let expDateFormat = '';
	let dispDateFormat = '';
	let arithDateFormat = '';
	switch(dateFocus) {
	    case 'DAY':
			expDateFormat = 'DD';
			dispDateFormat = 'DD';
			arithDateFormat = 'DAY';
	        break;
	    case 'MONTH_DAY':
			expDateFormat = 'MMDD';
			dispDateFormat = 'MM-DD';
			arithDateFormat = 'DAY';
	        break;
	    case 'WEEK':
	        break;
	    case 'WEEK_DAY':
	        break;
	    case 'MONTH':
			expDateFormat = 'MM';
			dispDateFormat = 'MM';
			arithDateFormat = 'MONTH';
	        break;
	    case 'YEAR_MONTH':
			expDateFormat = 'YYYYMM';
			dispDateFormat = 'YYYY-MM';
			arithDateFormat = 'MONTH';
	        break;
	    case 'QUARTER':
	        break;
	    case 'YEAR':
			expDateFormat = 'YYYY';
			dispDateFormat = 'YYYY';
			arithDateFormat = 'YEAR';
	        break;
	    default:
	}

	let labels = [];
	if(expDateFormat == ''){
		return labels;
	}

	let labelDateTracker = moment(startDate);
	while (Number(labelDateTracker.format(expDateFormat)) <= Number(endDate.format(expDateFormat))) {
		labels.push(labelDateTracker.format(dispDateFormat));
		labelDateTracker.add(1, arithDateFormat);
	}
	return labels;
}

export function mainBarChartOpts(dataset){
	let dataSetMaxValue = 0;
	if(dataset.length > 0){
		let chartValues = [];
		dataset.map((data, i) => {
			chartValues = [...chartValues, ...data.data];
		});
		dataSetMaxValue = Math.max.apply(Math, chartValues);
	}
	let mainChartOpts = {
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
					display: true,
					beginAtZero: true,
					maxTicksLimit: 5,
					stepSize: Math.ceil((dataSetMaxValue + 5) / 10),
					max: dataSetMaxValue + 5,
				},
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
	return mainChartOpts;
}

export function mapEnumName(enumValue, enumRepository){
	let enumName = '';
	enumRepository.map((enumItem, i) => {
		if(parseInt(enumValue) == parseInt(enumItem.value)){
			enumName = enumItem.name;
			return;
		}
	});
	return enumName;
}