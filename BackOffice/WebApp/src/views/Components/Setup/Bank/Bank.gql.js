import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { Bank as tableHeaders } from '../../../../data/TableHeaders'

const component = 'Bank'
const sortBy = 'BankSortingFields!'
const listSchemaKey = 'bankList'
const detailSchemaKey = 'bank'
const mutateSchemaKey = 'bankMutation'

export function getBanks() {
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

export function getBank() {
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

export function mutateBank() {
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
                enumRepository{
                    BankTransactionTypeEnum
                }
                currencyList(
                    count: true,
                    paging: {
                        offset: 0
                        limit: 1000
                    }
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        Id
                        CurrencyCode
                    }
                } 
                brandList(
                    count: true,
                    paging: {
                        offset: 0
                        limit: 1000
                    }
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        Id
                        BrandCode
                    }
                } 
            }
        `
	)
}