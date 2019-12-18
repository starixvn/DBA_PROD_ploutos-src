import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta } from '../../../../utils/CoreHelpers'
import { PlayerLedger as tableHeaders } from '../../../../data/TableHeaders'

const component = 'PlayerLedger'
const sortBy = 'WalletLedgerSortingFields!'
const listSchemaKey = 'walletLedgerList'
const detailSchemaKey = 'walletLedger'

function getQueryTypes(qt, cqt) {
	const queryTypes = qt.split(',')
	const customQueryTypes = cqt.split(',')

	return (customQueryTypes.concat(queryTypes.filter(q => customQueryTypes.indexOf(q) < 0)))
}

export function getPlayerLedgers() {
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
				${getQueryTypes(queryTypes, '$UserName: String, $export: Boolean!')}
            ){
                ${listSchemaKey}(
                    export: $export,
                    count: true
                    paging: {
                        offset: $offset
                        limit: $limit
                    }
                    filter:{
                        ${queryFilters.slice(1, -1)}
                        UserName:{ parameter: $UserName, expression: EQUALS }
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

export function getPlayerLedger() {
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

export function getExtraQuery() {
	return (
		gql`
            query EXTRAQUERY_VIEW {
                enumRepository{
                    WalletLedgerTypeEnum
                }   
            }
        `
	)
}