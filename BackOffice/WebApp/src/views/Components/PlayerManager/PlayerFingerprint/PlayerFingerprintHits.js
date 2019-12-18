import React from 'react'
import PropTypes from 'prop-types'
import Table from 'reactstrap/lib/Table'

import Loader from '../../../../components/Loader'

const PlayerFingerprintHits = props => {

	const headers = ['UserName', 'FingerPrint', 'DateCreated']

	if (props.data === undefined) return <Loader />

	return (
		<Table responsive size="sm">
			<thead>
				<tr>
					<th>Username</th>
					<th>Fingerprint</th>
					<th>Date Created</th>
				</tr>
			</thead>
			<tbody>
				{props.data.items.map(item => (
					<tr key={item.Id}>
						{ headers.map((h, i) => (
							<td key={i}>{item[h]}</td>
						))}
					</tr>
				))}
			</tbody>
		</Table>
	)
}

PlayerFingerprintHits.propTypes = {
	data: PropTypes.object
}

export default PlayerFingerprintHits