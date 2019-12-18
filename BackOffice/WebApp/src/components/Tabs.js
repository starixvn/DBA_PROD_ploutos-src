import React, { Component } from  'react'
import PropTypes from 'prop-types'
import {
	Row, Col,
	TabContent, TabPane, 
	Nav, NavItem, NavLink,
} from 'reactstrap'
import { GetLocalData, SetLocalData } from '../utils/CoreHelpers'
import ErrorBoundary from '../utils/ErrorBoundary'

export default class TabDisplay extends Component {
    
	constructor(props) {
		super(props)
		this.index = GetLocalData(`${props.tabsPrefix}${props.navs.section}`)
		this.state = {
			activeTab: this.index <= props.navs.tabs.length ? parseInt(this.index) : 0,
			counter: 0
		}
	}
    
	handleOpenTab(t) {
		const { activeTab } = this.state
		if (activeTab !== t.id) {
			this.setState({
				activeTab: t.id 
			}, () => SetLocalData(`${this.props.tabsPrefix}${t.section}`, t.id) )
		}
	}

	_getTabContent(tabs) {
		const index = tabs.find((t,i) => i === this.state.activeTab) || tabs[0] // fallback: if index is undefined, default to first index
		return index.content
	}

	// componentWillUnmount() {
	//     Object.keys(localStorage).forEach(k => k.substring(0,5) === this.props.tabsPrefix && 
	//         localStorage.removeItem(k)
	//     )
	// }

	render() {
		const { section, tabs } = this.props.navs
		const { activeTab } = this.state

		return (
			<Row className="mb-4">
				<Col xs="12">
					<Nav tabs>
						{ tabs.map((t, index) => {
							return (                    
								<NavItem key={index}>
									<NavLink
										className={activeTab === index ? 'active' : '' }
										style={{ cursor: 'pointer' }}
										onClick={this.handleOpenTab.bind(this, { id: index, section: section })}>
										{t.title}
									</NavLink>
								</NavItem>
							)
						})}
					</Nav>
					<TabContent>
						<TabPane>
							<ErrorBoundary>
								{ this._getTabContent(tabs) }
							</ErrorBoundary>
						</TabPane>
					</TabContent>           
				</Col>
			</Row>
		)
	}
}

TabDisplay.propTypes = {
	navs: PropTypes.object,
	tabsPrefix: PropTypes.string
}

TabDisplay.defaultProps = {
	tabsPrefix: 'tabs:'
}