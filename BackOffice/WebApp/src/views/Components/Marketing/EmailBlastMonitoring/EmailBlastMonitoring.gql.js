import gql from 'graphql-tag'
import { SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { EmailBlastMonitoring as tableHeaders } from '../../../../data/TableHeaders'

const component = 'EmailBlastMonitoring'
const sortBy = 'EmailBlastMonitoringSortingFields!'
const listSchemaKey = 'emailBlastMonitoringList'
// const detailSchemaKey = 'emailBlast'
// const mutateSchemaKey = 'emailBlastMutation'

function getQueryTypes(qt, cqt) {
    const queryTypes = qt.split(',')
    const customQueryTypes = cqt.split(',')
    return (customQueryTypes.concat(queryTypes.filter(q => customQueryTypes.indexOf(q) < 0)))
}

export function getEmailBlastMonitorings() {
	const queryTypes = String(GetQueryMeta('getTypes', tableHeaders, component))
	const queryFilters = GetQueryMeta('getFilters', tableHeaders, component)
	const queryItems = String(SelectFieldsToQuery(tableHeaders, component))
	return (
		gql`
            query QUERY_LIST(
                $offset: Int!
                $limit: Int!
                $sortBy: ${sortBy}
                $sortOrder: SortingOrder!
                ${getQueryTypes(queryTypes, '$EmailBlastId: ID, $export: Boolean!')}   
            ){
                ${listSchemaKey}(
                    export: $export
                    count: true
                    paging: {
                        offset: $offset
                        limit: $limit
                    }
                    filter: { 
                        ${queryFilters.slice(1, -1)}
                        EmailBlastId: { parameter: $EmailBlastId, expression: EQUALS }
                    }
                    sort: { 
                        field: $sortBy
                        order: $sortOrder 
                    }
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        ${queryItems}
                    }
                }                  
            }
        `
	)
}

// export function getEmailBlast() {
// 	const queryItems = String(GetAllFieldsToQuery(tableHeaders));
// 	return (
// 		gql`
//             query QUERY_VIEW( $Id: ID! ){
//                 ${detailSchemaKey} ( Id: $Id ){            
//                     ${queryItems}
//                 }
//             }
//         `
// 	)
// }

// export function mutateEmailBlast() {
// 	const queryTypes = String(GetQueryMeta('getEntityTypes', tableHeaders))
// 	const queryEntities = String(GetQueryMeta('getEntityFilters', tableHeaders))
// 	const queryItems = String(SelectFieldsToMutate(tableHeaders))
// 	return (
// 		gql`
//             mutation MUTATION_VARS(
//                ${queryTypes}
//             ){
//                 ${mutateSchemaKey}(
//                     entity:{
//                         ${queryEntities}
//                     }
//                 ){
//                     ${queryItems}
//                 }
//             }
//         `
// 	)
// }

// export function getExtraQuery() {
//  return (
//      gql`
//             query EXTRAQUERY_VIEW {
//                 emailTemplateList(
//                     count:false,
//                     paging:{
//                         offset: 0
//                         limit: 100
//                     }
//                 ){
//                     pagingInfo {offset, limit, totalCount}
//                     items {
//                         Id
//                         TemplateName
//                     }
//              }
//             }
//         `
//  )
// }