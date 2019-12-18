import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { UniqueDepositAmountRule as tableHeaders } from '../../../../data/TableHeaders'

const component = 'UniqueDepositAmountRule'
const sortBy = 'UniqueDepositAmountRuleSortingFields!'
const listSchemaKey = 'uniqueDepositAmountRuleList'
const detailSchemaKey = 'uniqueDepositAmountRule'
const mutateSchemaKey = 'uniqueDepositAmountRuleMutation'

export function getUniqueDepositAmountRules() {
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

export function getUniqueDepositAmountRule() {
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

export function mutateUniqueDepositAmountRule() {
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
// 	return (
// 		gql`
//             query EXTRAQUERY_VIEW {
//                 brandList(
//                     count: true,
//                     paging: {
//                         offset: 0
//                         limit: 100
//                     }
//                 ){
//                     pagingInfo {offset, limit, totalCount}
//                     items {
//                         Id
//                         BrandCode               
//                     }
//                 }
//             }
//         `
// 	)
// }