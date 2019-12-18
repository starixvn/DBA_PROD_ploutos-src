<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\Affiliate;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use PandoraBundle\GraphQL\Type\Affiliate\AffiliateType;

class AffiliateField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Affiliate View';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType())
        ]);
    }

    public function getType()
    {
        return new ListType(new AffiliateType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get('PandoraBundle\\Resolver\\AffiliateResolver');
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        $affiliateData = $entityResolver->getQueryBuilderSingleResult();
        if(count($affiliateData) > 0 && isset($affiliateData[0]['SecurityAnswer'])){
            $affiliateData[0]['SecurityAnswer'] = '********';
        }
        return $affiliateData;
    }

}