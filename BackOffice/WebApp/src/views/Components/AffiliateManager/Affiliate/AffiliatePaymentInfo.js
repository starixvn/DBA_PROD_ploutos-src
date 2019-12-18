import React, { Fragment } from 'react'
import PropTypes from 'prop-types'

const AffiliatePaymentInfo = props => {

	const { BankAccountName, BankAccountNumber, BankName, BankAccountBranch, BankAccountCity, BankAccountProvince } = props
	const items = [
		{ label: 'Bank Account Name', value: BankAccountName }
		,{ label: 'Bank Account Number', value: BankAccountNumber }
		,{ label: 'Bank Name', value: BankName }
		,{ label: 'Bank Account Branch', value: BankAccountBranch }
		,{ label: 'Bank Account City', value: BankAccountCity }
		,{ label: 'Bank Account Province', value: BankAccountProvince }
	]

	const fields = items.map((item, i) => {
		return (
			<Fragment key={i}>
				<dt>{item.label}:</dt>
				<dd>
					<span>{item.value || '---'}</span>
				</dd>
			</Fragment>
		)
	})

	return (
		<dl className="c-dl--inline">
			{ fields }
		</dl>
	)
}


AffiliatePaymentInfo.propTypes = {
	BankAccountName: PropTypes.string, 
	BankAccountNumber: PropTypes.string,
	BankName: PropTypes.string,
	BankAccountBranch: PropTypes.string,
	BankAccountCity: PropTypes.string,
	BankAccountProvince: PropTypes.string,
}

export default AffiliatePaymentInfo