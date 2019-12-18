/* eslint-disable react/no-deprecated */
import React, { Component } from 'react'
import { NavLink } from 'react-router-dom'
import { Badge, Nav, NavItem, NavLink as RsNavLink } from 'reactstrap'
import isExternal from 'is-url-external'
import classNames from 'classnames'
import nav from './_nav'
// import SidebarFooter from './../SidebarFooter'
// import SidebarForm from './../SidebarForm'
// import SidebarHeader from './../SidebarHeader'
// import SidebarMinimizer from './../SidebarMinimizer'

import Header from '../Header'

import { GetLocalData, RemoveLocalData, DocCookies, isObjectEmpty } from '../../utils/CoreHelpers'
import ErrorBoundary from '../../utils/ErrorBoundary'

class Sidebar extends Component {
	
	state = {
		UserInfo: {}
	}

	// componentWillMount() {
	// 	const currUser = GetLocalData('currUserInformations')
	// 	if (currUser) this.setState({ UserInfo: JSON.parse(currUser) })
	// }

	// handleClick(e) {
	// 	e.preventDefault()
	// 	e.target.parentElement.classList.toggle('open')
	// }

	visibilityStatus(method) {
		if (!isObjectEmpty(this.state.UserInfo) && this.state.UserInfo.userInfo.userRole == 'ROLE_ADMIN') return ''
		if (method == '') return ''

		const accessList = this.state.UserInfo.accessInfo

		if (accessList) {
			for (var itr = 0; itr < accessList.length; itr++) {
				if (accessList[itr].Method == method) {
					return ''
				}
			}
		}
		return ' d-none'
	}

	activeRoute(items, props) {
		const itemRoutes = [] 
		const push = url => itemRoutes.push(url)

		if (items.children) {
			items.children.map(item => {
				push(item.url)
				// sub children
				if (item.children) item.children.map(i => push(i.url))
			})
		} else {
			push(items.url)
		}

		return itemRoutes.includes(props.location.pathname) ? 'nav-item nav-dropdown active open' : 'nav-item nav-dropdown'
	}

	sidebarHover = () => {
		const sidebar = document.getElementById('sidebar')
		const body = document.body
		const sidebarMinimized = 'sidebar-minimized'
		let timeOut

		if (sidebar){
			sidebar.addEventListener('mouseenter', onMouseHover, false)
			sidebar.addEventListener('mouseleave', onMouseOut, false)
		}

		function onMouseHover() {
			// console.log('enters')
			timeOut = setTimeout(() => {
				body.classList.remove(sidebarMinimized)
			}, 250)
		}
		function onMouseOut() {
			// console.log('leaves')
			clearTimeout(timeOut)
			body.classList.add(sidebarMinimized)
		}
	}

	logMeOut(){
		DocCookies.removeItem('authToken')
		RemoveLocalData('currUser')
		RemoveLocalData('currUserInformations')
		window.location.reload()
	}

	componentDidMount() {
		const currUser = GetLocalData('currUserInformations')
		if (currUser) this.setState({ UserInfo: JSON.parse(currUser) })

		this.sidebarHover()
	}

	render() {
		const props = this.props
		const activeRoute = this.activeRoute
		// const handleClick = this.handleClick
		const { UserInfo: { userInfo } } = this.state
		const userName = userInfo ? userInfo.userName : ''

		// badge addon to NavItem
		const badge = badge => {
			if (badge) {
				const classes = classNames(badge.class)
				return <Badge className={classes} color={badge.variant}>{badge.text}</Badge>
			}
		}

		// simple wrapper for nav-title item
		const wrapper = item => { 
			return item.wrapper && item.wrapper.element 
				? (React.createElement(item.wrapper.element, item.wrapper.attributes, item.name)) 
				: item.name
		}

		// nav list section title
		const title = (title, key) => {
			const classes = classNames('nav-title', title.class)
			return <li key={key} className={classes}>{wrapper(title)} </li>
		}

		// nav list divider
		const divider = (divider, key) => <li key={key} className="divider"></li>

		// nav item with nav link
		const navItem = (item, key) => {
			const classes = classNames(item.class)
			const variant = classNames('nav-link', item.variant ? `nav-link-${item.variant}` : '')
			return (
				<NavItem key={key} className={activeRoute(item, props) + classes + this.visibilityStatus(item.method)}>
					{ isExternal(item.url) ?
						<RsNavLink href={item.url} className={variant} activeClassName="active">
							<i className={item.icon}></i>{item.name}{badge(item.badge)}
						</RsNavLink>
						:
						<NavLink to={item.url} className={variant} activeClassName="active">
							{item.icon && <i className={item.icon}></i> }
							{item.name}{badge(item.badge)}
						</NavLink>
					}
				</NavItem>
			)
		}

		// nav dropdown
		// const navDropdown = (item, key) => {
		// 	return (
		// 		<li key={key} className={activeRoute(item, props) + this.visibilityStatus(item.method)}>
		// 			<a className="nav-link nav-dropdown-toggle" href="#" onClick={handleClick.bind(this)}>
		// 				{item.icon && <i className={item.icon}></i> }
		// 				{item.name}
		// 			</a>
		// 			<ul className="nav-dropdown-items">
		// 				{navList(item.children)}
		// 			</ul>
		// 		</li>)
		// }

		// nav link
		const navLink = (item, idx) =>
			item.title ? title(item, idx) : 
				item.divider ? divider(item, idx) : navItem(item, idx)
					// item.children ? navDropdown(item, idx)
					// 	: navItem(item, idx)

		// nav list
		const navList = items => items.map((item, index) => navLink(item, index))

		// sidebar-nav root
		return (
			<div id="sidebar" className="sidebar">
				<ErrorBoundary>
					<Header />
				</ErrorBoundary>
				{/* <SidebarHeader />
				<SidebarForm /> */}
				<nav className="sidebar-nav sidebar-nav-main">
					<Nav>
						{navList(nav.items)}
					</Nav>
				</nav>
				<nav className="sidebar-nav sidebar-nav-user">
					<Nav>
						<li className="nav-item nav-dropdown c-nav__logout">
							<div className="nav-link" onClick={this.logMeOut} style={{ cursor: 'pointer' }}>
								<i className="icon-logout"></i>
								<span>
									<em>{userName}</em>
									<em>Logout</em>
								</span>
							</div>
						</li>
					</Nav>
				</nav>
				{/* <SidebarFooter /> */}
				{/* <SidebarMinimizer /> */}
			</div>
		)
	}
}

export default Sidebar