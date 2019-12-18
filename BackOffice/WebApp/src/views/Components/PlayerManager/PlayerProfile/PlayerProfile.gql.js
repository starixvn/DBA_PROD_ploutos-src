import gql from 'graphql-tag'

import { GetAllFieldsToQuery, SelectFieldsToQuery, GetQueryMeta, SelectFieldsToMutate } from '../../../../utils/CoreHelpers'
import { PlayerProfile as tableHeaders } from '../../../../data/TableHeaders'

const component = 'PlayerProfile'
const sortBy = 'PlayerProfileSortingFields!'
const listSchemaKey = 'playerProfileList'
const detailSchemaKey = 'playerProfile'
const mutateSchemaKey = 'actionEditPlayerProfileMutation'

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

export function getProfiles() {
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

                ${getQueryTypes(queryTypes, '$AffiliateId: ID, $export: Boolean')}
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
                    },
                    sort: {  
                        field: $sortBy
                        order: $sortOrder 
                    }
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

export function getProfile() {
	const queryItems = String(GetAllFieldsToQuery(tableHeaders))

	return (
		gql`
            query QUERY_VIEW( $Id: ID! ){
                ${detailSchemaKey} ( Id:$Id ){            
                    ${queryItems}
                }
            }
        `
	)
}

export function mutateProfile() {
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
					PlayerAccountStatusTypeEnum
					PlayerTypeEnum
					GenderTypeEnum
					CountryTypeEnum
                } 
                vIPLevelList(
					${queryMeta}
                ){
					${pagingInfo}
                    items{
                        Id
						VipLevelName
						VipLevelCode
						BrandId
                    }
                }
                paymentRiskLevelList(
					${queryMeta}
                ){
					${pagingInfo}
                    items{
                        Id
						PaymentRiskLevelName
						PaymentRiskLevelCode
						BrandId
                    }
                }
                fraudRiskLevelList(
					${queryMeta}
                ){
					${pagingInfo}
                    items{
                        Id
						FraudRiskLevelName
						FraudRiskLevelCode
						BrandId
                    }
                }
                gameBetLimitLevelList(
					${queryMeta}
                ){
					${pagingInfo}
                    items{
                        Id
                        BetLimitLevelDesc
                    }
                }
				withdrawalLevelList(
					${queryMeta}
				){
					${pagingInfo}
					items {
						Id
						WithdrawalLevelCode
					}
				}
                brandList(
					${queryMeta}
                ){
					${pagingInfo}
                    items{
                        Id
						BrandCode
                    }
                }                  
                currencyList(
					${queryMeta}
                ){
					${pagingInfo}
                    items{
                        Id
						CurrencyCode
						CurrencyName
                    }
                }
                countryList(
					${queryMeta}
                ){
					${pagingInfo}
                    items{
                        Id
						CountryCode
						CountryName
                    }
                }
				languageList(
					${queryMeta}
				){
					${pagingInfo}
					items {
						Id
						LanguageCode
						LanguageName
					}
				}
            }
        `
	)
}


export function mutateVerifyProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM($Username: String!) {
                actionVerifyPlayerProfileMutation(Username: $Username) {
                    apiResult
                }
            }
        `
	)
}

export function mutateLockProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM($Username: String!) {
                actionLockPlayerProfileMutation(Username:$Username) {
                    apiResult
                }
            }
        `
	)
}

export function mutateUnlockProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM($Username: String!) {
                actionUnLockPlayerProfileMutation(Username:$Username) {
                    apiResult
                }
            }
        `
	)
}

export function mutateActivateProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM($Username: String!) {
                actionActivatePlayerProfileMutation(Username:$Username) {
                    apiResult
                }
            }
        `
	)
}

export function mutateDeactivateProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM($Username: String!) {
                actionDeactivatePlayerProfileMutation(Username:$Username) {
                    apiResult
                }
            }
        `
	)
}

export function mutateEnableProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM($Username: String!) {
                actionEnablePlayerProfileMutation(Username:$Username) {
                    apiResult
                }
            }
        `
	)
}

export function mutateArchiveProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM($Username: String!) {
                actionArchivePlayerProfileMutation(Username:$Username) {
                    apiResult
                }
            }
        `
	)
}

export function mutateResetCodeProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM($Username: String!) {
                actionResetCodePlayerProfileMutation(Username:$Username) {
                    apiResult
                }
            }
        `
	)
}

export function mutateResetPasswordProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM(
                $Username: String!, 
                $BrandCode: String!
            ){
                actionResetPasswordPlayerProfileMutation(
                    Username:$Username, 
                    BrandCode:$BrandCode
                ){
                    apiResult
                }
            }
        `
	)
}

export function mutateChangeTypeProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM(
                $Id: ID!, 
                $PlayerType: PlayerTypeEnum!
            ){
                actionChangeTypePlayerProfileMutation(
                    Id:$Id, 
                    PlayerType:$PlayerType
                ){
					Id
					PlayerType
                }
            }
        `
	)
}

export function mutateFRLevelProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM(
                $Id: ID!, 
                $FraudRiskLevelId: ID!
            ){
                actionFraudRiskLevelPlayerProfileMutation(
                    Id:$Id, 
                    FraudRiskLevelId:$FraudRiskLevelId
                ){
                    Id
                    FraudRiskLevelId
                }
            }
        `
	)
}

export function mutateBLLevelProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM(
                $Id: ID!, 
                $GameBetLimitLevelId: ID!
            ){
                actionBetLimitLevelPlayerProfileMutation(
                    Id:$Id, 
                    GameBetLimitLevelId:$GameBetLimitLevelId
                ){
                    Id
                    GameBetLimitLevelId
                }
            }
        `
	)
}

export function mutateVIPLevelProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM(
                $Id: ID!, 
                $VipLevelId: ID!
            ){
                actionChangeVipPlayerProfileMutation(
                    Id:$Id, 
                    VipLevelId:$VipLevelId
                ){
                    Id
                    VipLevelId
                }
            }
        `
	)
}

export function mutatePRLevelProfile() {
	return (
		gql`            
            mutation MUTATION_PROFILE_ITEM(
                $Id: ID!, 
                $PaymentRiskLevelId: ID!
            ){
                actionPaymentRiskLevelPlayerProfileMutation(
                    Id:$Id, 
                    PaymentRiskLevelId:$PaymentRiskLevelId
                ){
                    Id
                    PaymentRiskLevelId
                }
            }
        `
	)
}