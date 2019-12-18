import gql from 'graphql-tag'

import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { Affiliate as tableHeaders } from '../../../../data/TableHeaders'

const component = 'Affiliate'
const sortBy = 'AffiliateSortingFields!'
const listSchemaKey = 'affiliateList'
const detailSchemaKey = 'affiliate'
const mutateSchemaKey = 'affiliateMutation'

function getQueryTypes(qt, cqt) {
	const queryTypes = qt.split(',')
	const customQueryTypes = cqt.split(',')

	return (customQueryTypes.concat(queryTypes.filter(q => customQueryTypes.indexOf(q) < 0)))
}

export function getAffiliates() {
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
					export: $export,
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

export function getAffiliate() {
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

export function mutateAffiliate() {
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
					AffiliateTypeEnum
					AffiliateStatusTypeEnum
					SettlementPeriodTypeEnum
				}   
				affiliateEarningPlanList(
					count: true,
					paging: {
						offset: 0
						limit: 10
					}
				){
					pagingInfo {offset, limit, totalCount}
					items {
						Id
						EarningPlanName
						BrandId
						CurrencyCode
					}
				}
				bankList(
					count: true,
					paging: {
						offset: 0
						limit: 10
					}
				){
					pagingInfo {offset, limit, totalCount}
					items {
						Id
						BankCode
						BankName
						BrandId
					}
				}
				currencyList(
					count: true,
					paging: {
						offset: 0
						limit: 100
					}
				){
					pagingInfo {offset, limit, totalCount}
					items {
						Id
						CurrencyCode
						BrandId
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
				brandList(
					count: true,
					paging: {
						offset: 0
						limit: 100
					}
				){
					pagingInfo {
						offset
						limit
						totalCount
					}
					items {
						Id
						BrandCode
					}
				}
				iMPlatformList(
					count: true,
					paging: {
						offset: 0
						limit: 100
					}
				){
					pagingInfo {
						offset
						limit
						totalCount
					}
					items {
						Id
						IMPlatformName
						BrandId
					}
				}
				securityQuestionList(
					count: true,
					paging: {
						offset: 0
						limit: 100
					}
				){
					pagingInfo {
						offset
						limit
						totalCount
					}
					items {
						Id
						SecurityQuestionDesc
					}
				}
			}
		`
	)
}

export function mutateSuspendAffiliate() {
	return (
		gql`            
            mutation MUTATION_AFFILIATE_ITEM($Id: ID!, $Note: String) {
                actionSuspendAffiliateMutation(
					Id: $Id
					Note: $Note
				){
                    apiResult
                }
            }
        `
	)
}

export function mutateActivateAffiliate() {
	return (
		gql`            
            mutation MUTATION_AFFILIATE_ITEM($Id: ID!, $Note: String) {
                actionActivateAffiliateMutation(
					Id: $Id
					Note: $Note
				){
                    apiResult
                }
            }
        `
	)
}

export function mutateCloseAffiliate() {
	return (
		gql`            
            mutation MUTATION_AFFILIATE_ITEM($Id: ID!, $Note: String) {
                actionCloseAffiliateMutation(
					Id: $Id
					Note: $Note
				){
                    apiResult
                }
            }
        `
	)
}