import React from 'react'
import { Row, Col, Label, Input } from 'reactstrap'

// import SelectSearch from '../../../../components/SelectSearch'
import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'


export function actions(data, context, props) {
	return ([
		{
			task: data.TransactionGrabId !== null ?  'Ungrab' : 'Grab',
			action: 'grab',
			icon: data.TransactionGrabId !== null ? 'hand-lizard-o' : 'hand-grab-o',
			isVisible: isActionVisibile('Requested,Cleared,Uncleared,Fraud_Processing', 'grab', 'actionTransactionGrabUnGrabMutation', data, context),
			color: data.TransactionGrabId !== null ?  'warning' : 'success',
			method: function() {
				props.grabUngrabMutation({
					variables: {
						TransactionId: data.TransactionGrabId || 0,
						SourceObjectId: data.Id,

						TransactionType: 'Walletwithdrawals',
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
			isVisible: isActionVisibile('Requested,Cleared', 'approve', 'actionApproveWalletWithdrawalMutation', data, context)
		},
		{
			task: 'Reject',
			action: 'reject',
			icon: 'thumbs-down',
			isVisible: isActionVisibile('Requested,Uncleared', 'reject', 'actionRejectWalletWithdrawalMutation', data, context)
		},
		{
			task: 'Unclear',
			action: 'unclear',
			icon: 'random',
			isVisible: isActionVisibile('Processing,Fraud_Processing', 'unclear', 'actionUnClearWalletWithdrawalMutation', data, context)        
		},
		{
			task: 'Clear',
			action: 'clear',
			icon: 'times-circle',
			isVisible: isActionVisibile('Processing,Fraud_Processing', 'clear', 'actionClearWalletWithdrawalMutation', data, context)        
		},
		{
			task: 'For Fraud',
			action: 'for_fraud',
			icon: 'exclamation',
			isVisible: isActionVisibile('Requested', 'for_fraud', 'actionForFraudWalletWithdrawalMutation', data, context)
		}
	])
}

export function renderModalContent(v) {

	const data = v.props.data.walletWithdrawal[0]
	// const bankAccountList = v.props.extradata.bankAccountList.items   

	let withdrawalId = data.Id || 0
	let withdrawalBankAccountId = data.WithdrawalBankAccountId
	let transactionGrabId = data.TransactionGrabId || 0
	let comment = data.Remarks || ''


	// MODAL CONTENT PER ACTION
	switch (v.action) {
	case 'approve': return (
		<Row>
			<Col xs="12"><h5>Approve</h5></Col>
			<Col xs="12">
				<Label htmlFor="WithdrawalBankAccountId" className="my-2">Withdrawal Bank Account (*)</Label>
				<Input
					type="select"
					name="roles"
					size="sm"
					defaultValue={withdrawalBankAccountId}
					onChange={e => (withdrawalBankAccountId = e.target.value)}>
					{
						v.props.extradata.bankAccountList.items.map(v => (
							<option key={v.Id} value={v.Id}>{v.AccountName} - {v.AccountNo}</option>
						))
					}
				</Input>
				{/* <SelectSearch 
					type="select"
					searchKey={{ value: 'Id', label: 'AccountNo', variables: '' }}
					searchQuery={bankAccountList}  
					searchValue={withdrawalBankAccountId}
					searchOnChange={e => {
						console.log(e.target.value)
						withdrawalBankAccountId = e.target.value
					}
					}
				/> */}
			</Col>            
			<Col xs="12">
				<Label htmlFor="Remarks" className="my-2">Remarks</Label>
				<Input type="textarea" name="Remarks" 
					id="Remarks" 
					onChange={e => (comment = e.target.value)}
				/>
			</Col>
			<Col xs="12">                
				<button type="submit" 
					className="btn btn-sm btn-primary mt-2" 
					onClick={approveWithdrawal.bind(this)}>
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
					onClick={rejectWithdrawal.bind(this)}
				>
                        Reject
				</button>
			</Col>
		</Row>        
	)
	case 'unclear': return (
		<Row>
			<Col xs="12"><h5>Unclear</h5></Col>
			<Col xs="12">
				<Label htmlFor="Remarks" className="my-2">Remarks</Label>
				<Input type="textarea" name="Remarks" 
					id="Remarks" 
					onChange={e => (comment = e.target.value)}
				/>
			</Col>
			<Col xs="12">
				<button type="submit" 
					className="btn btn-sm btn-primary mt-2"                    
					onClick={unclearWithdrawal.bind(this)}
				>
                        Unclear
				</button>
			</Col>
		</Row>
	)
	case 'clear': return (
		<Row>
			<Col xs="12"><h5>Clear</h5></Col>
			<Col xs="12">
				<Label htmlFor="Remarks" className="my-2">Remarks</Label>
				<Input type="textarea" name="Remarks" 
					id="Remarks" 
					onChange={e => (comment = e.target.value)}
				/>
			</Col>
			<Col xs="12">
				<button type="submit" 
					className="btn btn-sm btn-primary mt-2"                    
					onClick={clearWithdrawal.bind(this)}
				>
                        Clear
				</button>
			</Col>
		</Row>
	)
	case 'for_fraud': return (
		<Row>
			<Col xs="12"><h5>For Fraud Processing</h5></Col>
			<Col xs="12">
				<Label htmlFor="Remarks" className="my-2">Remarks</Label>
				<Input type="textarea" name="Remarks" 
					id="Remarks" 
					onChange={e => (comment = e.target.value)}
				/>
			</Col>
			<Col xs="12">
				<button type="submit" 
					className="btn btn-sm btn-primary mt-2"                    
					onClick={forFraudProcessing.bind(this)}
				>
                        Process
				</button>
			</Col>
		</Row>
	)
	}


	//=== ACTION FUNCTIONS
	// Must match to graphql query/mutate operations
	function approveWithdrawal() {
		if (withdrawalBankAccountId.length !== 0) {
			v.props.approveWithdrawMutation({
				variables: {
					Id: withdrawalId,
					WithdrawalBankAccountId: parseFloat(withdrawalBankAccountId),
					Remarks: comment
				}
			})
				.then(() => successResponse(v))
				.catch(error => errResponse(v, error))
		} else {
			alert('Withdrawal Bank Account is required.')
		}
	}
	function rejectWithdrawal() {
		if (comment.length !== 0) {
			v.props.rejectWithdrawMutation({
				variables: {
					Id: withdrawalId,
					Remarks: comment
				}
			})
				.then(() => successResponse(v))
				.catch(error => errResponse(v, error))
		} else {
			alert('Remark is required.')
		}
	}
	function unclearWithdrawal() {
		// if (comment.length !== 0) {
		v.props.unClearWithdrawMutation({
			variables: {
				Id: withdrawalId,
				TransactionGrabId: transactionGrabId,
				Remarks: comment,
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
		// } else {        
		//     alert("Remark is required.")
		// }
	}
	function clearWithdrawal() {
		v.props.clearWithdrawMutation({
			variables: {
				Id: withdrawalId,
				TransactionGrabId: transactionGrabId,
				Remarks: comment,
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function forFraudProcessing() {
		v.props.forFraudWithdrawMutation({
			variables: {
				Id: withdrawalId,
				TransactionGrabId: transactionGrabId,
				Remarks: comment,
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
	// console.log(c);
	// console.log(a);

	// IF GRABBED ALREADY THEN DENY; EXCEPT ADJUST AND FULFILL ACTION
	if (c != 'actionClearWalletWithdrawalMutation' && c != 'actionUnClearWalletWithdrawalMutation') {

		if (d.AssigneeUserId === null && c !== 'actionTransactionGrabUnGrabMutation') return false

		if (d.AssigneeUserId !== null && d.AssigneeUserId !== e.userInfo.userId) return false

		// if ((c == 'actionAdjustWalletDepositMutation' || c == 'actionWagerFulfilledWalletDepositMutation') && d.IsWageringFulfilled) {
		// 	return false
		// }

		return (a.indexOf(d.Status) !== -1 || a.indexOf('All') !== -1) && e.handleElementAccess(c)

		// if (this.state.entity.AssigneeUserId == null && action != 'actionTransactionGrabUnGrabMutation') {
		//     return false;
		// }
		// if (this.state.entity.AssigneeUserId != null && this.state.entity.AssigneeUserId != this.props.userInfo.userId) {
		//     return false;
		// }
		// return ((statuses.indexOf(this.state.entity.Status) !== -1 || statuses.indexOf('All') !== -1) && this.props.handleElementAccess(action)) ? true : false;
	} else {
		if (d.AssigneeUserId !== e.userInfo.userId) return false

		return (a.indexOf(d.Status) !== -1 || a.indexOf('All') !== -1) && e.handleElementAccess(c)

	}
}


/**
 * SUCCESS RESPONSE HANDLER
 * 
 * @param {any} v : Object (Props/Context) passed
 * @returns {callback} SuccessHandler
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
 * @returns {callback} ErrorHandler
 */
function errResponse(v, err) {
	ErrorHandler({ 
		context: v.context,
		callback: v.onModalClose(),
		error: { err } 
	})
}