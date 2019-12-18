import React, { Component } from 'react'

import '../../scss/custom/_time.scss'

class TimeDisplay extends Component {

	state = {
		mo: '',
		d: '',
		y: '',
		h: '',
		m: '',
		s: '',
	}

	checkTime = i => {
		if (i < 10) i = '0' + i  // add zero in front of numbers < 10
		return i
	}

	ampm = () => new Date().getHours() >= 12 ? 'pm' : 'am'

	time = () => {
		let date = new Date,			
			year = date.getFullYear(),
			month = date.getMonth(),
			d = date.getDate(),
			h = date.getHours(),
			m = date.getMinutes(),
			s = date.getSeconds(),				
			months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']

		this.setState({
			mo: months[month],
			d: d,
			y: year,
			h: ((h + 11) % 12 + 1), // Convert to 12h time
			m: this.checkTime(m),
			s: this.checkTime(s),
			ampm: this.ampm()
		})

		setTimeout(this.time, 500)
	}

	componentDidMount() {
		this.time()
	}

	render() {
		const  { y, mo, d, h, m, s, ampm } = this.state

		return (		
			<div className="c-time">
				<div id="time">
					<span>{h}:{m}</span><span className="c-time__date">:{s} {mo}/{d}/{y}</span>
				</div>
				<em id="ampm">{ampm}</em>
			</div>
		)
	}
}

export default TimeDisplay