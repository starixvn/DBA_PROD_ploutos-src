<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class BrandMarketEmailNotificationTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'NoTemplate',
            ],
            [
                'value' => 1,
                'name'  => 'RegisterEmailTemplate',
            ],
            [
                'value' => 2,
                'name'  => 'WelcomeEmailVerificationTemplate',
            ],
            [
                'value' => 3,
                'name'  => 'WelcomeCompleteEmailTemplate',
            ],
            [
                'value' => 4,
                'name'  => 'ProcessingDepositEmailTemplate',
            ],
            [
                'value' => 5,
                'name'  => 'FailedDepositEmailTemplateId',
            ],
            [
                'value' => 6,
                'name'  => 'SuccesDepositEmailTemplateId',
            ],
            [
                'value' => 7,
                'name'  => 'WithdrawReceievedEmailTemplateId',
            ],
            [
                'value' => 8,
                'name'  => 'WithdrawDeclinedEmailTemplateId',
            ],
            [
                'value' => 9,
                'name'  => 'WithdrawApprovedEmailTemplateId',
            ],
            [
                'value' => 10,
                'name'  => 'SendResetPasswordCodeTemplateId',
            ],
            [
                'value' => 11,
                'name'  => 'AFF_RegisterEmailTemplateId',
            ],
            [
                'value' => 12,
                'name'  => 'AFF_RegistrationApprovalEmailTemplateId',
            ],
            [
                'value' => 13,
                'name'  => 'AFF_WithdrawalRequestEmailTemplateId',
            ],
            [
                'value' => 14,
                'name'  => 'AFF_WithdrawalApprovedEmailTemplateId',
            ],
            [
                'value' => 15,
                'name'  => 'AFF_FundTransferEmailTemplateId',
            ],
            [
                'value' => 16,
                'name'  => 'AFF_CommissionApprovedEmailTemplateId',
            ],
            [
                'value' => 17,
                'name'  => 'AFF_ChangePasswordEmailTemplateId',
            ],
            [
                'value' => 18,
                'name'  => 'AFF_OneWeekNoSignInEmailTemplateId',
            ],
            [
                'value' => 19,
                'name'  => 'AFF_PlayerCountReminderEmailTemplateId',
            ],
            [
                'value' => 20,
                'name'  => 'AFF_AccountDetailUpdateEmailTemplateId',
            ],
            [
                'value' => 21,
                'name'  => 'AFF_AccountClosureEmailTemplateId',
            ],
            [
                'value' => 22,
                'name'  => 'AFF_ForgotPasswordEmailTemplateId',
            ],
            [
                'value' => 23,
                'name'  => 'SendEmailVerificationCodeTemplateId',
            ]
        ];
    }
}