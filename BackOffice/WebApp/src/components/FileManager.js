/* eslint-disable no-mixed-spaces-and-tabs */
/* eslint-disable react/no-deprecated */
import React, { Component } from 'react'
import { graphql, compose } from 'react-apollo'
import gql from 'graphql-tag'
import {
	Row,
	Button
} from 'reactstrap'
import Loader from './Loader'

class FileManager extends Component {
	constructor(props) {
		super(props)
		this.state = {
			files: [],
			fileIds: props.value || []
		}
	}

	componentWillReceiveProps(nextProps){
		if (nextProps.data && !nextProps.data.loading && this.state.files.length == 0){
			this.setState({
				files: nextProps.data.fileManagedList.items || []
			})
		}
	}

	humanReadableFileSize(bytes, si) {
		var thresh = si ? 1000 : 1024
		if (Math.abs(bytes) < thresh) {
			return bytes + ' B'
		}
		var units = si ? ['kB','MB','GB','TB','PB','EB','ZB','YB'] : ['KiB','MiB','GiB','TiB','PiB','EiB','ZiB','YiB']
		var u = -1
		do {
			bytes /= thresh
			++u
		} while (Math.abs(bytes) >= thresh && u < units.length - 1)
		return bytes.toFixed(1)+' '+units[u]
	}

	isValidFileExtension(fileName){
		let isValid = false
		let inputFileExt = fileName.substr(fileName.lastIndexOf('.') + 1)
		Array.from(this.props.fileExt).forEach((ext, i) => {
			if (ext == inputFileExt){
				isValid = true
				return
			}
		})
		return isValid
	}

	isValidFileSize(fileSize){
		return (this.props.fileSize >= fileSize) ? true : false
	}

	validateFiles(files){
		let FileInfo = this.state.files || []
		Array.from(files).forEach(file => {
			let fileItem = {
				Id: 0,
				FileEntity: file,
				FileName: file.name,
				FileSize: file.size,
				Uri: '',
				FileMime: '',
				FileValid: true,
				FileMessage: []
			}

			// START VALIDATIONs
			if (!this.isValidFileSize(file.size)){
				fileItem.FileValid = false
				fileItem.FileMessage.push('File size too large')
			}
			if (!this.isValidFileExtension(file.name)){
				fileItem.FileValid = false
				fileItem.FileMessage.push('File extension invalid')
			}
			if (FileInfo.length >= this.props.fileLimit){
				fileItem.FileValid = false
				fileItem.FileMessage.push('Maximum file to upload reached')
			}
			FileInfo.push(fileItem)
		})
    
		this.setState({
			files: FileInfo
		})

		if (FileInfo.length > 0){
			FileInfo.map((file, i) => {
				if (file.FileValid){
					this.readFileBlob(file, result => {
						this.props.mutate({
							variables: {
								Id: 0,
								PayLoad: result,
								FileName: file.FileName,
								FileSize: file.FileSize,
								JsArrayLoc: i
							}
						}).then(success => {
							let fileIds = this.state.fileIds || []
							let stateValues = this.state.files

							stateValues[i].Id = parseInt(success.data.fileManagedMutation[0].Id)
							fileIds.push(parseInt(success.data.fileManagedMutation[0].Id))

							this.setState({
								files: stateValues,
								fileIds: fileIds
							})
							this.props.onChange({ target: { value: fileIds } })
						}).catch(error => {
							console.log(error)
							let stateValues = this.state.files
							stateValues[i].FileValid = false
							stateValues[i].FileMessage.push('Server Error')

							this.setState({
								files: stateValues
							})

						})
					})
				}
			})
		}
	}

	determineFileUploadStatus(fileItem){
		if (parseInt(fileItem.Id) > 0){
			return ''//'Done'
		}
		if (!fileItem.FileValid){
			return fileItem.FileMessage.join(' and ')+'.'
		}
		if (fileItem.FileValid && parseInt(fileItem.d) == 0){
			return 'Uploading...'
		}
	}

	removeAttachedFile(fileId){

		//Removing the existing value in file upload
		document.getElementById('uploadFile').value=''

		let fileIds = this.state.fileIds
		let stateValues = this.state.files

		for (let itr = 0; itr <stateValues.length; itr++){
			if (parseInt(stateValues[itr].Id) == parseInt(fileId)){
				stateValues.splice(itr, 1)
				break
			}
		}

		for (let itrs = 0; itrs < fileIds.length; itrs++){
			if (parseInt(fileIds[itrs]) == parseInt(fileId)){
				fileIds.splice(itrs, 1)
				break
			}
		}

		this.setState({
			files: stateValues,
			fileIds: fileIds
		})
		this.props.onChange({ target: { value: fileIds } })
	}

	readFileBlob(file, anonFunc){
		let reader = new FileReader()
		reader.readAsDataURL(file.FileEntity)
		reader.onloadend = function () {
			anonFunc(reader.result)
		}
		reader.onerror = function (error) {
			console.log('Error: ', error)
		}
	}
  
	render() {
		const loader = <Loader />
		if (this.props.data && this.props.data.loading) return loader

		const data = this.state.files
		const correctStyle = { color: 'green' }
		const errorStyle = { color: 'red' }
		
		return (
			<div> 				
				<input 
					type="file" 
					id="uploadFile" 
					disabled={data.length >= this.props.fileLimit} 
					multiple={(this.props.fileLimit > 1)} 
					onChange={({ target: { validity, files } }) => validity.valid && this.validateFiles(files)}
				/>

				{data.map((file, i) => (
					<span key={i}>
						<span style={ this.determineFileUploadStatus(file) === 'File extension invalid.' ? errorStyle : correctStyle} >  
							{' ' + file.FileName} - {this.humanReadableFileSize(file.FileSize, true)} 
							{ this.determineFileUploadStatus(file) === 'File extension invalid.' ? '-' : '' } 
							{ this.determineFileUploadStatus(file)}
						</span>
						<Button color="danger" size="sm" onClick={e => this.removeAttachedFile(file.Id)} type="button" title="Remove">
							<i className="fa fa-minus"></i>
						</Button>
					</span>
				))
				}				
			</div>
		)
	}
}

FileManager.defaultProps = {
	fileLimit: 1,
	fileExt: ['xlsx', 'xls', 'ods', 'png', 'jpg', 'jpeg', 'gif', 'doc', 'docx','XLSX', 'XLS', 'ODS', 'PNG', 'JPG', 'JPEG', 'GIF', 'DOC', 'DOCX'],
	fileSize: 5000000, // 5MB
}

const mutation = gql`
  mutation MANAGED_FILE(
      $Id: ID!
      $PayLoad: String!
      $FileName: String!
      $FileSize: Int!
      $JsArrayLoc: Int!
  ){
    fileManagedMutation(entity:{
      Id: $Id
      PayLoad: $PayLoad
      FileName: $FileName
      FileSize: $FileSize
      JsArrayLoc: $JsArrayLoc
    }) {
      Id
      FileName
      Uri
      JsArrayLoc
    }
  }
`
const fileQuery = gql`
    query EXTRAQUERY_VIEW (
      $FileIds: Serialized!
    ){
        fileManagedList(filter:{
            FileIds:{
              parameter: $FileIds
              expression: IS_ONE_OF
            }
        },
            count:false,
            paging:{
                offset:0
                limit:500
            }){
            pagingInfo{
                offset
                limit
                totalCount
            }
            items{
                Id
                JsArrayLoc
                SourceObject
                SourceObjectId
                Uri
                FileName
                FileMime
                FileSize
            }
        }
    }
`

const queryOptions = { 
	options: props => ({
		variables: {
			FileIds: props.value
		},
		skip: (props.value.length > 0) ? false : true,
		notifyOnNetworkStatusChange: true,
		fetchPolicy: 'network-only'
	})
}

export default compose(
	graphql(mutation),
	graphql(fileQuery, queryOptions),
)(FileManager)