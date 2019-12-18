export const AbstractFields = [
	{
		'field': 'CreatedById',
		'title': 'Created By Id',
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
		'field': 'DateCreated',
		'title': 'Date Created',
		'varType': 'DateTime',
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
		'field': 'ModifiedById',
		'title': 'Modified By Id',
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
		'field': 'DateModified',
		'title': 'Date Modified',
		'varType': 'DateTime',
		'hidden': {
			'searchFieldSelection': false,
			'tableColumnSelection': false,
			'list': false,
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
		'field': 'CreatedByUserName',
		'title': 'Created By',
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
	},
	{
		'field': 'ModifiedByUserName',
		'title': 'Modified By',
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