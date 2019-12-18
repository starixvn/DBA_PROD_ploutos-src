import React from 'react'
// import { Link } from 'react-router-dom'
// import Row from 'reactstrap/lib/Row'
// import Col from 'reactstrap/lib/Col'
import PropTypes from 'prop-types'

import TableData from '../components/TableData'
import SearchFilter from  '../components/SearchFilter'

const ListView = props => {
	
	const { 
		tableData, tableTitle, tableSortby, tableSortorder, tablePager, tableCount, tableExport, tableViewRecord,
		includeSearch, searchQuery,
		createLink
	} = props

	return (
		<div className="l-listview">

			{ includeSearch && 
				<SearchFilter 
					query={searchQuery.search}
				/>
			}

			<TableData
				title={tableTitle}
				data={tableData}
				sortBy={tableSortby}
				sortOrder={tableSortorder}
				pager={tablePager}
				count={tableCount}
				exporter={tableExport}
				viewer={tableViewRecord}
				createLink={createLink}
			/>

		</div>
	)
}

ListView.propTypes = {
	tableData: PropTypes.array,
	tableTitle: PropTypes.string,
	tableSortby: PropTypes.string,
	tableSortorder: PropTypes.string,
	tablePager: PropTypes.object,
	tableCount: PropTypes.number,
	tableExport: PropTypes.oneOfType([PropTypes.object, PropTypes.bool]),
	tableViewRecord: PropTypes.bool,
	includeSearch: PropTypes.bool,
	searchQuery: PropTypes.oneOfType([PropTypes.object, PropTypes.string]),
	createLink: PropTypes.string
}

export default ListView