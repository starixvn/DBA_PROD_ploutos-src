import React from 'react'
// import { Input } from 'reactstrap'

// import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'

export function actions(data, context) {
	return ([
		{
			task: 'Edit',
			action: 'edit',
			icon: 'edit',
			color: 'warning',
			linkTo: `/reports/tabular/edit/${data.Id}`,
			isVisible: isActionVisibile('tabularReportMutation', data, context)
		}
	])
}


/**
 * TICKET ACTION DISPLAY VISIBILITY
 * 
 * @param {string} a - Required Access the user must have
 * @param {object} b - Data
 * @param {object} c - Inherited context from parent
 * @returns {boolean} True / False
 */
function isActionVisibile(a, b, c) {
	if (b.CreatedById == c.userInfo.userId || c.userInfo.userRole == 'ROLE_ADMIN'){
		return true
	}
	return false
}


// /**
//  * SUCCESS RESPONSE HANDLER
//  * 
//  * @param {any} v : Object (Props/Context) passed
//  * @returns {callback} SuccessHandler
//  */
// function successResponse(v) {
//     SuccessHandler({
//         context: v.context, 
//         callback: v.props.data.refetch().then(() => v.onModalClose()),
//     })
// }
// /**
//  * ERROR RESPONSE HANDLER
//  * 
//  * @param {any} v : 
//  * @param {any} err : Error message
//  * @returns {callback} ErrorHandler
//  */
// function errResponse(v, err) {
//     ErrorHandler({ 
//         context: v.context,
//         callback: v.onModalClose(),
//         error: { err } 
//     })
// }