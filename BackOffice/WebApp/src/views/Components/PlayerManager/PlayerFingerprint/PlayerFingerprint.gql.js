import gql from 'graphql-tag'
import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta } from '../../../../utils/CoreHelpers'
import { PlayerFingerprint as tableHeaders } from '../../../../data/TableHeaders'

const component = 'PlayerFingerprint'
const sortBy = 'PlayerFingerPrintSortingFields!'
const listSchemaKey = 'playerFingerPrintList'
const detailSchemaKey = 'playerFingerPrint'

function getQueryTypes(qt, cqt) {
	const queryTypes = qt.split(',')
	const customQueryTypes = cqt.split(',')

	return (customQueryTypes.concat(queryTypes.filter(q => customQueryTypes.indexOf(q) < 0)))
}

export function getPlayerFingerprints() {
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

                ${getQueryTypes(queryTypes, '$export: Boolean!')}
                
                #$PlayerProfileId: ID
            ){
                ${listSchemaKey}(
                    export: $export
                    count: true
                    paging: {
                        offset: $offset
                        limit: $limit
                    }
                    filter: { 
                        ${queryFilters.slice(1, -1)}
                        #PlayerProfileId: { parameter: $PlayerProfileId, expression: EQUALS }
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

export function getPlayerFingerprint() {
	const queryItems = String(GetAllFieldsToQuery(tableHeaders))

	return (
		gql`
            query QUERY_VIEW( $Id: String ){
                ${detailSchemaKey} ( FingerPrint: $Id ){            
                    ${queryItems}
                }
            }
        `
	)
}

export function getPlayerFingerprintHitsList() {
	return (
		gql`
            query QUERY_LIST( 
				$FingerPrintId: ID
                $FingerPrint: String
			){
                playerfingerprinthitList(
					count: false,
					paging: {
						offset: 0
						limit: 100
					},
					filter: {
                        FingerPrintId: { parameter: $FingerPrintId, expression: EQUALS }
						FingerPrint: { parameter: $FingerPrint, expression: EQUALS }
					}
				){
                    pagingInfo {offset, limit, totalCount}
					items {
						Id
						UserName
						FingerPrint
						DateCreated
						DateModified
					}
				}
			}
        `
	)
}