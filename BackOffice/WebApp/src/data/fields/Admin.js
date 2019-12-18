import { BoolOpts } from '../../utils/CoreHelpers'

export const Users = [
	{
		'field': 'id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'searchExpression': 'CONTAINS',
		'hidden': {
			'searchFieldSelection': true,
			'tableColumnSelection': false,
			'search': true,
			'list': true,
			'detail': true,	
			'form': {
				'add': true,
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
		'field': 'enabled',
		'title': 'Status',
		'sortable': false,
		'type': 'boolean',
		'boolOptions': ['Active', 'Inactive'],
		'searchType': 'checkbox',
		'searchOptions': BoolOpts('active'),
		'searchOptionKey': 'name',
		'searchExpression': 'EQUALS',
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
		},
	},
	{
		'field': 'username',
		'title': 'Username',
		'type': 'link',
		'link': '/admin/user/view/',
		'params': ['username'],
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
		'field': 'roles',
		'title': 'Role',
		'searchType': 'select',
		'searchOptions': 'UserRoleTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'UserRoleTypeEnum',
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
		'field': 'BrandMarkets',
		'title': 'Brand Markets',
		'searchType': 'select',
		'searchOptions': 'brandMarketList',
		'searchOptionKey': 'BrandCode',
		'searchExpression': 'EQUALS',
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
		},
	},
	{
		'field': 'email',
		'title': 'Email',
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
		'field': 'FirstName',
		'title': 'First Name',
		'varType': 'String',
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
		'field': 'LastName',
		'title': 'Last Name',
		'varType': 'String',
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
		'field': 'Title',
		'title': 'Title',
		'varType': 'Int',
		'searchExpression': 'CONTAINS',
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
		},
	},
	{
		'field': 'Street1',
		'title': 'Street 1',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
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
		},
	},
	{
		'field': 'Street2',
		'title': 'Street 2',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
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
		},
	},
	{
		'field': 'CityCode',
		'title': 'City',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
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
		},
	},
	{
		'field': 'RegionCode',
		'title': 'Region',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
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
		},
	},
	{
		'field': 'StateProvinceCode',
		'title': 'State',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
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
		},
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
		'field': 'TeamId',
		'title': 'Team',
		'searchType': 'select',
		'searchOptions': 'teamsList',
		'searchOptionKey': 'TeamName',
		'searchExpression': 'EQUALS',
		'varType': 'ID!',
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
	// {
	// 	'field': 'TeamName',
	// 	'title': 'Team',
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
		'field': 'AspNetUserId',
		'title': 'AspNet User ID',
		'varType': 'String',
		'searchExpression': 'CONTAINS',
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
	// { "field": "default_password", "title": "Default Password", "varType": "String"},
	// { "field": "password_requested_at", "title": "Password Requested At", "varType": "DateTime" },
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/admin/user/f/edit/',
	// 		'params': ['username']
	// 	}]
	// }
]