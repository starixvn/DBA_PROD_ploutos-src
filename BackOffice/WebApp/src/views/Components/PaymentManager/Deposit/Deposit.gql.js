import gql from 'graphql-tag'

import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta } from '../../../../utils/CoreHelpers'
import { Deposit as tableHeaders } from '../../../../data/TableHeaders'

const component = 'Deposit'
const sortBy = 'WalletDepositSortingFields!'
const listSchemaKey = 'walletDepositList'
const detailSchemaKey = 'walletDeposit'
const mutateSchemaKey = 'actionCreateWalletDepositMutation'

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

export function getDeposits() {
    
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

                ${getQueryTypes(queryTypes, '$UserName: String, $StartDate: DateTime!, $EndDate: DateTime!, $Assignee: String, $export: Boolean!')}
            ){
                ${listSchemaKey}(
                    count: true,
                    paging: {
                        offset: $offset
                        limit: $limit
                    },
                    filter: { 
                        ${queryFilters.slice(1, -1)}
                        UserName: { parameter: $UserName, expression: EQUALS }
                        Assignee: { parameter: $Assignee, expression: EQUALS }
                    },
                    sort: { 
                        field: $sortBy
                        order: $sortOrder 
                    }
                    start_deposit_date: $StartDate
                    end_deposit_date: $EndDate
                    export: $export
                ){
					${pagingInfo}
                    items {
                        ${queryItems}
                    }
                }
            }
        `
	)
}

export function getDeposit() {
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

export function mutateDeposit() {
	return (
		gql`
			mutation MUTATION_VARS(
				$PaymentMethodId: ID!,
				$BankAccountId: ID!,
				$DepositAmount: Float!,
				$BonusCode: String!,
				$PlayerLoginName: String!,
                $DepositType: WalletDepositTypeTypeEnum,
				$Notes: String,
			){
                ${mutateSchemaKey}(
					PaymentMethodId: $PaymentMethodId,
					BankAccountId: $BankAccountId,
					DepositAmount: $DepositAmount,
					BonusCode: $BonusCode,
					PlayerLoginName: $PlayerLoginName,
                    DepositType: $DepositType,
					Notes: $Notes
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
                    WalletDepositStatusTypeEnum
                    WalletDepositTypeTypeEnum
                }
                bonusList(
					${queryMeta}
                    filter: {
                        IsActiveBonus: { parameter: true, expression: EQUALS }
                    }
                ){
					${pagingInfo}
                    items {
                        Id
                        BonusCode
                        BonusName
						BrandCode
						CurrencyCode
						ActiveRecord
                    }
				}
				paymentMethodList(
					${queryMeta}
				){
					${pagingInfo}
					items {
						Id
						PaymentMethodName
						CurrencyCode
					}
				}
				bankAccountPaymentMethodList(
					${queryMeta}
				){
					${pagingInfo}
					items {
						Id
						AccountNo
						AccountName
                        AccountNameAndNo
						PaymentMethodId
						BankAccountId
						BankName
						BankAccountActiveRecord
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

export function mutateApproveDeposit() {
	return (
		gql`
            mutation MUTATION_DEPOSIT_ITEM(
                $Id: ID!,
                $ActualDepositAmount: Float!,
                $Remarks: String
            ){
                actionApproveWalletDepositMutation(
                    Id: $Id,
                    ActualDepositAmount: $ActualDepositAmount,
                    Remarks: $Remarks
                ){
                    apiResult
                }
            }
        `
	)
}

export function mutateRejectDeposit() {
	return (
		gql`
            mutation MUTATION_DEPOSIT_ITEM(
                $Id: ID!,
                $ActualDepositAmount: Float!,
                $Remarks: String
            ){
                actionRejectWalletDepositMutation(
                    Id: $Id,
                    ActualDepositAmount: $ActualDepositAmount,
                    Remarks: $Remarks
                ){
                    apiResult
                }
            }
        `
	)
}

export function mutateAdjustDeposit() {
	return (
		gql`
            mutation MUTATION_DEPOSIT_ITEM(
                $Id: ID!,
                $ActualDepositAmount: Float!,
                $BonusCode: String,
                $Remarks: String
            ){
                actionAdjustWalletDepositMutation(
                    Id: $Id,
                    NewDepositAmount: $ActualDepositAmount,
                    BonusCode: $BonusCode
                    Remarks: $Remarks
                ){
                    apiResult
                }
            }
        `
	)
}

export function mutateFulfillWager() {
	return (
		gql`
            mutation MUTATION_DEPOSIT_ITEM(
                $Id: ID!,
                $IsWageringFulfilled: Boolean
            ){
                actionWagerFulfilledWalletDepositMutation(
                    Id: $Id,
                    IsWageringFulfilled: $IsWageringFulfilled
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
					UserName
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
					CurrencyCode
					BrandCode
				}
			}
		`
	)
}