import React from 'react'
import { Row, Col, Label, Input } from 'reactstrap'

import SelectSearch from '../../../../components/SelectSearch'
import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'


export function actions(data, context, props) {
	return ([
		{
			task: 'Send',
			action: 'send',
			icon: 'rocket',
			// isVisible: isActionVisibile(null, 'send', 'actionSendEmailBlastMutation', data, context)
		},
		// {
		// 	task: 'Re-Process',
		// 	action: 'reprocess',
		// 	icon: 'refresh',
		// 	isVisible: isActionVisibile(null, 'reprocess', 'actionReProcessEmailBlastStatusMutation', data, context)
		// },
		// {
		// 	task: 'Edit',
		// 	action: 'edit',
		// 	icon: 'edit',
		// 	color: 'warning',
		// 	linkTo: `/marketing/email_blast/edit/${data.Id}`,
		// 	isVisible: isActionVisibile('All', 'edit', 'actionEditEmailBlast', data, context)
		// }
	])
}

export function renderModalContent(v) {
	// console.log(v.props.data)
	// const data = v.props.data.emailBlast[0]
	// const emailBlastId = data.Id || 0
	// debugger
	// // MODAL CONTENT PER ACTION
	// switch (v.action) {
	// case 'send': return (
	// 	<Row>
	// 		<Col xs="12"><h5>Email Blasting</h5></Col>
	// 		<Col xs="12">
	// 			<p className="my-2">Please review content first.</p>
	// 			<p className="my-2">Once submitted, it will be executed immediately and there will be no stopping.</p>
	// 		</Col>
	// 		<Col xs="12">                
	// 			<button type="submit" className="btn btn-sm btn-primary mt-2" onClick={messageSendToAll.bind(this)}>Proceed</button>
	// 		</Col>
	// 	</Row>
	// )
	// }


	//=== ACTION FUNCTIONS
	// Must match to graphql query/mutate operations
	function messageSendToAll() {
		v.props.messageSendToAll({
			variables: {
				// Id: emailBlastId
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
	// IF GRABBED ALREADY THEN DENY; EXCEPT ADJUST AND FULFILL ACTION
	if (!e.handleElementAccess(c)){ return false }

	// if (c == 'actionSendEmailBlastMutation' && d.Status == 'Created') {
	// 	return true
	// }

	// if (c == 'actionReProcessEmailBlastStatusMutation' && d.Status == 'Sent' && parseInt(d.Counter) >= 10) {
	// 	return true
	// }

	// if (c == 'actionEditEmailBlast') {
	// 	return true
	// }

	return false
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