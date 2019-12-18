import React from 'react'
import Row from 'reactstrap/lib/Row'
import Col from 'reactstrap/lib/Col'
import Label from 'reactstrap/lib/Label'
import Input from 'reactstrap/lib/Input'

// import SelectSearch from '../../../../components/SelectSearch'
import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'


export function actions(data, context) {
	return ([
		{
			task: 'Suspend',
			action: 'suspend',
			icon: 'user-times',
			color: 'danger',
			isVisible: isActionVisibile('Activated', 'suspend', 'actionSuspendAffiliateMutation', data, context)
		},
		{
			task: 'Activate',
			action: 'activate',
			icon: 'user-plus',
			color: 'success',
			isVisible: isActionVisibile('Suspended', 'activate', 'actionActivateAffiliateMutation', data, context)
		},
		{
			task: 'Close',
			action: 'close',
			icon: 'ban',
			color: 'danger',
			isVisible: isActionVisibile('Activated,Suspended', 'close', 'actionCloseAffiliateMutation', data, context)
		},
		{
			task: 'Edit',
			action: 'edit',
			icon: 'edit',
			color: 'warning',
			linkTo: `/affiliate_manager/affiliate/f/edit/${data.Id}`,
			isVisible: (data.AffiliateStatus === 'Closed')? false : true
		}
	])
}

export function renderModalContent(v) {

	const data = v.props.data.affiliate[0]
	const dataId = data.Id || 0

	let comment = ''

	// MODAL CONTENT PER ACTION
	return (
		<Row>
			<Col xs="12"><h5 style={{ textTransform: 'capitalize' }}>{v.action}</h5></Col>
			<Col xs="12">Are you sure you want to {v.action} this affiliate?</Col>
			<Col xs="12">
				<Label htmlFor="Remark" className="my-2">Remark (*)</Label>
				<Input type="textarea" name="Remark" 
					id="Remark" 
					onChange={e => (comment = e.target.value)}
				/>
			</Col>
			<Col xs="12">                
				<button type="submit" 
					className="btn btn-sm btn-primary mt-2" 
					onClick={updateAffiliateStatus.bind(this, method())}
					style={{ textTransform: 'capitalize' }}>
					{ v.action }
				</button>
			</Col>
		</Row>
	)


	//=== ACTION FUNCTIONS
	// Must match to graphql query/mutate operations
	function schema() {
		switch (v.action) {
		case 'activate': return 'actionActivateAffiliateMutation'
		case 'suspend': return 'actionSuspendAffiliateMutation'
		case 'close': return 'actionCloseAffiliateMutation'
		}
	}
	function method() {
		switch (v.action) {
		case 'activate': return 'activateAffiliateMutation'
		case 'suspend': return 'suspendAffiliateMutation'
		case 'close': return 'closeAffiliateMutation'
		}
	}
	function updateAffiliateStatus(m) {
		if (comment.length !== 0) {
			v.props[m]({
				variables: {
					Id: dataId,
					Note: comment
				}
			})
				.then(res => {
					const status = JSON.parse(res.data[schema()].apiResult)
					status.Status ? successResponse(v) : errResponse(v, status.Message)
				})
				.catch(error => errResponse(v, error))
		} else {        
			alert('Remark is required.')
		}
	}
}




/**
 * TICKET ACTION DISPLAY VISIBILITY
 * 
 * @param {string} a - Current status/es to match against
 * @param {string} b - Action to be done
 * @param {string} c - Required Access the user must have
 * @param {object} d - Current data item
 * @param {object} e - Inherited context from parent
 * @returns {boolean} True/False
 */
function isActionVisibile(a, b, c, d, e) {
	return (a.indexOf(d.AffiliateStatus) !== -1 || a.indexOf('All') !== -1) && e.handleElementAccess(c)
}


/**
 * SUCCESS RESPONSE HANDLER
 * 
 * @param {any} v : Object (Props/Context) passed
 * @returns {callback} SuccessHandler
 */
function successResponse(v) {
	SuccessHandler({
		context: v.context, 
		callback: v.props.data.refetch().then(() => v.onModalClose()),
	})
}
/**
 * ERROR RESPONSE HANDLER
 * 
 * @param {any} v : 
 * @param {any} err : Error message
 * @returns {callback} ErrorHandler
 */
function errResponse(v, err) {
	ErrorHandler({ 
		context: v.context,
		callback: v.onModalClose(),
		error: err
	})
}