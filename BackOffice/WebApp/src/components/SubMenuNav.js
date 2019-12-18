import React from 'react'
import PropTypes from 'prop-types'
import { NavLink, withRouter } from 'react-router-dom'

import nav from './Sidebar/_nav'

const SubMenuNav = props => {
	const url = props.location.pathname //props.match
	const category = url => url.split('/')[1]
	const module = url => url.split('/').splice(1,2).join('/')
	const initial = nav => nav.substring(0,1)
	const navItems = nav.items.find(n => category(n.url) === category(url))

	localStorage.setItem('pageCateogry', category(url))
	localStorage.setItem('pageModule', module(url))
	localStorage.setItem('pageIcon', navItems ? navItems.icon : null)

	if (navItems !== undefined && navItems.children !== undefined) {
		return ( 
			<nav className="c-submenu-navbar">
				<ul className="c-submenu__list">
					{ navItems.children.map(nav => {
						const hasChild = nav.hasOwnProperty('children')
						const childItems = hasChild && nav.children || []
						const isActiveClass = () => module(nav.url) === module(url)

						return (
							<li key={nav.method} className={`c-submenu__item ${hasChild ? 'has-child-sub' : ''}`}>
								<NavLink to={nav.url} className="c-submenu__link" isActive={isActiveClass}>
									<span className="legend">{initial(nav.name)}</span>
									<span className="name">{nav.name} {hasChild ? '+' : ''}</span>
								</NavLink>

								{ (hasChild && childItems.length !== 0) && 
									<ul className="list-unstyled c-submenu__dropdown">
										{ childItems.map((n, i) => 
											<li key={i}>
												<NavLink exact to={n.url}>
													{n.name}
												</NavLink>
											</li>
										)}
									</ul>
								}
							</li>
						)
					})}
				</ul>
			</nav>
		)
	}

	return null
}

export default withRouter(SubMenuNav)

SubMenuNav.propTypes = {
	location: PropTypes.object,
	match: PropTypes.object
}
