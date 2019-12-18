import gql from 'graphql-tag'

import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { AffiliateTrackingLinks as tableHeaders } from '../../../../data/TableHeaders'

const component = 'AffiliateTrackingLinks'
const sortBy = 'AffiliateTrackingLinkSortingFields!'
const listSchemaKey = 'affiliateTrackingLinkList'
const detailSchemaKey = 'affiliateTrackingLink'
const mutateSchemaKey = 'affiliateTrackingLinkMutation'

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

export function getAffiliateTrackingLinks() {
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

				${getQueryTypes(queryTypes, '$AffiliateId: ID')}
            ){
                ${listSchemaKey}(
                    count: true
                    paging: {
                        offset: $offset
                        limit: $limit
                    }
                    filter: { 
                        ${queryFilters.slice(1, -1)}
                        AffiliateId: { parameter: $AffiliateId, expression: EQUALS }
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

export function getAffiliateTrackingLink() {
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

export function mutateAffiliateTrackingLinks() {
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
				languageList(
                    count: false,
                    paging: {
                        offset: 0
                        limit: 100
                    }
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        Id
                        LanguageName
                        LanguageCode
                    }
				}
                affiliateList(
                    count: false,
                    paging: {
                        offset: 0
                        limit: 500
                    }
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        Id
                        UserName
                    }
                }
            }
        `
	)
}

export const getAsyncQuery = {
	affiliateList: gql`
		query ASYNC_LIST(
			$Id: ID!
		){
			affiliateList(
				${queryMeta}
				filter: { Id: { parameter: $Id, parameter_one: $Id, expression: CONTAINS } }
			){
				${pagingInfo}
				items {
					AffiliateCode
					AffiliateName
					Id
				}
			}
		}
	`
}