import { BoolOpts } from '../../utils/CoreHelpers'

export const EmailBlast = [
	// {
	// 	'field': '',
	// 	'title': 'Action',
	// 	'sortable': false,
	// 	'type': 'action',
	// 	'actions': [{
	// 		'title': 'Edit',
	// 		'link': '/marketing/email_blast/edit/',
	// 		'params': ['Id']
	// 	}]
	// },
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
			'defaultValue': true,
			'readOnly': {
				'add': false,
				'edit': false
			}
		},
	},
	{
		'field': 'TemplateName',
		'title': 'Email Template Name',
		'type': 'link',
		'link': '/marketing/email_blast/view/',
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
		'field': 'BatchId',
		'title': 'Batch Id',
		'varType': 'String',
		'searchExpression': 'EQUALS',
		'hidden': {
			'searchFieldSelection': false,
			'search': false,
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
		'field': 'Counter',
		'title': 'Counter',
		'varType': 'ID',
		'hidden': {
			'searchFieldSelection': false,
			'search': false,
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
		'field': 'EmailRecipientCount',
		'title': 'Email Recipient Count',
		'varType': 'ID',
		'hidden': {
			'searchFieldSelection': false,
			'search': false,
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
		'field': 'EmailAddress',
		'title': 'Email Addresses',
		'varType': 'String!',
		'searchType': 'textarea',
		'showDefault': true,
		'searchDefault': true,
		'showFormDefault': true,
		'searchExpression': 'CONTAINS',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'search': false,
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
		'field': 'EmailTemplateId',
		'title': 'Email Template',
		'searchType': 'select',
		'searchOptions': 'emailTemplateList',
		'searchOptionKey': 'TemplateName',
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
		'field': 'Status',
		'title': 'Status',
		'varType': 'String',
		'searchType': 'text',
		'searchDefault': true,
		'searchExpression': 'EQUALS',
		'hidden': {
			'searchFieldSelection': true,
			'search': false,
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
	}
]

export const EmailBlastMonitoring = [
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
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
		'field': 'EmailAddress',
		'title': 'Email Address',
		'varType': 'String!',
		'searchType': 'text',
		'showDefault': true,
		'searchDefault': true,
		'showFormDefault': true,
		'searchExpression': 'EQUALS',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'search': false,
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
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'Status',
		'title': 'Status',
		'varType': 'String!',
		'searchType': 'text',
		'showDefault': true,
		'searchDefault': true,
		'showFormDefault': true,
		'searchExpression': 'EQUALS',
		'isRequired': true,
		'hidden': {
			'searchFieldSelection': true,
			'search': false,
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
				'add': true,
				'edit': true
			}
		},
	},
	{
		'field': 'EmailBlastId',
		'title': 'Email Blast',
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