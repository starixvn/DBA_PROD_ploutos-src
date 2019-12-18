import { BoolOpts } from '../../utils/CoreHelpers'

export const DebitMemo = [
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
		}
	},
	{
		'field': 'isViewed',
		'title': 'Has Been Viewed?',
		'sortable': false,
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
		}
	},
	{
		'field': 'ActiveRecord',
		'title': 'Status',
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
		}
	},
	{
		'field': 'TransactionNo',
		'title': 'Transaction No',
		'type': 'link',
		'link': '/payment_manager/debit_memo/view/',
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
		}
	},
	{
		'field': 'UserName',
		'title': 'Player',
		'type': 'link',
		'link': '/player_manager/profile/view/',
		'params': ['PlayerProfileId'],
		'searchType': 'select',
		'searchOptions': 'playerProfileList',
		'searchOptionKey': 'UserName',
		'searchExpression': 'EQUALS',
		'searchModeAsync': true,
		'searchLookupComponent': 'profile',
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
		}
	},
	{
		'field': 'TransactionDate',
		'title': 'Transaction Date',
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
		}
	},
	// {
	// 	'field': 'CreditAmount',
	// 	'title': 'Credit Memo Amount',
	// 	'type': 'currency',
	// 	'searchExpression': 'CONTAINS',
	// 	'varType': 'Float!',
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
	// 	}
	// },
	{
		'field': 'DebitAmount',
		'title': 'Debit Memo Amount',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
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
		}
	},
	{
		'field': 'Status',
		'title': 'Adjustment Status',
		'type': 'status',
		'searchType': 'select',
		'searchOptions': 'WalletAdjustmentMemoStatusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'WalletAdjustmentMemoStatusTypeEnum',
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
		}
	},
	{
		'field': 'AdjustmentType',
		'title': 'Adjustment Type',
		'varType': 'WalletAdjustmentMemoTypeEnum',
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
		}
	},
	{
		'field': 'WalletId',
		'title': 'Wallet ID',
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
		}
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
		'field': 'PlayerProfileId',
		'title': 'Player Profile ID',
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
		}
	},
	{
		'field': 'PlayerRegistrationId',
		'title': 'Player Registration ID',
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
		}
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
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
		}
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency',
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
		}
	},
	{
		'field': 'Remarks',
		'title': 'Remarks',
		'searchExpression': 'CONTAINS',
		'varType': 'String',
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
		}
	}
]

export const CreditMemo = [
	{
		'field': 'Id',
		'title': 'ID',
		'searchExpression': 'CONTAINS',
		'varType': 'ID!',
		'isRequired': true,
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
		'field': 'isViewed',
		'title': 'Has Been Viewed?',
		'sortable': false,
		'varType': 'ID',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
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
		}
	},
	{
		'field': 'TransactionNo',
		'title': 'Transaction No',
		'type': 'link',
		'link': '/payment_manager/credit_memo/view/',
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
		}
	},
	{
		'field': 'UserName',
		'title': 'Player',
		'type': 'link',
		'link': '/player_manager/profile/view/',
		'params': ['PlayerProfileId'],
		'searchType': 'select',
		'searchOptions': 'playerProfileList',
		'searchOptionKey': 'UserName',
		'searchExpression': 'EQUALS',
		'searchModeAsync': true,
		'searchLookupComponent': 'profile',
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
		}
	},
	{
		'field': 'TransactionDate',
		'title': 'Transaction Date',
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
		'field': 'CreditAmount',
		'title': 'Credit Memo Amount',
		'type': 'currency',
		'searchExpression': 'CONTAINS',
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
		}
	},
	// {
	// 	'field': 'DebitAmount',
	// 	'title': 'Debit Memo Amount',
	// 	'type': 'currency',
	// 	'searchExpression': 'CONTAINS',
	// 	'varType': 'Float!',
	// 	'hidden': {
	// 		'searchFieldSelection': true,
	// 		'tableColumnSelection': true,
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
	// 	}
	// },
	{
		'field': 'Status',
		'title': 'Adjustment Status',
		'type': 'status',
		'searchType': 'select',
		'searchOptions': 'WalletAdjustmentMemoStatusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'WalletAdjustmentMemoStatusTypeEnum',
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
		}
	},
	{
		'field': 'AdjustmentType',
		'title': 'Adjustment Type',
		'varType': 'WalletAdjustmentMemoTypeEnum',
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
		}
	},
	{
		'field': 'WalletId',
		'title': 'Wallet ID',
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
		}
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
		'field': 'PlayerProfileId',
		'title': 'Player Profile ID',
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
		}
	},
	{
		'field': 'PlayerRegistrationId',
		'title': 'Player Registration ID',
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
		}
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
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
		}
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency',
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
		}
	},
	{
		'field': 'Remarks',
		'title': 'Remarks',
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
		}
	}
]

export const Deposit = [
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
		}
	},
	{
		'field': 'isViewed',
		'title': 'Has Been Viewed?',
		'sortable': false,
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
		}
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
		}
	},
	{
		'field': 'DepositType',
		'title': 'Deposit Type', 
		'type': 'status',
		'searchType': 'select',
		'searchOptions': 'WalletDepositTypeTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'WalletDepositTypeTypeEnum',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,			
			'list': true,
			'detail': false,
			'form': {
				'search': false,
				'add': false,
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
		'field': 'TransactionNo',
		'title': 'Transaction No',
		'type': 'link',
		'link': '/payment_manager/deposit/view/',
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
		}
	},
	{
		'field': 'TransactionDate',
		'title': 'Transaction Date',
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
		}
	},
	{
		'field': 'WalletCode',
		'title': 'Wallet Code',
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
		}
	},
	{
		'field': 'DepositDate',
		'title': 'Deposit Date',
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
		}
	},
	{
		'field': 'DepositAmount',
		'title': 'Deposit Amount',
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
		}
	},
	{
		'field': 'ActualDepositAmount',
		'title': 'Actual Amount',
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
		}
	},
	{
		'field': 'UniqueDepositAmount',
		'title': 'Unique Deposit Amount',
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
		}
	},
	{
		'field': 'CreditAmount',
		'title': 'Credit Amount',
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
		}
	},
	{
		'field': 'PlayerProfileId',
		'title': 'Player Profile ID',
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
		}
	},
	{
		'field': 'UserName',
		'title': 'Player',
		'type': 'link',
		'link': '/player_manager/profile/view/',
		'params': ['PlayerProfileId'],
		'searchType': 'select',
		'searchOptions': 'playerProfileList',
		'searchOptionKey': 'UserName',
		'searchExpression': 'EQUALS',
		'searchModeAsync': true,
		'searchLookupComponent': 'profile',
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
		}
	},
	{
		'field': 'PlayerRegistrationId',
		'title': 'Player Registration ID',
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
		}
	},
	{
		'field': 'BonusId',
		'title': 'Bonus ID',
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
		}
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
				'add': 'this.state.entity.PlayerLoginName === ""',
				'edit': false
			}
		}
	},
	{
		'field': 'BonusAmount',
		'title': 'Bonus Amount',
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
		}
	},
	{
		'field': 'BonusWageringAmount',
		'title': 'Bonus Wagering Amount',
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
		}
	},
	{
		'field': 'IsWageringFulfilled',
		'title': 'Is Wagering Fulfilled?',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
		'field': 'WageringAmount',
		'title': 'Wager Amount',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',		
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
		}
	},
	{
		'field': 'TotalWageringAmount',
		'title': 'Total Wagering Amount',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
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
		}
	},
	{
		'field': 'WageringFulfillmentAmount',
		'title': 'Wager Full Amount',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',		
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
		}
	},
	{
		'field': 'WalletId',
		'title': 'Wallet ID',
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
		}
	},
	{
		'field': 'LockAmount',
		'title': 'Lock Amount',
		'searchExpression': 'CONTAINS',
		'varType': 'Float',
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
		}
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
		}
	},
	{
		'field': 'PaymentRiskLevelId',
		'title': 'Payment RiskLevel ID',
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
		}
	},
	{
		'field': 'PaymentMethodId',
		'title': 'Payment Method',
		'searchExpression': 'CONTAINS',
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
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': 'this.state.entity.PlayerLoginName === ""'
			},
			'onChangeFunc': 'onChangePaymentMethod',
		}
	},
	{
		'field': 'BankAccountId',
		'title': 'Bank Account',
		'searchExpression': 'CONTAINS',
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
			'defaultValue': '',
			'readOnly': {
				'add': false,
				'edit': 'this.state.entity.PaymentMethodId === ""'
			}
		}
	},
	{
		'field': 'DepositUntil',
		'title': 'Deposit Until',
		'searchType': 'date',
		'searchExpression': 'LESS_THAN_OR_EQUAL',
		'varType': 'DateTime',
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
		'field': 'DaddyPayDepositId',
		'title': 'DaddyPay Deposit ID',
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
		}
	},
	{
		'field': 'RefTransactionNo',
		'title': 'Ref Transaction No',
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
		}
	},
	{
		'field': 'RefDepositRemarks',
		'title': 'Ref Deposit Remarks',
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
		}
	},
	{
		'field': 'RequiredDepositForBonus',
		'title': 'Required Deposit For Bonus',
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
		}
	},
	{
		'field': 'Platform',
		'title': 'Platform',
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
		}
	},
	{
		'field': 'DepositPageUsed',
		'title': 'Deposit Page Used',
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
		}
	},
	{
		'field': 'PlayerWechatAccountNo',
		'title': 'Player WeChat Account No',
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
		}
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
		'field': 'IsBeingPush',
		'title': 'Is Being Pushed?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
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
		}
	},
	{
		'field': 'BankCode',
		'title': 'Bank Code',
		'searchExpression': 'CONTAINS',
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
		}
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
		}
	},
	{
		'field': 'AccountName',
		'title': 'Account Name',
		'searchExpression': 'CONTAINS',
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
		}
	},
	{
		'field': 'AccountNo',
		'title': 'Account No',
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
		}
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
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
		}
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency',
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
		}
	},
	{
		'field': 'PaymentRiskLevelCode',
		'title': 'Payment Risk Level',
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
		}
	},
	{
		'field': 'PaymentMethodName',
		'title': 'Payment Method Name',
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
		}
	},
	{
		'field': 'TransactionGrabId',
		'title': 'Transaction Grab ID',
		'searchExpression': 'CONTAINS',
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
		}
	},
	{
		'field': 'Status',
		'title': 'Transaction Status', 
		'type': 'status',
		'searchType': 'select',
		'searchOptions': 'WalletDepositStatusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'WalletDepositStatusTypeEnum',
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
		}
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
		}
	},
	{
		'field': 'AssigneeUserId',
		'title': 'Assignee User ID',
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
		}
	},
	{
		'field': 'Remarks',
		'title': 'Remarks',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
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
		}
	}
]

export const Withdrawal = [
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
		}
	},
	{
		'field': 'isViewed',
		'title': 'Viewed?',
		'sortable': false,
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
		}
	},
	{
		'field': 'ActiveRecord',
		'title': 'Status',
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
		}
	},
	{
		'field': 'TransactionNo',
		'title': 'Transaction No', 
		'type': 'link',
		'link': '/payment_manager/withdrawal/view/', 
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
		}
	},
	{
		'field': 'TransactionDate',
		'title': 'Transaction Date',
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
		}
	},
	{
		'field': 'WithdrawDate',
		'title': 'Withdrawal Date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
		'varType': 'DateTime',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
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
		}
	},
	{
		'field': 'UserName',
		'title': 'Player',
		'type': 'link',
		'link': '/player_manager/profile/view/',
		'params': ['PlayerProfileId'],
		// 'params': ['PlayerProfileId','PlayerRegistrationId','UserName'],
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
		}
	},
	{
		'field': 'PlayerProfileId',
		'title': 'Player Profile ID',
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
		}
	},
	{
		'field': 'PlayerRegistrationId',
		'title': 'Player Registration ID',
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
		}
	},
	{
		'field': 'WithdrawAmount',
		'title': 'Amount',
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
		}
	},
	{
		'field': 'WalletId',
		'title': 'Wallet ID',
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
		}
	},
	{
		'field': 'PlayerBankAccountId',
		'title': 'Player Bank Account ID',
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
		}
	},
	{
		'field': 'PlayerBankAccountName',
		'title': 'Player Bank Account Name',
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
		}
	},
	{
		'field': 'WithdrawalBankAccountId',
		'title': 'Withdrawal Bank Account ID',
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
		}
	},
	{
		'field': 'IsActiveAccount',
		'title': 'Is Account Active?',
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
		}
	},
	{
		'field': 'Platform',
		'title': 'Platform',
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
		}
	},
	{
		'field': 'BankCode',
		'title': 'Bank Code',
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
		}
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
		'field': 'AccountNo',
		'title': 'Bank Account No',
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
		}
	},
	{
		'field': 'BrandCode',
		'title': 'Brand',
		'searchExpression': 'CONTAINS',
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
		}
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency',
		'searchExpression': 'CONTAINS',
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
		}
	},
	{
		'field': 'TransactionGrabId',
		'title': 'Transaction Grab Id',
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
		}
	},
	{
		'field': 'Status',
		'title': 'Transaction Status', 
		'type': 'status',
		'searchType': 'select',
		'searchOptions': 'WalletTransactionStatusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'WalletTransactionStatusTypeEnum',
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
		}
	},
	{
		'field': 'Assignee',
		'title': 'Assignee',
		'searchExpression': 'CONTAINS',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
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
		}
	},
	{
		'field': 'AssigneeUserId',
		'title': 'Assignee User ID',
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
		}
	},
	{
		'field': 'Remarks',
		'title': 'Remarks',
		'searchExpression': 'CONTAINS',
		'varType': 'String',
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
		}
	}
]

export const FundTransfer= [
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
		}
	},
	{
		'field': 'isViewed',
		'title': 'Viewed?',
		'sortable': false,
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
		}
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
		}
	},
	{
		'field': 'TransactionNo',
		'title': 'Transaction No',
		'type': 'link',
		'link': '/payment_manager/fund_transfer/view/',
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
		}
	},
	{
		'field': 'TransactionDate',
		'title': 'Transaction Date',
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
		}
	},
	{
		'field': 'TransferAmount',
		'title': 'Transfer Amount',
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
		}
	},
	{
		'field': 'SourceWalletId',
		'title': 'Source Wallet ID',
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
		}
	},
	{
		'field': 'SourceWalletCode',
		'title': 'Source Wallet',
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
		}
	},
	{
		'field': 'DestinationWalletId',
		'title': 'Destination Wallet ID',
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
		}
	},
	{
		'field': 'DestinationWalletCode',
		'title': 'Destination Wallet',
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
		}
	},
	{
		'field': 'AgentId',
		'title': 'Agent ID',
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
		}
	},
	{
		'field': 'AgentCode',
		'title': 'Agent Code',
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
		}
	},
	{
		'field': 'AgentUserName',
		'title': 'Agent Username',
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
		}
	},
	{
		'field': 'SubAgentId',
		'title': 'Sub Agent ID',
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
		}
	},
	{
		'field': 'SubAgentUserName',
		'title': 'Sub Agent',
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
		}
	},
	{
		'field': 'PlayertId',
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
		}
	},
	{
		'field': 'UserName',
		'title': 'Player',
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
		}
	},
	{
		'field': 'CreditAmount',
		'title': 'Credit Amount',
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
		}
	},
	{
		'field': 'DebitAmount',
		'title': 'Debit Amount',
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
		}
	},
	{
		'field': 'FundTransferType',
		'title': 'Fund Transfer Type',
		// 'searchType': 'select',
		// 'searchOptions': 'FundTransferTypeEnum',
		// 'searchExpression': 'EQUALS',
		'varType': 'FundTransferTypeEnum', // Not part of enumRepository yet
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
		}
	},
	{
		'field': 'Remarks',
		'title': 'Remarks',
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
		}
	}
]