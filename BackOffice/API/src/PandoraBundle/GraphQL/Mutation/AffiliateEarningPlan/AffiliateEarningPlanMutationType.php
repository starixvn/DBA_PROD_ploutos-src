<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\AffiliateEarningPlan;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\AffiliateEarningPlanJoinery;
use PandoraBundle\GraphQL\Type\AffiliateEarningPlan\AffiliateEarningPlanType;
use PandoraBundle\Resolver\AffiliateEarningPlanResolver;
use PandoraBundle\Entity\Affiliateearningplans;

class AffiliateEarningPlanMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Affiliate Setup Earning Plan Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new AffiliateEarningPlanType(), AffiliateEarningPlanJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new AffiliateEarningPlanType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(AffiliateEarningPlanResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Affiliateearningplans::class);
        $entityResolver->mapRelatedObject();
        $entityResolver->validateEntity();
        
        if($entityResolver->mergeEntity()){
            $entityResolver->initEntityResolver();
            $entityResolver->prepareQueryBuilder();
            return $entityResolver->getQueryBuilderSingleResult();
        }
    }
}