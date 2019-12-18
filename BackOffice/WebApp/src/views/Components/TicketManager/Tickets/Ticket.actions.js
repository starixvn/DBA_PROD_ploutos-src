import React, { Component } from 'react'
import { Row, Col, Label, Input } from 'reactstrap'

import SelectSearch from '../../../../components/SelectSearch'
import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'


export function actions(data, context) {     
	return ([
		{
			task: 'Acknowledge',
			action: 'acknowledge',
			icon: 'heart',
			isVisible: isActionVisibile('Open', 'acknowledge', 'actionAcknowledgeTicketMutation', data, context)
		},
		{
			task: 'Reassign',
			action: 'assign',
			icon: 'share',
			isVisible: isActionVisibile('Acknowledged', 'assign', 'actionAssignTicketMutation', data, context)
		},
		{
			task: 'Close',
			action: 'close',
			icon: 'times-circle',
			isVisible: isActionVisibile('Acknowledged', 'close', 'actionCloseTicketMutation', data, context)
		},
		{
			task: 'Edit',
			action: 'edit',
			icon: 'edit',
			color: 'warning',
			linkTo: `/ticket_manager/ticket/edit/${data.Id}`,
			isVisible: isActionVisibile('All', 'edit', 'actionEditTicket', data, context)
		}
	])
}

export class ReAssignModal extends Component {
	state = {
		assignTo: this.props.assignTo,
		comment: ''
	}
	render(){
		return (
			<Row>
				<Col xs="12"><h5>Reassign</h5></Col>
				<Col xs="12">
					<Label htmlFor="AssignedTo">Assign To (*)</Label>
					<SelectSearch 
						type="select"
						searchKey={{ value: 'username', label: 'username', variables: '' }}
						searchQuery={this.props.filteredUsers}  
						searchValue={this.state.assignTo}
						searchOnChange={e => this.setState({ ...this.state, ['assignTo']: e.target.value })}
					/>
				</Col>
				<Col xs="12">
					<Label htmlFor="Comments" className="my-2">Comments</Label>
					<Input type="textarea" name="Comments" id="Comments" placeholder="" onChange={e => this.setState({ ...this.state, ['comment']: e.target.value })}/>
				</Col>
				<Col xs="12">
					<button type="submit" className="btn btn-sm btn-primary mt-2" onClick={e => this.props.onClick(this.state)}>Assign</button>
				</Col>
			</Row>
		)
	}
}

export function renderModalContent(v) {

	const data = v.props.data.tickets[0]
	const users = v.props.extradata.userList.items    
	const ticketId = data.Id || 0

	let comment = ''
	// let assignTo = data.AssignedTo; //data.AssignedTo
	let filteredUsers = []

	users.map(user => {
		if (parseInt(user.TeamId) == parseInt(data.TeamId)) {
			filteredUsers.push(user)
		}
	})

	// MODAL CONTENT PER ACTION
	switch (v.action) {
	case 'acknowledge': return (
		<Row>
			<Col xs="12"><h5>Acknowledge</h5></Col>
			<Col xs="12" mb="1">
				<p>Click button to acknowledge this ticket.</p>
			</Col>
			<Col xs="12">                
				<button type="submit" className="btn btn-sm btn-primary mt-2" onClick={acknowledgeTicket.bind(this)}>Acknowledge</button>
			</Col>
		</Row>
	)
	case 'assign': return (
		<ReAssignModal filteredUsers={filteredUsers} assignTo={data.AssignedTo} onClick={assignTicket.bind(this)}/>
	)
	case 'close': return (
		<Row>
			<Col xs="12"><h5>Close Ticket</h5></Col>
			<Col xs="12">
				<Label htmlFor="Comments" className="my-2">Comments (*)</Label>
				<Input type="textarea" name="Comments" id="Comments"
					placeholder=""
					onChange={e => (comment = e.target.value)}
				/>
			</Col>
			<Col xs="12">               
				<button type="submit" className="btn btn-sm btn-primary mt-2" onClick={closeTicket.bind(this)}>Close</button>
			</Col>
		</Row>
	)
	}


	//=== ACTION FUNCTIONS
	// Must match to graphql query/mutate operations
	function acknowledgeTicket() {
		v.props.acknowledgeMutation({
			variables: {
				Id: ticketId
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function assignTicket(values) {
		if (values.assignTo.length !== 0) {
			v.props.assignMutation({
				variables: {
					Id: ticketId,
					Comments: values.comment,
					AssignedTo: values.assignTo
				}
			})
				.then(() => successResponse(v))
				.catch(error => errResponse(v, error))
		} else {
			alert('You must choose a user.')
		}
	}
	function closeTicket() {
		if (comment.length !== 0) {
			v.props.closeMutation({
				variables: {
					Id: ticketId,
					Comments: comment
				}
			})
				.then(() => successResponse(v))
				.catch(error => errResponse(v, error))
		} else {        
			alert('Comment is required.')
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
 * @returns {boolean} True / False
 */
function isActionVisibile(a, b, c, d, e) {
	if (d.AssignedTo != e.userInfo.userName && e.userInfo.userRole != 'ROLE_ADMIN') return false

	return (a.indexOf(d.Status) !== -1 || a.indexOf('All') !== -1) && e.handleElementAccess(c) && true
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
		error: { err } 
	})
}