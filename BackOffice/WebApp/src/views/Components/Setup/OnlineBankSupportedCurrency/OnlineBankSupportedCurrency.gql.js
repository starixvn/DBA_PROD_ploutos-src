import gql from 'graphql-tag'

import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { OnlineBankSupportedCurrency as tableHeaders } from '../../../../data/TableHeaders'

const component = 'OnlineBankSupportedCurrency'
const sortBy = 'OnlineBankSupportedCurrenciesSortingFields!'
const listSchemaKey = 'onlineBankSupportedCurrenciesList'
const detailSchemaKey = 'onlineBankSupportedCurrencies'
const mutateSchemaKey = 'onlineBankSupportedCurrenciesTypeMutation'

const queryMeta = `
	count: true,
	paging: {
		offset: 0,
		limit: 10
	}	
`
const pagingInfo = `pagingInfo {
	offset,
	limit,
	totalCount
}`

function getQueryTypes(qt, cqt) {
	const queryTypes = qt.split(',')
	const customQueryTypes = cqt.split(',')

	return (customQueryTypes.concat(queryTypes.filter(q => customQueryTypes.indexOf(q) < 0)))
}

export function getOnlineBankSupportedCurrencys() {
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

                ${getQueryTypes(queryTypes, '$export: Boolean!')}
            ){
                ${listSchemaKey}(
                    count: true,
                    paging: {
                        offset: $offset
                        limit: $limit
                    },
                    filter: ${queryFilters}
                    sort: { 
                        field: $sortBy
                        order: $sortOrder 
                    }
                    export: $export
                ){
					${pagingInfo}
                    items {
                        ${queryItems}
                    }
                }
            }
        `
	)
}

export function getOnlineBankSupportedCurrency() {
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

export function mutateOnlineBankSupportedCurrency() {
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

export function getExtraQuery() {
	return (
		gql`
            query EXTRAQUERY_VIEW { 
                currencyList(
					${queryMeta}
                ){
					${pagingInfo}
                    items {
                        Id
						CurrencyCode
						CurrencyName
                    }
				}
                onlineBankList(
					${queryMeta}
                ){
					${pagingInfo}
                    items {
                        Id
						OnlineBankCode
						OnlineBankName
                    }
				}
            }
        `
	)
}

// ASYNC QUERIES
// export const getAsyncQuery = {
// 	playerProfileList: gql`
// 		query ASYNC_LIST(
// 			$UserName: String
// 		){
// 			playerProfileList(
// 				${queryMeta}
// 				filter: { UserName: { parameter: $UserName, expression: CONTAINS } }
// 			){
// 				${pagingInfo}
// 				items {
// 					UserName
// 				}
// 			}
// 		}
// 	`
// }
