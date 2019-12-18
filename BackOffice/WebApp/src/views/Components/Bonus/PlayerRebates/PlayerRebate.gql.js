import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta } from '../../../../utils/CoreHelpers'
import { PlayerRebate as tableHeaders } from '../../../../data/TableHeaders'

const component = 'PlayerRebate'
const sortBy = 'PlayerRebateSortingFields!'
const listSchemaKey = 'playerRebateList'
const detailSchemaKey = 'playerRebate'
// const mutateSchemaKey = 'playerRebateMutation'

function getQueryTypes(qt, cqt) {
	const queryTypes = qt.split(',')
	const customQueryTypes = cqt.split(',')

	return (customQueryTypes.concat(queryTypes.filter(q => customQueryTypes.indexOf(q) < 0)))
}

export function getPlayerRebates() {    
	const queryTypes = String(GetQueryMeta('getTypes', tableHeaders, component))
	const queryFilters = GetQueryMeta('getFilters', tableHeaders, component)
	const queryItems = String(SelectFieldsToQuery(tableHeaders, component))

	return (
		gql`
            query QUERY_USER_LIST(
                $offset: Int!,
                $limit: Int!,
                $sortBy: ${sortBy},
                $sortOrder: SortingOrder!,

                ${getQueryTypes(queryTypes, '$PlayerProfileId: ID, $export: Boolean!')}
            ){
                ${listSchemaKey}(
                    export: $export
                    count: true,
                    paging: {
                        offset: $offset
                        limit: $limit
                    },
                    filter: {
                        ${queryFilters.slice(1, -1)}
                        PlayerProfileId: { parameter: $PlayerProfileId, expression: EQUALS }
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

export function getPlayerRebate() {
	const queryItems = String(GetAllFieldsToQuery(tableHeaders))

	return (
		gql`
            query QUERY_USER_VIEW( $Id: ID! ){
                ${detailSchemaKey} ( Id:$Id ){            
                    ${queryItems}
                }
            }
        `
	)
}

// export function mutatePlayerRebate() {
//     const queryTypes = String(GetQueryMeta('getEntityTypes', tableHeaders))
//     const queryEntities = String(GetQueryMeta('getEntityFilters', tableHeaders))
//     const queryItems = String(SelectFieldsToMutate(tableHeaders))

//     return (
//         gql`
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
//     )
// }

// export function getExtraQuery() {
//     return (
//         gql`
//             query EXTRAQUERY_VIEW { 
               
//             }
//         `
//     )
// }