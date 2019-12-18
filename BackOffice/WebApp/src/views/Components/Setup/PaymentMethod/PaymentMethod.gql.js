import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { PaymentMethod as tableHeaders } from '../../../../data/TableHeaders'

const component = 'PaymentMethod'
const sortBy = 'PaymentMethodSortingFields!'
const listSchemaKey = 'paymentMethodList'
const detailSchemaKey = 'paymentMethod'
const mutateSchemaKey = 'paymentMethodMutation'

export function getPaymentMethods() {
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

export function getPaymentMethod() {
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

export function mutatePaymentMethod() {
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
                paymentRiskLevelList(
                    count: true,
                    paging: {
                        offset: 0
                        limit: 1000
                    }
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        Id
                        PaymentRiskLevelCode
                        PaymentRiskLevelName
                    }
                } 
                uniqueDepositAmountRuleList(
                    count: true,
                    paging: {
                        offset: 0
                        limit: 1000
                    }
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        Id
                        RuleCode
                        RuleName
                    }
				}				
				brandList(count:false, paging:{
					offset:0
					limit:100
				}){
					pagingInfo{
						offset
						limit
						totalCount
					}
					items{
						Id
						BrandCode
					}
                } 				
				countryList(
					count: true,
					paging: {
						offset: 0
						limit: 100
					}
				){
					pagingInfo {offset, limit, totalCount}
					items {
						Id
						CountryCode
						CountryName
					}
				}			
            }
        `
	)
}