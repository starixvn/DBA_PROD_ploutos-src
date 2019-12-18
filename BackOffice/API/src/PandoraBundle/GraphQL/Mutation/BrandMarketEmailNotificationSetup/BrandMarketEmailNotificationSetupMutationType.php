<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\BrandMarketEmailNotificationSetup;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Entity\Brandmarketemailnotificationsetups;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\Resolver\BrandMarketEmailNotificationSetupResolver;
use PandoraBundle\Joinery\BrandMarketEmailNotificationSetupJoinery;
use PandoraBundle\GraphQL\Type\BrandMarketEmailNotificationSetup\BrandMarketEmailNotificationSetupType;

class BrandMarketEmailNotificationSetupMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Setup Brand Market Email Notification Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new BrandMarketEmailNotificationSetupType(), BrandMarketEmailNotificationSetupJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new BrandMarketEmailNotificationSetupType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(BrandMarketEmailNotificationSetupResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Brandmarketemailnotificationsetups::class);
        $entityResolver->mapRelatedObject();
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