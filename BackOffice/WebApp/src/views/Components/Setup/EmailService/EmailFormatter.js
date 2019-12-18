import React, { Fragment } from 'react'
import { graphql, compose } from 'react-apollo'
import pagination from 'pagination-object-generator'
import PropTypes from 'prop-types'
import { Card, Button, FormGroup, Form } from 'reactstrap'

import FormView from '../../../FormView'
import * as form from '../../../../utils/FormHelpers'
import ErrorBoundary from '../../../../utils/ErrorBoundary'

import EmailEditor from 'react-email-editor'

class EmailFormatter extends FormView {
	handleEmailFormatterSubmitForm = e => {
		e.preventDefault();
		this.editor.exportHtml(data => {
			this.setState({
				entity: {
					...this.state.entity,
					['JsonBody']: JSON.stringify(data.design),
					['MsgBody']: data.html
				}
			}, () => {
				this.handleSubmit();
			})
		})
	}

	onEmailTemplateLoad = () => {
		const { entity } = this.state;
		if(entity.JsonBody && this.editor !== undefined){
			this.editor.loadDesign(JSON.parse(entity.JsonBody));
		}
	}

	onDesignLoad = (data) => {
		const { entity } = this.state;
		if(entity.JsonBody){
			const dataTemplte = JSON.parse(entity.JsonBody);
			if(data.design.counters.u_row !== dataTemplte.counters.u_row){
				this.editor.loadDesign(JSON.parse(entity.JsonBody));
			}
		}
	}

	render() {
		const { method, formTitle }  = this.props;
		const { entity, inputFields } = this.state;

		return (
			<Fragment>
				{ form.formHeaderTemplate({ method, formTitle, goBack: this.handleGoBack }) }
				<Card body>
					<Form onSubmit={this.handleEmailFormatterSubmitForm} className="c-form">
						<div className="c-form__fields">
							{ inputFields.map((fields, index) => {
								let filteredFields = fields.filter(function(item) {
									return (item.field !== 'MsgBody' && item.field !== 'JsonBody')
								});
								return <div key={index}>
									{ this.fieldMapper(filteredFields, entity) }
								</div>
							}) }
						</div>
						<div>
							<EmailEditor ref={editor => this.editor = editor} onLoad={this.onEmailTemplateLoad} onDesignLoad={this.onDesignLoad} minHeight={'600px'}/>
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

export default EmailFormatter