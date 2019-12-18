import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'

/**
 * EXPORT ACTIONS
 * 
 * @param {string} path - Get the Edit Page Path
 * @param {string} data - Get the record detail
 * @param {string} context - Get the Context detail of the page
 * @returns {boolean} Path with Id to be edit
 */
export function actions(path, data, context) {
	return ([
		{
			task: 'Reply',
			action: 'reply',
			icon: 'reply',
			color: 'danger',
			linkTo: (data.Id === undefined) ? `${path + data.Id}` : `${path + data.Id}`,
			isVisible: isActionVisibile('All', 'reply', 'actionReplyMessagesMutation', data, context)
		},
		{
			task: 'Edit',
			action: 'edit',
			icon: 'edit',
			color: 'warning',
			linkTo: (data.Id === undefined) ? `${path + data.Id}` : `${path + data.Id}`,
			isVisible: isActionVisibile('All', 'edit', 'actionUpdatePlayerMessagesMutation', data, context)
		}
	])
}

/**
 * ACTION DISPLAY VISIBILITY
 * 
 * @param {string} a - Current status/es to match against
 * @param {string} b - Action to be done
 * @param {string} c - Required Access the user must have
 * @param {object} d - Current data item
 * @param {object} e - Inherited context from parent
 * @returns {boolean} True / False
 */
function isActionVisibile(a, b, c, d, e) {

	if (!e.handleElementAccess(c)){ return false }

	if (c == 'actionReplyMessagesMutation' && d.SentToAll == false) {
		return true
	}

	if (c == 'actionUpdatePlayerMessagesMutation' && d.Status == 'Created') {
		return true
	}

	return false
}