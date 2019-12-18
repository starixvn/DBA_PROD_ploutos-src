import gql from 'graphql-tag'
import { SelectFieldsToQuery, GetQueryMeta } from '../../../../utils/CoreHelpers'
import { PlayerMessageMonitoring as tableHeaders } from '../../../../data/TableHeaders'

const component = 'PlayerMessageMonitoring'
const sortBy = 'NotificationMessageLogSortingFields!'
const listSchemaKey = 'notificationMessageLogList'
// const detailSchemaKey = ''

export function getPlayerMessages() {

	const queryTypes = String(GetQueryMeta('getTypes', tableHeaders, component))
	// const queryFilters = GetQueryMeta('getFilters', tableHeaders, component)
	const queryItems = String(SelectFieldsToQuery(tableHeaders, component))

	return (
		gql`
            query QUERY_LIST(
                $offset: Int!
                $limit: Int!
                $sortBy: ${sortBy}
                $sortOrder: SortingOrder!
                ${queryTypes}
                
                $export: Boolean!
            ){
                ${listSchemaKey}(
                    export: $export
                    count: true
                    paging: {
                        offset: $offset
                        limit: $limit
                    }
                    #filter: { PlayerProfileId: { parameter: $PlayerProfileId, expression: EQUALS }}
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

// export function getPlayerBet() {
//     const queryItems = String(GetAllFieldsToQuery(tableHeaders))

//     return (
//         gql`
//             query QUERY_VIEW( $Id: ID! ){
//                 ${detailSchemaKey} ( Id: $Id ){            
//                     ${queryItems}
//                 }
//             }
//         `
//     )
// }