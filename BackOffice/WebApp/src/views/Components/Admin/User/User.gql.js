import gql from 'graphql-tag'

import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { AdminUsers as tableHeaders } from '../../../../data/TableHeaders'

const component = 'AdminUsers'
const sortBy = 'UserSortingFields!'
const listSchemaKey = 'userList'
const detailSchemaKey = 'user'
const mutateSchemaKey = 'userMutation'

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

export function getAdminUsers() {
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

export function getAdminUser() {
	const queryItems = String(GetAllFieldsToQuery(tableHeaders))

	return (
		gql`
            query QUERY_USER_VIEW( $username: String! ){
                ${detailSchemaKey} ( username: $username ){            
                    ${queryItems}
                }
            }
        `
	)
}

export function mutateAdminUser() {
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
                    UserRoleTypeEnum
                    ActiveStatusTypeEnum
                }
                brandMarketList(
					${queryMeta}
                ){
					${pagingInfo}
                    items{
                        Id
                        BrandId
                        BrandCode
                        CountryId
                        CountryName
                        CurrencyId
                        CurrencyCode
                        BrandMarketCode
                    }
                }
                teamsList(
					${queryMeta}
                ){
					${pagingInfo}
                    items {
                      Id
                      TeamName
                    }
                }
            }
        `
	)
}