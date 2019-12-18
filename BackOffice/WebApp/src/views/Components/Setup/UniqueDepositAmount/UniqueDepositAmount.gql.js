import gql from 'graphql-tag'
import { SelectFieldsToQuery, GetQueryMeta } from '../../../../utils/CoreHelpers'
import { UniqueDepositAmount as tableHeaders } from '../../../../data/TableHeaders'

const component = 'UniqueDepositAmount'
const sortBy = 'UniqueDepositAmountSortingFields!'
const listSchemaKey = 'uniqueDepositAmountList'
// const detailSchemaKey = 'uniqueDepositAmount'
// const mutateSchemaKey = 'uniqueDepositAmountMutation'

export function getUniqueDepositAmounts() {
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
                ${queryTypes}
            ){
                ${listSchemaKey}(
                    count: true,
                    paging: {
                        offset: $offset
                        limit: $limit
                    },
                    filter: ${queryFilters},
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

// export function getUniqueDepositAmount() {
//     const queryItems = String(GetAllFieldsToQuery(tableHeaders))

//     return (
//         gql`
//             query QUERY_USER_VIEW( $Id: ID! ){
//                 ${detailSchemaKey} ( Id:$Id ){            
//                     ${queryItems}
//                 }
//             }
//         `
//     )
// }

// export function mutateUniqueDepositAmount() {
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
//
//             }
//         `
//     )
// }