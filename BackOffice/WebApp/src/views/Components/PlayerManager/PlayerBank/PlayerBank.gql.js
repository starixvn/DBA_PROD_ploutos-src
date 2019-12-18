import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta } from '../../../../utils/CoreHelpers'
import { PlayerBank as tableHeaders } from '../../../../data/TableHeaders'

const component = 'PlayerBank'
const sortBy = 'PlayerBankAccountSortingFields!'
const listSchemaKey = 'playerBankAccountList'
const detailSchemaKey = 'playerBankAccount'
// const mutateSchemaKey = ''

function getQueryTypes(qt, cqt) {
	const queryTypes = qt.split(',')
	const customQueryTypes = cqt.split(',')

	return (customQueryTypes.concat(queryTypes.filter(q => customQueryTypes.indexOf(q) < 0)))
}

export function getPlayerBanks() {
	const queryTypes = String(GetQueryMeta('getTypes', tableHeaders, component))
	const queryFilters = GetQueryMeta('getFilters', tableHeaders, component)
	const queryItems = String(SelectFieldsToQuery(tableHeaders, component))

	return (
		gql`
            query QUERY_LIST(
                $offset: Int!
                $limit: Int!
                $sortBy: ${sortBy}
				$sortOrder: SortingOrder!,
				
                ${getQueryTypes(queryTypes, '$PlayerProfileId: ID, $export: Boolean!')}
            ){
                ${listSchemaKey}(
                    export: $export
                    count: true
                    paging: {
                        offset: $offset
                        limit: $limit
                    }
                    filter: { 
                        ${queryFilters.slice(1, -1)}
                        PlayerProfileId: { parameter: $PlayerProfileId, expression: EQUALS }
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

export function getPlayerBank() {
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