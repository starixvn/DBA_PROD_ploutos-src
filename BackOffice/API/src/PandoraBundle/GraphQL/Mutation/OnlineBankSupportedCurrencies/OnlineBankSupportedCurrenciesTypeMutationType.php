<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\OnlineBankSupportedCurrencies;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\OnlineBankSupportedCurrencies\OnlineBankSupportedCurrenciesType;
use PandoraBundle\Joinery\OnlineBankSupportedCurrenciesTypesJoinery;
use PandoraBundle\Resolver\OnlineBankSupportedCurrenciesResolver;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Entity\Onlinebanksupportedcurrencies;

class OnlineBankSupportedCurrenciesTypeMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Online Bank Supported Currencies Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new OnlineBankSupportedCurrenciesType(), OnlineBankSupportedCurrenciesTypesJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new OnlineBankSupportedCurrenciesType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(OnlineBankSupportedCurrenciesResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Onlinebanksupportedcurrencies::class);
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