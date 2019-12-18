import React, { Component } from 'react'
import { Container, Row, Col, CardGroup, Card, Input, InputGroup, InputGroupAddon, Form } from 'reactstrap'
import PropTypes from 'prop-types'

import { SetLocalData, RemoveLocalData, DocCookies } from '../../../utils/CoreHelpers'
import { LocalConfiguration } from '../../../config/Configurations'

class Login extends Component {
	
	state = {
		GeneratedKey: '',
		RedirectFlag: false,
		loginData: {
			UserName: '',
			Password: '',
		},
		errorMsg: '',
		errorMsgPasskey: ''
	}

	// set state input value
	handleInputChange = f => e => {
		this.setState({
			loginData: { ...this.state.loginData, [f]: e.target.value }
		})
	}

	submitLoginForm = e => {
		const { UserName, Password } =  this.state.loginData
		e.preventDefault()
		if (UserName.length === 0 || Password.length === 0) {
			this.setState({ errorMsg: 'Username and Password are required.' })
		} else {
			fetch(LocalConfiguration.ApiEndPoint() + '/api/login_check', {
				method: 'POST',
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
				},
				body: '_username=' + encodeURIComponent(UserName) + '&_password=' + encodeURIComponent(Password)
			})
				.then(response => response.json())
				.then(json => {
					if (json.code === 401) {
						this.setState({ errorMsg: 'Wrong login information. Please retry.' })
					}
					if (json.token) {
						// SetLocalData('authToken', json.token);
						DocCookies.setItem('authToken', json.token, 3600*3, '/', '') // EXPIRE IN 3 HOURs
						fetch(LocalConfiguration.ApiEndPoint() + '/user_information', {
							method: 'POST',
							headers: {
								'Accept': 'application/json',
								'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8',
								'Authorization': `Bearer ${json.token}`
							}
						})
							.then(response => response.json())
							.then(json => {
								// if (json.code === 401) {}
								SetLocalData('currUserInformations', JSON.stringify(json))
								this.props.hasLogged()
							})
							.catch(() => {
							})
					}
				})
				.catch(() => this.setState({ errorMsg: 'Failed to connect to the network.' }) )
		}
	}

	submitGeneratedKey = () => {
		// const { GeneratedKey } = this.state
		// e.preventDefault()
		// if ( GeneratedKey.length === 0 ) {
		//   this.setState({ errorMsgPasskey:  'API Key is required' })
		// } else {
		//   SetLocalData('authToken', GeneratedKey)
		//   this.setState({ RedirectFlag: true }) // FORCE DOM TO RE-RENDER
		// }
	}

	componentDidMount() {
		// RemoveLocalData('authToken');
		DocCookies.removeItem('authToken')
		RemoveLocalData('currUserInformations')
	}

	render() {
		const { errorMsg, errorMsgPasskey } = this.state

		return (
			<div className="app flex-row align-items-center">
				<Container>
					<Row className="justify-content-center">
						<Col md="8">
							<CardGroup className="mb-0">

								<Card body className="p-4">
									<h1>Login</h1>
									<p className="text-muted">Sign In to your account</p>
									{ 
										errorMsg && <p className="text-danger">{errorMsg}</p>
									}
									<Form onSubmit={this.submitLoginForm.bind(this)}>
										<InputGroup className="mb-3">
											<InputGroupAddon addonType="prepend"><i className="icon-user"></i></InputGroupAddon>
											<Input type="text" placeholder="Username" onChange={this.handleInputChange('UserName')}/>
										</InputGroup>
										<InputGroup className="mb-4">
											<InputGroupAddon addonType="prepend"><i className="icon-lock"></i></InputGroupAddon>
											<Input type="password" placeholder="Password" onChange={this.handleInputChange('Password')}/>
										</InputGroup>
										<Row>
											<Col xs="6">
												<button color="primary" className="px-4 btn btn-primary" type="submit">Login</button>
											</Col>
											{/* <Col xs="6" className="text-right">
												<Button color="link" className="px-0">Forgot password?</Button>
											</Col> */}
										</Row>
									</Form>
								</Card>

								<Card body className="text-white text-center bg-primary py-5 d-md-down-none"
									/* style={{ width: 44 + '%' }} */
								>
									<div>
										<h2>One Time Pass Key</h2>
										<p>Paste here you one time Hash Key.</p>
									</div>
									{ 
										errorMsgPasskey && <p className="text-danger">{errorMsgPasskey}</p>
									}
									<Form onSubmit={this.submitGeneratedKey.bind(this)}>
										<Row>
											<Col xs="12">
												<InputGroup className="mb-4">
													<InputGroupAddon addonType="prepend"><i className="icon-lock"></i></InputGroupAddon>
													<Input type="password" placeholder="Generated API Key" onChange={e => this.setState({ GeneratedKey: e.target.value })}/>
												</InputGroup>
											</Col>
											<Col xs="12">
												<button type="submit" color="secondary" className="px-4 btn btn-secondary">Authenticate</button>
											</Col>
										</Row>
									</Form>
								</Card>

							</CardGroup>

							<p className="text--tiny text-muted text-center"><b>Forgot your password? : </b> Please retrieve your user name and temporary password from your email account or contact your System Administrator.</p>
						</Col>
					</Row>
				</Container>
			</div>
		)
	}
}

Login.propTypes = {
	hasLogged: PropTypes.func
}

export default Login
