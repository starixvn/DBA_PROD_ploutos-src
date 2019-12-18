import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta } from '../../../../utils/CoreHelpers'
import { PlayerWageringFulfillment as tableHeaders } from '../../../../data/TableHeaders'

const component = 'PlayerWageringFulfillment'
const sortBy = 'WageringFulfilmentSortingFields!'
const listSchemaKey = 'wageringFulfilmentList'
const detailSchemaKey = 'wageringFulfilment'
// const mutateSchemaKey = ''

export function getPlayerWageringFulfillments() {
	const queryTypes = String(GetQueryMeta('getTypes', tableHeaders, component))
	// const queryFilters = GetQueryMeta('getFilters', tableHeaders, component)
	const queryItems = String(SelectFieldsToQuery(tableHeaders, component))

	return (
		gql`
            query QUERY_LIST(
                $offset: Int!
                $limit: Int!
                $sortBy: ${sortBy}
                $sortOrder: SortingOrder!
                ${queryTypes}
                
                $export: Boolean!
            ){
                ${listSchemaKey}(
                    export: $export
                    count: true
                    paging: {
                        offset: $offset
                        limit: $limit
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

export function getPlayerWageringFulfillment() {
	const queryItems = String(GetAllFieldsToQuery(tableHeaders))

	return (
		gql`
            query QUERY_VIEW( $Id: ID! ){
                ${detailSchemaKey} ( Id: $Id ){            
                    ${queryItems}
                }
            }
        `
	)
}

// export function mutatePlayerWageringFulfillment() {
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

export function getExtraQuery() {
	return (
		gql`
            query EXTRAQUERY_VIEW {                   
                walletDepositList(
                    count: false,
                    paging:{
                        offset: 0
                        limit: 100
                    }
                ){
                    pagingInfo{
                        offset
                        limit
                        totalCount
                    }
                    items {
                        Id
                        BankName
                    }
                }     
                playerBetList(
                    count: false,
                    paging:{
                        offset: 0
                        limit: 100
                    }
                ){
                    pagingInfo{
                        offset
                        limit
                        totalCount
                    }
                    items {
                        Id
                        BetName
                    }
                }
            }
        `
	)
}