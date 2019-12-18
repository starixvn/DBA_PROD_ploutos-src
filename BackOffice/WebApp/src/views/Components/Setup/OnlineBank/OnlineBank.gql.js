import gql from 'graphql-tag'

import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { OnlineBank as tableHeaders } from '../../../../data/TableHeaders'

const component = 'OnlineBank'
const sortBy = 'OnlineBankSortingFields!'
const listSchemaKey = 'onlineBankList'
const detailSchemaKey = 'onlineBank'
const mutateSchemaKey = 'onlineBankMutation'

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

export function getOnlineBanks() {
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

export function getOnlineBank() {
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

export function mutateOnlineBank() {
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
                brandList(
					${queryMeta}
                ){
					${pagingInfo}
                    items {
                        Id
                        BrandCode
                        BrandName
                    }
				}
                onlineBankTypeList(
					${queryMeta}
                ){
					${pagingInfo}
                    items {
						Id
						OnlineBankTypeCode
                        OnlineBankTypeName
                    }
				}                
            }
        `
	)
}