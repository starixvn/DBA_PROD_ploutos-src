/*global mount shallow*/
import React from 'react'
import { MockedProvider } from 'react-apollo/test-utils'

import ListView from '../../../ListView'
import DetailView from '../../../DetailView'
import FormView from '../../../FormView'
import Loader from '../../../../components/Loader'
import AffiliateTrackingLinksWithGQL, { AffiliateTrackingLinks } from './AffiliateTrackingLinks'

const TestableComponentWithGQL = AffiliateTrackingLinksWithGQL
const TestableComponent = AffiliateTrackingLinks
const schemaList = 'affiliateTrackingLinkList'
const schemaDetail = 'affiliateTrackingLink'

const someData = {
	loading: false,
	[schemaList]: {
		pagingInfo: {
			offset: 0,
			limit: 10,
			totalCount: 1
		},
		items: [
			{ Id: 1 }
		]
	},
	[schemaDetail]: [
		{ Id: 1 }
	]
}

const props = {
	match: {
		params: {
			action: ''
		}
	},
	data: someData,
	extradata: {
		enumRepository: []
	},
	location: {
		search: ''
	}
}

describe('<AffiliateTrackingLinks />', () => {
	
	let wrapper = null

	it('should render component', () => {
		wrapper = mount(
			<MockedProvider addTypename={false}>
				<TestableComponentWithGQL {...props} />
			</MockedProvider>
		)
		// console.log(wrapper.debug())
		expect(wrapper).toMatchSnapshot()
		expect(wrapper.find(TestableComponent).exists()).toEqual(true)
	})

	it('should render "Loader" if loading is true', () => {
		wrapper = shallow(<TestableComponent match={props.match} data={{ loading: true }} />)
		expect(wrapper.find(Loader).exists()).toEqual(true)
	})

	it('should render an "error" text if data has error', () => {
		wrapper = shallow(<TestableComponent match={props.match} data={{ error: true }} />)	
		expect(wrapper.text()).toEqual('An unexpected error occurred. --> undefined')
	})

	it('should render ListView if param is "list"', () => {
		wrapper = shallow(<TestableComponent {...props} />)
		wrapper.setProps({
			match: { params: { action: 'list' } }
		})
		expect(wrapper.find(ListView).exists()).toEqual(true)
	})

	it('should render DisplayView if param is "view"', () => {
		wrapper = shallow(<TestableComponent {...props} />, {
			context: {
				'userInfo': {
					'userId': 1
				}
			}
		})
		wrapper.setProps({
			match: { params: { action: 'view' } }
		})
		expect(wrapper.find(DetailView).exists()).toEqual(true)
	})

	it('should render FormView if param is "add"', () => {
		wrapper = shallow(<TestableComponent {...props} />)
		wrapper.setProps({
			match: { params: { action: 'add' } }
		})
		expect(wrapper.find(FormView).exists()).toEqual(true)
	})

})