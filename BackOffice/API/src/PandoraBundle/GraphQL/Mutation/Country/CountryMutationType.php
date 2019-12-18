<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\Country;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\CountryJoinery;
use PandoraBundle\Resolver\CountryResolver;
use PandoraBundle\Entity\Countrys;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\Country\CountryType;

class CountryMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Setup Country Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new CountryType(), CountryJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new CountryType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(CountryResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Countrys::class);
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