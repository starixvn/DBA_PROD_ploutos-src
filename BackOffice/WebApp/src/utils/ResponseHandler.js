/** @module ResponseHandlers */


/**
 * SUCCESS RESPONSE HANDLER
 * 
 * @param {any} v Object (Props/Context) passed
 * @returns {callback} Calls Success
 */
export function SuccessHandler({ context, callback=null, message='Success' } = {}) {
	Alert('success', message, context, callback)    
}


/**
 * ERROR RESPONSE HANDLER
 * 
 * @param {any} context Context 
 * @param {any} callback Callback (optional)
 * @param {any} err : Error message
 * @returns {callback} Calls Error
 */
export function ErrorHandler({ context, callback=null, error } = {}) {
	let errors = error.graphQLErrors || (error.error && error.error.graphQLErrors) || (error.err && error.err.graphQLErrors);
	try {
		if(errors.length > 0){
			let errorList = errors.map(f => {
				const parsedError = JSON.parse(f.message);
				return parsedError[0].message;
			});
			Alert('error', errorList.join(' and ')+'.', context, callback)
		}
	}
	catch(err) {
		Alert('error', 'Unable to process you request. Please contact Administrator.', context, callback);
	}
}

function Alert(alertType, alertMessage, context, callback) {
	context.onAlert({
		isOpen: true,
		type: alertType,
		message: alertMessage
	})
	callback
}