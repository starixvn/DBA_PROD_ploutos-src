import React from 'react'
import { Input } from 'reactstrap'

import { SuccessHandler, ErrorHandler } from '../../../../utils/ResponseHandler'

export function actions(data, context) {
	return ([
		{
			task: 'Verify',
			action: 'verify',
			icon: 'gavel',
			color: 'danger',
			isVisible: ((data.AccountStatus ==='Locked' && data.IsEmailVerified === true) || (data.AccountStatus ==='Locked' && data.IsMobileVerified === true)) ? false : isActionVisibile('Created,Locked', 'verify', 'actionVerifyPlayerProfileMutation', data, context)
		},
		{
			task: 'Activate',
			action: 'activate',
			icon: 'star',
			color: 'danger',
			isVisible: isActionVisibile('De_Activated', 'activate', 'actionActivatePlayerProfileMutation', data, context)
		},
		{
			task: 'Unlock',
			action: 'unlock',
			icon: 'unlock',
			color: 'danger',
			isVisible: isActionVisibile('Locked', 'unlock', 'actionUnLockPlayerProfileMutation', data, context)
		},
		{
			task: 'Edit',
			action: 'edit',
			icon: 'edit',
			color: 'warning',
			linkTo: `/player_manager/profile/f/edit/${data.Id}`,
			isVisible: (data.AccountStatus === 'Archived')? false : isActionVisibile('All', 'edit', 'actionEditPlayerProfileMutation', data, context)
		},
		{
			tasks: [
				{
					task: 'Verify',
					action: 'verify',
					icon: 'gavel',
					isVisible: isActionVisibile('Created,Locked', 'verify', 'actionVerifyPlayerProfileMutation', data, context)
				},
				{
					task: 'Lock',
					action: 'lock',
					icon: 'lock',
					isVisible: isActionVisibile('Created,UnLocked,Verified_by_Player,Verified_by_CS,Re_Activated,Password_Reset', 'lock', 'actionLockPlayerProfileMutation', data, context)
				},
				{
					task: 'Unlock',
					action: 'unlock',
					icon: 'unlock',
					isVisible: isActionVisibile('Locked', 'unlock', 'actionUnLockPlayerProfileMutation', data, context)
				},
				{
					task: 'Reset Code',
					action: 'resetCode',
					icon: 'qrcode',
					isVisible: isActionVisibile('All', 'resetCode', 'actionResetCodePlayerProfileMutation', data, context)
				},
				{
					task: 'Reset Password',
					action: 'resetPassword',
					icon: 'asterisk',
					isVisible: isActionVisibile('All', 'resetPassword', 'actionResetPasswordPlayerProfileMutation', data, context)
				},
				{
					task: 'Deactivate',
					action: 'deactivate',
					icon: 'star',
					isVisible: isActionVisibile('Created,Locked,UnLocked,Verified_by_Player,Verified_by_CS,Re_Activated', 'deactivate', 'actionDeactivatePlayerProfileMutation', data, context)
				},
				{
					task: 'Activate',
					action: 'activate',
					icon: 'star',
					isVisible: isActionVisibile('De_Activated', 'activate', 'actionActivatePlayerProfileMutation', data, context)
				},
				{
					task: 'Enable',
					action: 'enable',
					icon: 'check-square',
					isVisible: isActionVisibile('All', 'enable', 'actionEnablePlayerProfileMutation', data, context)
				},
				{
					task: 'Archive',
					action: 'archive',
					icon: 'archive',
					isVisible: isActionVisibile('All', 'archive', 'actionArchivePlayerProfileMutation', data, context)
				},
				{
					task: 'Change Type',
					action: 'changeType',
					icon: 'tags',
					isVisible: isActionVisibile('All', 'changeType', 'actionChangeTypePlayerProfileMutation', data, context)
				},
				{
					task: 'Change VIP Level',
					action: 'changeVIP',
					icon: 'suitcase',
					isVisible: isActionVisibile('All', 'changeVIP', 'actionChangeVipPlayerProfileMutation', data, context)
				},
				{
					task: 'Change FR Level',
					action: 'changeFRL',
					icon: 'warning',
					isVisible: isActionVisibile('All', 'changeFRL', 'actionFraudRiskLevelPlayerProfileMutation', data, context)
				},
				{
					task: 'Change PR Level',
					action: 'changePRL',
					icon: 'bank',
					isVisible: isActionVisibile('All', 'changePRL', 'actionPaymentRiskLevelPlayerProfileMutation', data, context)
				},
				{
					task: 'Change Bet Limit',
					action: 'changeBLL',
					icon: 'sliders',
					isVisible: isActionVisibile('All', 'changeBLL', 'actionBetLimitLevelPlayerProfileMutation', data, context)
				}
			]
		}
	])
}

export function renderModalContent(v) {
	// console.log(v)
	const data = v.props.data.playerProfile[0]
	const { Id, UserName, BrandCode } = data

	// let comment = data.Remarks || ''
	let PlayerType = data.PlayerType
	let FraudRiskLevelId = data.FraudRiskLevelId
	let GameBetLimitLevelId = data.GameBetLimitLevelId
	let VipLevelId = data.VipLevelId
	let PaymentRiskLevelId = data.PaymentRiskLevelId

	// MODAL CONTENT PER ACTION
	switch (v.action) {
	case 'verify': return (
		<div>
			<p>Are you sure you want to verify this profile?</p>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={verifyProfile.bind(this)}>Verify
			</button>
		</div>
	)
	case 'lock': return (
		<div>
			<p>Are you sure you want to lock this profile?</p>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={lockProfile.bind(this)}>Lock
			</button>
		</div>
	)
	case 'unlock': return (
		<div>
			<p>Are you sure you want to unlock this profile?</p>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={unlockProfile.bind(this)}>Unlock
			</button>
		</div>
	)
	case 'resetCode': return (
		<div>
			<p>Are you sure you want to Reset Code this profile?</p>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={resetCode.bind(this)}>Reset
			</button>
		</div>
	)
	case 'resetPassword': return (
		<div>
			<p>Are you sure you want to resetPassword this profile?</p>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={resetPassword.bind(this)}>Reset
			</button>
		</div>
	)
	case 'activate': return (
		<div>
			<p>Are you sure you want to activate this profile?</p>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={activateProfile.bind(this)}>Activate
			</button>
		</div>
	)
	case 'deactivate': return (
		<div>
			<p>Are you sure you want to de-activate this profile?</p>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={deactivateProfile.bind(this)}>Deactivate
			</button>
		</div>
	)
	case 'enable': return (
		<div>
			<p>Are you sure you want to enable this profile?</p>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={enableProfile.bind(this)}>Enable
			</button>
		</div>
	)
	case 'archive': return (
		<div>
			<p>Are you sure you want to archive this profile?</p>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={archiveProfile.bind(this)}>Archive
			</button>
		</div>
	)
	case 'changeType': return (
		<div>
			<p>Change Type of this profile.</p>
			<Input
				type="select"
				name="roles"
				size="sm"
				defaultValue={PlayerType}
				// disabled={this.state.isSubmitting}
				onChange={e => (PlayerType = e.target.value)}>
				{
					v.props.extradata.enumRepository[0].PlayerTypeEnum.map(v => (
						<option key={v.value} value={v.name}>{v.name}</option>
					))
				}
			</Input>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={changeTypeProfile.bind(this)}>Change
			</button>
		</div>
	)
	case 'changeFRL': return (
		<div>
			<p>Change Fraud Risk Level of this profile.</p>
			<Input
				type="select"
				name="roles"
				size="sm"
				defaultValue={FraudRiskLevelId}
				// disabled={this.state.isSubmitting}
				onChange={e => (FraudRiskLevelId = e.target.value)}>
				{
					v.props.extradata.fraudRiskLevelList.items.map(v => (
						<option key={v.Id} value={v.Id}>{v.FraudRiskLevelName}</option>
					))
				}
			</Input>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={changeFRLevelProfile.bind(this)}>Change
			</button>
		</div>
	)
	case 'changeBLL': return (
		<div>
			<p>Change Bet Limit Level of this profile.</p>
			<Input
				type="select"
				name="roles"
				size="sm"
				defaultValue={GameBetLimitLevelId}
				// disabled={this.state.isSubmitting}
				onChange={e => (GameBetLimitLevelId = e.target.value)}>
				{
					v.props.extradata.gameBetLimitLevelList.items.map(v => (
						<option key={v.Id} value={v.Id}>{v.BetLimitLevelDesc}</option>
					))
				}
			</Input>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={changeBLLevelProfile.bind(this)}>Change
			</button>
		</div>
	)
	case 'changeVIP': return (
		<div>
			<p>Change VIP Level of this profile.</p>
			<Input
				type="select"
				name="roles"
				size="sm"
				defaultValue={VipLevelId}
				// disabled={this.state.isSubmitting}
				onChange={e => (VipLevelId = e.target.value)}>
				{
					v.props.extradata.vIPLevelList.items.map(v => (
						<option key={v.Id} value={v.Id}>{v.VipLevelName}</option>
					))
				}
			</Input>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={changeVIPLevelProfile.bind(this)}>Change
			</button>
		</div>
	)
	case 'changePRL': return (
		<div>
			<p>Change Payment Risk Level of this profile.</p>
			<Input
				type="select"
				name="roles"
				size="sm"
				defaultValue={PaymentRiskLevelId}
				// disabled={this.state.isSubmitting}
				onChange={e => (PaymentRiskLevelId = e.target.value)}>
				{
					v.props.extradata.paymentRiskLevelList.items.map(v => (
						<option key={v.Id} value={v.Id}>{v.PaymentRiskLevelName}</option>
					))
				}
			</Input>
			<button type="submit" className="btn btn-sm btn-primary mt-2" 
				onClick={changePRLevelProfile.bind(this)}>Change
			</button>
		</div>
	)
	}


	//=== ACTION FUNCTIONS
	// Must match to graphql query/mutate operations
	function verifyProfile() {
		v.props.verifyProfileMutation({
			variables: {
				Username: UserName
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function lockProfile() {
		v.props.lockProfileMutation({
			variables: {
				Username: UserName
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function unlockProfile() {
		v.props.unLockProfileMutation({
			variables: {
				Username: UserName
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function resetCode() {
		v.props.resetCodeProfileMutation({
			variables: {
				Username: UserName
			}
		})
			.then(data => {
				successResponse(v)
				const parsedData = JSON.parse(data.data.actionResetCodePlayerProfileMutation.apiResult)
				alert(parsedData.Data)
			})
			.catch(error => errResponse(v, error))
	}
	function resetPassword() {
		v.props.resetPasswordProfileMutation({
			variables: {
				Username: UserName,
				BrandCode: BrandCode
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function activateProfile() {
		v.props.activateProfileMutation({
			variables: {
				Username: UserName
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function deactivateProfile() {
		v.props.deactivateProfileMutation({
			variables: {
				Username: UserName
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function enableProfile() {
		v.props.enableProfileMutation({
			variables: {
				Username: UserName
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function archiveProfile() {
		v.props.archiveProfileMutation({
			variables: {
				Username: UserName
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function changeTypeProfile() {
		v.props.changeTypeProfileMutation({
			variables: {
				Id: Id,
				PlayerType: PlayerType
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function changeFRLevelProfile() {
		v.props.fraudRiskLevelProfileMutation({
			variables: {
				Id: Id,
				FraudRiskLevelId: FraudRiskLevelId
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function changeBLLevelProfile() {
		v.props.betLimitLevelProfileMutation({
			variables: {
				Id: Id,
				GameBetLimitLevelId: GameBetLimitLevelId
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function changeVIPLevelProfile() {
		v.props.vipLevelProfileMutation({
			variables: {
				Id: Id,
				VipLevelId: VipLevelId
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
	function changePRLevelProfile() {
		v.props.paymentRiskLevelProfileMutation({
			variables: {
				Id: Id,
				PaymentRiskLevelId: PaymentRiskLevelId
			}
		})
			.then(() => successResponse(v))
			.catch(error => errResponse(v, error))
	}
}

/**
 * TICKET ACTION DISPLAY VISIBILITY
 * 
 * @param {string} a - Current status/es to match against
 * @param {string} b - Action to be done
 * @param {string} c - Required Access the user must have
 * @param {object} d - Current data item
 * @param {object} e - Inherited context from parent
 * @returns {boolean} True / False
 */
function isActionVisibile(a, b, c, d, e) {
	// return (a.indexOf(d.Status) !== -1 || a.indexOf('All') !== -1) && e.handleElementAccess(b) && true

	// HIDE / SHOW VERIFICATION ACTION
	if (a == 'actionVerifyPlayerProfileMutation' && (d.PlayerRegisterStatus === 'Verified_by_Player' || d.PlayerRegisterStatus === 'Verified_by_CS')) return false
	// return (a.indexOf(d.AccountStatus) !== -1 || a.indexOf('All') !== -1)
	return (a.indexOf(d.AccountStatus) !== -1 || a.indexOf('All') !== -1) && e.handleElementAccess(c) && true
}

/**
 * SUCCESS RESPONSE HANDLER
 * 
 * @param {any} v : Object (Props/Context) passed
 * @returns {callback} SuccessHandler
 */
function successResponse(v) {
	SuccessHandler({
		context: v.context, 
		callback: v.props.data.refetch().then(() => v.onModalClose()),
	})
}

/**
 * ERROR RESPONSE HANDLER
 * 
 * @param {any} v : 
 * @param {any} err : Error message
 * @returns {callback} ErrorHandler
 */
function errResponse(v, err) {
	ErrorHandler({ 
		context: v.context,
		callback: v.onModalClose(),
		error: { err } 
	})
}