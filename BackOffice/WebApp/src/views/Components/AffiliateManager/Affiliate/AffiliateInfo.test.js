/*global mount shallow*/
import React from 'react'

import Loader from '../../../../components/Loader'
import AffiliateInfo from './AffiliateInfo'

const TestableComponent = AffiliateInfo
const schemaDetail = 'affiliate'

const someData = {
	loading: false,
	[schemaDetail]: [
		{ Id: 1 }
	]
}

const props = {
	data: someData
}

describe('<AffiliateInfo />', () => {
	
	let wrapper = null

	it('should render correctly', () => {
		wrapper = mount(<TestableComponent {...props} />)
		// console.log(wrapper.debug()),
		expect(wrapper).toMatchSnapshot()
		expect(wrapper.find(TestableComponent).exists()).toEqual(true)
	})

	it('should render "Loader" if loading is true', () => {
		wrapper = shallow(<TestableComponent match={props.match} data={{ loading: true }} />)
		// console.log(wrapper.debug())
		expect(wrapper.find(Loader).exists()).toEqual(true)
	})

	it('should render an "error" text if data has error', () => {
		wrapper = shallow(<TestableComponent match={props.match} data={{ error: true }} />)	
		// console.log(wrapper.debug())
		expect(wrapper.text()).toEqual('An unexpected error occurred.')
	})

})