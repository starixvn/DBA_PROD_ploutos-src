<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\AffiliateTrackingLink;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\AffiliateTrackingLink\AffiliateTrackingLinkType;
use PandoraBundle\Joinery\AffiliateTrackingLinkJoinery;
use PandoraBundle\Resolver\AffiliateTrackingLinkResolver;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Entity\Affiliatetrackinglinks;

class AffiliateTrackingLinkMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Affiliate Tracking Link Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new AffiliateTrackingLinkType(), AffiliateTrackingLinkJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new AffiliateTrackingLinkType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(AffiliateTrackingLinkResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Affiliatetrackinglinks::class);
        $entityResolver->mapRelatedObject();
        $entityResolver->validateEntity();
        
        if($entityResolver->hasDuplicate()){
            throw new \Exception(json_encode([
                ['field' => 'LanguageId', 'message' => 'Tracking Link already exist']
            ]));
        }
        
        if($entityResolver->mergeEntity()){
            $entityResolver->initEntityResolver();
            $entityResolver->prepareQueryBuilder();
            return $entityResolver->getQueryBuilderSingleResult();
        }
    }
}