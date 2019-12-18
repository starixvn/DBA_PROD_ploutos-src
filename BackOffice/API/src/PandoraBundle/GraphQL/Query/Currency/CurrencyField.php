<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\Currency;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Type\Currency\CurrencyType;

class CurrencyField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Currency view';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new IdType(),
            'CurrencyCode' => new StringType()
        ]);
    }
    
    public function getType()
    {
        return new ListType(new CurrencyType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        if(empty($args['Id']) && empty($args['CurrencyCode'])){
            throw new \Exception('Please provide either Id or CurrencyCode.');
        }
        $entityResolver = $this->container->get('PandoraBundle\\Resolver\\CurrencyResolver');
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        
        return $entityResolver->getQueryBuilderSingleResult();
    }
    
}