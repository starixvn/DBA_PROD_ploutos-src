/*global mount*/
import React from 'react'

import AffiliatePaymentInfo from './AffiliatePaymentInfo'

const TestableComponent = AffiliatePaymentInfo

describe('<AffiliatePaymentInfo />', () => {
	
	let wrapper = null

	it('should render correctly', () => {
		wrapper = mount(<TestableComponent />)
		// console.log(wrapper.debug()),
		expect(wrapper).toMatchSnapshot()
		expect(wrapper.find(TestableComponent).exists()).toEqual(true)
	})

})