import React, { Component } from 'react'
import PropTypes from 'prop-types'
import TimeDisplay from '../TimeDisplay'
// import {
// 	Dropdown,
// 	DropdownMenu,
// 	DropdownItem,
// 	Nav,
// 	NavItem,
// 	NavbarToggler,
// 	NavbarBrand,
// 	DropdownToggle
// } from 'reactstrap'
// import { RemoveLocalData, DocCookies } from '../../utils/CoreHelpers'

class Header extends Component {
	// constructor() {
	// 	super()
	// 	this.state = {
	// 		dropdownOpen: false,
	// 	}
	// this.LogMeOut = this.LogMeOut.bind(this)
	// this.toggle = this.toggle.bind(this)
	// this.redirectTo = this.redirectTo.bind(this)
	// }

	// LogMeOut(){
	// 	DocCookies.removeItem('authToken');
	// 	RemoveLocalData('currUser')
	// 	RemoveLocalData('currUserInformations')
	// 	this.props.hasLogged()
	// }

	// toggle() {
	// 	this.setState({
	// 		dropdownOpen: !this.state.dropdownOpen
	// 	})
	// }

	// sidebarToggle(e) {
	// 	e.preventDefault()
	// 	document.body.classList.toggle('sidebar-hidden')
	// }

	// sidebarMinimize(e) {
	// 	e.preventDefault()
	// 	document.body.classList.toggle('sidebar-minimized')
	// }

	// mobileSidebarToggle(e) {
	// 	e.preventDefault()
	// 	document.body.classList.toggle('sidebar-mobile-show')
	// }

	// asideToggle(e) {
	// 	e.preventDefault()
	// 	document.body.classList.toggle('aside-menu-hidden')
	// }

	// redirectTo(v) {
	// 	window.location.href = v
	// }

	render() {
		// const user = this.props.userInfo.userName

		return (
			<header className="app-header">

				<div className="c-logo">
					<a href="#"> 
						<span className="c-logo__icon"></span>
					</a>
				</div>
				<TimeDisplay />


				{/* <NavbarToggler className="d-lg-none" onClick={this.mobileSidebarToggle}>&#9776;</NavbarToggler>
				<NavbarToggler className="d-md-down-none" onClick={this.sidebarToggle}>&#9776;</NavbarToggler> */}
				
				{/* <NavbarBrand href="#"></NavbarBrand> */}

				{/* <Nav navbar>

					<NavItem>
						<Dropdown isOpen={this.state.dropdownOpen} toggle={this.toggle}>
							<DropdownToggle className="nav-link dropdown-toggle">
								<img src={'img/avatars/6.jpg'} className="img-avatar" alt="admin@bootstrapmaster.com"/>
								<i className="icon-user"></i>&nbsp;
								<span className="d-md-down-none">{ user }</span>
							</DropdownToggle>
							<DropdownMenu right className={this.state.dropdownOpen ? 'show' : ''}>
								<DropdownItem header tag="div"><strong>Account</strong></DropdownItem>
								<DropdownItem><i className="fa fa-bell-o"></i> Updates<Badge color="info">42</Badge></DropdownItem>
								<DropdownItem><i className="fa fa-envelope-o"></i> Messages<Badge color="success">42</Badge></DropdownItem>
								<DropdownItem><i className="fa fa-tasks"></i> Tasks<Badge color="danger">42</Badge></DropdownItem>
								<DropdownItem><i className="fa fa-comments"></i> Comments<Badge color="warning">42</Badge></DropdownItem>
								<DropdownItem header tag="div"><strong>Settings</strong></DropdownItem>
								<DropdownItem onClick={this.redirectTo.bind(this, '/#/admin/user/view/'+ user)}>
									<i className="fa fa-user"></i> View Profile
								</DropdownItem>
								<DropdownItem onClick={this.redirectTo.bind(this, '/#/user_personal_info/edit/'+ user)}>
									<i className="fa fa-user"></i> Edit Profile
								</DropdownItem>
								<DropdownItem><i className="fa fa-wrench"></i> Settings</DropdownItem> 
								<DropdownItem><i className="fa fa-usd"></i> Payments<Badge color="secondary">42</Badge></DropdownItem>
								<DropdownItem><i className="fa fa-file"></i> Projects<Badge color="primary">42</Badge></DropdownItem>
								<DropdownItem divider/>
								<DropdownItem><i className="fa fa-shield"></i> Lock Account</DropdownItem>
								<DropdownItem onClick={this.LogMeOut}><i className="fa fa-lock"></i> Logout</DropdownItem>
							</DropdownMenu>
						</Dropdown>
					</NavItem>
				</Nav> */}
				{/* <NavbarToggler className="d-md-down-none" type="button" onClick={this.asideToggle}>&#9776;</NavbarToggler> */}
			</header>
		)
	}
}

Header.propTypes = {
	userInfo: PropTypes.object,
	hasLogged: PropTypes.func
}

export default Header
