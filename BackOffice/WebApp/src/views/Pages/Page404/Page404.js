import React, { Component } from 'react'
import { Container, Row, Col } from 'reactstrap'

class Page404 extends Component {
	render() {
		return (
			<div className="app flex-row align-items-center" style={{ minHeight: 'auto' }}>

				<Container>
					<Row className="justify-content-center">
						<Col md="6" className="clearfix">
							<div className="float-left mr-4">
								<img src="/img/404.png" alt="You're lost, bruh" width="200"  />
							</div>
							<div className="float-left">
								<h1 className="display-3 pt-3">404</h1>
								<h3>Hey! You lost?</h3>
								<p className="text-muted">The page you are looking for was not found.</p>
								<button className="btn btn-warning btn-sm" onClick={() => window.history.back()}>Go back</button>
							</div>
							{/* <InputGroup className="input-prepend">
								<InputGroupAddon><i className="fa fa-search"></i></InputGroupAddon>
								<Input size="16" type="text" placeholder="What are you looking for?"/>
								<InputGroupButton>
									<Button color="info">Search</Button>
								</InputGroupButton>
							</InputGroup> */}
						</Col>
					</Row>
				</Container>
			</div>
		)
	}
}

export default Page404
