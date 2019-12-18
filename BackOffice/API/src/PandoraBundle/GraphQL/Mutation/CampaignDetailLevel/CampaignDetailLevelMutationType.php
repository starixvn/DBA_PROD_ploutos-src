<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\CampaignDetailLevel;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\CampaignDetailLevel\CampaignDetailLevelType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\CampaignDetailLevelJoinery;
use PandoraBundle\Resolver\CampaignDetailLevelResolver;
use PandoraBundle\Entity\Campaigndetaillevels;

class CampaignDetailLevelMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Bonus Detail Level Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new CampaignDetailLevelType(), CampaignDetailLevelJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new CampaignDetailLevelType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(CampaignDetailLevelResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Campaigndetaillevels::class);
        $entityResolver->validateEntity();
        
        if($entityResolver->mergeEntity()){
            $entityResolver->initEntityResolver();
            $entityResolver->prepareQueryBuilder();
            return $entityResolver->getQueryBuilderSingleResult();
        }
        
        
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}