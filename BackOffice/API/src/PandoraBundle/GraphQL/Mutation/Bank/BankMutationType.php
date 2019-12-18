<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\Bank;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\Bank\BankType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\BankJoinery;
use PandoraBundle\Resolver\BankResolver;
use PandoraBundle\Entity\Banks;

class BankMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Setup Bank Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new BankType(), BankJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new BankType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(BankResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Banks::class);
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