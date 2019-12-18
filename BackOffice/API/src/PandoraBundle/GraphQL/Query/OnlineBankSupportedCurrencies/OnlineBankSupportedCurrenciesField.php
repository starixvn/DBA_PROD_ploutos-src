<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\OnlineBankSupportedCurrencies;

use PandoraBundle\GraphQL\Type\OnlineBankSupportedCurrencies\OnlineBankSupportedCurrenciesType;
use PandoraBundle\Resolver\OnlineBankSupportedCurrenciesResolver;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;

class OnlineBankSupportedCurrenciesField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Online Bank Supported Currency View';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType())
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
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        
        return $entityResolver->getQueryBuilderSingleResult();
    }
    
}