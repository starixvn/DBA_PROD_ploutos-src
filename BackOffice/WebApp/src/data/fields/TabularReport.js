import { BoolOpts } from '../../utils/CoreHelpers'

export const TabularReport = [
	{
		'field': 'Id',
		'title': 'ID',
		'varType': 'ID!',
		'isRequired': true,
		'searchExpression': 'CONTAINS',
		'hidden': {
			'search': true,
			'list': true,
			'detail': false,
			'form': {
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
		'searchOptionKey': 'name',
		'searchExpression': 'EQUALS',
		'varType': 'Boolean',
		'showDefault': true,
		'showFormDefault': true,
		'hidden': {
			'search': true,
			'list': false,
			'detail': false,
			'form': {
				'add': true,
				'edit': true
			}
		}
	},
	{
		'field': 'ReportName',
		'title': 'Report Name',
		'type': 'link',
		'link': '/reports/tabular/view/',
		'params': ['Id'],
		'varType': 'String!',
		'showDefault': true,
		'searchDefault': true,
		'showFormDefault': true,
		'searchExpression': 'CONTAINS',
		'isRequired': true,
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
		}
	},
	{
		'field': 'ReportConfig',
		'title': 'Report Config',
		'varType': 'String!',
		'isRequired': true,
		'hidden': {
			'search': false,
			'list': true,
			'detail': false,
			'form': {
				'add': true,
				'edit': true
			}
		}
	},
	{
		'field': 'CreatedById',
		'title': 'Created By',
		'varType': 'ID',
		'hidden': {
			'search': true,
			'list': true,
			'detail': false,
			'form': {
				'add': true,
				'edit': true
			}
		}
	},
	{
		'field': 'DateCreated',
		'title': 'Date Created',
		'varType': 'DateTime',
		'hidden': {
			'search': true,
			'list': true,
			'detail': false,
			'form': {
				'add': true,
				'edit': true
			}
		}
	},
	{
		'field': 'ModifiedById',
		'title': 'Modified By',
		'varType': 'ID',
		'hidden': {
			'search': true,
			'list': true,
			'detail': false,
			'form': {
				'add': true,
				'edit': true
			}
		}
	},
	{
		'field': 'DateModified',
		'title': 'Date Modified',
		'showDefault': true,
		'varType': 'DateTime',
		'hidden': {
			'search': true,
			'list': true,
			'detail': false,
			'form': {
				'add': true,
				'edit': true
			}
		}
	},
	{
		'field': 'Roles',
		'title': 'Roles',
		'varType': 'String!',
		'isRequired': true,
		'hidden': {
			'search': false,
			'list': false,
			'detail': false,
			'form': {
				'add': true,
				'edit': true
			}
		}
	},
]