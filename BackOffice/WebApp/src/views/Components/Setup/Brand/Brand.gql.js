import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { Brand as tableHeaders } from '../../../../data/TableHeaders'

const component = 'Brand'
const sortBy = 'BrandSortingFields!'
const listSchemaKey = 'brandList'
const detailSchemaKey = 'brand'
const mutateSchemaKey = 'brandMutation'

export function getBrands() {
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
                ${queryTypes}
            ){
                ${listSchemaKey}(
                    count: true
                    paging: {
                        offset: $offset
                        limit: $limit
                    }
                    filter: ${queryFilters}
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

export function getBrand() {
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


export function mutateBrand() {
	const queryTypes = String(GetQueryMeta('getEntityTypes', tableHeaders))
	const queryEntities = String(GetQueryMeta('getEntityFilters', tableHeaders))
	const queryItems = String(SelectFieldsToMutate(tableHeaders))

	return (
		gql`
            mutation MUTATION_VARS(
               ${queryTypes}
            ){
                ${mutateSchemaKey}(
                    entity:{
                        ${queryEntities}
                    }
                ){
                    ${queryItems}
                }
            }
        `
	)
}

// export function getExtraQuery() {
//     return (
//         gql`
//             query EXTRAQUERY_VIEW {                    
//                 gameBetLimitLevelList(
//                     count: true,
//                     paging: {
//                         offset: 0
//                         limit: 100
//                     }
//                 ){
//                     pagingInfo {offset, limit, totalCount}
//                     items {
//                         Id
//                         BetLimitLevelDesc
//                     }
//                 } 
//                 currencyList(
//                     count: true,
//                     paging: {
//                         offset: 0
//                         limit: 100
//                     }
//                 ){
//                     pagingInfo {offset, limit, totalCount}
//                     items {
//                         Id
//                         CurrencyCode
//                         CurrencyName
//                     }
//                 } 
//             }
//         `
//     )
// }