import React, { Component } from 'react'
import { graphql, compose, withApollo } from 'react-apollo'
import gql from 'graphql-tag'

class PogoPortal extends Component {
  render(){
  	if(this.props.data.loading){
    	return <div>Please wait while we redirect you to Pogo Portal...</div>
  	}
    window.open(this.props.data.singleSignOn[0].item.redirectTo, '_blank');
    this.props.history.goBack();
  	return <div>Redirecting to portal...</div>
  }
}

export default graphql(gql`query tokenInfo { singleSignOn{ item }}`)(PogoPortal)