import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta } from '../../../../utils/CoreHelpers'
import { Withdrawal as tableHeaders } from '../../../../data/TableHeaders'

const component = 'Withdrawal'
const sortBy = 'WalletWithdrawalSortingFields!'
const listSchemaKey = 'walletWithdrawalList'
const detailSchemaKey = 'walletWithdrawal'
// const mutateSchemaKey = 'walletWithdrawalMutation'

function getQueryTypes(qt, cqt) {
	const queryTypes = qt.split(',')
	const customQueryTypes = cqt.split(',')
	return (customQueryTypes.concat(queryTypes.filter(q => customQueryTypes.indexOf(q) < 0)))
}

export function getWithdrawals() {
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
                ${getQueryTypes(queryTypes, '$UserName: String, $StartDate: DateTime!, $EndDate: DateTime!, $Assignee: String')}
            ){
                ${listSchemaKey}(
                    count: true
                    paging: {
                        offset: $offset
                        limit: $limit
                    }
                    filter: { 
                        ${queryFilters.slice(1, -1)}
                        Assignee: { parameter: $Assignee, expression: EQUALS }
                    }
                    sort: { 
                        field: $sortBy
                        order: $sortOrder 
                    }
                    start_deposit_date: $StartDate
                    end_deposit_date: $EndDate
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

export function getWithdrawal() {
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

export function getExtraQuery() {
	return (
		gql`
            query EXTRAQUERY_VIEW {                
                enumRepository{
                    WalletTransactionStatusTypeEnum
                }
                bankAccountList(
                    count: false, 
                    paging: {
                        offset: 0, 
                        limit: 100
                    },
                    filter:{
                        AccountType:{ parameter:"Withdrawal_Account", expression:EQUALS }
                    }
                ){
                    pagingInfo {offset, limit, totalCount}
                    items {
                        Id
                        BankCode
                        AccountName
                        AccountNo
                    }
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

export function mutateApproveWithdrawal() {
	return (
		gql`
            mutation MUTATION_WITHDRAW_ITEM(
                $Id: ID!,
                $WithdrawalBankAccountId: ID!,
                $Remarks: String
            ){
                actionApproveWalletWithdrawalMutation(
                    Id: $Id,
                    WithdrawalBankAccountId: $WithdrawalBankAccountId,
                    Remarks: $Remarks
                ){
                    apiResult
                }
            }
        `
	)
}

export function mutateRejectWithdrawal() {
	return (
		gql`
            mutation MUTATION_DEPOSIT_ITEM(
                $Id: ID!,
                $Remarks: String
            ){
                actionRejectWalletWithdrawalMutation(
                    Id: $Id,
                    Remarks: $Remarks
                ){
                    apiResult
                }
            }
        `
	)
}

export function mutateUnclearWithdrawal() {
	return (
		gql`
            mutation MUTATION_DEPOSIT_ITEM(
                $Id: ID!,
                $TransactionGrabId: ID!
                $Remarks: String,
            ){
                actionUnClearWalletWithdrawalMutation(
                    Id: $Id,
                    TransactionGrabId: $TransactionGrabId,
                    Remarks: $Remarks
                ){
                    apiResult
                }
            }
        `
	)
}

export function mutateClearWithdrawal() {
	return (
		gql`
            mutation MUTATION_DEPOSIT_ITEM(
                $Id: ID!,
                $TransactionGrabId: ID!
                $Remarks: String,
            ){
                actionClearWalletWithdrawalMutation(
                    Id: $Id,
                    TransactionGrabId: $TransactionGrabId,
                    Remarks: $Remarks
                ){
                    apiResult
                }
            }
        `
	)
}

export function mutateFraudWallet() {
	return (
		gql`
            mutation MUTATION_DEPOSIT_ITEM(
                $Id: ID!,
                $TransactionGrabId: ID!
                $Remarks: String,
            ){
                actionForFraudWalletWithdrawalMutation(
                    Id: $Id,
                    TransactionGrabId: $TransactionGrabId,
                    Remarks: $Remarks
                ){
                    apiResult
                }
            }
        `
	)
}

export function mutateGrabUngrab() {
	return (
		gql`
            mutation MUTATION_DEPOSIT_ITEM(
                $TransactionId: ID!,
                $TransactionType: SystemModulesIntTypeEnum!,
                $SourceObjectId: ID!,
                $Assignee: String!,
                $UserId: String!
            ){
                actionTransactionGrabUnGrabMutation(
                    entity:{
                        Id: $TransactionId,
                        TransactionType: $TransactionType,
                        SourceObjectId: $SourceObjectId,
                        Assignee: $Assignee,
                        UserId: $UserId
                    }
                ){
                    Id
                }
            }
        `
	)
}