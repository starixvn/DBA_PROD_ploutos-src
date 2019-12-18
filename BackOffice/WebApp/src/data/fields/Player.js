import { BoolOpts } from '../../utils/CoreHelpers'

export const Profile = [
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
		'field': 'ActiveRecord',
		'title': 'Record Status',
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'varType': 'Boolean', 
		'searchExpression': 'EQUALS',
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
		'field': 'UserId',
		'title': 'User ID',
		'searchExpression': 'CONTAINS',
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
		}
	},
	{
		'field': 'UserName',
		'title': 'Username',
		'type': 'link',
		'link': '/player_manager/profile/view/',
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
		}
	},
	{
		'field': 'FullName',
		'title': 'Full Name',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
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
		'field': 'RegistrationDate',
		'title': 'Registration Date',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
		'varType': 'DateTime',
		'hidden': {
			'searchFieldSelection': false, //TODO: BACKEND FIXED
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
		'field': 'PlayerRegisterStatus',
		'title': 'Player Register Status',
		'type': 'status',
		'searchType': 'select',
		'searchOptions': 'PlayerAccountStatusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'PlayerAccountStatusTypeEnum',
		'isRequired': true,
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
		'field': 'UserAccountNo',
		'title': 'Account No',
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
		}
	},
	{
		'field': 'WalletCode',
		'title': 'Wallet Code',
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
		}
	},
	{
		'field': 'MobileNo',
		'title': 'Mobile',
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
		}
	},
	{
		'field': 'Email',
		'title': 'Email',
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
		}
	},
	{
		'field': 'CurrencyCode',
		'title': 'Currency',
		'isRequired': true,
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'searchExpression': 'EQUALS',
		'varType': 'String',
		'type': 'link',
		'link': '/setup/currency/view/',
		'params': ['CurrencyId'],
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
		'field': 'CurrencyId',
		'title': 'Currency Id',
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
		'field': 'CountryCode',
		'title': 'Country Code',
		'varType': 'String',
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
	// {
	// 	'field': 'Country',
	// 	'title': 'Country',
	// 	'searchType': 'select',
	// 	'searchOptions': 'CountryTypeEnum',
	// 	'searchExpression': 'EQUALS',
	// 	'varType': 'CountryTypeEnum',
	// 	'type': 'link',
	// 	'link': '/setup/country/view/',
	// 	'params': ['CountryCode'],
	// 	'hidden': {
	// 		'searchFieldSelection': false,
	// 		'tableColumnSelection': false,
	// 		'list': true,
	// 		'detail': true,
	// 		'form': {
	// 			'search': false,
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
		'field': 'Country',
		'title': 'Country',
		'searchType': 'select',
		'searchOptions': 'countryList',
		'searchOptionKey': 'CountryName',
		'searchExpression': 'EQUALS',
		'varType': 'String',
		'type': 'link',
		'link': '/setup/country/view/',
		'params': ['CountryCode'],
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
		'field': 'Title',
		'title': 'Title',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
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
		}
	},
	// {
	// 	'field': 'FirstName',
	// 	'title': 'FirstName',
	// 	'varType': 'String',
	// 	'searchExpression': 'CONTAINS',
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
	// {
	// 	'field': 'LastName',
	// 	'title': 'Last Name',
	// 	'varType': 'String',
	// 	'searchExpression': 'CONTAINS',
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
		'field': 'BirthDate',
		'title': 'Birth Date',
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
		'field': 'Gender',
		'title': 'Gender',
		'searchType': 'select',
		'searchOptions': 'GenderTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'GenderTypeEnum',
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
		'field': 'Street1',
		'title': 'Street1',
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
		}
	},
	{
		'field': 'Street2',
		'title': 'Street2',
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
		}
	},
	{
		'field': 'CityCode',
		'title': 'City Code',
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
		}
	},
	{
		'field': 'RegionCode',
		'title': 'Region Code',
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
		}
	},
	{
		'field': 'StateProvinceId',
		'title': 'StateProvinceId',
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
		'field': 'StateProvinceCode',
		'title': 'State Province Code',
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
		}
	},
	{
		'field': 'Zip',
		'title': 'Zip',
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
		}
	},
	{
		'field': 'DepositAlertEmail',
		'title': 'Deposit Alert Email',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
		}
	},
	{
		'field': 'DepositAlertSms',
		'title': 'Deposit Alert Sms',
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
		'field': 'WithdrawAlertEmail',
		'title': 'Withdraw Alert Email',
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
		'field': 'WithdrawAlertSms',
		'title': 'Withdraw Alert Sms',
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
		'field': 'VipLevelName',
		'title': 'VIP Level',
		'searchType': 'select',
		'searchOptions': 'vIPLevelList',
		'searchOptionKey': 'VipLevelName',
		'searchExpression': 'EQUALS',
		'varType': 'String',
		'type': 'link',
		'link': '/setup/viplevel/view/',
		'params': ['VipLevelId'],
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
		'field': 'FraudRiskLevelName',
		'title': 'Fraud Risk Level',
		'searchType': 'select',
		'searchOptions': 'fraudRiskLevelList',
		'searchOptionKey': 'FraudRiskLevelName',
		'searchExpression': 'EQUALS',
		'varType': 'String',
		'type': 'link',
		'link': '/setup/fraud_risk_level/view/',
		'params': ['FraudRiskLevelId'],
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
		'field': 'PaymentRiskLevelName',
		'title': 'Payment Risk Level',
		'searchType': 'select',
		'searchOptions': 'paymentRiskLevelList',
		'searchOptionKey': 'PaymentRiskLevelName',
		'searchExpression': 'EQUALS',
		'varType': 'String',
		'type': 'link',
		'link': '/setup/payment_risk_level/view/',
		'params': ['PaymentRiskLevelId'],
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
		'field': 'SecurityQuestionDesc',
		'title': 'Security Question Description 1',
		'varType': 'String',
		'type': 'link',
		'link': '/setup/question/view/',
		'params': ['SecurityQuestionId1'],
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
		'field': 'SecurityQuestionDesc2',
		'title': 'Security Question Description 2',
		'varType': 'String',
		'type': 'link',
		'link': '/setup/question/view/',
		'params': ['SecurityQuestionId2'],
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
		'field': 'SecurityQuestionId1',
		'title': 'Security Question Id1',
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
		'field': 'SecurityQuestionAnswer1',
		'title': 'Security Question Answer1',
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
		'field': 'SecurityQuestionId2',
		'title': 'Security Question Id2',
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
		'field': 'SecurityQuestionAnswer2',
		'title': 'Security Question Answer2',
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
		'field': 'PlayerRegisterActivationType',
		'title': 'Player Register Activation Type',
		'varType': 'Int',
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
		}
	},
	{
		'field': 'PlayerActivationStatus',
		'title': 'Player Activation Status',
		'varType': 'ID',
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
		}
	},
	{
		'field': 'PlayerRegistrationId',
		'title': 'Player Registration ID',
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
		'field': 'IsLocked',
		'title': 'Is Locked?',
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
		'field': 'HasBeenUpdated',
		'title': 'Has Been Updated?',
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
		'field': 'LoginAttempt',
		'title': 'Login Attempt',
		'varType': 'ID',
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
	// {
	// 	'field': 'BankAccountId',
	// 	'title': 'Bank Account',
	// 	'varType': 'ID',
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
		'field': 'WithdrawalLevelId',
		'title': 'Withdrawal Level',
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
	// {
	// 	'field': 'WithdrawalBankAccountId',
	// 	'title': 'Withdrawal Bank Account',
	// 	'varType': 'ID',
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
		'field': 'CheckForFraud',
		'title': 'Checked For Fraud?',
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
		'field': 'IsDoNotAllowBonus',
		'title': 'Allow Bonus?',
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
		'field': 'SubAgentId',
		'title': 'Sub Agent ID',
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
		'field': 'PlayerCode',
		'title': 'Player Code',
		'searchExpression': 'CONTAINS',
		'varType': 'String',
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
		}
	},
	{
		'field': 'GameBetLimitLevelId',
		'title': 'Game Bet Limit Level ID',
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
		'field': 'VipLevelId',
		'title': 'VIP Level ID',
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
		'field': 'FraudRiskLevelId',
		'title': 'Fraud Risk Level ID',
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
		'field': 'PaymentRiskLevelId',
		'title': 'Payment Risk Level ID',
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
		'field': 'WebChatUserName',
		'title': 'WeChat ID',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
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
		'field': 'QQUserName',
		'title': 'QQ ID',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': true,
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
		'field': 'InstantMessengerTypeId',
		'title': 'Instant Messenger Type ID',
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
		'field': 'InstantMessengerUserName',
		'title': 'IM Username',
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
		}
	},
	{
		'field': 'LineId',
		'title': 'Line ID',
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
		}
	},
	{
		'field': 'WhatsappId',
		'title': 'WhatsApp ID',
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
		}
	},
	{
		'field': 'KakaoTalkId',
		'title': 'KakaoTalk ID',
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
		}
	},
	{
		'field': 'SkypeId',
		'title': 'Skype ID',
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
		}
	},
	{
		'field': 'DaysRegistered',
		'title': 'Days Registered',
		'sortable': false,
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'LockedBalance',
		'title': 'Locked Balance',
		'sortable': false,
		'varType': 'Float',
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
		}
	},
	{
		'field': 'TotalDeposits',
		'title': 'Total Deposits',
		'sortable': false,
		'varType': 'Float',
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
		}
	},
	{
		'field': 'TotalDepositCount',
		'title': 'Total Deposit Count',
		'sortable': false,
		'varType': 'Float',
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
		}
	},
	{
		'field': 'TotalDepositCountWithBonus',
		'title': 'Total Deposit Count With Bonus',
		'sortable': false,
		'varType': 'Float',
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
		}
	},
	{
		'field': 'TotalBonus',
		'title': 'Total Bonus',
		'sortable': false,
		'varType': 'Float',
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
		}
	},
	{
		'field': 'TotalWithdrawals',
		'title': 'Total Withdrawals',
		'sortable': false,
		'varType': 'Float',
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
		}
	},
	{
		'field': 'TotalWithdrawalCount',
		'title': 'Total Withdrawal Count',
		'sortable': false,
		'varType': 'Float',
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
		}
	},
	{
		'field': 'TotalWins',
		'title': 'Total Wins',
		'sortable': false,
		'varType': 'Float',
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
		}
	},
	{
		'field': 'TotalLoss',
		'title': 'Total Loss',
		'sortable': false,
		'varType': 'Float',
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
		}
	},
	{
		'field': 'TotalCreditMemo',
		'title': 'Total Credit Memo',
		'sortable': false,
		'varType': 'Float',
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
		}
	},
	{
		'field': 'TotalDebitMemo',
		'title': 'Total Debit Memo',
		'sortable': false,
		'varType': 'Float',
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
		}
	},
	{
		'field': 'PlayerType',
		'title': 'Player Type',
		'searchType': 'select',
		'searchOptions': 'PlayerTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'PlayerTypeEnum',
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
		'field': 'BrandId',
		'title': 'Brand Id',
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
		'field': 'BrandCode',
		'title': 'Brand Code',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'searchExpression': 'EQUALS',
		'varType': 'String',
		'type': 'link',
		'link': '/setup/brand/view/',
		'params': ['BrandId'],
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
		'field': 'SourceUrl',
		'title': 'Source Url',
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
		}
	},
	{
		'field': 'Platform',
		'title': 'Platform',
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
		}
	},
	{
		'field': 'IsEmailVerified',
		'title': 'Is Email Verified?',
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
		'field': 'IsMobileVerified',
		'title': 'Is Mobile Verified?',
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
		'field': 'IsVerified',
		'title': 'Is BO Verified?',
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
		'field': 'IPAddress',
		'title': 'IP Address',
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
		}
	},
	{
		'field': 'LastLoginTime',
		'title': 'Last Login Time',
		'varType': 'DateTime',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
		'field': 'LastLoginIPAddress',
		'title': 'Last Login IP Address',
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
		}
	},
	{
		'field': 'WalletLastUpdated',
		'title': 'Wallet Last Updated',
		'varType': 'DateTime',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
		'field': 'Balance',
		'title': 'Balance',
		'varType': 'Float',
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
		}
	},
	{
		'field': 'WithdrawableAmount',
		'title': 'Withdrawable Amount',
		'varType': 'Float',
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
		}
	},
	{
		'field': 'WithdrawalLevelName',
		'title': 'Withdrawal Level Name',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
		'type': 'link',
		'link': '/setup/withdrawal_level/view/',
		'params': ['WithdrawalLevelId'],
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
		'field': 'BetLimitLevelDesc',
		'title': 'Bet Limit Level',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
		'type': 'link',
		'link': '/setup/betlimitlevel/view/',
		'params': ['GameBetLimitLevelId'],
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
	// {
	// 	'field': 'DepositBankName',
	// 	'title': 'Deposit Bank',
	// 	'varType': 'String',
	// 	'searchExpression': 'CONTAINS',
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
	// {
	// 	'field': 'WithdrawalBankName',
	// 	'title': 'Withdrawal Bank',
	// 	'varType': 'String',
	// 	'searchExpression': 'CONTAINS',
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
		'field': 'AccountStatus',
		'title': 'Account Status',
		'type': 'status',
		'searchType': 'select',
		'searchOptions': 'PlayerAccountStatusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'PlayerAccountStatusTypeEnum',
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
	}
]

export const Bank = [
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
		}
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
		}
	},
	{
		'field': 'AccountNumber',
		'title': 'Account No',
		'type': 'link',
		'link': '/player_manager/bank_account/view/',
		'params': ['Id'],
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'AccountName',
		'title': 'Account Name',
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'BankAccountName',
		'title': 'Bank',
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
		}
	},
	{
		'field': 'BankName',
		'title': 'Bank Name',
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'BranchName',
		'title': 'Branch',
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
		'field': 'City',
		'title': 'City',
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
		'field': 'Province',
		'title': 'Province',
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
		'field': 'SwiftCode',
		'title': 'Swift Code',
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
		'field': 'UserName',
		'title': 'Player',
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'title': 'Player ',
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
		'field': 'BankId',
		'title': 'BankId ',
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
		'field': 'BankAccountId',
		'title': 'Bank Account Id',
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
		'field': 'BankCode',
		'title': 'Bank Code',
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
		'field': 'PlayerRegistrationId',
		'title': 'Player Registration Id',
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
		'title': 'Is Active?',
		'varType': 'ActiveStatusTypeEnum',
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
	}
]

export const Bet = [
	{
		'field': 'Id',
		'title': 'ID',
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
		}
	},
	{
		'field': 'TransactionNo',
		'title': 'Transaction Bet ID',
		'type': 'link',
		'link': '/player_manager/bet/view/',
		'params': ['Id'],
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'varType': 'DateTime',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
		'field': 'BetName',
		'title': 'Bet Name',
		'varType': 'String',
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
		}
	},
	{
		'field': 'BetAmount',
		'type': 'currency',
		'title': 'Bet Amount',
		'varType': 'Float',
		'searchExpression': 'EQUALS',
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
		'title': 'Player Profile',
		'varType': 'ID',
		'hidden': {
			'searchFieldSelection': false,
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
		'field': 'WalletId',
		'title': 'Wallet Id',
		'varType': 'ID',
		'hidden': {
			'searchFieldSelection': false,
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
		'field': 'WalletCode',
		'title': 'Wallet ID',
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'GamePlatformforId',
		'title': 'Game Platform',
		'varType': 'ID',
		'hidden': {
			'searchFieldSelection': false,
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
		'field': 'GamePlatformCode',
		'title': 'Platform',
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
		'field': 'GamePlatformName',
		'title': 'Platform',
		'varType': 'String',
		'hidden': {
			'searchFieldSelection': false,
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
		'field': 'GameDescription',
		'title': 'Game Description',
		'varType': 'String',
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
		}
	},
	{
		'field': 'GamePlatformProductId',
		'title': 'Game Platform Product Id',
		'varType': 'ID',
		'hidden': {
			'searchFieldSelection': false,
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
		'field': 'GamePlatformProductName',
		'title': 'Game',
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'IsBeingPushed',
		'title': 'Is Being Pushed',
		'sortable': true,
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'varType': 'Boolean',
		'hidden': {
			'searchFieldSelection': false,
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
		'field': 'IsWageBeingProcess',
		'title': 'Is Wage Being Process',
		'sortable': true,
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'varType': 'Boolean',
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
		}
	},
	{
		'field': 'IsDoneWagering',
		'title': 'Is Done Wagering',
		'sortable': true,
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
		}
	}
]

export const Win = [
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
		'link': '/player_manager/wallet_win/view/',
		'params': ['Id'],
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'varType': 'DateTime',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'WalletId',
		'title': 'Wallet',
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
		'field': 'WalletCode',
		'title': 'Wallet',
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'BetAmount',
		'title': 'Bet Amount',
		'type': 'currency',
		'varType': 'Float',
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
		}
	},
	{
		'field': 'WinAmount',
		'title': 'Win Amount',
		'type': 'currency',
		'varType': 'Float',
		'searchExpression': 'EQUALS',
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
		'field': 'GameId',
		'title': 'Game',
		'varType': 'ID',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true, //false
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
		'field': 'ProducId',
		'title': 'Product',
		'varType': 'ID',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': true,
			'list': true, //false
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
		'field': 'GamePlatformId',
		'title': 'Game Platform ID',
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
		'field': 'GamePlatformCode',
		'title': 'Game Platform Code',
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
		'field': 'GamePlatformName',
		'title': 'Game Platform Name',
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
		}
	},
	{
		'field': 'GamePlatformProductId',
		'title': 'Game Product ID',
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
		'field': 'GamePlatformProductName',
		'title': 'Game Name',
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'GameDescription',
		'title': 'Game Description',
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
		'field': 'IsBeingPushed',
		'title': 'Is Being Pushed?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
		'field': 'PlayerProfileId',
		'title': 'Player Profile ID',
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
		'field': 'Remarks',
		'title': 'Remarks',
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
	}
]

export const Loss = [
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
		'link': '/player_manager/wallet_loss/view/',
		'params': ['Id'],
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'varType': 'DateTime',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'WalletId',
		'title': 'Wallet Id',
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
		'field': 'WalletCode',
		'title': 'Wallet',
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'BetAmount',
		'type': 'currency',
		'title': 'Bet Amount',
		'varType': 'Float',
		'searchExpression': 'EQUALS',
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
		'field': 'LossAmount',
		'type': 'currency',
		'title': 'Loss Amount',
		'varType': 'Float',
		'searchExpression': 'EQUALS',
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
		'field': 'GameId',
		'title': 'Game ID',
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
		'field': 'ProducId',
		'title': 'Product',
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
		'field': 'GamePlatformId',
		'title': 'Game Platform ID',
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
		'field': 'GamePlatformCode',
		'title': 'Game Platform Code',
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
		'field': 'GamePlatformName',
		'title': 'Game Platform Name',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
			'detail': true,
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
		'field': 'GamePlatformProductId',
		'title': 'Game Platform Product ID',
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
		'field': 'GamePlatformProductName',
		'title': 'Game Name',
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
		'field': 'GameDescription',
		'title': 'Game Description',
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
		'field': 'IsBeingPushed',
		'title': 'Is Being Pushed?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
		'field': 'PlayerProfileId',
		'title': 'Player Profile Id',
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
		'field': 'Remarks',
		'title': 'Remarks',
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
	}
]

export const MessageMonitoring = [
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
		'varType': 'Boolean',
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
		'field': 'ProviderMessageId',
		'title': 'Provider Message ID',
		'varType': 'ID',
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
		}
	},
	{
		'field': 'ReceiverInfo',
		'title': 'Receiver Info',
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
		}
	},
	{
		'field': 'ReceiverType',
		'title': 'Receiver Type',
		'varType': 'RecieverTypeTypeEnum',
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
		}
	},
	{
		'field': 'StatusCode',
		'title': 'Status Code',
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
		}
	},
	{
		'field': 'StatusDesc',
		'title': 'Status Desc',
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
		}
	},
	{
		'field': 'MessageSent',
		'title': 'Message Sent',
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
		}
	},
	{
		'field': 'NotificationProvider',
		'title': 'Notification Provider',
		'varType': 'NotificationProviderTypeEnum',
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
		}
	},
	{
		'field': 'NotifyType',
		'title': 'Notification Type',
		'varType': 'NotificationMessageLogTypeEnum',
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
		}
	}
]

export const PlayerMessages = [
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'searchExpression': 'EQUALS',
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
		'field': 'MessageNumber',
		'title': 'Message Number',
		'type': 'link',
		'link': '/player_manager/player_messages/view/',
		'params': ['Id'],
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
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'BrandId',
		'varType': 'ID',
		'searchExpression': 'EQUALS',
		'hidden': {
			'searchFieldSelection': true,
			'search': true,
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
		'field': 'BrandCode',
		'title': 'Brand Code',
		'searchType': 'select',
		'searchOptions': 'brandList',
		'searchOptionKey': 'BrandCode',
		'searchExpression': 'EQUALS',
		'varType': 'String',
		'type': 'link',
		'link': '/setup/brand/view/',
		'params': ['BrandId'],
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
		'field': 'CurrencyId',
		'title': 'CurrencyId',
		'varType': 'ID',
		'searchExpression': 'EQUALS',
		'hidden': {
			'searchFieldSelection': true,
			'search': true,
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
		'field': 'CurrencyCode',
		'title': 'Currency',
		'isRequired': true,
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'searchExpression': 'EQUALS',
		'varType': 'String',
		'type': 'link',
		'link': '/setup/currency/view/',
		'params': ['CurrencyCode'],
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
		'title': 'PlayerProfileId',
		'varType': 'ID',
		'searchExpression': 'EQUALS',
		'hidden': {
			'searchFieldSelection': true,
			'search': true,
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
		'field': 'UserName',
		'title': 'Player',
		'varType': 'String',
		'searchExpression': 'EQUALS',
		'hidden': {
			'searchFieldSelection': false,
			'search': false,
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
		'field': 'MessageType',
		'title': 'Message Type',
		'searchType': 'select',
		'searchOptions': 'MessagesTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'MessagesTypeEnum',
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
		'field': 'IsFromPlayer',
		'title': 'From Player?',
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
		'field': 'SendDate',
		'title': 'Sent Date',
		'varType': 'DateTime',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
		'field': 'SentToAll',
		'title': 'Send to all',
		'sortable': true,
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
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
	},
	{
		'field': 'DateSeen',
		'title': 'Date Seen',
		'varType': 'DateTime',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
			'defaultValue': new Date(),
			'readOnly': {
				'add': false,
				'edit': false
			}
		}
	},
	{
		'field': 'Status',
		'title': 'Status',
		'type': 'status',
		'searchType': 'select',
		'searchOptions': 'PlayerMessagesStatusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'PlayerMessagesStatusTypeEnum',
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
			'defaultValue': 'PlayerMessagesStatusType',
			'readOnly': {
				'add': false,
				'edit': false
			}
		}
	}
]

export const PlayerMessagesRecipient = [
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'searchExpression': 'EQUALS',
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
		'field': 'MessageNumber',
		'title': 'Message Number',
		'type': 'link',
		'link': '/player_manager/player_messages/view/',
		'params': ['Id'],
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
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'PlayerProfileId',
		'title': 'PlayerProfileId',
		'varType': 'ID',
		'searchExpression': 'EQUALS',
		'hidden': {
			'searchFieldSelection': true,
			'search': true,
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
		'field': 'UserName',
		'title': 'Player',
		'varType': 'String',
		'searchExpression': 'EQUALS',
		'hidden': {
			'searchFieldSelection': false,
			'search': false,
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
		'field': 'DateSeen',
		'title': 'Date Seen',
		'varType': 'DateTime',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
			'defaultValue': new Date(),
			'readOnly': {
				'add': false,
				'edit': false
			}
		}
	},
	{
		'field': 'Status',
		'title': 'Status',
		'type': 'status',
		'searchType': 'select',
		'searchOptions': 'PlayerMessagesStatusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'PlayerMessagesStatusTypeEnum',
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
			'defaultValue': 'PlayerMessagesStatusType',
			'readOnly': {
				'add': false,
				'edit': false
			}
		}
	}
]

export const MessagesSeenHistory = [
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'searchExpression': 'EQUALS',
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
		'field': 'MessageNumber',
		'title': 'Message Number',
		'type': 'link',
		'link': '/player_manager/player_messages/view/',
		'params': ['Id'],
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
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'PlayerProfileId',
		'title': 'PlayerProfileId',
		'varType': 'ID',
		'searchExpression': 'EQUALS',
		'hidden': {
			'searchFieldSelection': true,
			'search': true,
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
		'field': 'UserName',
		'title': 'Player',
		'varType': 'String',
		'searchExpression': 'EQUALS',
		'hidden': {
			'searchFieldSelection': false,
			'search': false,
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
		'field': 'DateSeen',
		'title': 'Date Seen',
		'varType': 'DateTime',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
			'defaultValue': new Date(),
			'readOnly': {
				'add': false,
				'edit': false
			}
		}
	}
]

export const PlayerMessage = [
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'searchExpression': 'EQUALS',
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
		'field': 'MessageNumber',
		'title': 'Message Number',
		'type': 'link',
		'link': '/player_manager/messages/view/',
		'params': ['Id'],
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
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'BrandId',
		'title': 'BrandId',
		'varType': 'ID',
		'searchExpression': 'EQUALS',
		'hidden': {
			'searchFieldSelection': true,
			'search': true,
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
				'add': true,
				'edit': true
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
		'type': 'link',
		'link': '/setup/brand/view/',
		'params': ['BrandId'],
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
		'field': 'CurrencyId',
		'title': 'CurrencyId',
		'varType': 'ID',
		'searchExpression': 'EQUALS',
		'hidden': {
			'searchFieldSelection': true,
			'search': true,
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
		'field': 'CurrencyCode',
		'title': 'Currency',
		'isRequired': true,
		'searchType': 'select',
		'searchOptions': 'currencyList',
		'searchOptionKey': 'CurrencyCode',
		'searchExpression': 'EQUALS',
		'varType': 'String',
		'type': 'link',
		'link': '/setup/currency/view/',
		'params': ['CurrencyCode'],
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
		'field': 'MessageType',
		'title': 'Message Type',
		'searchType': 'select',
		'searchOptions': 'MessagesTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'MessagesTypeEnum',
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
		'field': 'IsFromPlayer',
		'title': 'From Player?',
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
		'field': 'SendDate',
		'title': 'Sent Date',
		'varType': 'DateTime',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
		'field': 'SentToAll',
		'title': 'Send to all',
		'sortable': true,
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('yes'),
		'varType': 'Boolean',
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
	},
	{
		'field': 'Status',
		'title': 'Status',
		'type': 'status',
		'searchType': 'select',
		'searchOptions': 'PlayerMessagesStatusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'PlayerMessagesStatusTypeEnum',
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
			'defaultValue': 'PlayerMessagesStatusType',
			'readOnly': {
				'add': false,
				'edit': false
			}
		}
	},
	{
		'field': 'MessageContent',
		'title': 'Message',
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
]

export const AccessLog = [
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
		'field': 'AccessLogType',
		'title': 'Access Type',
		'type': 'link',
		'link': '/player_manager/access_log/view/',
		'params': ['Id'],
		'varType': 'AccessLogTypeEnum',
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
		'field': 'AccessLog',
		'title': 'Access Log',
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
		'field': 'PlayerProfileId',
		'title': 'Player Profile Id',
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
		'title': 'UserName',
		'type': 'link',
		'link': '/player_manager/profile/view/',
		'params': ['PlayerProfileId'],
		'varType': 'ID',
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
		'field': 'IPAddress',
		'title': 'IP Address',
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
		'field': 'PlayerFingerPrintId',
		'title': 'Fingerprint',
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
		'field': 'FingerPrint',
		'title': 'Fingerprint',
		'type': 'link',
		'link': '/player_manager/player_fingerprint/view/',
		'params': ['FingerPrint'],
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
		'field': 'FingerPrintHits',
		'title': 'Fingerprint Hit',
		'sortable': false,
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
	},
	{
		'field': 'LogDateTime',
		'title': 'Log Date Time',
		'varType': 'DateTime',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
		'field': 'PlayerRegistrationId',
		'title': 'Player Registration Id',
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
		'field': 'IsBeingSync',
		'title': 'Is Being Sync?',
		'sortable': true,
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
		}
	},
	{
		'field': 'NeedToSync',
		'title': 'Need To Sync?',
		'sortable': true,
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
		}
	}
]

export const Fingerprint = [
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
		'field': 'FingerPrint',
		'title': 'Fingerprint',
		'type': 'link',
		'link': '/player_manager/player_fingerprint/view/',
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
		}
	},
	{ 
		'field': 'FingerPrintHits',
		'title': 'Total Hits',
		'sortable': false,
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
	}
]

export const WageringFulfillment = [
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
		'field': 'WageringFulfilmentName',
		'title': 'Wagering Fulfilment Name',
		'type': 'link',
		'link': '/player_manager/wagering_fulfillment/view/',
		'params': ['Id'],
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
		'field': 'BetAmount',
		'type': 'currency',
		'title': 'Bet Amount',
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
		'field': 'PlayerBetId',
		'title': 'Player Bet',
		'shouldMap': true,
		'mapTo': 'playerBetList',
		'mapByField': 'BetName',
		'varType': 'ID',
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
		'field': 'WalletDepositId',
		'title': 'Wallet Deposit',
		'shouldMap': true,
		'mapTo': 'walletDepositList',
		'mapByField': 'BankName',
		'varType': 'ID',
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
		'field': 'IsBeingPushed',
		'title': 'Is Being Pushed?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
	}
]

export const Ledger = [
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
		'field': 'WalletLedgerType',
		'title': 'Wallet Ledger Type',
		'type': 'link',
		'link': '/player_manager/wallet_ledger/view/',
		'params': ['Id'],
		'searchType': 'select',
		'searchOptions': 'WalletLedgerTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'WalletLedgerTypeEnum',
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
		'field': 'UserId',
		'title': 'User ID',
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
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'AccountNo',
		'title': 'Account No',
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'WalletCode',
		'title': 'Wallet Code',
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'VendorType',
		'title': 'Vendor',
		'varType': 'VendorTypeEnum',
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
		'field': 'TransactionDate',
		'title': 'Transaction Date',
		'varType': 'DateTime',
		'searchType': 'date',
		'searchExpression': 'GREATER_THAN_OR_EQUAL',
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
		'field': 'TransactionNo',
		'title': 'Transaction No',
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'field': 'TransactionAmount',
		'title': 'Transaction Amount',
		'type': 'currency',
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
		'field': 'VendorPrevBalanceAmount',
		'title': 'Vendor Prev Balance',
		'type': 'currency',
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
		'field': 'VendorNewBalanceAmount',
		'title': 'Vendor New Balance',
		'type': 'currency',
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
		'field': 'WalletPrevBalanceAmount',
		'title': 'Wallet Prev Balance',
		'type': 'currency',
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
		'field': 'WalletNewBalanceAmount',
		'title': 'Wallet New Balance',
		'type': 'currency',
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
		'field': 'IsBeingPush',
		'title': 'Is Being Pushed?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
	}
]

export const Wallet = [
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
		'field': 'WalletCode',
		'title': 'Wallet Code',
		'type': 'link',
		'link': '/player_manager/wallet/view/',
		'params': ['Id'],
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'varType': 'String',
		'searchExpression': 'EQUALS',
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
		'title': 'Player Profile',
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
		'field': 'PlayerRegistrationId',
		'title': 'Player Registration',
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
		'field': 'Balance',
		'type': 'currency',
		'title': 'Balance',
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
		'field': 'OutstandingBalance',
		'type': 'currency',
		'title': 'Outstanding Balance',
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
		'field': 'WageringRequirement',
		'type': 'currency',
		'title': 'Wagering Requirement',
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
		'field': 'WageringBalance',
		'type': 'currency',
		'title': 'Wagering Balance',
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
		'field': 'UpdatedBalance',
		'type': 'currency',
		'title': 'Updated Balance',
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
		'field': 'WalletLastUpdated',
		'title': 'Wallet Last Updated',
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
		'field': 'WithdrawableAmount',
		'type': 'currency',
		'title': 'Withdrawable Amount',
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
		'field': 'WithdrawableAsOf',
		'title': 'Withdrawable As Of',
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
		'field': 'NeedToSync',
		'title': 'Need To Sync?',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
		'field': 'WalletStatus',
		'title': 'Wallet Status',
		'varType': 'Int',
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
		'field': 'DepositAlertEmail',
		'title': 'Deposit Alert Email',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
		}
	},
	{
		'field': 'DepositAlertSms',
		'title': 'Deposit Alert Sms',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
		}
	},
	{
		'field': 'WithdrawAlertEmail',
		'title': 'Withdraw Alert Email',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
		}
	},
	{
		'field': 'WithdrawAlertSms',
		'title': 'Withdraw Alert Sms',
		'type': 'boolean',
		'boolOptions': ['True', 'False'],
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
		}
	}
]

export const PlayerNote = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{			
	// 		'title': 'Edit',
	// 		'link': '/player_manager/player_note/edit/',
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
		}
	},	
	{
		'field': 'PlayerNoteSubject',
		'title': 'Subject',
		'type': 'link',
		'link': '/player_manager/player_note/view/',
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
		}
	},
	{
		'field': 'UserName',
		'title': 'Player',
		'type': 'text',
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
			'defaultValue': 'UserName',
			'readOnly': {
				'add': true,
				'edit': true
			}
		}
	},
	{
		'field': 'TeamId',
		'title': 'Team',
		'shouldMap': true,
		'mapTo': 'teamsList',
		'mapByField': 'TeamCode',
		'searchType': 'select',
		'searchOptions': 'teamsList',
		'searchOptionKey': 'TeamCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': false,
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
		}
	},
	{
		'field': 'TeamCode',
		'title': 'Team Code',
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
		'field': 'TeamName',
		'title': 'Team Name',
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
		'field': 'PlayerNoteCategoryId',
		'title': 'Category',
		'shouldMap': true,
		'mapTo': 'playerNoteCategoryList',
		'mapByField': 'PlayerNoteCategoryCode',
		'searchType': 'select',
		'searchOptions': 'playerNoteCategoryList',
		'searchOptionKey': 'PlayerNoteCategoryCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': false,
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
		}
	},
	{
		'field': 'PlayerNoteCategoryCode',
		'title': 'Category Code',
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
		'field': 'PlayerNoteCategoryName',
		'title': 'Category Name',
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
		'field': 'PlayerNoteTypeId',
		'title': 'Type',
		'shouldMap': true,
		'mapTo': 'playerNoteTypeList',
		'mapByField': 'PlayerNoteTypeCode',
		'searchType': 'select',
		'searchOptions': 'playerNoteTypeList',
		'searchOptionKey': 'PlayerNoteTypeCode',
		'varType': 'ID!',
		'hidden': {
			'searchFieldSelection': false,
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
		}
	},
	{
		'field': 'PlayerNoteTypeCode',
		'title': 'Type Code',
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
		'field': 'PlayerNoteTypeName',
		'title': 'Type Name',
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
		'field': 'PlayerProfileId',
		'title': 'Player ID',
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
		'field': 'PlayerNoteDesc',
		'title': 'Description',
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
		}
	},
	{
		'field': 'FullName',
		'title': 'Full Name',
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
	}
]

export const PlayerDocument = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{			
	// 		'title': 'Edit',
	// 		'link': '/player_manager/player_document/edit/',
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
		}
	},
	{
		'field': 'Document',
		'title': 'Document Title',
		'type': 'link',
		'link': '/player_manager/player_document/view/',
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
		}
	},
	{
		'field': 'UserName',
		'title': 'Player',
		'type': 'text',
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
			'defaultValue': 'UserName',
			'readOnly': {
				'add': true,
				'edit': true
			}
		}
	},
	{
		'field': 'Type',
		'title': 'Type',
		'searchType': 'select',
		'searchOptions': 'PlayerDocumentTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'PlayerDocumentTypeEnum!',
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
			'defaultValue': 'PlayerDocumentType',
			'readOnly': {
				'add': false,
				'edit': false
			}
		}
	},
	{
		'field': 'DocumentTypeTitle',
		'title': 'Document Type Title',
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
		'field': 'ExpireOn',
		'title': 'Expire On',
		'searchType': 'date',
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
	{
		'field': 'IdNumber',
		'title': 'ID Number',
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
		}
	},
	{
		'field': 'FileIds',
		'title': 'Document File',
		'searchType': 'file',
		'fileOptions': {
			fileLimit: 1
		},
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
		}
	},
	{
		'field': 'FileInfos',
		'title': 'Document File',
		'searchType': 'file',
		'varType': 'Serialized!',
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
		'field': 'PlayerProfileId',
		'title': 'Player ID',
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
	}
]

export const PlayerNotification = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{			
	// 		'title': 'Edit',
	// 		'link': '/player_manager/player_notification/edit/',
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
			'defaultValue': 'ActiveRecord',
			'readOnly': {
				'add': false,
				'edit': false
			}
		}
	},	
	{
		'field': 'Title',
		'title': 'Title',
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
			'defaultValue': 'Title',
			'readOnly': {
				'add': false,
				'edit': true
			}
		}
	},
	{
		'field': 'NotificationName',
		'title': 'Notification Name',
		'type': 'link',
		'link': '/player_manager/player_notification/view/',
		'params': ['Id'],
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
			'defaultValue': 'NotificationName',
			'readOnly': {
				'add': false,
				'edit': true
			}
		}
	},
	{
		'field': 'NotificationDescription',
		'title': 'Notification Description',
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
			'defaultValue': 'NotificationDescription',
			'readOnly': {
				'add': false,
				'edit': true
			}
		}
	},
	{
		'field': 'PlayerRegistrationId',
		'title': 'Player Registration ID',
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
		'field': 'NotificationId',
		'title': 'Notification ID',
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
				'add': false,
				'edit': false
			}
		}
	},
	{
		'field': 'NotificationType',
		'title': 'Notification Type',
		'searchType': 'select',
		'searchOptions': 'NotificationTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'NotificationTypeEnum',
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
			'defaultValue': 'NotificationType',
			'readOnly': {
				'add': false,
				'edit': false
			}
		}
	},
	{
		'field': 'UserName',
		'title': 'User Name',
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
		}
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
		}
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
		}
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
		}
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
		}
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
		}
	}
]