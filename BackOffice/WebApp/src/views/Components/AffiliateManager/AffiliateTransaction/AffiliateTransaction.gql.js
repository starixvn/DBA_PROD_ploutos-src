import gql from 'graphql-tag'

import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta } from '../../../../utils/CoreHelpers'
import { AffiliateTransaction as tableHeaders } from '../../../../data/TableHeaders'

const component = 'AffiliateTransaction'
const sortBy = 'AffiliateTransactionSortingFields!'
const listSchemaKey = 'affiliateTransactionList'
const detailSchemaKey = 'affiliateTransaction'
const mutateSchemaKey = 'affiliateTransactionMutation'

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

export function getAffiliateTransactions() {
	const queryTypes = String(GetQueryMeta('getTypes', tableHeaders, component))
	const queryFilters = GetQueryMeta('getFilters', tableHeaders, component)
	const queryItems = String(SelectFieldsToQuery(tableHeaders, component))

	return (
		gql`
            query QUERY_AFF_TRANSACTION_LIST(
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

export function getAffiliateTransaction() {
	const queryItems = String(GetAllFieldsToQuery(tableHeaders))

	return (
		gql`
            query QUERY_AFF_TRANSACTION_VIEW( $Id: ID! ){
                ${detailSchemaKey} ( Id:$Id ){            
                    ${queryItems}
                }
            }
        `
	)
}

export function mutateAffiliateTransaction() {
	// const queryTypes = String(GetQueryMeta('getEntityTypes', tableHeaders))
	// const queryEntities = String(GetQueryMeta('getEntityFilters', tableHeaders))
	// const queryItems = String(SelectFieldsToMutate(tableHeaders))

	return (
		gql`
            mutation MUTATION_VARS(
				$Id: ID!
				$TxnType: AffiliateTransactionUITypeEnum
				$AffiliateUserName: String
				$TransactionAmount: Float
            ){
                ${mutateSchemaKey}(
                    entity:{
                        Id: $Id
						AffiliateUserName: $AffiliateUserName
						TransactionAmount: $TransactionAmount
						TxnType: $TxnType
                    }
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
					AffiliateTransactionTypeEnum
					AffiliateTransactionUITypeEnum
                    AffiliateTransactionStatusTypeEnum
                    #AffiliateStatusTypeEnum
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

export function mutateApproveTransaction() {
	return (
		gql`
            mutation MUTATION_AFFTRANSACATION_ITEM(
                $Id: ID!,
                $ApprovedAmount: Float!,
                	#$Remarks: String
            ){
                actionApproveAffiliateTransactionMutation(
                    Id: $Id,
                    ApprovedAmount: $ApprovedAmount,
                    	#Remarks: $Remarks
                ){
                    apiResult
                }
            }
        `
	)
}

export function mutateRejectTransaction() {
	return (
		gql`
            mutation MUTATION_AFFTRANSACATION_ITEM(
                $Id: ID!,
                	#$Remarks: String
            ){
                actionRejectAffiliateTransactionMutation(
                    Id: $Id,
                    	#Remarks: $Remarks
                ){
                    apiResult
                }
            }
        `
	)
}