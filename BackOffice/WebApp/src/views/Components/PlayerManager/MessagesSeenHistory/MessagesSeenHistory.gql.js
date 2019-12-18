import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { MessagesSeenHistory as tableHeaders} from '../../../../data/TableHeaders'

const component = 'PlayerMessagesSeenHistory'
const sortBy = 'PlayerMessageSeenHistorySortingFields!'
const listSchemaKey = 'playerMessageSeenHistoryList'
// const detailSchemaKey = 'playerMessages'

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

export function getMessagesSeenHistory() {
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

                ${getQueryTypes(queryTypes, '$MessageId: ID')}
            ){
                ${listSchemaKey}(
                    count: true
                    paging: {
                        offset: $offset
                        limit: $limit
                    }
                    filter: { 
                        ${queryFilters.slice(1, -1)}
                        MessageId: { parameter: $MessageId, expression: EQUALS }
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
