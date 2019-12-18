import React from 'react'
import { Row, Col, Label, Input } from 'reactstrap'

// import SelectSearch from '../../../../components/SelectSearch'
import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'


export function actions(data, context) {
	return ([
		{
			task: 'Approve',
			action: 'approve',
			icon: 'thumbs-up',
			isVisible: isActionVisibile('Processing', 'approve', 'actionApproveWalletAdjustmentMutation', data, context)
		}
	])
}

export function renderModalContent(v) {

	const data = v.props.data.walletAdjustmentMemo[0]
	const dataId = data.Id || 0

	let comment = data.Remarks || ''


	// MODAL CONTENT PER ACTION
	switch (v.action) {
	case 'approve': return (
		<Row>
			<Col xs="12"><h5>Approve</h5></Col>
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
					onClick={approveDeposit.bind(this)}>
                        Approve
				</button>
			</Col>
		</Row>
	)
	}


	//=== ACTION FUNCTIONS
	// Must match to graphql query/mutate operations
	function approveDeposit() {
		if (comment.length !== 0) {
			v.props.approveCreditMemoMutation({
				variables: {
					Id: dataId,
					Remarks: comment
				}
			})
				.then(() => successResponse(v))
				.catch(error => errResponse(v, error))
		} else {
			alert('Remark is required.')
		}
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
	return (a.indexOf(d.Status) !== -1 || a.indexOf('All') !== -1) && e.handleElementAccess(c)
}


/**
 * SUCCESS RESPONSE HANDLER
 * 
 * @param {any} v : Object (Props/Context) passed
 * @returns {callback} Calls SuccessHandler
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
 * @returns {callback} Calls ErrorHandler
 */
function errResponse(v, err) {
	ErrorHandler({ 
		context: v.context,
		callback: v.onModalClose(),
		error: { err } 
	})
}