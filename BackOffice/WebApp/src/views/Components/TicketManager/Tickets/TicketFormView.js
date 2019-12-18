import React, { Fragment } from 'react'
import { graphql, compose } from 'react-apollo'
import pagination from 'pagination-object-generator'
import PropTypes from 'prop-types'
import { Card, Button, FormGroup, Form } from 'reactstrap'

import FormView from '../../../FormView'
import * as form from '../../../../utils/FormHelpers'
import ErrorBoundary from '../../../../utils/ErrorBoundary'

import EmailEditor from 'react-email-editor'

class TicketFormView extends FormView {

	filterAssignedToOptions(inputFields, entity){
		let filteredAssignedTo = [];
		inputFields.map((fields) => {
			let finalField = [];
			fields.map((f) => {
				let literalField = f;
				if(literalField.field === 'AssignedTo'){
					literalField.isDisabled = (parseInt(entity.TeamId) > 0) ? false : true;
					literalField.options = this.props.extradata.userList.items.filter(function(item){
						return item.TeamId == entity.TeamId;
					});
				}
				finalField.push(literalField);
			});
			filteredAssignedTo.push(finalField);
		});
		return filteredAssignedTo;
	}

	render() {
		const { method, formTitle }  = this.props
		const { entity, inputFields } = this.state
		const filteredInputField = this.filterAssignedToOptions(inputFields, entity);
		return (
			<Fragment>

				{ form.formHeaderTemplate({
					method,
					formTitle,
					goBack: this.handleGoBack
				}) }
				
				<Card body>

					<Form onSubmit={this.handleSubmit} className="c-form">
						<div className="c-form__fields">
							{ filteredInputField.map((fields, index) => (
								<div key={index}>
									{ this.fieldMapper(fields, entity) }
								</div>
							)) }
						</div>
						<div className="c-form__submit">
							<Button color="primary" className="btn btn-primary">
								<i className="fa fa-pencil"></i>{' '}
								{this.state.isSubmitting ? 'Submitting ...' : 'Save'}
							</Button>{' '}
							<Button color="secondary" onClick={this.handleGoBack.bind(this)}>
								<i className="fa fa-close"></i>{' '}Cancel
							</Button>
						</div>
					</Form>

				</Card>
			</Fragment>
		)
	}
}

export default TicketFormView