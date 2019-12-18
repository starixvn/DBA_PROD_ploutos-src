<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\PlayerProfile;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\Service\PandoraBackendService;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;

class ActionCreatePlayerProfileMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Create Profile';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'BrandId' => new NonNullType(new IdType()),
            'PlayerTypeCode' => new NonNullType(new StringType()),
            'UserName' => new NonNullType(new StringType()),
            'CountryId' => new NonNullType(new IdType()),
            'VIPLevelId' => new NonNullType(new IdType()),
            'WithdrawalLevelId' => new NonNullType(new IdType()),
            'FraudRiskLevelId' => new NonNullType(new IdType()),
            'PaymentRiskLevelId' => new NonNullType(new IdType()),
            'BetLimitLevelId' => new NonNullType(new IdType()),
            'AffiliateCode' => new StringType(),
            'FullName' => new StringType(),
            'BirthDate' => new DateTimeType(),
            'EmailAddress' => new StringType(),
            'MobileCountryCodeNumber' => new NonNullType(new StringType()),
            'MobileNumber' => new StringType(),
            'SecurityQuestionId' => new IdType(),
            'SecurityAnswer' => new StringType(),
            'CurrencyId' => new NonNullType(new IdType()),
            'LanguageId' => new NonNullType(new IdType())
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        if(!empty($args['MobileCountryCodeNumber']) && !preg_match('/^\+?\d+$/', $args['MobileCountryCodeNumber'])){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'MobileNumber', 'message' => 'Mobile Country Code is invalid, should only contain numbers and + sign.']])));
            return ['apiResult' => ''];
        }
        if(!empty($args['MobileNumber']) && !is_numeric($args['MobileNumber'])){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'MobileNumber', 'message' => 'Mobile Number is invalid, should only contain numbers.']])));
            return ['apiResult' => ''];
        }
        
        // OVERRIDE PLAYER TYPE CODE
        if($args['PlayerTypeCode'] == 'HOUSE'){
            $args['PlayerTypeCode'] = 'H';
        }else if($args['PlayerTypeCode'] == 'TEST'){
            $args['PlayerTypeCode'] = 'T';
        }else if($args['PlayerTypeCode'] == 'SHOP'){
            $args['PlayerTypeCode'] = 'S';
        }else{
            $args['PlayerTypeCode'] = 'R';
        }
        
        $args['IsCreatedByCS'] = true;
        $pandoraApi = $this->container->get(PandoraBackendService::class);
        $pandoraApi->setParameters('v1/Player/RegisterFromBackOffice', 'POST', $args);
        return ['apiResult' => json_encode($pandoraApi->executeQuery($info))];
    }
}