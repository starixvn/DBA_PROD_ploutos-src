<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\AffiliateCommission;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\FloatType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\Entity\Comments;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\GraphQL\Enum\AffiliateCommissionStatusTypeEnum;
use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;
use PandoraBundle\Resolver\CommentResolver;
use PandoraBundle\Service\AffiliateBackendService;

class ActionApproveAffiliateCommissionsMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Affiliate Commission Approve';
    }
    
    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType()),
            'Income' => new NonNullType(new FloatType()),
            'Note' => new StringType()
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $affCommissionsStatus = new AffiliateCommissionStatusTypeEnum();
        $pandoraApi = $this->container->get(AffiliateBackendService::class);
        $pandoraApi->setParameters('Affiliate/UpdateCommissionStatus', 'POST', [
            'AffiliateCommissionId' => $args['Id'],
            'ApprovedAmount' => $args['Income'],
            'AffiliateCommisionStatus' => $affCommissionsStatus->parseValue('Approved'),
        ]);
        $apiResult = $pandoraApi->executeQuery($info);
        
        // CREATE COMMENT
        if($apiResult->Status){
            if(isset($args['Note']) && str_replace(' ', '', $args['Note']) != ''){
                $currentUser = $this->container->get('security.token_storage')->getToken()->getUser();
                $systemModule = new SystemModulesIntTypeEnum();
                $commentArgs = [
                    'Id' => 0,
                    'SourceObject' => $systemModule->parseValue('Affiliatecommisions'),
                    'SourceObjectId' => $args['Id'],
                    'CommentedBy' => $currentUser->getUsername(),
                    'Note' => $args['Note'],
                ];
                
                $commentEntityResolver = $this->container->get(CommentResolver::class);
                $commentEntityResolver->initAbstractResolver(['entity' => $commentArgs], []);
                $commentEntityResolver->prepareEntity(Comments::class);
                $commentEntityResolver->validateEntity();
                $commentEntityResolver->mergeEntity();
            }
        }
        
        return ['apiResult' => json_encode($apiResult)];
    }
}