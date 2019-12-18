import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { PlayerMessages as tableHeaders } from '../../../../data/TableHeaders'
import { PlayerMessagesRecipient } from '../../../../data/TableHeaders'

const component = 'PlayerMessages'
const sortBy = 'PlayerMessagesSortingFields!'
const listSchemaKey = 'playerMessagesList'
const detailSchemaKey = 'playerMessages'
const mutateSchemaKey = 'actionCreatePlayerMessagesMutation'
const UpdatemutateSchemaKey = 'actionUpdatePlayerMessagesMutation'

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

export function getPlayerMessages() {
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

                ${getQueryTypes(queryTypes, '$PlayerProfileId: ID')}
            ){
                ${listSchemaKey}(
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

export function getPlayerMessagesRecipient() {
	const queryTypes = String(GetQueryMeta('getTypes', PlayerMessagesRecipient, component))
	const queryFilters = GetQueryMeta('getFilters', PlayerMessagesRecipient, component)
	const queryItems = String(SelectFieldsToQuery(PlayerMessagesRecipient, component))
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

export function getPlayerMessage() {
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
                    PlayerMessagesStatusTypeEnum
                    MessagesTypeEnum
                } 
                brandList(
					${queryMeta}
                ){
					${pagingInfo}
                    items{
                        Id
						BrandCode
                    }
                }                  
                currencyList(
					${queryMeta}
                ){
					${pagingInfo}
                    items{
                        Id
						CurrencyCode
						CurrencyName
                    }
                }  
            }
        `
	)
}

// ASYNC QUERIES
export const getAsyncQuery = {
	playerProfileList: gql`
		query ASYNC_LIST(
			$UserName: String
		){
			playerProfileList(
				${queryMeta}
				filter: { UserName: { parameter: $UserName, expression: CONTAINS } }
			){
				${pagingInfo}
				items {
                    Player
                    Id
				}
			}
		}
	`
}

// USER-TRIGGERED QUERIES
export function playerQuery() {
	return (
		gql`
			query QUERY_VIEW( $UserName: ID ){
				playerProfile( UserName: $UserName ){
					Id
                    BrandCode
                    CurrencyCode
				}
			}
		`
	)
}

// const mutation = gql`
// 	mutation MUTATION_VARS(
// 		${String(GetQueryMeta('getEntityTypes', rawFields))}
// 	){
// 		actionCreatePlayerMessagesMutation(
// 			${String(GetQueryMeta('getEntityFilters', rawFields))}
// 		){
// 			apiResult
// 		}
// 	}
// `

export function mutatePlayerMessages() {
	return (
		gql`
			mutation MUTATION_VARS(
				$MessageNumber: String!,
				$SentToAll: Boolean,
				$PlayerProfileId: ID,
				$BrandCode: String!,
				$CurrencyCode: String!,
                $MessageType: MessagesTypeEnum,
				$IsFromPlayer: Boolean,
				$MessageContent: String!,
				$SendDate: String
			){
                ${mutateSchemaKey}(
					MessageNumber: $MessageNumber,
					SentToAll: $SentToAll,
					PlayerProfileId: $PlayerProfileId,
					BrandCode: $BrandCode,
					CurrencyCode: $CurrencyCode,
                    MessageType: $MessageType,
					IsFromPlayer: $IsFromPlayer,
					MessageContent: $MessageContent,
					SendDate: $SendDate
				){
					apiResult
				}
			}
		`
	)
}

export function mutatePlayerMessagesSendToAll() {
	return (
		gql`
			mutation MUTATION_VARS(
				$Id: ID,
				$MessageNumber: String!,
				$SentToAll: Boolean,
				$PlayerProfileId: ID,
				$BrandCode: String!,
				$CurrencyCode: String!,
                $MessageType: MessagesTypeEnum,
				$IsFromPlayer: Boolean,
				$MessageContent: String!,
				$SendDate: String
			){
                ${UpdatemutateSchemaKey}(
					Id: $Id,
					MessageNumber: $MessageNumber,
					SentToAll: $SentToAll,
					PlayerProfileId: $PlayerProfileId,
					BrandCode: $BrandCode,
					CurrencyCode: $CurrencyCode,
                    MessageType: $MessageType,
					IsFromPlayer: $IsFromPlayer,
					MessageContent: $MessageContent,
					SendDate: $SendDate
				){
					apiResult
				}
			}
		`
	)
}