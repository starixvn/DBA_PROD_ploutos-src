import { BoolOpts } from '../../utils/CoreHelpers'

//=============== 
// PLAYER SETUP
//===============
export const BetLimitLevel = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/betlimitlevel/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BetLimitLevelCode',
		'title': 'Bet Limit Code',
		'type': 'link',
		'link': '/setup/betlimitlevel/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BetLimitLevelDesc',
		'title': 'Bet Limit Level',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsDefault',
		'title': 'Is Default?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const BetLimitSetting = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/betlimitsetting/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,		
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BetLimitSettingCode',
		'title': 'Bet Limit Setting Code',
		'type': 'link',
		'link': '/setup/betlimitsetting/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BetLimitSettingDesc',
		'title': 'Bet Limit Setting',
		'varType': 'String!',		
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BetLimitLevelId',
		'title': 'Bet Limit Level',
		'type': 'link',
		'link': '/setup/betlimitlevel/view/',
		'params': ['BetLimitLevelId'],
		'searchType': 'select',
		'searchOptions': 'gameBetLimitLevelList',
		'searchOptionKey': 'BetLimitLevelDesc',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency',
		'iconShow': true,		
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'varType': 'String!',		
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'GamePlatformCode',
		'title': 'Game Platform',
		'searchType': 'select',
		'searchOptions': 'gamePlatformList',
		'searchOptionKey': 'GamePlatformCode',
		'varType': 'String!',		
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'GameType',
		'title': 'Game Type',
		'searchType': 'select',
		'searchOptions': 'GameClassIntTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'GameClassIntTypeEnum',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'GameType',
	// 	'title': 'Game Type',
	// 	'varType': 'String!',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'search': true,
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
	{
		'field': 'MinBet',
		'type': 'currency',
		'title': 'Min Bet Amount',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'MaxBet',
		'type': 'currency',
		'title': 'Max Bet Amount',
		'varType': 'Float',		
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const Brand = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/brand/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand Code',
		'type': 'link',
		'link': '/setup/brand/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandName',
		'title': 'Brand Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandGamePrefix',
		'title': 'Prefix',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'GameForwardEndpoint',
		'title': 'Game Forward Endpoint',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'DepositEndpoint',
		'title': 'Deposit Endpoint',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'WithdrawalEndpoint',
		'title': 'Withdrawal Endpoint',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsActive',
		'title': 'Is Active?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsAffiliateRequired',
		'title': 'Is Affiliate Required?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsAutoVerified',
		'title': 'Is Auto Verified?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'AuthorizationKey',
		'title': 'Authorization Key',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandUrl',
		'title': 'URL',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const Country = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/country/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CountryCode',
		'title': 'Country Code',
		'type': 'link',
		'link': '/setup/country/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,	
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CountryName',
		'title': 'Country Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,	
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CountryCallCode',
		'title': 'Call Code',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,	
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const Currency = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/currency/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency Code',
		'type': 'link',
		'link': '/setup/currency/view/',
		'params': ['CurrencyCode'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyName',
		'title': 'Currency Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		}, 
	},
	{
		'field': 'BrandId',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		}, 
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'type': 'link',
		'link': '/setup/brand/view/',
		'params': ['BrandId'],
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsForWebsite',
		'title': 'For Website?',
		'type': 'boolean',
		'boolOptions': ['Yes', 'No'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		}, 
	},
	{
		'field': 'CampaignId',
		'title': 'Campaign ID',
		'varType': 'ID',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		}, 
	},
]

export const Platform = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/platform/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		}
	},
	{
		'field': 'GamePlatformCode',
		'title': 'Game Platform Code',
		'type': 'link',
		'link': '/setup/platform/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'GamePlatformName',
		'title': 'Game Platform Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'SequenceNo',
		'title': 'Sequence',
		'varType': 'Int',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ServiceProviderCode',
		'title': 'Game Provider',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyId',
		'title': 'Base Currency',
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyCode',
		'title': 'Base Currency',
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyName',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'LanguageId',
		'title': 'Base Language',
		'searchType': 'select',
		'searchOptions': 'languageList',
		'searchOptionKey': 'LanguageName',
		'varType': 'ID!',		
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'LanguageName',
		'title': 'Base Language',
		'searchType': 'select',
		'searchOptions': 'languageList',
		'searchOptionKey': 'LanguageName',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const Games = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/game/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'GamePlatformProductCode',
		'title': 'Game Code',
		'type': 'link',
		'link': '/setup/game/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'GamePlatformProductName',
		'title': 'Game Name',
		// 'sortable': true,
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'GamePlatformId',
		'title': 'Game Platform',
		'type': 'link',
		'link': '/setup/platform/view/',
		'params': ['GamePlatformId'],
		'searchType': 'select',
		'searchOptions': 'gamePlatformList',
		'searchOptionKey': 'GamePlatformCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'GameType',
		'title': 'Game Type',
		'searchType': 'select',
		'searchOptions': 'GameClassTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'GameClassTypeEnum',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'ProductType',
	// 	'title': 'Product Type',
	// 	'varType': 'String',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'search': true,
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
	{
		'field': 'SequenceNo',
		'title': 'Sequence No',
		'varType': 'Int',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'GameLogCode',
		'title': 'Game Log Code',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'LaunchGameName',
		'title': 'Launch Game Name',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'RebateId',
	// 	'title': 'Rebate',
	// 	'searchType': 'select',
	// 	'searchOptions': 'rebateList',
	// 	'searchOptionKey': 'RebateCode',
	// 	'varType': 'ID!',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'search': true,
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
	{
		'field': 'Base64Image',
		'title': 'Base 64 Image',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'Version',
		'title': 'Version',
		'varType': 'String',		
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ImageUrl',
		'title': 'ImageUrl',
		'varType': 'String',		
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ImageFileName',
		'title': 'ImageFileName',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,			
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'GameType1',
		'title': 'GameType1',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const MarketBrand = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/market/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandMarketCode',
		'title': 'Code',
		'type': 'link',
		'link': '/setup/market/view/',
		'params': ['Id'],
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'type': 'link',
		'link': '/setup/brand/view/',
		'params': ['BrandId'],
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CountryId',
		'title': 'Country',
		'searchType': 'select',
		'searchOptions': 'countryList',
		'searchOptionKey': 'CountryName',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CountryName',
		'title': 'Country',
		'type': 'link',
		'link': '/setup/country/view/',
		'params': ['CountryId'],
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyId',
		'title': 'Currency',
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'varType': 'ID!',
		'isRequired': true,		
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency',
		'type': 'link',
		'link': '/setup/currency/view/',
		'params': ['CurrencyId'],
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsDefault',
		'title': 'Is Default?',
		'type': 'boolean',
		'boolOptions': ['Yes', 'No'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsEnabled',
		'title': 'Is Enabled?',
		'type': 'boolean',
		'boolOptions': ['Yes', 'No'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const Notification = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/notification/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'NotificationName',
		'title': 'Name',
		'type': 'link',
		'link': '/setup/notification/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'NotificationDescription',
		'title': 'Description',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'Title',
		'title': 'Title',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'NotificationType',
		'title': 'Type',
		'searchType': 'select',
		'searchOptions': 'NotificationTypeEnum',
		'varType': 'NotificationTypeEnum!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsAllProducts',
		'title': 'All Products',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsSports',
		'title': 'Sports',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsCasino',
		'title': 'Casino',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsGames',
		'title': 'Games',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsMobile',
		'title': 'Mobile',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsPromo',
		'title': 'Promo',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const SecurityQuestion = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/question/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'SecurityQuestionDesc',
		'title': 'Security Question',
		'type': 'link',
		'link': '/setup/question/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'Chinese_Description',
		'title': 'Chinese',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'Indonesian_Description',
		'title': 'Indonesian',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'Thai_Description',
		'title': 'Thai',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'Japanese_Description',
		'title': 'Japanese',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'Korean_Description',
		'title': 'Korean',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const States = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/states/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'StateProvinceCode',
		'title': 'State / Province Code',
		'type': 'link',
		'link': '/setup/states/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'StateProvinceName',
		'title': 'State / Province Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CountryId',
		'title': 'Country',
		'type': 'link',
		'link': '/setup/country/view/',
		'params': ['CountryId'],
		'searchType': 'select',
		'searchOptions': 'countryList',
		'searchOptionKey': 'CountryName',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CountryCode',
		'title': 'Country Code',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CountryName',
		'title': 'Country',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const SupportedCurrency = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/supportedcurrency/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PlatformSupportedCurrency',
		'title': 'Supported Currency',
		'type': 'link',
		'sortable': false,
		'link': '/setup/supportedcurrency/view/',
		'params': ['Id'],
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyId',
		'title': 'Currency',
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency',
		'type': 'link',
		'link': '/setup/currency/view/',
		'params': ['CurrencyId'],
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'GamePlatformId',
		'title': 'Game Platform',
		'searchType': 'select',
		'searchOptions': 'gamePlatformList',
		'searchOptionKey': 'GamePlatformName',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'GamePlatformCode',
		'title': 'Game Platform',
		'type': 'link',
		'link': '/setup/platform/view/',
		'params': ['GamePlatformId'],
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}]

export const VipLevel = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/viplevel/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'VipLevelCode',
		'title': 'VIP Level Code',
		'varType': 'String!',
		'type': 'link',
		'link': '/setup/viplevel/view/',
		'params': ['Id'],
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'VipLevelName',
		'title': 'VIP Level Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'MinDeposit',
		'type': 'currency',
		'title': 'Min Deposit',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'MaxDeposit',
		'type': 'currency',
		'title': 'Max Deposit',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'MaxAggDeposit',
		'type': 'currency',
		'title': 'Max Aggregated Deposit',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsDefault',
		'title': 'Is Default?',
		'type': 'boolean',
		'boolOptions': ['Yes', 'No'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'type': 'link',
		'link': '/setup/brand/view/',
		'params': ['BrandId'],
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'searchExpression': 'EQUALS',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'BrandId',
	// 	'title': 'Currency',
	// 	'searchType': 'select',
	// 	'searchOptions': 'brandList',
	// 	'searchOptionKey': 'BrandCode',
	// 	'varType': 'ID!',
	// 	'isRequired': true,
	// 	'hidden': {
	// 		'searchFieldSelection': true,
	// 		'tableColumnSelection': true,
	// 		'list': true,
	// 		'detail': true,
	// 		'form': {
	// 			'search': true,
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
	{
		'field': 'FraudCheck',
		'type': 'currency',
		'title': 'Fraud Check',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'MinWithdrawal',
		'title': 'Min Withdrawal',
		'type': 'currency',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'MaxWithdrawal',
		'title': 'Max Withdrawal',
		'type': 'currency',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'MaxAggWithdrawal',
		'type': 'currency',
		'title': 'Max Aggregated Withdrawal',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const Credential = [
	{
		'field': '',
		'title': 'Action',
		'sortable': false,
		'type': 'action',
		'actions': [
			{ 'title': 'Edit', 'link': '/setup/credential/edit/', 'params': ['Id'] }
		]
	},
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Game Platform Brand Code',
		'type': 'link',
		'link': '/setup/credential/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'GamePlatformCode',
		'title': 'Game Platform',
		'searchType': 'select',
		'searchOptions': 'gamePlatformList',
		'searchOptionKey': 'GamePlatformCode',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ClientId',
		'title': 'Client ID',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ClientSecret',
		'title': 'Client Secret Key',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'OAuthBaseUrl',
		'title': 'OAuth Address',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const PlayerNoteType = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/playernotetypesetup/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{		
		'field': 'PlayerNoteTypeCode',
		'title': 'Player Note Type Code',
		'varType': 'String!',
		'type': 'link',
		'link': '/setup/playernotetypesetup/view/',
		'params': ['Id'],
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{		
		'field': 'PlayerNoteTypeName',
		'title': 'Player Note Type Name',
		'varType': 'String!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{		
		'field': 'PlayerNoteCategoryId',
		'title': 'Player Note Category',
		'searchType': 'select',
		'searchOptions': 'playerNoteCategoryList',
		'searchOptionKey': 'PlayerNoteCategoryName',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{	
		'field': 'PlayerNoteCategoryName',
		'title': 'Player Note Category',
		'searchType': 'select',
		'searchOptions': 'playerNoteCategoryList',
		'searchOptionKey': 'PlayerNoteCategoryName',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const PlayerNoteCategory = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/playernotecategory/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{		
		'field': 'PlayerNoteCategoryCode',
		'title': 'Player Note Category Code',
		'varType': 'String!',
		'type': 'link',
		'link': '/setup/playernotecategory/view/',
		'params': ['Id'],
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{		
		'field': 'PlayerNoteCategoryName',
		'title': 'Player Note Category Name',
		'varType': 'String!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{		
		'field': 'TeamId',
		'title': 'Team',
		'searchType': 'select',
		'searchOptions': 'teamsList',
		'searchOptionKey': 'TeamCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{	
		'field': 'TeamName',
		'title': 'Team Name',
		'searchType': 'select',
		'searchOptions': 'teamsList',
		'searchOptionKey': 'TeamCode',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const EmailNotification = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/setup/email_notification/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'EmailTemplateCode',
		'title': 'Email Template Code',
		'type': 'link',
		'link': '/setup/email_notification/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'EmailNotificationType',
		'title': 'Email Notification Type',
		'searchType': 'select',
		'searchOptions': 'BrandMarketEmailNotificationTypeEnum',
		'varType': 'BrandMarketEmailNotificationTypeEnum!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand Code',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency Code',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyName',
		'title': 'Currency',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CountryCode',
		'title': 'Country Code',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CountryName',
		'title': 'Country',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandMarketId',
		'title': 'Brand Market',
		'searchType': 'select',
		'searchOptions': 'brandMarketList',
		'searchOptionKey': 'BrandMarketCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const Language = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/language/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},	
	{
		'field': 'LanguageCode',
		'title': 'Language Code',
		'type': 'link',
		'link': '/setup/language/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},	
	{
		'field': 'LanguageName',
		'title': 'Language Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]


//=============== 
// TICKET SETUP
//===============
export const TicketCategory = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/setup/ticket_category/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'TicketCategoryCode',
		'title': 'Category Code',
		'type': 'link',
		'link': '/setup/ticket_category/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'TicketCategoryName',
		'title': 'Category Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'TicketCategoryDesc',
		'title': 'Category Description',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'Brand',
		'title': 'Brand',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const Team = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/setup/team/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'TeamCode',
		'title': 'Team Code',
		'type': 'link',
		'link': '/setup/team/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'TeamName',
		'title': 'Team Name',
		'varType': 'String!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]


//=============== 
// AFFILIATE SETUP
//===============
export const EarningPlan = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/earningplan/edit/',
	// 		'params': ['Id']
	// 	}, ]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'EarningPlanCode',
		'title': 'Plan Code',
		'type': 'link',
		'link': '/setup/earningplan/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'EarningPlanName',
		'title': 'Plan Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'EarningPlanDesc',
		'title': 'Plan Description',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyId',
		'title': 'Currency',
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency',
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'WhichEverisHigher',
	// 	'title': 'Which Ever is Higher',
	// 	'sortable': false,
	// 	'type': 'boolean',
	// 	'boolOptions': ['True', 'False'],
	// 	'searchType': 'checkbox',
	// 	'searchOptions': BoolOpts('yes'),
	// 	'varType': 'Boolean',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'search': true,
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
	{
		'field': 'MinActivePlayer',
		'title': 'Minimum Active Player',
		'varType': 'Int!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'MinimumNGR',
		'title': 'Minimum NGR',
		'type': 'currency',
		'varType': 'Float!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'RevenueShare',
		'title': 'Revenue Share',
		'type': 'currency',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'FixedCommisionAmount',
		'title': 'Fixed Commission',
		'type': 'currency',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsActive',
		'title': 'Is Active?',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'IsTakeHigher',
	// 	'title': 'Is Take Higher?',
	// 	'sortable': false,
	// 	'type': 'boolean',
	// 	'boolOptions': ['True', 'False'],
	// 	'searchType': 'checkbox',
	// 	'searchOptions': BoolOpts('yes'),
	// 	'varType': 'Boolean',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'search': true,
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
]

export const IMPlatform = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/implatform/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{		
		'field': 'IMPlatformCode',
		'title': 'Platform Code',
		'varType': 'String!',
		'type': 'link',
		'link': '/setup/implatform/view/',
		'params': ['Id'],
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IMPlatformName',
		'title': 'Platform Name',
		'varType': 'String!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'searchExpression': 'CONTAINS',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'type': 'link',
		'link': '/setup/brand/view/',
		'params': ['BrandId'],
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'searchExpression': 'EQUALS',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const BannedWord = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/bannedword/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{		
		'field': 'BandWordDesc',
		'title': 'Banned Word',
		'type': 'link',
		'link': '/setup/bannedword/view/',
		'params': ['Id'],
		'varType': 'String!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]


//=============== 
// PAYMENT SETUP
//===============
export const Bank = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/setup/bank/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BankCode',
		'title': 'Bank Code',
		'type': 'link',
		'link': '/setup/bank/view/', 
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BankName',
		'title': 'Bank Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BankTransactionType',
		'title': 'Bank Transaction Type',
		'searchType': 'select',
		'searchOptions': 'BankTransactionTypeEnum',
		'varType': 'BankTransactionTypeEnum!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyId',
		'title': 'Currency',
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency',
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'IsOnlineBank',
	// 	'title': 'Is Online?',
	// 	'type': 'boolean',
	// 	'boolOptions': ['True', 'False'],
	// 	'searchType': 'checkbox',
	// 	'searchOptions': BoolOpts('yes'),
	// 	'varType': 'Boolean',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'search': true,
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
]

export const BankAccount = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/setup/bank_accounts/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BankCode',
		'title': 'Bank Account Code',
		'type': 'link',
		'link': '/setup/bank_accounts/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'AccountName',
		'title': 'Bank Account Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'AccountNo',
		'title': 'Bank Account No',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'AccountType',
		'title': 'Bank Account Type',
		'searchType': 'select',
		'searchOptions': 'BankAccountTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'BankAccountTypeEnum!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'AccountType',
	// 	'title': 'Bank Account Type',
	// 	'varType': 'String!',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'search': true,
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
	{
		'field': 'BankId',
		'title': 'Bank',
		'searchType': 'select',
		'searchOptions': 'bankList',
		'searchOptionKey': 'BankName',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BankName',
		'title': 'Bank Name',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyId',
		'title': 'Currency',
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency',
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentMethodIds',
		'title': 'Payment Methods',
		'searchType': 'select',
		'searchMulti': true,
		'searchOptions': 'paymentMethodList',
		'searchOptionKey': 'RecordName',
		'varType': 'Serialized!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'PaymentMethodName',
	// 	'title': 'PaymentMethodName',
	// 	'varType': 'String',
	// 	'hidden': {
	// 		'search': true,
	// 		'list': true,
	// 		'detail': false,
	// 		'form': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	}
	// },
	{
		'field': 'BalanceCeiling',
		'title': 'Balance Ceiling',
		'varType': 'Float!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': false,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'InternetBankingUrl',
		'title': 'Internet Banking URL',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'IsOnlineBank',
	// 	'title': 'Is Online?',
	// 	'type': 'boolean',
	// 	'boolOptions': ['True', 'False'],
	// 	'searchType': 'checkbox',
	// 	'searchOptions': BoolOpts('yes'),
	// 	'varType': 'Boolean',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'search': true,
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
	// {
	// 	'field': 'IsDefault',
	// 	'title': 'Is Default?',
	// 	'type': 'boolean',
	// 	'boolOptions': ['True', 'False'],
	// 	'searchType': 'checkbox',
	// 	'searchOptions': BoolOpts('yes'),
	// 	'varType': 'Boolean',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': true,
	// 		'detail': true,
	// 		'form': {
	// 			'search': true,
	// 			'add': true,
	// 			'edit': true
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
]

export const PaymentMethod = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/setup/payment_method/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentMethodCode',
		'title': 'Payment Method Code',
		'type': 'link',
		'link': '/setup/payment_method/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentMethodName',
		'title': 'Payment Method Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentMethodDesc',
		'title': 'Description',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'searchExpression': 'EQUALS',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'searchExpression': 'EQUALS',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CountryIds',
		'title': 'Countries',
		'searchType': 'select',
		'searchMulti': true,
		'searchOptions': 'countryList',
		'searchOptionKey': 'CountryName',
		'varType': 'Serialized!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency',
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyId',
		'title': 'Currency',
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentRiskLevelId',
		'title': 'Payment Risk Level',
		'searchType': 'select',
		'searchOptions': 'paymentRiskLevelList',
		'searchOptionKey': 'PaymentRiskLevelName',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentRiskLevelName',
		'title': 'Payment Risk Level',
		'searchType': 'select',
		'searchOptions': 'paymentRiskLevelList',
		'searchOptionKey': 'PaymentRiskLevelName',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'UniqueDepositAmountRuleId',
		'title': 'UDA Rule',
		'searchType': 'select',
		'searchOptions': 'uniqueDepositAmountRuleList',
		'searchOptionKey': 'RuleName',
		'varType': 'ID',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': 0,
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'RuleName',
		'title': 'UDA Rule',
		'searchType': 'select',
		'searchOptions': 'uniqueDepositAmountRuleList',
		'searchOptionKey': 'RuleName',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'IsOnlinePayment',
	// 	'title': 'Is Online?',
	// 	'type': 'boolean',
	// 	'boolOptions': ['True', 'False'],
	// 	'searchType': 'checkbox',
	// 	'searchOptions': BoolOpts('yes'),
	// 	'varType': 'Boolean',
	// 	'hidden': {
	// 		'searchFieldSelection': true,
	// 		'tableColumnSelection': true,
	// 		'list': true,
	// 		'detail': false,
	// 		'form': {
	// 			'search': true,
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
]

export const BankAccountPaymentMethod = [
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BankAccountId',
		'title': 'Bank Account',
		'varType': 'ID',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentMethodId',
		'title': 'Payment Method',
		'varType': 'ID',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentMethodCode',
		'title': 'Payment Method Code',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentMethodName',
		'title': 'Payment Method Name',
		'type': 'link',
		'link': '/setup/payment_method/view/',
		'params': ['PaymentMethodId'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentRiskLevelId',
		'title': 'Payment Risk Level',
		'searchType': 'select',
		'searchOptions': 'paymentRiskLevelList',
		'searchOptionKey': 'PaymentRiskLevelName',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentRiskLevelCode',
		'title': 'Payment Risk Level Code',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentRiskLevelName',
		'title': 'Payment Risk Level Name',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const PaymentRiskLevel = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/setup/payment_risk_level/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentRiskLevelCode',
		'title': 'Payment Risk Level Code',
		'type': 'link',
		'link': '/setup/payment_risk_level/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentRiskLevelName',
		'title': 'Payment Risk Level Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'SequenceNo',
		'title': 'Sequence No',
		'varType': 'Int',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsDefault',
		'title': 'Is Default?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const WithdrawalLevel = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/setup/withdrawal_level/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'WithdrawalLevelCode',
		'title': 'Withdrawal Level Code',
		'type': 'link',
		'link': '/setup/withdrawal_level/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'WithdrawalLevelName',
		'title': 'Withdrawal Level Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsDefault',
		'title': 'Is Default?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const PaymentGatewayBank = [
	{
		'field': '',
		'title': 'Action',
		'sortable': false,
		'type': 'action',
		'actions': [
			{ 'title': 'Edit', 'link': '/setup/online_payment_bank/edit/', 'params': ['Id'] }
		]
	},
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BankCode',
		'title': 'Payment Gateway Bank Code',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BankName',
		'title': 'Payment Gateway Bank Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BankNameEn',
		'title': 'Payment Gateway Bank Name (English)',
		'type': 'link',
		'link': '/setup/online_payment_bank/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BankAbb',
		'title': 'Payment Gateway Bank Name (Abbr)',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentGateway',
		'title': 'Payment Gateway Code',
		'varType': 'Int',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BankTransactionType',
		'title': 'Transaction Type',
		'varType': 'Int',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'DepositMode',
		'title': 'Deposit Mode',
		'varType': 'Int',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'WebSequence',
		'title': 'Web Sequence No.',
		'varType': 'Int',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsOnline',
		'title': 'Is Online?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const UniqueDepositAmountRule = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/setup/unique_deposit_amount_rule/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'RuleCode',
		'title': 'UDA Rule Code',
		'type': 'link',
		'link': '/setup/unique_deposit_amount_rule/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'RuleName',
		'title': 'UDA Rule Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'StartValue',
		'title': 'Start Value',
		'varType': 'Float!',
		'decimalPlace': 2,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'EndValue',
		'title': 'End Value',
		'varType': 'Float!',
		'decimalPlace': 2,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IncrementValue',
		'title': 'Increment Value',
		'varType': 'Float!',
		'decimalPlace': 2,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const OnlineBank = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/setup/online_bank/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'OnlineBankCode',
		'title': 'Online Bank Code',
		'type': 'link',
		'link': '/setup/online_bank/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'OnlineBankName',
		'title': 'Online Bank Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'searchExpression': 'EQUALS',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'type': 'link',
		'link': '/setup/brand/view/',
		'params': ['BrandId'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'OnlineBankTypeId',
		'title': 'Online Bank Type',
		'searchType': 'select',
		'searchOptions': 'onlineBankTypeList',
		'searchOptionKey': 'OnlineBankTypeName',
		'searchExpression': 'EQUALS',
		'isRequired': true,
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'OnlineBankTypeName',
		'title': 'Online Bank Type',
		'type': 'link',
		'link': '/setup/online_bank_type/view/',
		'params': ['OnlineBankTypeId'],
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'TransactionType',
	// 	'title': 'Transaction Type',
	// 	'varType': 'Int!',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'search': true,
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
	{
		'field': 'TransactionType',
		'title': 'Transaction Type',
		'searchType': 'select',
		'searchOptions': 'BankTransactionTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'BankTransactionTypeEnum',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'Sequence',
		'title': 'Sequence',
		'searchType': 'number',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'Active',
		'title': 'Is Active?',
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const OnlineBankType = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/setup/online_bank_type/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'OnlineBankTypeCode',
		'title': 'Online Bank Type Code',
		'type': 'link',
		'link': '/setup/online_bank_type/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'OnlineBankTypeName',
		'title': 'Online Bank Type Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'Description',
		'title': 'Description',
		'searchType': 'textarea',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'searchExpression': 'EQUALS',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'type': 'link',
		'link': '/setup/brand/view/',
		'params': ['BrandId'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'Active',
	// 	'title': 'Is Active?',
	// 	'type': 'boolean',
	// 	'boolOptions': ['Active', 'Inactive'],
	// 	'searchType': 'checkbox',
	// 	'searchOptions': BoolOpts('active'),
	// 	'varType': 'Boolean',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'search': true,
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
]

export const OnlineBankSupportedCurrency = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/setup/online_bank_currency/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'OnlineBankId',
		'title': 'Online Bank',
		'searchType': 'select',
		'searchOptions': 'onlineBankList',
		'searchOptionKey': 'OnlineBankName',
		'searchExpression': 'EQUALS',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'OnlineBankName',
		'title': 'Online Bank Name',
		'type': 'link',
		'link': '/setup/online_bank/view/',
		'params': ['OnlineBankId'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyId',
		'title': 'Currency',
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'searchExpression': 'EQUALS',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency',
		'type': 'link',
		'link': '/setup/currency/view/',
		'params': ['CurrencyId'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

export const FraudRiskLevel = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/setup/fraud_risk_level/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'FraudRiskLevelCode',
		'title': 'Fraud Risk Level Code',
		'type': 'link',
		'link': '/setup/fraud_risk_level/view/', 
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'FraudRiskLevelName',
		'title': 'Fraud Risk Level Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsDefault',
		'title': 'Is Default?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]


//=============== 
// EMAIL SETUP
//===============
export const EmailService = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{			
	// 		'title': 'Edit',
	// 		'link': '/setup/email_template/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'TemplateCode',
		'title': 'Template Code',
		'type': 'link',
		'link': '/setup/email_template/view/',
		'params': ['Id'],
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'TemplateName',
		'title': 'Template Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'Subject',
		'title': 'Subject',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'MsgBody',
		'title': 'Message Body',
		'searchType': 'textarea',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'FromEmail',
		'title': 'From Email',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'JsonBody',
		'title': 'json Body',
		'searchType': 'textarea',
		'showDefault': false,
		'showFormDefault': true,
		'searchDefault': false,
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'FromEmail',
	// 	'title': 'From Email',
	// 	'varType': 'String!',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'search': false,
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
	{
		'field': 'FromName',
		'title': 'From Name',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'Language',
		'title': 'Language',
		'searchType': 'select',
		'searchOptions': 'languageList',
		'searchOptionKey': 'LanguageCode',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	// {
	// 	'field': 'BrandCode',
	// 	'title': 'Brand',
	// 	'type': 'link',
	// 	'link': '/setup/brand/view/',
	// 	'params': ['BrandId'],
	// 	'searchType': 'select',
	// 	'searchOptions': 'brandList',
	// 	'searchOptionKey': 'BrandCode',
	// 	'varType': 'String',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'search': true,
	// 			'add': true,
	// 			'edit': true
	// 		}
	// 	},
	// 	'form': {
	// 		'defaultValue': '',
	// 		'readOnly': {
	// 			'add': false,
	// 			'edit': false
	// 		}
	// 	},
	// },
	// {
	// 	'field': 'Header',
	// 	'title': 'Header',
	// 	'showDefault': true,
	// 	'showFormDefault': true,
	// 	'searchDefault': true,
	// 	'varType': 'String!',
	// 	'hidden': {
	// 		'search': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'add': true,
	// 			'edit': true
	// 		}
	// 	}
	// },
	// {
	// 	'field': 'Footer',
	// 	'title': 'Footer',
	// 	'showDefault': true,
	// 	'showFormDefault': true,
	// 	'searchDefault': true,
	// 	'varType': 'String!',
	// 	'hidden': {
	// 		'search': false,
	// 		'list': false,
	// 		'detail': false,
	// 		'form': {
	// 			'add': true,
	// 			'edit': true
	// 		}
	// 	}
	// },
]

export const PaymentGateway = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{			
	// 		'title': 'Edit',
	// 		'link': '/setup/payment_gateway/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,	
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsActive',
		'title': 'Is Active?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': false,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentGatewayCode',
		'title': 'Payment Gateway Code',
		'type': 'link',
		'link': '/setup/payment_gateway/view/',
		'params': ['Id'],
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentGatewayName',
		'title': 'Payment Gateway Name',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'PaymentGatewayDesc',
		'title': 'Payment Gateway Description',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'Brand',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'ID!',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'type': 'link',
		'link': '/setup/brand/view/',
		'params': ['BrandId'],
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'BrandName',
		'title': 'Brand Name',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
				'edit': true
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	}
]

// export const UniqueDepositAmount = [
// 	{
// 		'field': 'Id',
// 		'title': 'ID',
// 		'varType': 'ID!',
// 		'isRequired': true,
// 		'hidden': {
// 			'searchFieldSelection': true,
// 			'tableColumnSelection': true,
// 			'list': true,
// 			'detail': true,	
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'ActiveRecord',
// 		'title': 'Record Status',
// 		'sortable': false,
// 		'type': 'boolean',
// 		'boolOptions': ['Active', 'Inactive'],
// 		'varType': 'Boolean',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': true,
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'WalletId',
// 		'title': 'Wallet ID',
// 		'varType': 'ID',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'UniqueDepositAmountRuleId',
// 		'title': 'Unique Deposit Amount Rule',
// 		'varType': 'ID',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'WalletDepositId',
// 		'title': 'Wallet Deposit ID',
// 		'varType': 'ID',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'DepositAmount',
// 		'title': 'Deposit Amount',
// 		'type': 'currency',
// 		'varType': 'Float',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'UDARuleValue',
// 		'type': 'currency',
// 		'title': 'UDA Rule Value',
// 		'varType': 'Float',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'GeneratedUDA',
// 		'type': 'currency',
// 		'title': 'Generated UDA',
// 		'varType': 'Float',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'DateGenerated',
// 		'title': 'Date Generated',
// 		'varType': 'DateTime',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'ValidityDate',
// 		'title': 'Validity Date',
// 		'varType': 'DateTime',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'InUse',
// 		'title': 'In Use?',
// 		'type': 'boolean',
// 		'boolOptions': ['True', 'False'],
// 		'varType': 'Boolean',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {
// 				'search': true,
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'IsReserved',
// 		'title': 'Is Reserved?',
// 		'type': 'boolean',
// 		'boolOptions': ['True', 'False'],
// 		'varType': 'Boolean',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {
// 				'search': true,
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'UpdateTag',
// 		'title': 'Update Tag',
// 		'varType': 'String',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {Withdrawal
// 				'searWithdrawal
// 				'add'Withdrawal
// 				'editWithdrawal
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'CreatedById',
// 		'title': 'Created By',
// 		'varType': 'ID',
// 		'hidden': {
// 			'searchFieldSelection': true,
// 			'tableColumnSelection': true,
// 			'list': true,
// 			'detail': true,
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'DateCreated',
// 		'title': 'Date Created',
// 		'varType': 'DateTime',
// 		'hidden': {
// 			'searchFieldSelection': true,
// 			'tableColumnSelection': true,
// 			'list': true,
// 			'detail': true,
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'ModifiedById',
// 		'title': 'Modified By',
// 		'varType': 'ID',
// 		'hidden': {
// 			'searchFieldSelection': true,
// 			'tableColumnSelection': true,
// 			'list': false,
// 			'detail': true,
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	},
// 	{
// 		'field': 'DateModified',
// 		'title': 'Date Modified',
// 		'varType': 'DateTime',
// 		'hidden': {
// 			'searchFieldSelection': true,
// 			'tableColumnSelection': true,
// 			'list': false,
// 			'detail': true,
// 			'form': {
// 				'search': true,
// 				'add': true,
// 				'edit': true
// 			}
// 		},
// 		'form': {
// 			'defaultValue': '',
// 			'readOnly': {
// 				'add': false,
// 				'edit': false
// 			}
// 		},
// 	}
// ]
