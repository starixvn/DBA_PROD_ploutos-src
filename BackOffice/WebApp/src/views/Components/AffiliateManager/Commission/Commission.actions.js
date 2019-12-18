import React from 'react'
import Row from 'reactstrap/lib/Row'
import Col from 'reactstrap/lib/Col'
import Label from 'reactstrap/lib/Label'
import Input from 'reactstrap/lib/Input'

import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'

export function actions(data, context, props) {
	return ([
		{
			task: data.TransactionGrabId !== null ?  'Ungrab' : 'Grab',
			action: 'grab',
			icon: data.TransactionGrabId !== null ? 'hand-lizard-o' : 'hand-grab-o',
			color: 'primary',
			isVisible: isActionVisibile('Pending', 'grab', 'actionTransactionGrabUnGrabMutation', data, context),
			method: function() {
				props.grabUngrabMutation({
					variables: {
						TransactionId: data.TransactionGrabId || 0,
						SourceObjectId: data.Id,
						SourceObjectName: '',
						TransactionType: 'Affiliatecommisions',
						Assignee: context.userInfo.userName,
						UserId: context.userInfo.userId
					}
				})
					.then(() => props.data.refetch())
					.catch(error => ErrorHandler({ 
						context: context,
						error: { error } 
					}))
			}
		},
		{
			task: 'Approve',
			action: 'approve',
			icon: 'thumbs-up',
			color: 'success',
			isVisible: isActionVisibile('Pending', 'approve', 'actionApproveAffiliateCommissionsMutation', data, context)
		},
		{
			task: 'Edit',
			action: 'edit',
			icon: 'edit',
			color: 'warning',
			linkTo: `/affiliate_manager/affiliate_commission/edit/${data.Id}`,
			isVisible: true
		}
	])
}

export function renderModalContent(v) {

	const data = v.props.data.affiliateCommission[0]
	const dataId = data.Id || 0
	// const userName = v.context.userInfo.userName

	// let comment = data.Remarks || ''
	let income = data.Income || 0.00

	return (
		<Row>
			<Col xs="12"><h5 style={{ textTransform: 'capitalize' }}>{v.action}</h5></Col>
			<Col xs="12">Are you sure you want to {v.action} this affiliate commission?</Col>
		
			<Col xs="12" className="my-2">
				<Label htmlFor="Income" className="my-2">Income</Label>
				<Input type="number" name="Income" 
					id="Income" 
					onChange={e => (income = e.target.value)}
				/>
			</Col>

			{/* <Col xs="12">
				<Label htmlFor="Remarks" className="my-2">Remarks</Label>
				<Input type="textarea" name="Remarks" 
					id="Remarks" 
					onChange={e => (comment = e.target.value)}
				/>
			</Col> */}

			<Col xs="12">                
				<button type="submit" 
					className="btn btn-sm btn-primary mt-2" 
					onClick={updateWorkflowStatus.bind(this)}
					style={{ textTransform: 'capitalize' }}>
					{ v.action }
				</button>
			</Col>
		</Row>
	)

	//=== ACTION FUNCTIONS
	// Must match to graphql query/mutate operations
	function schema() {
		switch (v.action) {
		case 'approve': return 'actionApproveAffiliateCommissionsMutation'
		}
	}
	function updateWorkflowStatus() {
		v.props.approveCommissionMutation({
			variables: {
				Id: dataId,
				Income: parseFloat(income),
				// Remarks: comment
			}
		})
			.then(res => {
				const status = JSON.parse(res.data[schema()].apiResult)
				status.Status ? successResponse(v) : errResponse(v, status.Message)
			})
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
 * @returns {boolean} True/False
 */
function isActionVisibile(a, b, c, d, e) {
	if (b !== 'grab') {
		// If action is not 'grab'
		// Check if 'AssigneeUserId' is not null AND matches current logged userId
		// Then, return if required status matches current data status
		if (d.AssigneeUserId !== null && d.AssigneeUserId === e.userInfo.userId) {
			return (a.indexOf(d.Status) !== -1 || a.indexOf('All') !== -1) && e.handleElementAccess(c)
		}
		return false
	} else {
		// Else, return if 'AssigneeUserId' is null
		// Else, return if 'AssigneeUserId' matches current logged userId
		if (d.AssigneeUserId === null) {
			return true
		} else {
			return d.AssigneeUserId === e.userInfo.userId
		}
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
		error: err
	})
}