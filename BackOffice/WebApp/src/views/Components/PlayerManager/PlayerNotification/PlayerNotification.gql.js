import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { PlayerNotification as tableHeaders } from '../../../../data/TableHeaders'

const component = 'PlayerNotification'
const sortBy = 'PlayerNotificationSortingFields!'
const listSchemaKey = 'playerNotificationList'
const detailSchemaKey = 'playerNotification'
const mutateSchemaKey = 'playerNotificationMutation'


function getQueryTypes(qt, cqt) {
	const queryTypes = qt.split(',')
	const customQueryTypes = cqt.split(',')

	return (customQueryTypes.concat(queryTypes.filter(q => customQueryTypes.indexOf(q) < 0)))
}

export function getPlayerNotifications() {
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
				
				${getQueryTypes(queryTypes,'$PlayerRegistrationId: ID')}
			){
				${listSchemaKey}(
					count: true,
					paging: {
						offset: $offset
						limit: $limit
					},
                    filter: { 
                        ${queryFilters.slice(1, -1)}
                        PlayerRegistrationId: { parameter: $PlayerRegistrationId, expression: EQUALS }
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

export function getPlayerNotification() {
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


export function mutatePlayerNotification() {
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
					NotificationTypeEnum
				}

                teamsList(
                    count:false,
                    paging:{
                        offset: 0
                        limit: 100
                    }
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        Id
                        TeamCode
                    }
				} 				
				                  
                playerNoteCategoryList(
                    count:false,
                    paging:{
                        offset: 0
                        limit: 100
                    }
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        Id
                        PlayerNoteCategoryCode
                    }
                }  			
				                  
                playerNoteTypeList(
                    count:false,
                    paging:{
                        offset: 0
                        limit: 100
                    }
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        Id
                        PlayerNoteTypeCode
                    }
				}

                playerProfileList( 
                    count: false,
                    paging:{
                        offset: 0
                        limit: 10
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