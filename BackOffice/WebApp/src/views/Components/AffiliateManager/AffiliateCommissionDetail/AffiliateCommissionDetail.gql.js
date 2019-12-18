import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { AffiliateCommissionDetail as tableHeaders } from '../../../../data/TableHeaders'

const component = 'AffiliateCommissionDetail'
const sortBy = 'AffiliateCommisionDetailSortingFields!'
const listSchemaKey = 'affiliateCommissionDetailList'
// const detailSchemaKey = 'bankAccount'
// const mutateSchemaKey = 'bankAccountMutation'

function getQueryTypes(qt, cqt) {
    const queryTypes = qt.split(',')
    const customQueryTypes = cqt.split(',')
    return (customQueryTypes.concat(queryTypes.filter(q => customQueryTypes.indexOf(q) < 0)))
}

export function getAffiliateCommissionDetails() {
	const queryTypes = String(GetQueryMeta('getTypes', tableHeaders, component))
	const queryFilters = GetQueryMeta('getFilters', tableHeaders, component)
	const queryItems = String(SelectFieldsToQuery(tableHeaders, component))

	return (
		gql`
            query QUERY_LIST(
                $offset: Int!,
                $limit: Int!,
                $sortBy: ${sortBy},
                $sortOrder: SortingOrder!,
                
                ${getQueryTypes( queryTypes, '$AffiliateCommissionId: ID' )}
            ){
                ${listSchemaKey}(
                    count: true,
                    paging: {
                        offset: $offset
                        limit: $limit
                    },
                    filter: { 
                        ${queryFilters.slice(1, -1)}
                        AffiliateCommissionId: { parameter: $AffiliateCommissionId, expression: EQUALS }
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

// export function getBankAccount() {
// 	const queryItems = String(GetAllFieldsToQuery(tableHeaders))
// 	return (
// 		gql`
//             query QUERY_USER_VIEW( $Id: ID! ){
//                 ${detailSchemaKey} ( Id:$Id ){            
//                     ${queryItems}
//                 }
//             }
//         `
// 	)
// }

// export function mutateBankAccount() {
// 	const queryTypes = String(GetQueryMeta('getEntityTypes', tableHeaders))
// 	const queryEntities = String(GetQueryMeta('getEntityFilters', tableHeaders))
// 	const queryItems = String(SelectFieldsToMutate(tableHeaders))
// 	return (
// 		gql`
//             mutation MUTATION_VARS(
//                ${queryTypes}
//             ){
//                 ${mutateSchemaKey}(
//                     entity:{
//                         ${queryEntities}
//                     }
//                 ){
//                     ${queryItems}
//                 }
//             }
//         `
// 	)
// }

// export function getExtraQuery() {
// 	return (
// 		gql`
//             query EXTRAQUERY_VIEW {
//                 enumRepository{
//                     BankAccountTypeEnum
//                 }
//                 bankList(
//                     count: true,
//                     paging: {
//                         offset: 0
//                         limit: 1000
//                     }
//                 ){
//                     pagingInfo {offset, limit, totalCount}
//                     items {
//                         Id
//                         BankName
//                     }
//                 }
//                 currencyList(
//                     count: true,
//                     paging: {
//                         offset: 0
//                         limit: 1000
//                     }
//                 ){
//                     pagingInfo {offset, limit, totalCount}
//                     items {
//                         Id
//                         CurrencyCode
//                     }
//                 }
//                 paymentMethodList(
//                     paging:{
//                         offset:0
//                         limit:200
//                     },
//                     count: true
//                 ){
//                     pagingInfo{
//                         offset
//                         limit
//                         totalCount
//                     }
//                     items{
//                         Id
//                         RecordName
//                     }
//                 }
//             }
//         `
// 	)
// }