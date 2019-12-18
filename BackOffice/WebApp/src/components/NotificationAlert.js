import React, { Component } from 'react'
import { ToastContainer, toast } from 'react-toastify'
import { Link } from 'react-router-dom'
import { Badge } from 'reactstrap'
import PropTypes from 'prop-types'

import { GetLocalData } from '../utils/CoreHelpers'

class NotificationAlert extends Component {
	
	state = {
		userInfo: JSON.parse(GetLocalData('currUserInformations')),
	}

	notify = (category, messageContent) => {
		if (category == 'new_deposits'){
			toast.info(this._toastDepositRenderWrapper(messageContent), {
				position: toast.POSITION.BOTTOM_RIGHT
			})
		} else if (category == 'new_withdrawals'){
			toast.info(this._toastWithdrawalRenderWrapper(messageContent), {
				position: toast.POSITION.BOTTOM_RIGHT
			})
		} else if (category == 'new_registrations'){
			toast.info(this._toastRegistrationRenderWrapper(messageContent), {
				position: toast.POSITION.BOTTOM_RIGHT
			})
		}
	}

	_toastDepositRenderWrapper(message){
		// console.log(message);
		return <div>
			<Link to={'/payment_manager/deposit/view/'+message.Id} style={{ color: 'white', textDecoration: 'none' }}>
				<i className="icons icon-wallet"></i> <strong>Deposit: {message.TransactionNo}</strong>
				<h6>
					<Badge color="secondary" style={{ width: '100%' }}>{message.TransactionNo} - {message.UserName} - {message.ActualDepositAmount}</Badge>
				</h6>
			</Link>
		</div>
	}

	_toastWithdrawalRenderWrapper(message){
		// console.log(message);
		return <div>
			<Link to={'/payment_manager/withdrawal/view/'+message.Id} style={{ color: 'white', textDecoration: 'none' }}>
				<i className="icons icon-wallet"></i> <strong>Withdrawal: {message.TransactionNo}</strong>
				<h6>
					<Badge color="secondary" style={{ width: '100%' }}>{message.TransactionNo} - {message.UserName} - {message.WithdrawAmount}</Badge>
				</h6>
			</Link>
		</div>
	}

	_toastRegistrationRenderWrapper(message){
		// console.log(message);
		return <div>
			<Link to={'/player_manager/profile/view/'+message.Id+'/'+message.PlayerRegistrationId+'/'+message.UserName} style={{ color: 'white', textDecoration: 'none' }}>
				<i className="icons icon-user-following"></i> <strong>Registration: {message.UserName}</strong>
				<h6>
					<Badge color="secondary" style={{ width: '100%' }}>{message.UserName} - {message.UserAccountNo} - {message.Email}</Badge>
				</h6>
			</Link>
		</div>
	}

	_processBrandMarket(){
		if (this.state.userInfo.userInfo.brandMarket){
			return this.state.userInfo.userInfo.brandMarket.split(',')
		}
		return []
	}
	
	render() {
		const brandMarkets = this._processBrandMarket()
		return (
			<div>
				{this.props.notificationList.length > 0 && (
					this.props.notificationList.map(notif => {
						notif.data.map(catNotif => {
							if (brandMarkets.map(e => e === (String(catNotif.BrandCode)+'-'+String(catNotif.CurrencyCode)) ? '' : e) || brandMarkets.length == 0){
								this.notify(notif.cat, catNotif)
							}
						})
					})
				)}
				<ToastContainer autoClose={false}/>
			</div>
		)
	}
}

NotificationAlert.propTypes = {
	notificationList: PropTypes.array
}

export default NotificationAlert