import { BoolOpts } from '../../utils/CoreHelpers'

export const Ticket = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [
	// 		{ 'title': 'Edit', 'link': '/ticket_manager/ticket/edit/', 'params': ['Id'] }
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
		'field': 'TicketNo',
		'title': 'Ticket No',
		'type': 'link',
		'link': '/ticket_manager/ticket/view/',
		'params': ['Id'],
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
		'field': 'TicketSubject',
		'title': 'Subject',
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
		}
	},
	{
		'field': 'TicketDetails',
		'title': 'Details',
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
		}
	},
	{
		'field': 'PlayerName',
		'title': 'Player Name',
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
		'field': 'TicketCategoryId',
		'title': 'Ticket Category',
		'searchType': 'select',
		'searchOptions': 'ticketCategoryList',
		'searchOptionKey': 'TicketCategoryName',
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
		}
	},
	{
		'field': 'TicketCategoryName',
		'title': 'Category',
		'searchType': 'select',
		'searchOptions': 'ticketCategoryList',
		'searchOptionKey': 'TicketCategoryName',
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
		}
	},
	{
		'field': 'TeamId',
		'title': 'Team',
		'searchType': 'select',
		'searchOptions': 'teamsList',
		'searchOptionKey': 'TeamName',
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
		}
	},
	{
		'field': 'TeamName',
		'title': 'Team',
		'searchType': 'select',
		'searchOptions': 'teamsList',
		'searchOptionKey': 'TeamName',
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
		}
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
		}
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
		}
	},
	{
		'field': 'AssignedTo',
		'title': 'Assigned To',
		'searchType': 'select',
		'searchOptions': 'userList',
		'searchOptionKey': 'username',
		'searchExpression': 'EQUALS',
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
				'add': 'console.log(props.entity)',
				'edit': false
			}
		},
	},
	{
		'field': 'Status',
		'title': 'Ticket Status',
		'type': 'status',
		'searchType': 'select',
		'searchOptions': 'TicketStatusTypeEnum',
		'searchExpression': 'EQUALS',
		'varType': 'TicketStatusTypeEnum',
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
