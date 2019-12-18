import * as helper from './CoreHelpers'

/** @module SearchHelpers */

/**
 * Refetch data on search submit
 * 
 * @returns {null} null
 * @author Jonathan
 */
export function submitSearch({ props, fields }) {
	props.data.refetch(
		{ 
			offset: 0,
			...fields
		},
		props.history.replace({
			search: helper.QueryStringify(fields) 
		})
	)
}


/**
 * Reload window on search reset
 * 
 * @returns {null} null
 * @author Jonathan
 */
export function resetSearch({ props }) {
	// props.data.refetch(
	// 	{ 
	// 		offset: 0
	// 	},
	props.history.replace({
		search: '' 
	})
	// )
}


/**
 * Reload window on changing search fields
 * 
 * @returns {null} null
 * @author Jonathan
 * @todo Use 'writeQuery' or other Apollo query feature to refetch queries without reloading window
 */
export function changeFields() {
	// THIS IS A TEMP WORKAROUND
	// while writeQuery to Store ain't working yet
	window.location.reload() 
}