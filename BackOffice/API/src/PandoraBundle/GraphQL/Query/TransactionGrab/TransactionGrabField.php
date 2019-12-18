<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\TransactionGrab;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;
use PandoraBundle\GraphQL\Type\TransactionGrabs\TransactionGrabsType;
use PandoraBundle\Resolver\TransactionGrabsResolver;

class TransactionGrabField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Transaction Grab / UnGrab';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'TransactionType' => new NonNullType(new SystemModulesIntTypeEnum()),
            'SourceObjectId' => new NonNullType(new IdType())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new TransactionGrabsType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(TransactionGrabsResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderSingleResult();
    }
    
}