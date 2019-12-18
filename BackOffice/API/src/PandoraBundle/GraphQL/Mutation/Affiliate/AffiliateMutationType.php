<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\Affiliate;

use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Enum\AffiliateStatusTypeEnum;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use PandoraBundle\Joinery\AffiliateJoinery;
use PandoraBundle\Service\AffiliateBackendService;
use PandoraBundle\GraphQL\Type\Affiliate\AffiliateType;

class AffiliateMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Affiliate Create/Edit';
    }
    
    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new AffiliateType(), AffiliateJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $pandoraApi = $this->container->get(AffiliateBackendService::class);
        
        // $args['entity']['AffiliateType'] = $args['entity']['AffiliateTypeCode'];
        // OVERRIDE AFFILIATE TYPE IF THE VALUE IS NOT YET CONVERTED
        // $affType = new AffiliateTypeEnum();
        // $convertedAffTyp = $affType->parseValue($args['entity']['AffiliateType']);
        // if(!is_null($convertedAffTyp)){
        //    $args['entity']['AffiliateType'] = $affType->parseValue($args['entity']['AffiliateTypeCode']);
        // }
        
        $args['entity']['MarketingCost'] = number_format($args['entity']['MarketingCost'], 4);
        if((int) $args['entity']['Id'] == 0){
            $affStatus = new AffiliateStatusTypeEnum();
            $args['entity']['AffiliateCode'] = null; // HAS TO BE NULL
            $args['entity']['AffiliateStatus'] = $affStatus->parseValue('Activated');
            $pandoraApi->setParameters('Affiliate/Create', 'POST', $args['entity']);
        }else{
            $args['entity']['AffiliateId'] = $args['entity']['Id'];
            $pandoraApi->setParameters('Affiliate/Update', 'POST', $args['entity']);
        }
        
        return ['apiResult' => json_encode($pandoraApi->executeQuery($info))];
    }
}