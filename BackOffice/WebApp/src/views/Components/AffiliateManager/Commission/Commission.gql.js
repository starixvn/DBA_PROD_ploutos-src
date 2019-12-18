import gql from 'graphql-tag'

import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta } from '../../../../utils/CoreHelpers'
import { Commission as tableHeaders } from '../../../../data/TableHeaders'

const component = 'Commission'
const sortBy = 'AffiliateCommisionSortingFields!'
const listSchemaKey = 'affiliateCommissionList'
const detailSchemaKey = 'affiliateCommission'
const mutateSchemaKey = 'actionAffiliateCommissionMutation'

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

export function getCommissions() {
	const queryTypes = String(GetQueryMeta('getTypes', tableHeaders, component))
	const queryFilters = GetQueryMeta('getFilters', tableHeaders, component)
	const queryItems = String(SelectFieldsToQuery(tableHeaders, component))

	return (
		gql`
            query QUERY_AFF_COMMISSION_LIST(
                $offset: Int!,
                $limit: Int!,
                $sortBy: ${sortBy},
                $sortOrder: SortingOrder!,

				${getQueryTypes(queryTypes, '$AffiliateId: ID, $Assignee: String, $export: Boolean!')}
            ){
                ${listSchemaKey}(
                    export: $export,
                    count: true,
                    paging: {
                        offset: $offset
                        limit: $limit
                    },
                    filter: { 
                        ${queryFilters.slice(1, -1)}
                        AffiliateId: { parameter: $AffiliateId, expression: EQUALS }
                        Assignee: { parameter: $Assignee, expression: EQUALS }
                    },
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

export function getCommission() {
	const queryItems = String(GetAllFieldsToQuery(tableHeaders))

	return (
		gql`
            query QUERY_AFF_COMMISSION_VIEW( $Id: ID! ){
                ${detailSchemaKey} ( Id:$Id ){            
                    ${queryItems}
                }
            }
        `
	)
}

export function mutateCommission() {
	const queryTypes = String(GetQueryMeta('getEntityTypes', tableHeaders))
	const queryEntities = String(GetQueryMeta('getEntityFilters', tableHeaders))
	return (
		gql`
            mutation MUTATION_VARS(
               ${queryTypes}
            ){
                ${mutateSchemaKey}(
                    ${queryEntities}
                ){
                    apiResult
                }
            }
        `
	)
}

export function getExtraQuery() {
	return (
		gql`
            query EXTRAQUERY_VIEW {  
                enumRepository {
                    AffiliateCommissionStatusTypeEnum
                }
                brandList(
                    count: false, 
                    paging: {
                        offset: 0, 
                        limit: 100
                    }, 
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        Id
                        BrandCode
                    }
                }                
            }
        `
	)
}

export const getAsyncQuery = {
	affiliateList: gql`
		query ASYNC_LIST(
			$UserName: String
		){
			affiliateList(
				${queryMeta}
				filter: { UserName: { parameter: $UserName, expression: CONTAINS } }
			){
				${pagingInfo}
				items {
					AffiliateCode
					AffiliateName
					UserName
				}
			}
		}
	`
}

export function mutateGrabUngrab() {
	return (
		gql`
			mutation MUTATION_AFFTRANSACATION_ITEM(
                $TransactionId: ID!,
                $TransactionType: SystemModulesIntTypeEnum!,
                $SourceObjectId: ID!,
                $SourceObjectName: String,
                $Assignee: String!,
                $UserId: String!
			){
				actionTransactionGrabUnGrabMutation(
					entity: {
                        Id: $TransactionId
                        TransactionType: $TransactionType
                        SourceObjectId: $SourceObjectId
						SourceObjectName: $SourceObjectName
                        Assignee: $Assignee
                        UserId: $UserId
					}
				){
					Id
					SourceObjectId
					TransactionType
					Assignee
				}
			}
		`
	)
}

export function mutateApproveCommission() {
	return (
		gql`
            mutation MUTATION_AFFCOMMISSION_ITEM(
                $Id: ID!,
                $Income: Float!,
                	#$Remarks: String
            ){
                actionApproveAffiliateCommissionsMutation(
					Id: $Id
					Income: $Income
                    	#Remarks: $Remarks
                ){
					apiResult
                }
            }
        `
	)
}