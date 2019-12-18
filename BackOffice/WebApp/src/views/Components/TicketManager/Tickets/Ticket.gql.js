import gql from 'graphql-tag'

import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { Ticket as tableHeaders } from '../../../../data/TableHeaders'

const component = 'Ticket'
const sortBy = 'TicketsSortingFields!'
const listSchemaKey = 'ticketsList'
const detailSchemaKey = 'tickets'
const mutateSchemaKey = 'ticketsMutation'

const queryMeta = `
	count: true,
	paging: {
		offset: 0,
		limit: 100
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

export function getTickets() {
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
				
                ${getQueryTypes(queryTypes, '$Assignee: String')}
            ){
                ${listSchemaKey}(
                    count: true
                    paging: {
                        offset: $offset
                        limit: $limit
                    }
                    filter: { 
                        ${queryFilters.slice(1, -1)}
                        AssignedTo: { parameter: $Assignee, expression: EQUALS }
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

export function getTicket() {
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

export function mutateTicket() {
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
                    TicketStatusTypeEnum
                }
                userList(${queryMeta}){
					${pagingInfo}
                    items {
                      TeamId
                      username
                    }
                }
                brandList(${queryMeta}){
					${pagingInfo}
                    items {
                        Id
                        BrandCode
                        BrandName
                    }
                }
                teamsList(${queryMeta}){
					${pagingInfo}
                    items {
                      Id
                      TeamName
                    }
                }
                ticketCategoryList(${queryMeta}){
					${pagingInfo}
                    items {
                      Id
                      TicketCategoryName
                    }
                }
            }
        `
	)
}

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
					UserName
				}
			}
		}
	`
}

export function mutateCloseTicket() {
	return (
		gql`
            mutation MUTATION_TICKET_ITEM(
                $Id: ID!,
                $Comments: String!
            ){
                actionCloseTicketMutation(
                    Id: $Id,
                    Comments: $Comments
                ){
                    Id
                }
            }
        `
	)
}

export function mutateAssignTicket() {
	return (
		gql`
            mutation MUTATION_TICKET_ITEM(
                $Id: ID!,
                $AssignedTo: String!,
                $Comments: String
            ){
                actionAssignTicketMutation(
                    Id: $Id,
                    AssignedTo: $AssignedTo,
                    Comments: $Comments
                ){
                    Id
                }
            }
        `
	)
}

export function mutateAcknowledgeTicket() {
	return (
		gql`
            mutation MUTATION_TICKET_ITEM(
                $Id: ID!
            ){
                actionAcknowledgeTicketMutation(
                    Id: $Id
                ){
                    Id
                }
            }
        `
	)
}