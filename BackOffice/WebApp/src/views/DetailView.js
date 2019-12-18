import React, { Component, Fragment } from 'react'
import { Link } from 'react-router-dom'
import PropTypes from 'prop-types'

import Button from 'reactstrap/lib/Button'
import Dropdown from 'reactstrap/lib/Dropdown'
import DropdownToggle from 'reactstrap/lib/DropdownToggle'
import DropdownMenu from 'reactstrap/lib/DropdownMenu'
import DropdownItem from 'reactstrap/lib/DropdownItem'

import TabDisplay from '../components/Tabs'

class DetailView extends Component {

	state = {
		dropdownOpen: false,
		iconClass: localStorage.getItem('pageIcon') || ''
	}
	
	handleGoBack = () => this.context.onGoBack()

	handleModalToggle = action => this.context.onModalToggle(action)

	handleDropdownToggle = () => {
		this.setState({
			dropdownOpen: !this.state.dropdownOpen
		})
	}

	render() {

		const { displayTitle, displayMainTab, displaySecondaryTab, displayActions, displayAccountStatus } = this.props
		const { dropdownOpen, iconClass } = this.state
		return (        
			<Fragment>

				<div className="c-table__title d-flex justify-content-between align-items-center mb-3">
					<div className="d-flex">
						<button className="btn btn-sm btn-secondary mr-1" title="Back to List"
							onClick={this.handleGoBack}>
							<i className="fa fa-arrow-left"></i>
						</button>      
						<span className="c-view__title">
							<span className="legend"><i className={iconClass}></i></span>
							<span className="name">{displayTitle}</span>
						</span>
					</div>
					<ul className="list-unstyled c-btn-utils--player align-self-end mb-0">
						{ (displayActions !== undefined && displayActions.length !== 0) && (
							displayActions.map((a,i) => {

								const color = a.color !== undefined ? a.color : 'info'
								const method = action => a.method !== undefined ? a.method : this.handleModalToggle.bind(this, action)
								
								return ( 
									<li key={i}>

										{ a.tasks === undefined ? (
											a.isVisible && (   
												a.linkTo !== null && a.linkTo !== undefined ? (
													<Link to={a.linkTo}>
														<button className="btn btn-sm btn-outline btn-outline-warning" title={a.task}>
															<i className={`fa fa-${a.icon}`}></i>{' '} {a.task}
														</button>
													</Link>
												) : (
													<Button 
														onClick={method(a.action)} 
														className={`btn btn-sm btn-outline-${color}`} 
														title={a.task}>
														<i className={`fa fa-${a.icon}`}></i>{' '} {a.task}
													</Button>
												)
											)
											
										) : (
											(displayAccountStatus !== 'Archived') && 
												<Dropdown size="sm" isOpen={dropdownOpen} toggle={this.handleDropdownToggle}>
													<DropdownToggle color={dropdownOpen ? 'primary' : 'outline-primary'}>
														<i className="fa fa-gear"></i>
													</DropdownToggle>
													<DropdownMenu right>
														<DropdownItem header>Manage this player</DropdownItem>
														{ a.tasks.map((t, i) => (
															t.isVisible && (
																<DropdownItem key={i} onClick={method(t.action)}>
																	<i className={`fa fa-${t.icon}`}></i>{' '}{t.task}
																</DropdownItem>
															)
														))}
													</DropdownMenu>
												</Dropdown>
										)}
									</li>
								)
							})
						)}
					</ul>
				</div>
				
				<TabDisplay navs={displayMainTab} />

				{ displaySecondaryTab.tabs.length !== 0 && (      
					<TabDisplay navs={displaySecondaryTab} />
				)}

			</Fragment>
		)

	}
}

DetailView.propTypes = {
	displayTitle: PropTypes.string,
	displayMainTab: PropTypes.object,
	displaySecondaryTab: PropTypes.object,
	// displayTertiaryTab: PropTypes.object,
	// displayQuaternaryTab: PropTypes.object,
	displayActions: PropTypes.array
}

DetailView.contextTypes = {
	onModalToggle: PropTypes.func,
	onGoBack: PropTypes.func,
}

export default DetailView 