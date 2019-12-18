import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { Platform as tableHeaders } from '../../../../data/TableHeaders'

const component = 'Platform'
const sortBy = 'GamePlatformSortingFields!'
const listSchemaKey = 'gamePlatformList'
const detailSchemaKey = 'gamePlatform'
const mutateSchemaKey = 'gamePlatformMutation'

export function getPlatforms() {
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

export function getPlatform() {
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

export function mutatePlatform() {
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
                    count: false,
                    paging: {
                        offset: 0
                        limit: 1000
                    }
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        Id
                        CurrencyName
                        CurrencyCode
                    }
                }    
                languageList(
                    count: false,
                    paging: {
                        offset: 0
                        limit: 1000
                    }
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        Id
                        LanguageName
                        LanguageCode
                    }
                }
            }
        `
	)
}