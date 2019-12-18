import React, { Component } from 'react'
import { graphql, compose } from 'react-apollo'
import { withApollo } from 'react-apollo'
import gql from 'graphql-tag'
import {
  Row,
  Button,
  Input,
} from 'reactstrap'
import PropTypes from 'prop-types'
import Loader from './Loader'
import FileSaver from 'file-saver'
import { Base64 } from '../utils/CoreHelpers'

class FileManagerView extends Component {
  constructor() {
    super();
  }
  
  downloadFile(fileId){
    console.log(this);
    var variablesConfig = {
      query: fileQuery,
      variables: {
        Id: fileId
      },
    }
    this.props.client.query(variablesConfig).then(res => {
      const fileData = res.data.fileManaged[0];
      FileSaver.saveAs(this.b64toBlob(fileData.PayLoad, fileData.FileMime+';charset=utf-8'), fileData.FileName);
    })
  }

  b64toBlob(b64Data, contentType, sliceSize) {
    contentType = contentType || '';
    sliceSize = sliceSize || 512;
    var byteCharacters = atob(b64Data);
    var byteArrays = [];
    for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
      var slice = byteCharacters.slice(offset, offset + sliceSize);
      var byteNumbers = new Array(slice.length);
      for (var i = 0; i < slice.length; i++) {
        byteNumbers[i] = slice.charCodeAt(i);
      }
      var byteArray = new Uint8Array(byteNumbers);
      byteArrays.push(byteArray);
    }
    var blob = new Blob(byteArrays, {type: contentType});
    return blob;
  }

  render() {
    const loader = <Loader />
    if (this.props.data && this.props.data.loading) return loader

    const data = this.props.fileInfos;
    // console.log(data);

    return (
      data.map((fl, ic) => {
        return <Button style={{ padding: '0px' }}
              onClick={(e) => this.downloadFile(fl.Id)}
              key={ic}
              color="link"
              title={fl.FileName}>
              <span>{fl.FileName} <i className="fa fa-file"></i></span>
            </Button>
      })
    )
  }
}

FileManagerView.defaultProps = {
  fileInfos: []
}

const fileQuery = gql`
    query EXTRAQUERY_VIEW (
      $Id: ID!
    ){
      fileManaged(Id:$Id){
        Id
        FileName
        Uri
        PayLoad
      }
    }
`

export default withApollo(FileManagerView);