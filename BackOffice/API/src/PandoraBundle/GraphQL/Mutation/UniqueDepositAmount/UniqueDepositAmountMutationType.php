<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\UniqueDepositAmount;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\UniqueDepositAmount\UniqueDepositAmountType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\UniqueDepositAmountJoinery;
use PandoraBundle\Resolver\UniqueDepositAmountResolver;
use PandoraBundle\Entity\Uniquedepositamounts;

class UniqueDepositAmountMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Setup Unique Deposit Amount Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new UniqueDepositAmountType(), UniqueDepositAmountJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new UniqueDepositAmountType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(UniqueDepositAmountResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Uniquedepositamounts::class);
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