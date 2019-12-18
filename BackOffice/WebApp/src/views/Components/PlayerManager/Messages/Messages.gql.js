import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { PlayerMessage as tableHeaders } from '../../../../data/TableHeaders'

const component = 'Messages'
const sortBy = 'MessagesSortingFields!'
const listSchemaKey = 'messagesList'
const detailSchemaKey = 'messages'
const mutateSchemaKey = 'actionCreatePlayerMessagesMutation'
const UpdatemutateSchemaKey = 'actionUpdatePlayerMessagesMutation'
const SaveAndSendmutateSchemaKey = 'actionCreateAndSendPlayerMessagesMutation'
const UpdateAndSendmutateSchemaKey = 'actionUpdateAndSendPlayerMessagesMutation'

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
				$SentToAll: Boolean,
				$PlayerProfileId: ID,
				$BrandCode: String!,
				$CurrencyCode: String!,
                $MessageType: MessagesTypeEnum,
				$MessageContent: String!
			){
                ${mutateSchemaKey}(
					SentToAll: $SentToAll,
					PlayerProfileId: $PlayerProfileId,
					BrandCode: $BrandCode,
					CurrencyCode: $CurrencyCode,
                    MessageType: $MessageType,
					MessageContent: $MessageContent
				){
					apiResult
				}
			}
		`
	)
}

export function mutatePlayerMessagesUpdate() {
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
				$MessageContent: String!
			){
                ${UpdatemutateSchemaKey}(
					Id: $Id,
					MessageNumber: $MessageNumber,
					SentToAll: $SentToAll,
					PlayerProfileId: $PlayerProfileId,
					BrandCode: $BrandCode,
					CurrencyCode: $CurrencyCode,
                    MessageType: $MessageType,
					MessageContent: $MessageContent
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
				$SentToAll: Boolean,
				$PlayerProfileId: ID,
				$BrandCode: String!,
				$CurrencyCode: String!,
                $MessageType: MessagesTypeEnum,
				$MessageContent: String!
			){
                ${SaveAndSendmutateSchemaKey}(
					SentToAll: $SentToAll,
					PlayerProfileId: $PlayerProfileId,
					BrandCode: $BrandCode,
					CurrencyCode: $CurrencyCode,
                    MessageType: $MessageType,
					MessageContent: $MessageContent
				){
					apiResult
				}
			}
		`
	)
}

export function mutatePlayerMessagesUpdateAndSendToAll() {
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
				$MessageContent: String!
			){
                ${UpdateAndSendmutateSchemaKey}(
					Id: $Id,
					MessageNumber: $MessageNumber,
					SentToAll: $SentToAll,
					PlayerProfileId: $PlayerProfileId,
					BrandCode: $BrandCode,
					CurrencyCode: $CurrencyCode,
                    MessageType: $MessageType,
					MessageContent: $MessageContent
				){
					apiResult
				}
			}
		`
	)
}

export function mutatePlayerMessagesSeenHistory() {
	return (
		gql`
			mutation MUTATION_VARS(
				$MessageId: ID
			){
                actionCreatePlayerSeenMessagesHistoryMutation(
					MessageId: $MessageId
				){
					apiResult
				}
			}
		`
	)
}