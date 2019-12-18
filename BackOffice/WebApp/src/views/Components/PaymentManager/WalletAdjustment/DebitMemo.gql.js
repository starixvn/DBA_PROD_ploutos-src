import gql from 'graphql-tag'

import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta } from '../../../../utils/CoreHelpers'
import { DebitMemo as tableHeaders } from '../../../../data/TableHeaders'

const component = 'DebitMemo'
const sortBy = 'WalletAdjustmentMemoSortingFields!'
const listSchemaKey = 'walletAdjustmentMemoList'
const detailSchemaKey = 'walletAdjustmentMemo'
const mutateSchemaKey = 'actionAddDebitWalletAdjustmentMutation'

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

export function getDebitMemos() {
	const queryTypes = String(GetQueryMeta('getTypes', tableHeaders, component))
	const queryFilters = GetQueryMeta('getFilters', tableHeaders, component)
	const queryItems = String(SelectFieldsToQuery(tableHeaders, component))

	return (
		gql`
            query QUERY_DEBIT_LIST(
                $offset: Int!,
                $limit: Int!,
                $sortBy: ${sortBy},
                $sortOrder: SortingOrder!,

                ${getQueryTypes(queryTypes, '$UserName: String!, $StartDate: DateTime!, $EndDate: DateTime!')}
            ){
                ${listSchemaKey}(
                    count: true,
                    paging: {
                        offset: $offset
                        limit: $limit
                    },
                    filter: ${queryFilters},
                    sort: { 
                        field: $sortBy
                        order: $sortOrder 
                    }
                    credit_memo: false
                    debit_memo: true
                    start_date: $StartDate
                    end_date: $EndDate
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

export function getDebitMemo() {
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

export function mutateDebitMemo() {
	// const queryTypes = String(GetQueryMeta('getEntityTypes', tableHeaders))
	// const queryEntities = String(GetQueryMeta('getEntityFilters', tableHeaders))
	// const queryItems = String(SelectFieldsToMutate(tableHeaders))

	return (
		gql`
            mutation MUTATION_VARS(
                $UserName: String!
                $DebitAmount: Float!
                $TransactionDate: DateTime!
                #$AdjustmentSource: String
                $Remarks: String
            ){
                ${mutateSchemaKey}(
                    PlayerLoginName: $UserName
                    Amount: $DebitAmount
                    TransactionDate: $TransactionDate
                    #AdjustmentSource: $AdjustmentSource
                    Remarks: $Remarks
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
                enumRepository{
                    WalletAdjustmentMemoStatusTypeEnum
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

export function mutateApproveWithdrawal() {
	return (
		gql`
            mutation MUTATION_WALLET_ITEM(
                $Id: ID!,
                $Remarks: String
            ){
                actionApproveWalletAdjustmentMutation(
                    Id: $Id,
                    Remarks: $Remarks
                ){
                    apiResult
                }
            }
        `
	)
}

export function mutateRecordView() {
	return (
		gql`
            mutation MUTATION_RECORD_VIEW(
                $Id: ID!,
                $SourceObject: SystemModulesTypeEnum!
                $SourceObjectId: ID!
                $ViewedBy: String!
            ){
                recordViewedMutation(
                    entity: {
                        Id: $Id
                        SourceObject: $SourceObject
                        SourceObjectId: $SourceObjectId
                        ViewedBy: $ViewedBy
                    }
                ){
                    Id
                    SourceObject
                    SourceObjectId
                    ViewedBy
                    CreatedById
                    ModifiedById
                    DateCreated
                    DateModified
                    ActiveRecord
                }
            }
        `
	)
}