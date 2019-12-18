import * as helper from './CoreHelpers'
import { SuccessHandler, ErrorHandler } from './ResponseHandler'

/** @module TableHelpers */


/**
 * Refetch data on changing table sorting
 * 
 * @param {Object} v Object sorting info
 * @returns {null} null
 * @author Jonathan
 */
export function changeSort(v) {
	v.props.refetch({
		sortBy: v.sort.field,
		sortOrder: v.sort.order
	})
}


/**
 * Refetch data on changing table limit
 * 
 * @param {String} v Limit number
 * @returns {null} null
 * @author Jonathan
 */
export function changeLimit(v) {
	v.props.refetch({
		limit: parseInt(v.limit),
		offset: 0 // Reset 'offset' to 0 to prevent error
	})      
}


/**
 * Refetch data on on pagination
 * 
 * @param {Object} v Object pagination info
 * @returns {null} null
 * @author Jonathan
 */
export function changePage(v) {
	const { offset, pn } = v.page
	const currQuery = helper.QueryParsefy(v.props.location.search)
	currQuery['pg'] = pn

	v.props.data.refetch(
		{ offset: offset },
		v.props.history.replace({
			search: helper.QueryStringify(currQuery) 
		})
	)
}


/**
 * Reload window on changing table column fields
 * 
 * @param {Object} v Object pagination info
 * @returns {null} null
 * @author Jonathan
 * @todo Use 'writeQuery' or other Apollo query feature to refetch queries without reloading window
 */
export function changeColumns() { 
	// THIS IS A TEMP WORKAROUND
	// while writeQuery to Store ain't working yet
	window.location.reload()
}


/**
 * Send data for Mutation
 * 
 * @param {Object} v Object info
 * @returns {null} null
 * @author Jonathan
 */
export function toggleViewRecord(v) {
	v.props.recordViewedMutation({
		variables: {
			Id: v.viewData.viewID.length === 0 ? '0' : v.viewData.viewID,
			SourceObject: v.props.schemaKey.comment,
			SourceObjectId: v.viewData.recordID,
			ViewedBy: v.context.userInfo.userName
		}
	})
		.then(() => SuccessHandler({
			context: v.context, 
			callback: v.props.data.refetch()
		}))
		.catch(error => ErrorHandler({
			context: v.context,
			error: { error }
		}))  
}


// handleForceUpdate = async (newVars={}, callback) => {
// try {
//     console.log(this.props.client.dataId)
// this.props.client.writeFragment({
//     id: this.props.client.dataId('userList'),
//     fragment: query.getAdminUsers(),
//     data: { userList, __typename: 'BatchUserResult' }
// })
//     const staleData =this.props.client.readQuery({
//         query: query.getAdminUsers(),
//         variables: {
//             ...queryListOptions.options(this.props).variables
//         },
//         fetchPolicy: 'network-only'
//     })

//     console.log(staleData)

// const newData = await this.props.client.query({
//     query: query.getAdminUsers(),
//     variables: { 
//         ...queryListOptions.options(this.props).variables,
//         ...newVars
//     },
//     fetchPolicy: 'network-only'
// }) //.then(res => console.log(res))
// .then(async (res) => { 
//     console.log(res)
//     try { 
//         await this.props.client.writeQuery({
//         query: query.getAdminUsers(),
//         variables: {
//             ...queryListOptions.options(this.props).variables,
//             ...newVars
//         },
//         // fetchPolicy: 'network-only',
//         data: res
//     })
//     const staleData =this.props.client.readQuery({
//         query: query.getAdminUsers(),
//         variables: {
//             ...queryListOptions.options(this.props).variables
//         },
//         fetchPolicy: 'network-only'
//     })
//     console.log(staleData)
// } catch (error) {
//     console.log(error)
// }
        

//         this.setState({ data: { ...this.state.data, ...res.data }}, () => {
//             this.forceUpdate()
//         })
//     }) 
//     .then(() =>{
//         const staleData2 =this.props.client.readQuery({
//             query: query.getAdminUsers(),
//             variables: {
//                 ...queryListOptions.options(this.props).variables
//             },
//             fetchPolicy: 'network-only'
//         })

//         console.log(staleData2)
//         callback
// })
    
// callback
// } catch (error) {
//     console.log(error)
// }
//     this.props.data.refetch({...newVars}, () => {
//         // this.forceUpdate()
//         callback
//     })
// }