<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\StateProvince;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\StateProvince\StateProvinceType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\StateProvinceJoinery;
use PandoraBundle\Resolver\StateProvinceResolver;
use PandoraBundle\Entity\Stateprovinces;
use PandoraBundle\Resolver\CountryResolver;

class StateProvinceMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Setup Province Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new StateProvinceType(), StateProvinceJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new StateProvinceType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        // GET COUNTRY CODE
        if(isset($args['entity']['CountryId'])){
            $countryResolver = $this->container->get(CountryResolver::class);
            $args['entity']['CountryCode'] = $countryResolver->getCountryCodeById($args['entity']['CountryId']);
        }
        $entityResolver = $this->container->get(StateProvinceResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Stateprovinces::class);
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