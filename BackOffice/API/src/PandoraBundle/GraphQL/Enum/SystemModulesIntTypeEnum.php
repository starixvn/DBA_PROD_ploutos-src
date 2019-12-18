<?php
namespace PandoraBundle\GraphQL\Enum;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class SystemModulesIntTypeEnum extends AbstractEnumType
{
    public function getValues()
    {
        return [
            [
                'value' => 0,
                'name'  => 'Walletdeposits',
            ],
            [
                'value' => 1,
                'name'  => 'Walletwithdrawals',
            ],
            [
                'value' => 2,
                'name'  => 'Walletadjustmentmemos',
            ],
            [
                'value' => 3,
                'name'  => 'Walletfundtransfers',
            ],
            [
                'value' => 4,
                'name'  => 'Playerprofiles',
            ],
            [
                'value' => 5,
                'name'  => 'Affiliates',
            ],
            [
                'value' => 6,
                'name' => 'Affiliatecommisions'
            ],
            [
                'value' => 7,
                'name' => 'Affiliatetransactions'
            ],
            [
                'value' => 8,
                'name' => 'Affiliateearningplans'
            ],
            [
                'value' => 9,
                'name' => 'Tickets'
            ],
            [
                'value' => 10,
                'name' => 'Playernotecategory'
            ],
            [
                'value' => 11,
                'name' => 'Playernotes'
            ],
            [
                'value' => 12,
                'name' => 'Playerdocuments'
            ],
            [
                'value' => 13,
                'name' => 'Notifications'
            ],
            
            
            [
                'value' => 14,
                'name' => 'Triggerrollbaseprocess'
            ],
            [
                'value' => 15,
                'name' => 'Subagents'
            ],
            [
                'value' => 16,
                'name' => 'Rpndepositresponses'
            ],
            [
                'value' => 17,
                'name' => 'Hgbetlogs'
            ],
            [
                'value' => 18,
                'name' => 'Gdgamebetresult'
            ],
            [
                'value' => 19,
                'name' => 'Fraudrisklevels'
            ],
            [
                'value' => 20,
                'name' => 'Wageringfulfilments'
            ],
            [
                'value' => 21,
                'name' => 'Bggameevents'
            ],
            [
                'value' => 22,
                'name' => 'Aspnetuserroles'
            ],
            [
                'value' => 23,
                'name' => 'Sbtechslotbetlogs'
            ],
            [
                'value' => 24,
                'name' => 'Agfundtransfers'
            ],
            [
                'value' => 25,
                'name' => 'Implatforms'
            ],
            [
                'value' => 26,
                'name' => 'Playerrebatedetails'
            ],
            [
                'value' => 27,
                'name' => 'Owcasinobetlogs'
            ],
            [
                'value' => 28,
                'name' => 'Owsportsbetlogs'
            ],
            [
                'value' => 29,
                'name' => 'Ptfundtransferhistory'
            ],
            [
                'value' => 30,
                'name' => 'Ptbethistory'
            ],
            [
                'value' => 31,
                'name' => 'Brandmarketemailnotificationsetups'
            ],
            [
                'value' => 32,
                'name' => 'Migrationhistory'
            ],
            [
                'value' => 33,
                'name' => 'Safepaydeposits'
            ],
            [
                'value' => 34,
                'name' => 'Paymentrisklevels'
            ],
            [
                'value' => 35,
                'name' => 'Walletdepositaudits'
            ],
            [
                'value' => 36,
                'name' => 'Sdpaydeposits'
            ],
            [
                'value' => 37,
                'name' => 'Bsbonuswin'
            ],
            [
                'value' => 38,
                'name' => 'Playerrebatequeue'
            ],
            [
                'value' => 39,
                'name' => 'Bgplayersessions'
            ],
            [
                'value' => 40,
                'name' => 'Sbtechlivecasinobetlogs'
            ],
            [
                'value' => 41,
                'name' => 'Playerresetcodes'
            ],
            [
                'value' => 43,
                'name' => 'Countrys'
            ],
            [
                'value' => 44,
                'name' => 'Transactionnumbersetup'
            ],
            [
                'value' => 45,
                'name' => 'Hgfundtransferhistory'
            ],
            [
                'value' => 46,
                'name' => 'Aspnetroles'
            ],
            [
                'value' => 47,
                'name' => 'Playernotifications'
            ],
            [
                'value' => 48,
                'name' => 'Wallets'
            ],
            [
                'value' => 49,
                'name' => 'Uniquedepositamounts'
            ],
            [
                'value' => 50,
                'name' => 'Uniquedepositamountrules'
            ],
            [
                'value' => 51,
                'name' => 'Persons'
            ],
            [
                'value' => 52,
                'name' => 'Playerbankaccounts'
            ],
            [
                'value' => 53,
                'name' => 'Banks'
            ],
            [
                'value' => 55,
                'name' => 'Daddypaydeposits'
            ],
            [
                'value' => 56,
                'name' => 'Gameplatformproducts'
            ],
            [
                'value' => 57,
                'name' => 'Viplevels'
            ],
            [
                'value' => 58,
                'name' => 'Merchants'
            ],
            [
                'value' => 60,
                'name' => 'Playerproviderlocking'
            ],
            [
                'value' => 61,
                'name' => 'Walletcomputedbalances'
            ],
            [
                'value' => 62,
                'name' => 'Agtransferrecords'
            ],
            [
                'value' => 63,
                'name' => 'PlayerFingerPrints'
            ],
            [
                'value' => 64,
                'name' => 'Hubconnections'
            ],
            [
                'value' => 65,
                'name' => 'Bankaccounts'
            ],
            [
                'value' => 66,
                'name' => 'Abbethistory'
            ],
            [
                'value' => 67,
                'name' => 'Aspnetuserclaims'
            ],
            [
                'value' => 68,
                'name' => 'Gdbethistoryrng'
            ],
            [
                'value' => 69,
                'name' => 'Product'
            ],
            [
                'value' => 70,
                'name' => 'Gamebetlimitlevels'
            ],
            [
                'value' => 71,
                'name' => 'Aspnetuserlogins'
            ],
            [
                'value' => 72,
                'name' => 'Daddypayexceptionwithdrawapplys'
            ],
            [
                'value' => 73,
                'name' => 'Bsrefundbethistory'
            ],
            [
                'value' => 74,
                'name' => 'Safepaybanks'
            ],
            [
                'value' => 75,
                'name' => 'Gdgametypes'
            ],
            [
                'value' => 76,
                'name' => 'Agentsubagentusers'
            ],
            [
                'value' => 77,
                'name' => 'Playerrebates'
            ],
            [
                'value' => 78,
                'name' => 'Bandwords'
            ],
            [
                'value' => 79,
                'name' => 'Ptbetlogs'
            ],
            [
                'value' => 80,
                'name' => 'Backgroundtaskschedules'
            ],
            [
                'value' => 81,
                'name' => 'Withdrawallevels'
            ],
            [
                'value' => 82,
                'name' => 'Gdgamebettransactions'
            ],
            [
                'value' => 83,
                'name' => 'Paymentmethods'
            ],
            [
                'value' => 84,
                'name' => 'Daddypaybanks'
            ],
            [
                'value' => 85,
                'name' => 'Absettlehistory'
            ],
            [
                'value' => 86,
                'name' => 'Tgptransactions'
            ],
            [
                'value' => 87,
                'name' => 'Playerregistrations'
            ],
            [
                'value' => 88,
                'name' => 'Ttgbalancerequests'
            ],
            [
                'value' => 89,
                'name' => 'Playernotetype'
            ],
            [
                'value' => 90,
                'name' => 'Bonuses'
            ],
            [
                'value' => 91,
                'name' => 'Playersugestedbonuses'
            ],
            [
                'value' => 94,
                'name' => 'Playeraccesslogs'
            ],
            [
                'value' => 95,
                'name' => 'Comments'
            ],
            [
                'value' => 96,
                'name' => 'Walletwins'
            ],
            [
                'value' => 98,
                'name' => 'Stateprovinces'
            ],
            [
                'value' => 99,
                'name' => 'Audittrail'
            ],
//             [
//                 'value' => 100,
//                 'name' => 'Walletdeposits'
//             ],
            [
                'value' => 101,
                'name' => 'Tgpcancelledtransactions'
            ],
            [
                'value' => 102,
                'name' => 'Offlinewechatdeposits'
            ],
            [
                'value' => 103,
                'name' => 'Gdcancelledgamebets'
            ],
            [
                'value' => 104,
                'name' => 'Gameplatformsupportedcurrencies'
            ],
            [
                'value' => 105,
                'name' => 'Rpndepositrequests'
            ],
            [
                'value' => 106,
                'name' => 'Gameplatforms'
            ],
            [
                'value' => 107,
                'name' => 'Ttgfundtransfers'
            ],
            [
                'value' => 108,
                'name' => 'Gameplatformoauthcredentials'
            ],
            [
                'value' => 109,
                'name' => 'Teams'
            ],
            [
                'value' => 110,
                'name' => 'Recordviewed'
            ],
            [
                'value' => 111,
                'name' => 'Playerfingerprinthits'
            ],
            [
                'value' => 113,
                'name' => 'Gameplatformsupportedlanguages'
            ],
            [
                'value' => 114,
                'name' => 'Sbtechsportsbookbetlogs'
            ],
            [
                'value' => 115,
                'name' => 'Sbtechdebitcredithistory'
            ],
            [
                'value' => 116,
                'name' => 'Rebatedetails'
            ],
            [
                'value' => 117,
                'name' => 'Gdgamebets'
            ],
            [
                'value' => 118,
                'name' => 'Securityquestions'
            ],
            [
                'value' => 119,
                'name' => 'Ticketcategory'
            ],
            [
                'value' => 120,
                'name' => 'Aspnetusers'
            ],
            [
                'value' => 121,
                'name' => 'Rebates'
            ],
            [
                'value' => 122,
                'name' => 'Campaigndetaillevels'
            ],
            [
                'value' => 123,
                'name' => 'PaymentGatewaybanks'
            ],
            [
                'value' => 125,
                'name' => 'Agents'
            ],
            [
                'value' => 126,
                'name' => 'Customertickets'
            ],
            [
                'value' => 127,
                'name' => 'Brands'
            ],
            [
                'value' => 128,
                'name' => 'Filemanaged'
            ],
            [
                'value' => 130,
                'name' => 'Currencies'
            ],
            [
                'value' => 131,
                'name' => 'Notificationmessagelogs'
            ],
            [
                'value' => 133,
                'name' => 'Languages'
            ],
            [
                'value' => 134,
                'name' => 'Gdbethistorycasino'
            ],
            [
                'value' => 135,
                'name' => 'Bsbetresulthistory'
            ],
            [
                'value' => 137,
                'name' => 'Safepaydepositresponses'
            ],
            [
                'value' => 138,
                'name' => 'Campaigndetails'
            ],
            [
                'value' => 139,
                'name' => 'Brandmarkets'
            ],
            [
                'value' => 140,
                'name' => 'Transactiongrabs'
            ],
            [
                'value' => 141,
                'name' => 'Walletlosses'
            ],
            [
                'value' => 142,
                'name' => 'Bankaccountpaymentmethods'
            ],
            [
                'value' => 143,
                'name' => 'Usertokens'
            ],
            [
                'value' => 144,
                'name' => 'Affiliatetrackinglinks'
            ],
            [
                'value' => 145,
                'name' => 'Agbetrecords'
            ],
            [
                'value' => 146,
                'name' => 'TodoItem'
            ],
            [
                'value' => 147,
                'name' => 'Gdgamebetdetail'
            ],
            [
                'value' => 148,
                'name' => 'Paywalodeposits'
            ],
            [
                'value' => 149,
                'name' => 'Owfundtransfers'
            ],
            [
                'value' => 151,
                'name' => 'Gamebetlimitsettings'
            ],
            [
                'value' => 153,
                'name' => 'Betlogslatestfetch'
            ],
            [
                'value' => 154,
                'name' => 'Playerbets'
            ],
            [
                'value' => 155,
                'name' => 'Walletledgers'
            ],
            [
                'value' => 156,
                'name' => 'TabularReport'
            ],
            [
                'value' => 157,
                'name' => 'Emailtemplate'
            ],
            [
                'value' => 158,
                'name' => 'Emailblast'
            ],
            [
                'value' => 159,
                'name' => 'Emailblastmonitoring'
            ],
            [
                'value' => 160,
                'name' => 'Onlinebanks'
            ],
            [
                'value' => 161,
                'name' => 'Onlinebanktypes'
            ],
            [
                'value' => 162,
                'name' => 'Onlinebanksupportedcurrencies'
            ],
            [
                'value' => 163,
                'name' => 'Paymentgateways'
            ],
            [
                'value' => 164,
                'name' => 'Countrypaymentmethods'
            ],
            [
                'value' => 165,
                'name' => 'User'
            ],
            [
                'value' => 166,
                'name' => 'PlayerMessages'
            ],
            [
                'value' => 167,
                'name' => 'Messages'
            ],
        ];
    }
}