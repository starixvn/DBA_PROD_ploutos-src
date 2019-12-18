<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\BrandMarket;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\BrandMarket\BrandMarketType;
use PandoraBundle\Resolver\BrandMarketResolver;
use PandoraBundle\Entity\Brandmarkets;
use PandoraBundle\Joinery\BrandMarketJoinery;

class BrandMarketMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Setup Brand Market Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new BrandMarketType(), BrandMarketJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new BrandMarketType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(BrandMarketResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Brandmarkets::class);
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