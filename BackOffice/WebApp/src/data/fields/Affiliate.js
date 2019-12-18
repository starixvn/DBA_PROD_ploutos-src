import { BoolOpts } from '../../utils/CoreHelpers'

export const Affiliate = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/affiliate_manager/affiliate/f/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
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
		'varType': 'ID',
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
		'field': 'AffiliateCode',
		'title': 'Affiliate Code',
		'type': 'link',
		'link': '/affiliate_manager/affiliate/view/',
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
		'field': 'AffiliateType',
		'title': 'Affiliate Type',
		'searchType': 'select',
		'searchOptions': 'AffiliateTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'AffiliateTypeEnum',
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
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'AffiliateStatus',
		'title': 'Affiliate Status',
		'searchType': 'select',
		'searchOptions': 'AffiliateStatusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'AffiliateStatusTypeEnum!',
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
		'title': 'Affiliate Username',
		'searchExpression': 'CONTAINS',
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
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'AffiliateName',
		'title': 'Affiliate Full Name',
		'searchExpression': 'CONTAINS',
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
		'field': 'FullName',
		'title': 'Full Name',
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
	// 	'field': 'EarningPlanId',
	// 	'title': 'Earning Plan',
	// 	'shouldMap': true,
	// 	'mapTo': 'affiliateEarningPlanList',
	// 	'mapByField': 'EarningPlanName',
	// 	'searchType': 'select',
	// 	'searchOptions': 'affiliateEarningPlanList',
	// 	'searchOptionKey': 'EarningPlanName',
	// 	'searchExpression': 'EQUALS',
	// 	'varType': 'ID!',
	// 	'hidden': {
	// 		'searchFieldSelection': true,
	// 		'tableColumnSelection': true,
	// 		'list': false,
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
	// {
	// 	'field': 'EarningPlanName',
	// 	'title': 'Earning Plan',
	// 	'shouldMap': true,
	// 	'mapTo': 'affiliateEarningPlanList',
	// 	'mapByField': 'EarningPlanName',
	// 	'searchType': 'select',
	// 	'searchOptions': 'affiliateEarningPlanList',
	// 	'searchOptionKey': 'EarningPlanName',
	// 	'searchExpression': 'EQUALS',
	// 	'varType': 'String',
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
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
		'field': 'BrandCode',
		'title': 'Brand',
		'searchExpression': 'CONTAINS',
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
		'field': 'CurrencyCode',
		'title': 'Currency',
		'searchExpression': 'CONTAINS',
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
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'CountryCode',
		'title': 'Country',
		'searchExpression': 'CONTAINS',
		'searchType': 'select',
		'searchOptions': 'countryList',
		'searchOptionKey': 'CountryName',
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
		'field': 'PhoneCountryCodeNo',
		'title': 'Phone Country Code No',
		'searchExpression': 'CONTAINS',
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
		'field': 'PhoneNo',
		'title': 'Phone',
		'searchExpression': 'CONTAINS',
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
		'field': 'PrimaryEmail',
		'title': 'Primary Email',
		'searchExpression': 'CONTAINS',
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
		'field': 'SecondaryEmail',
		'title': 'Secondary Email',
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
		'field': 'WebsiteURL',
		'title': 'WebsiteURL',
		'searchExpression': 'CONTAINS',
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
		'field': 'BonusCode',
		'title': 'Bonus Code',
		'searchExpression': 'CONTAINS',
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
		'field': 'UserId',
		'title': 'User Id',
		'searchExpression': 'CONTAINS',
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
	{
		'field': 'IM1',
		'title': 'IM1',
		'searchExpression': 'CONTAINS',
		'varType': 'ID!',
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
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'IMPlatformName1',
		'title': 'IM1',
		'searchExpression': 'CONTAINS',
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
		'field': 'IM1UserName',
		'title': 'IM1 UserName',
		'searchExpression': 'CONTAINS',
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
	{
		'field': 'IM2',
		'title': 'IM2',
		'searchExpression': 'CONTAINS',
		'varType': 'ID',
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
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'IMPlatformName2',
		'title': 'IM2',
		'searchExpression': 'CONTAINS',
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
		'field': 'IM2UserName',
		'title': 'IM2 UserName',
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
		'field': 'SecurityQuestionId',
		'title': 'Security Question',
		'searchExpression': 'CONTAINS',
		'varType': 'ID!',
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
		'field': 'SecurityAnswer',
		'title': 'Security Answer',
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
		'field': 'AgreedToCondition',
		'title': 'Agreed To Condition',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'searchExpression': 'EQUALS',
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
		'field': 'IsLegalAge',
		'title': 'Is Legal Age',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'searchExpression': 'EQUALS',
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
		'field': 'WalletBalance',
		'title': 'Wallet Balance',
		'searchExpression': 'EQUALS',
		'varType': 'Float',
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
		'field': 'BankAccountName',
		'title': 'Bank Account Name',
		'searchExpression': 'CONTAINS',
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
		'field': 'BankAccountNumber',
		'title': 'Bank Account Number',
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
		'field': 'BankName',
		'title': 'Bank Name',
		'searchExpression': 'CONTAINS',
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
		'field': 'BankAccountBranch',
		'title': 'Bank Account Branch',
		'searchExpression': 'CONTAINS',
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
		'field': 'BankAccountCity',
		'title': 'Bank Account City',
		'searchExpression': 'CONTAINS',
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
		'field': 'BankAccountProvince',
		'title': 'Bank Account Province',
		'searchExpression': 'CONTAINS',
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
		'field': 'BankId',
		'title': 'Bank Id',
		'searchExpression': 'CONTAINS',
		'varType': 'ID',
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
		'field': 'SettlementPeriod',
		'title': 'Settlement Period',
		'searchExpression': 'CONTAINS',
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
		'field': 'MarketingCost',
		'title': 'Marketing Cost',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
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
		'field': 'LastLoginDate',
		'title': 'Last Login Date',
		'searchType': 'date',
		'searchExpression': 'LESS_THAN_OR_EQUAL',
		'varType': 'DateTime',
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

export const AffiliateTransaction = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/affiliate_manager/affiliate_transaction/f/edit/', 'params': ['Id'] }
	// 	]
	// },
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
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
	},
	{
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
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
		'field': 'TransactionNo',
		'title': 'Transaction No.',
		'type': 'link',
		'link': '/affiliate_manager/affiliate_transaction/view/',
		'params': ['Id'],
		'searchExpression': 'CONTAINS',
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
		'field': 'TxnType',
		'title': 'Transaction Type',
		'searchType': 'select',
		'searchOptions': 'AffiliateTransactionTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'AffiliateTransactionTypeEnum!',
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
			'defaultValue': 'TxnType',
			'readOnly': {
				'add': false,
				'edit': 'props.method === "edit"'
			}
		},
	},
	{
		'field': 'TransactionDate',
		'title': 'Transaction Date',
		'searchExpression': 'EQUALS',
		'varType': 'DateTime',
		'hidden': {
			'searchFieldSelection': true,
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
		'field': 'AffiliateId',
		'title': 'Affiliate Id',
		'searchExpression': 'CONTAINS',
		'varType': 'ID',
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
		'field': 'AffiliateCode',
		'title': 'Affiliate Code',
		'type': 'link',
		'link': '/affiliate_manager/affiliate/view/',
		'params': ['AffiliateId'],
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
		'field': 'AffiliateUserName',
		'title': 'Affiliate Username',
		// 'searchType': 'select',
		// 'searchOptions': 'affiliateList',
		// 'searchOptionKey': 'UserName',
		// 'searchExpression': 'EQUALS',
		// 'searchModeAsync': true,
		// 'searchLookupComponent': 'affiliate',
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
			'defaultValue': 'AffiliateUserName',
			'readOnly': {
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'ApprovedDate',
		'title': 'Approved Date',
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
		'field': 'TransactionAmount',
		'title': 'Transaction Amount',
		'type': 'currency',
		'varType': 'Float!',
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
			'defaultValue': 'TransactionAmount',
			'readOnly': {
				'add': false,
				'edit': 'props.method === "edit" && (props.entity.TxnType !== "Credit_Memo" || props.entity.TxnType !== "Debit_Memo") && props.entity.Status === "Approved"'
			}
		},
	},
	{
		'field': 'ApprovedAmount',
		'title': 'Approved Amount',
		'type': 'currency' ,
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
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
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'SourcePrevAmount',
		'title': 'Source Prev. Amount',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
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
		'field': 'SourceNewAmount',
		'title': 'Source New Amount',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
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
		'field': 'DestPrevAmount',
		'title': 'Dest. Prev. Amount',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
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
		'field': 'DestNewAmount',
		'title': 'Dest New Amount',
		'type': 'currency' ,
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
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
		'field': 'RefTxnId',
		'title': 'Reference Transaction ID' ,
		'searchExpression': 'CONTAINS',
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
		'field': 'NeedToSync',
		'title': 'Need To Sync?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'searchExpression': 'EQUALS',
		'varType': 'Boolean',
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
		'field': 'PlayerId',
		'title': 'Player ID',
		'searchExpression': 'CONTAINS',
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
	{
		'field': 'Status',
		'title': 'Transaction Status',
		'type': 'status',
		'isRequired': true,
		'searchType': 'select',
		'searchOptions': 'AffiliateTransactionStatusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'AffiliateTransactionStatusTypeEnum',
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
			'defaultValue': 'Status',
			'readOnly': {
				'add': false,
				'edit': 'props.method === "edit"'
			}
		},
	},
	{
		'field': 'TransactionGrabId',
		'title': 'Transaction Grab ID',
		'searchExpression': 'CONTAINS',
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
		'field': 'AssigneeUserId',
		'title': 'Assignee ID',
		'searchExpression': 'CONTAINS',
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
		'field': 'Assignee',
		'title': 'Assignee',
		'searchExpression': 'CONTAINS',
		'varType': 'String',
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
	}
]

export const Commission = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/affiliate_manager/affiliate_commission/edit/', 'params': ['Id'] }
	// 	]
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
		'field': 'TransactionNumber',
		'title': 'Transaction Number',
		'type': 'link',
		'link': '/affiliate_manager/affiliate_commission/view/',
		'params': ['Id'],
		'searchExpression': 'CONTAINS',
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
		'field': 'CommissionDate',
		'title': 'Commission Date',
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
		'field': 'AffiliateId',
		'title': 'Affiliate ID',
		'searchExpression': 'CONTAINS',
		'varType': 'ID',
		// 'isRequired': true,
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
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'AffiliateCode',
		'title': 'Affiliate Code',
		'type': 'link',
		'link': '/affiliate_manager/affiliate/view/',
		'params': ['AffiliateId'],
		'searchType': 'select',
		'searchOptions': 'affiliateList',
		'searchOptionKey': 'AffiliateCode',
		'searchExpression': 'EQUALS',
		'searchModeAsync': true,
		'searchLookupComponent': 'affiliate',
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
		'field': 'AffiliateName',
		'title': 'Affiliate Name',
		'searchExpression': 'CONTAINS',
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
		'field': 'PeriodStart',
		'title': 'Period Start',
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
		'field': 'PeriodEnd',
		'title': 'Period End',
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
		'field': 'NumberOfClicks',
		'title': 'Total of Clicks',
		// 'searchExpression': 'CONTAINS',
		'varType': 'Int',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
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
		'field': 'TotalActivePlayer',
		'title': 'Total Active Player',
		// 'searchExpression': 'CONTAINS',
		'varType': 'Int',
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
		'field': 'BrandCode',
		'title': 'Brand Code',
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
		'field': 'FTDCount',
		'title': 'FTD Count',
		// 'searchExpression': 'CONTAINS',
		'varType': 'Int',
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
		'field': 'Status',
		'title': 'Commission Status',
		'type': 'status',
		'searchType': 'select',
		'searchOptions': 'AffiliateCommissionStatusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'AffiliateCommissionStatusTypeEnum',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': false,
				'add': true,
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
		'field': 'TotalSignUps',
		'title': 'Total Sign-ups',
		// 'searchExpression': 'CONTAINS',
		'varType': 'Int',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true,
			'detail': true,
			'form': {
				'search': true,
				'add': true,
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
		'field': 'CompanyWin',
		'title': 'Company Win',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
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
		'field': 'Bonuses',
		'title': 'Bonuses',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
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
		'field': 'Rebates',
		'title': 'Rebates',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
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
		'field': 'NetWinLoss',
		'title': 'Net Win/Loss',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
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
		'field': 'AcumWinLoss',
		'title': 'Accumulated Win/Loss',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
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
		'field': 'Income',
		'title': 'Income',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
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
		'field': 'RunningIncome',
		'title': 'Running Income',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
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
		'field': 'PrevEarning',
		'title': 'Prev. Income',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
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
		'field': 'TotalEarning',
		'title': 'Total Earning',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': false,
			'form': {
				'search': true,
				'add': true,
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
		'field': 'TransactionGrabId',
		'title': 'Transaction Grab ID',
		'searchExpression': 'CONTAINS',
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
		'field': 'AssigneeUserId',
		'title': 'Assignee ID',
		'searchExpression': 'CONTAINS',
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
		'field': 'Assignee',
		'title': 'Assignee',
		'searchExpression': 'CONTAINS',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
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
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/affiliate_manager/affiliate_commission/edit/', 'params': ['Id'] }
	// 	]
	// }
]

export const AffiliateCommissionDetail = [
	{
		'field': 'Id',
		'title': 'ID',
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
		'field': 'AffiliateId',
		'title': 'Affiliate ID',
		'searchExpression': 'EQUALS',
		'varType': 'ID',
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
		'field': 'AffiliateCommissionId',
		'title': 'Affiliate Commission ID',
		'searchExpression': 'EQUALS',
		'varType': 'ID',
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
		'field': 'CurrencyId',
		'title': 'Currency ID',
		'searchExpression': 'EQUALS',
		'varType': 'ID',
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
		'field': 'CurrencyCode',
		'title': 'Currency',
		'searchExpression': 'CONTAINS',
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
				'search': true,
				'add': false,
				'edit': false
			}
		},
		'form': {
			'defaultValue': '',
			'readOnly': {
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'TotalWin',
		'title': 'Total Win',
		'type': 'currency',
		'searchExpression': 'EQUALS',
		'varType': 'Float',
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
		'field': 'TotalLoss',
		'title': 'Total Loss',
		'type': 'currency',
		'searchExpression': 'EQUALS',
		'varType': 'Float',
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
		'field': 'CompanyWin',
		'title': 'Company Win',
		'type': 'currency',
		'searchExpression': 'EQUALS',
		'varType': 'Float',
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
		'field': 'Bonuses',
		'title': 'Bonuses',
		'type': 'currency',
		'searchExpression': 'EQUALS',
		'varType': 'Float',
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
		'field': 'Rebates',
		'title': 'Rebates',
		'type': 'currency',
		'searchExpression': 'EQUALS',
		'varType': 'Float',
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
		'field': 'NetWinLoss',
		'title': 'Net Win/Loss',
		'type': 'currency',
		'searchExpression': 'EQUALS',
		'varType': 'Float',
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
		'field': 'ConversionRate',
		'title': 'Conversion Rate',
		'type': 'currency',
		'searchExpression': 'EQUALS',
		'varType': 'Float',
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
		'field': 'ActivePlayerCountAsOf',
		'title': 'Active Player Count As Of',
		'type': 'currency',
		'searchExpression': 'EQUALS',
		'varType': 'Float',
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
		'field': 'AsOfDate',
		'title': 'As Of Date',
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
		'field': 'PeriodStartDate',
		'title': 'Period Start Date',
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
		'field': 'PeriodEndDate',
		'title': 'Period End Date',
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
		'field': 'ConvertedAmount',
		'title': 'Converted Amount',
		'type': 'currency',
		'searchExpression': 'EQUALS',
		'varType': 'Float',
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

export const AffiliateTrackingLinks = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/affiliate_manager/affiliate_tracking/edit/', 'params': ['Id'] }
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
		'field': 'AffiliateTrackingLinkCode',
		'title': 'Tracking Link Code',
		'type': 'link',
		'link': '/affiliate_manager/affiliate_tracking/view/',
		'params': ['Id'],
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
		'field': 'AffiliateId',
		'title': 'Affiliate ID',
		'searchType': 'select',
		'searchOptions': 'affiliateList',
		'searchOptionKey': 'UserName',
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
			'defaultValue': 'AffiliateId',
			'readOnly': {
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'AffiliateCode',
		'title': 'Affiliate Code',
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
		'field': 'AffiliateName',
		'title': 'Affiliate Name',
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
		'title': 'Language',
		'shouldMap': true,
		'mapTo': 'affiliateEarnlanguageListingPlanList',
		'mapByField': 'LanguageName',
		'hideOnTable': true,
		'searchType': 'select',
		'searchOptions': 'languageList',
		'searchOptionKey': 'LanguageCode',
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
		'field': 'LanguageCode',
		'title': 'Language Code',
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
		'field': 'LanguageName',
		'title': 'Language Name',
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
		'field': 'WebsiteUrl',
		'title': 'Website URL',
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