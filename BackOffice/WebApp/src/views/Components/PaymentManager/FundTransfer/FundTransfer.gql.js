import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta } from '../../../../utils/CoreHelpers'
import { FundTransfer as tableHeaders } from '../../../../data/TableHeaders'

const component = 'FundTransfer'
const sortBy = 'WalletFundTransferSortingFields!'
const listSchemaKey = 'walletFundTransferList'
const detailSchemaKey = 'walletFundTransfer'
// const mutateSchemaKey = 'walletFundTransferMutation'

export function getFundTransfers() {
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
                ${queryTypes}
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

export function getFundTransfer() {
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

// export function mutateFundTransfer() {
//     const queryTypes = String(GetQueryMeta('getEntityTypes', tableHeaders))
//     const queryEntities = String(GetQueryMeta('getEntityFilters', tableHeaders))
//     const queryItems = String(SelectFieldsToMutate(tableHeaders))

//     return (
//         gql`
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
//     )
// }

// export function getExtraQuery() {
//     return (
//         gql`
//             query EXTRAQUERY_VIEW {                

//             }
//         `
//     )
// }


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