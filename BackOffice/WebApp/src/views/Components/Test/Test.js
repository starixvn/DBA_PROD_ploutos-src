import React, { Component } from 'react'
import { graphql, compose } from 'react-apollo'
import gql from 'graphql-tag'
import { Row, Button, Input} from 'reactstrap'
import PropTypes from 'prop-types'
import { DocCookies } from '../../../utils/CoreHelpers'
import EmailEditor from 'react-email-editor'

class Test extends Component {
  constructor() {
    super()
  }
  // _buttonAction(){
  //   console.log('ohyeah');
  //   this.props.mutate({
  //     variables: {
  //       endPoint: 'www.testendpoint.com'
  //     }
  //   }).then((res) => {
  //     const cookieInfo = JSON.parse(res.data.cMSManagementMutation.authDetail.cookie);
  //     DocCookies.setItem(cookieInfo.Name, cookieInfo.Value, cookieInfo.Expires, '/', cookieInfo.Domain); // NEEDs SUB-DOMAIN
  //   }).catch((errorRes) => {
  //     console.log(errorRes);
  //   });
  // }

  _buttonAction(){
    this.editor.exportHtml(data => {
      const { design, html } = data;
      console.log('exportHtml', html);
    })
  }

  render(){
    console.log(this);
    return <div>
      <Button size="md" onClick={(e)=>{this._buttonAction()}} type="button" title="Remove">
        Format!
      </Button>
      <EmailEditor ref={editor => this.editor = editor}/>
    </div>
  }
}

const mutationOptions = {
  options: props => {
    return {
      variables: {
        endPoint: "www.casinofilipino88.com",
      },
      notifyOnNetworkStatusChange: true,
      fetchPolicy: 'network-only'
    }
  }
}

export default compose(
  graphql(
    gql`
        mutation MUTATION($endPoint:String!){
            cMSManagementMutation(endpoint:$endPoint){
              authDetail
            }
        }
    `, mutationOptions)
)(Test)