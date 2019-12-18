import React from 'react'
import { Row, Col, Label, Input } from 'reactstrap'

import SelectSearch from '../../../../components/SelectSearch'
import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'


export function actions(data, context, props) {
	return ([
		{
			task: data.TransactionGrabId !== null ?  'Ungrab' : 'Grab',
			action: 'grab',
			icon: data.TransactionGrabId !== null ? 'hand-lizard-o' : 'hand-grab-o',
			isVisible: isActionVisibile('Requested,Processing', 'grab', 'actionTransactionGrabUnGrabMutation', data, context),
			color: data.TransactionGrabId !== null ?  'warning' : 'success',
			method: function() {
				props.grabUngrabMutation({
					variables: {
						TransactionId: data.TransactionGrabId || 0,
						SourceObjectId: data.Id,

						TransactionType: 'Walletdeposits',
						Assignee: context.userInfo.userName,
						UserId: context.userInfo.userId
					}
				})
					.then(() => props.data.refetch())
					.catch(error => ErrorHandler({ 
						context: context,
						error: { error } 
					})
				)
			}
		},
		{
			task: 'Approve',
			action: 'approve',
			icon: 'thumbs-up',
			isVisible: isActionVisibile('Requested,Processing', 'approve', 'actionApproveWalletDepositMutation', data, context)
		},
		{
			task: 'Reject',
			action: 'reject',
			icon: 'thumbs-down',
			isVisible: isActionVisibile('Requested,Processing', 'reject', 'actionRejectWalletDepositMutation', data, context)
		},
		{
			task: 'Adjust',
			action: 'adjust',
			icon: 'exchange',
			isVisible: isActionVisibile('Approved', 'adjust', 'actionAdjustWalletDepositMutation', data, context)        
		},
		{
			task: 'Fulfill Wager ',
			action: 'wagerFulfilled',
			icon: 'exclamation-circle',
			isVisible: isActionVisibile('Approved', 'wagerFulfilled', 'actionWagerFulfilledWalletDepositMutation', data, context)
		}
	])
}

export function renderModalContent(v) {

	const data = v.props.data.walletDeposit[0]
	// console.log(data);
	const bonusList = v.props.extradata.bonusList.items    
	const depositId = data.Id || 0

	let comment = data.Remarks || ''
	let actualDepositAmount = data.ActualDepositAmount || 0.00
	let wager = data.IsWageringFulfilled
	let bonus = data.BonusCode
	// console.log(actualDepositAmount);
	let filteredBonus = []

	bonusList.map(b => {
		if (data.BrandCode == b.BrandCode) {
			filteredBonus.push(b)
		}
	})

	// MODAL CONTENT PER ACTION
	switch (v.action) {
	case 'approve': return (
		<Row>
			<Col xs="12"><h5>Approve</h5></Col>
			<Col xs="12">
				<Label htmlFor="ActualDepositAmount" className="my-2">Deposit Actual Amount (*)</Label>
				<Input type="number" 
					id="ActualDepositAmount" 
					defaultValue={actualDepositAmount}
					onChange={e => (actualDepositAmount = e.target.value)}
				/>
			</Col>            
			<Col xs="12">
				<Label htmlFor="Remarks" className="my-2">Remarks (*)</Label>
				<Input type="textarea" name="Remarks" 
					id="Remarks"
					defaultValue={comment}
					onChange={e => (comment = e.target.value)}
				/>
			</Col>
			<Col xs="12">                
				<button type="submit" 
					className="btn btn-sm btn-primary mt-2" 
					onClick={approveDeposit.bind(this)}>
                        Approve
				</button>
			</Col>
		</Row>
	)
	case 'reject': return (
		<Row>
			<Col xs="12"><h5>Reject</h5></Col>
			<Col xs="12">
				<Label htmlFor="Remarks" className="my-2">Remarks (*)</Label>
				<Input type="textarea" name="Remarks" 
					id="Remarks" 
					onChange={e => (comment = e.target.value)}
				/>
			</Col>
			<Col xs="12">
				<button type="submit" 
					className="btn btn-sm btn-primary mt-2"
					onClick={rejectDeposit.bind(this)}>
					Reject
				</button>
			</Col>
		</Row>
	)
	case 'adjust': return (
		<Row>
			<Col xs="12"><h5>Adjust</h5></Col>
			<Col xs="12">
				<Label htmlFor="ActualDepositAmount" className="my-2">Deposit Actual Amount (*)</Label>
				<Input type="number" 
					id="ActualDepositAmount" 
					defaultValue={actualDepositAmount}
					onChange={e => actualDepositAmount = e.target.value}
				/>
			</Col>
			<Col xs="12">
				<Label htmlFor="AssignedTo">Bonus</Label>
				<SelectSearch 
					type="select"
					searchKey={{ value: 'BonusCode', label: 'BonusName', variables: '' }}
					searchQuery={filteredBonus}  
					searchValue={bonus}
					searchOnChange={e => bonus = e.target.value}
				/>
			</Col>   
			<Col xs="12">
				<Label htmlFor="Remarks" className="my-2">Remarks</Label>
				<Input type="textarea" name="Remarks" 
					id="Remarks" 
					defaultValue={comment}
					onChange={e => comment = e.target.value}
				/>
			</Col>
			<Col xs="12">               
				<button type="submit" 
					className="btn btn-sm btn-primary mt-2"                    
					onClick={adjustDeposit.bind(this)}>
                        Adjust
				</button>
			</Col>
		</Row>
	)
	case 'wagerFulfilled': return (
		<Row>
			<Col xs="12"><h5>Wagering</h5></Col>
			<Col xs="12">
				<Label htmlFor="Remarks" className="my-2">Is Wager Fulfilled?</Label> <br/>
				<Label className="switch switch-default switch-pill switch-success-outline-alt">
					<Input type="checkbox" name="IsWageringFulfilled" 
						className="switch-input"
						defaultChecked={wager}
						onChange={e => wager = e.target.checked} />
					<span className="switch-label" data-on={'\uf00c'} data-off={'\uf00d'}></span>
					<span className="switch-handle"></span>
				</Label>
			</Col>
			<Col xs="12">
				<button type="submit"
					className="btn btn-sm btn-primary mt-2"
					onClick={wagerFulfill.bind(this)}>
                        Fulfill Wager
				</button>
			</Col>
		</Row>
	)
	}


	//=== ACTION FUNCTIONS
	// Must match to graphql query/mutate operations
	function approveDeposit() {
		if (actualDepositAmount.length !== 0) {
			v.props.approveDepositMutation({
				variables: {
					Id: depositId,
					ActualDepositAmount: parseFloat(actualDepositAmount),
					Remarks: comment
				}
			})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
		} else {
			alert('Actual Deposit Amount is required.')
		}
	}
	function rejectDeposit() {
		if (actualDepositAmount.length !== 0 && comment.length !== 0) {
			v.props.rejectDepositMutation({
				variables: {
					Id: depositId,
					ActualDepositAmount: parseFloat(actualDepositAmount),
					Remarks: comment
				}
			})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
		} else {
			alert('Remark is required.')
		}
	}
	function adjustDeposit() {
		if (actualDepositAmount.length !== 0) {
			v.props.adjustDepositMutation({
				variables: {
					Id: depositId,
					ActualDepositAmount: parseFloat(actualDepositAmount),
					Remarks: comment,
					BonusCode: bonus,
				}
			})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
		} else {        
			alert('Actual Deposit Amount is required.')
		}
	}
	function wagerFulfill() {
		v.props.wagerFulfilledDepositMutation({
			variables: {
				Id: depositId,
				IsWageringFulfilled: wager
			}
		})
		.then(() => successResponse(v))
		.catch(error => errResponse(v, error))
	}

}




/**
 * TICKET ACTION DISPLAY VISIBILITY
 * 
 * @param {string} a - Current status/es to match against
 * @param {string} b - Action to be done
 * @param {string} c - Required Access the user must have
 * @param {object} d - Current data item
 * @param {object} e - Inherited context from parent
 * @returns {boolean} True / False
 */
function isActionVisibile(a, b, c, d, e) {
	if (d.IsWageringFulfilled) {
		return false
	}
	
	// IF GRABBED ALREADY THEN DENY; EXCEPT ADJUST AND FULFILL ACTION
	if (c !== 'actionAdjustWalletDepositMutation' && c !== 'actionWagerFulfilledWalletDepositMutation') {
		if (d.AssigneeUserId == null && c != 'actionTransactionGrabUnGrabMutation') return false
		if (d.AssigneeUserId !== null && d.AssigneeUserId !== e.userInfo.userId) return false
		return (a.indexOf(d.Status) !== -1 || a.indexOf('All') !== -1) && e.handleElementAccess(c)
	} else {
		// if (d.AssigneeUserId !== e.userInfo.userId) return false
		return (a.indexOf(d.Status) !== -1 || a.indexOf('All') !== -1) && e.handleElementAccess(c)
	}
}


/**
 * SUCCESS RESPONSE HANDLER
 * 
 * @param {any} v : Object (Props/Context) passed
 * @returns {callback} Calls Success
 */
function successResponse(v) {
	SuccessHandler({
		context: v.context, 
		callback: v.props.data.refetch().then(() => v.onModalClose()),
	})
}
/**
 * ERROR RESPONSE HANDLER
 * 
 * @param {any} v : 
 * @param {any} err : Error message
 * @returns {callback} Calls Error
 */
function errResponse(v, err) {
	ErrorHandler({ 
		context: v.context,
		callback: v.onModalClose(),
		error: { err } 
	})
}