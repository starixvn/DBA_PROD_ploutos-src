import { BoolOpts } from '../../utils/CoreHelpers'

export const Bonus = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/bonus/bonuses/f/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
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
		'searchExpression': 'EQUALS',
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
		'field': 'BonusCode',
		'title': 'Bonus Code',
		'type': 'link',
		'link': '/bonus/bonuses/view/',
		'params': ['Id'],
		'searchExpression': 'CONTAINS',
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
		'field': 'BonusName',
		'title': 'Bonus Name',
		'searchExpression': 'CONTAINS',
		'varType': 'String!',
		'hidden': {
			'searchFieldSelection': false,
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
		'field': 'BonusDesc',
		'title': 'Bonus Description',
		'searchExpression': 'CONTAINS',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
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
		'field': 'VIPLevelId',
		'title': 'VIP Level',
		'searchType': 'select',
		'searchOptions': 'vIPLevelList',
		'searchOptionKey': 'VipLevelCode',
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
				'add': 'this.state.entity.BrandId === "" || this.state.entity.BrandId === null', //false,
				'edit': 'this.state.entity.BrandId === "" || this.state.entity.BrandId === null', //false
			}
		},
	},
	{
		'field': 'VipLevelCode',
		'title': 'VIP Level',
		'type': 'link',
		'link': '/setup/viplevel/view/',
		'params': ['VIPLevelId'],
		'searchType': 'select',
		'searchOptions': 'vIPLevelList',
		'searchOptionKey': 'VipLevelCode',
		'searchExpression': 'EQUALS',
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
		'field': 'CurrencyCode',
		'title': 'Currency',
		'type': 'link',
		'link': '/setup/currency/view/',
		'params': ['CurrencyId'],
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'searchExpression': 'EQUALS',
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
		'field': 'BonusType',
		'title': 'Bonus Type Code',
		'searchType': 'select',
		'searchOptions': 'BonusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'BonusTypeEnum',
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
	// 	'field': 'BonusTypeCode',
	// 	'title': 'Bonus Type Code',
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
	// 	'field': 'BonusTypeName',
	// 	'title': 'Bonus Name',
	// 	'searchExpression': 'CONTAINS',
	// 	'varType': 'String',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': true,
	// 		'list': true,
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
	{
		'field': 'BonusValueType',
		'title': 'Bonus Value Type',
		'searchType': 'select',
		'searchOptions': 'BonusValueTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'BonusValueTypeEnum!',
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
		'field': 'PercentAmount',
		'title': 'Percent Anount',
		'searchExpression': 'CONTAINS',
		'varType': 'Float!',
		'hidden': {
			'searchFieldSelection': false,
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
				'add': 'this.state.entity.BonusValueType === null || this.state.entity.BonusValueType === "Amoount"', //false,
				'edit': 'this.state.entity.BonusValueType === null || this.state.entity.BonusValueType === "Amount"', //false
			}
		},
	},
	{
		'field': 'BonusAmount',
		'title': 'Bonus Amount',
		'searchExpression': 'CONTAINS',
		'varType': 'Float!',
		'hidden': {
			'searchFieldSelection': false,
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
				'add': 'this.state.entity.BonusValueType === null || this.state.entity.BonusValueType === "Percentage"', //false,
				'edit': 'this.state.entity.BonusValueType === null || this.state.entity.BonusValueType === "Percentage"', //false
			}
		},
	},
	{
		'field': 'LimitAmount',
		'title': 'Limit Amount',
		'searchExpression': 'CONTAINS',
		'varType': 'Float!',
		'hidden': {
			'searchFieldSelection': false,
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
		'field': 'MinDepositAmount',
		'title': 'Min Deposit Amount',
		'searchExpression': 'CONTAINS',
		'varType': 'Float!',
		'hidden': {
			'searchFieldSelection': false,
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
		'field': 'MinDaysRegistered',
		'title': 'Min Days Registered',
		'searchExpression': 'EQUALS',
		'varType': 'Int!',
		'hidden': {
			'searchFieldSelection': false,
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
		'field': 'MaxNumberOfPlayer',
		'title': 'Max Players',
		'searchExpression': 'EQUALS',
		'varType': 'Int!',
		'hidden': {
			'searchFieldSelection': false,
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
		'field': 'ValidStartDate',
		'title': 'Valid Start Date',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
		'varType': 'DateTime!',
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
			'defaultValue': new Date(),
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ValidEndDate',
		'title': 'Valid End Date',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
		'varType': 'DateTime!',
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
			'defaultValue': new Date(),
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'WageringFactor',
		'title': 'Wagering Factor',
		'searchExpression': 'CONTAINS',
		'varType': 'Float!',
		'hidden': {
			'searchFieldSelection': false,
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
		'field': 'BonusFactorBasis',
		'title': 'Factor Basis',
		'searchType': 'select',
		'searchOptions': 'BonusFactorBasisTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'BonusFactorBasisTypeEnum!',
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
		'field': 'IsOneTimeUsed',
		'title': 'One Time Use?',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Yes', 'No'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'searchExpression': 'EQUALS',
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
			'defaultValue': false,
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'ShowToPlayer',
		'title': 'Show To Player?',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Yes', 'No'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'searchExpression': 'EQUALS',
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
			'defaultValue': false,
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'IsActiveBonus',
		'title': 'Is Active?',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Yes', 'No'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'searchExpression': 'EQUALS',
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
			'defaultValue': false,
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'NumberOfPlayersAvailed',
		'title': 'Players Availed',
		'searchExpression': 'EQUALS',
		'varType': 'Int',
		'hidden': {
			'searchFieldSelection': false,
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
	}
]

export const Rebate = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/rebates/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
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
		'searchExpression': 'EQUALS',
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
		'field': 'RebateCode',
		'title': 'Rebate Code',
		'type': 'link',
		'link': '/setup/rebates/view/',
		'params': ['Id'],
		'varType': 'String!',
		'searchExpression': 'CONTAINS',
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
		'field': 'RebateName',
		'title': 'Rebate Name',
		'varType': 'String!',
		'searchExpression': 'CONTAINS',
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
		'field': 'VipLevelId',
		'title': 'Vip Level',
		'searchType': 'select',
		'searchOptions': 'vIPLevelList',
		'searchOptionKey': 'VipLevelCode',
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
		'field': 'VipLevelCode',
		'title': 'VIP Level',
		'type': 'link',
		'link': '/setup/viplevel/view/',
		'params': ['VipLevelId'],
		'searchType': 'select',
		'searchOptions': 'vIPLevelList',
		'searchOptionKey': 'VipLevelCode',
		'searchExpression': 'EQUALS',
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
		'field': 'ProductId',
		'title': 'Rebate Product',
		'type': 'link',
		'link': '/setup/game/view/',
		'params': ['ProductId'],
		'shouldMap': true,
		'mapTo': 'gamePlatformProductList',
		'mapByField': 'GamePlatformProductName',
		'searchType': 'select',
		'searchOptions': 'gamePlatformProductList',
		'searchOptionKey': 'GamePlatformProductName',
		'searchExpression': 'EQUALS',
		'varType': 'ID!',
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
	// 	'field': 'ProductType',
	// 	'title': 'Product Type',
	// 	'varType': 'String',
	// 	'searchExpression': 'CONTAINS',
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

export const PlayerRebate = [
	{
		'field': 'Id',
		'title': 'ID',
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
		'searchExpression': 'EQUALS',
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
		'field': 'RebateTransactionNo',
		'title': 'Rebate Transaction No',
		'type': 'link',
		'link': '/bonus/player_rebate/view/',
		'params': ['Id'],
		'varType': 'String',
		'searchExpression': 'CONTAINS',
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
		'field': 'RebateDate',
		'title': 'Rebate Date',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
		'varType': 'DateTime',
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
		'field': 'BetDateProcessed',
		'title': 'Bet Date Processed',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
		'varType': 'DateTime',
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
		'field': 'UserName',
		'title': 'Username',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
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
		'field': 'TotalRebateAmount',
		'title': 'Total Rebate Amount',
		'type': 'currency',
		'varType': 'Float',
		'searchExpression': 'CONTAINS',
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
		'field': 'Remarks',
		'title': 'Remarks Wallet Adjustment Memo',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
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
		'field': 'PlayerProfileId',
		'title': 'Player Profile Id',
		'varType': 'ID',
		'searchExpression': 'CONTAINS',
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
		'field': 'RebateStatus',
		'title': 'Rebate Status',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
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
		'field': 'WalletAdjustmentMemoId',
		'title': 'Wallet Adjustment Memo ID',
		'varType': 'ID',
		'searchExpression': 'CONTAINS',
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

export const RebateDetail = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/setup/rebate_detail/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
	{
		'field': 'Id',
		'title': 'ID',
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
		'searchExpression': 'EQUALS',
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
		'field': 'RebateDetailName',
		'title': 'Rebate Detail',
		'type': 'link',
		'link': '/setup/rebate_detail/view/',
		'params': ['Id'],
		'varType': 'String!',
		'searchExpression': 'CONTAINS',
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
		'field': 'RebateId',
		'title': 'Rebate',
		'searchType': 'select',
		'searchOptions': 'rebateList',
		'searchOptionKey': 'RebateCode',
		'varType': 'ID!',
		'searchExpression': 'EQUALS',
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
		'field': 'RebateName',
		'title': 'Rebate',
		'searchType': 'select',
		'searchOptions': 'rebateList',
		'searchOptionKey': 'RebateCode',
		'varType': 'String!',
		'searchExpression': 'CONTAINS',
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
		'searchExpression': 'EQUALS',
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
		'varType': 'String!',
		'searchExpression': 'CONTAINS',
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
		'field': 'MinimumTotalBets',
		'title': 'Min Total Bets',
		'type': 'currency',
		'varType': 'Float!',
		'searchExpression': 'CONTAINS',
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
		'field': 'MaximumTotalBets',
		'title': 'Max Total Bets',
		'type': 'currency',
		'varType': 'Float!',
		'searchExpression': 'CONTAINS',
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
		'field': 'RebateFactor',
		'title': 'Rebate Factor',
		'varType': 'Float!',
		'searchExpression': 'CONTAINS',
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
		'field': 'MaximumRebateAmount',
		'title': 'Max Rebate Amount',
		'type': 'currency',
		'varType': 'Float!',
		'searchExpression': 'CONTAINS',
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

// export const CampaignLevel = [
// 	{
// 		'field': 'Id',
// 		'title': 'ID',
// 		'searchExpression': 'CONTAINS',
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
// 		'title': 'Status',
// 		'sortable': false,
// 		'type': 'boolean',
// 		'boolOptions': ['Active', 'Inactive'],
// 		'searchType': 'checkbox',
// 		'searchOptions': BoolOpts('active'),
// 		'searchExpression': 'EQUALS',
// 		'varType': 'Boolean',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {
// 				'search': false,
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
// 		'field': 'LevelCode',
// 		'title': 'Level Code',
// 		'type': 'link',
// 		'link': '/bonus/campaignlevel/view/',
// 		'params': ['Id'],
// 		'varType': 'String',
// 		'searchExpression': 'CONTAINS',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {
// 				'search': false,
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
// 		'field': 'LevelDescription',
// 		'title': 'Description',
// 		'varType': 'String',
// 		'searchExpression': 'CONTAINS',
// 		'hidden': {
// 			'searchFieldSelection': false,
// 			'tableColumnSelection': false,
// 			'list': false,
// 			'detail': false,
// 			'form': {
// 				'search': false,
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
// 		'field': 'CreatedById',
// 		'title': 'Created By',
// 		'varType': 'ID',
// 		'searchExpression': 'EQUALS',
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
// 		'showDefault': true,
// 		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
// 		'searchExpression': 'EQUALS',
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
// 		'showDefault': true,
// 		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
// 		'field': '',
// 		'title': 'Action',
// 		'sortable': false,
// 		'type': 'action',
// 		'actions': [
// 			{ 
// 				'title': 'Edit', 'link': '/bonus/campaignlevel/edit/', 'params': ['Id'] 
// 			}
// 		]
// 	}
// ]