import React, { Component } from 'react'
import { graphql, compose } from 'react-apollo'
import gql from 'graphql-tag'
import { Row, Button, Input} from 'reactstrap'
import PropTypes from 'prop-types'
import { DocCookiesCMS, GetLocalData } from '../../../utils/CoreHelpers'

class CmsManagement extends Component {
  constructor() {
    super()
  }

  componentDidMount(){
    const targetIndex = this.props.match.params.index;
    this.props.mutate({ variables: { index: targetIndex } })
    .then((res) => {
      const cookieInfo = res.data.cMSManagementMutation.authDetail.cookie;

      const userInfo = JSON.parse(GetLocalData('currUserInformations', '{}'));
      const targetedCMS = userInfo.cmsManagement.filter(function(item){
        return (item.index == targetIndex);
      });

     const isCookieSet = DocCookiesCMS.setItem(`${targetIndex+'_cookie_info'}`, cookieInfo, (60 * 5), '/', res.data.cMSManagementMutation.authDetail.domain); // NEEDs SUB-DOMAIN

     debugger 
     if(isCookieSet){
        window.location.assign(`${targetedCMS[0].endpoint+'/c0_se2'}`);
        // window.location.assign(`${targetedCMS[0].endpoint+'/admin/content'}`);
      }
    }).catch((errorRes) => {
      console.log(errorRes);
    });
  }
  render(){
    return <div>Loading please wait...</div>
  }
}

const mutationOptions = {
  options: props => {
    return {
      variables: {
        index: '',
      },
      notifyOnNetworkStatusChange: true,
      fetchPolicy: 'network-only'
    }
  }
}

export default compose(
  graphql(
    gql`
        mutation MUTATION($index:String!){
            cMSManagementMutation(index:$index){
              authDetail
            }
        }
    `, mutationOptions)
)(CmsManagement)