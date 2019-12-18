<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\UniqueDepositAmountRule;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\UniqueDepositAmountRule\UniqueDepositAmountRuleType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\UniqueDepositAmountRuleJoinery;
use PandoraBundle\Resolver\UniqueDepositAmountResolver;
use PandoraBundle\Resolver\UniqueDepositAmountRuleResolver;
use PandoraBundle\Entity\Uniquedepositamountrules;

class UniqueDepositAmountRuleMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Setup Unique Deposit Amount Rule Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new UniqueDepositAmountRuleType(), UniqueDepositAmountRuleJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new UniqueDepositAmountRuleType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(UniqueDepositAmountRuleResolver::class);
        
        // CACHE OLD VALUES
        $UDA = [];
        if((int) $args['entity']['Id'] > 0){
            $UDA = $entityResolver->getUniqueDepositAmountRule($args['entity']['Id']);
        }
        
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Uniquedepositamountrules::class);
        $entityResolver->validateEntity();
        
        $UDArEntityId = $entityResolver->mergeEntity();
        if($UDArEntityId){
            $entityResolver->initEntityResolver();
            $entityResolver->prepareQueryBuilder();
            $returnValue = $entityResolver->getQueryBuilderSingleResult();
            
            // AUTO-CREATE UniqueDepositAmount IF NEWLY CREATED AND UPDATED IMPORTANT VALUEs
            if(count($UDA) == 0 || 
              (count($UDA) >  0 && ($UDA[0]['StartValue'] != $returnValue[0]['StartValue'] || $UDA[0]['EndValue'] != $returnValue[0]['EndValue'] || $UDA[0]['IncrementValue'] != $returnValue[0]['IncrementValue']))
            ){
                $UDAResolver = $this->container->get(UniqueDepositAmountResolver::class);
                $UDAResolver->createUniqueDepositAmount($UDArEntityId, $returnValue[0]['StartValue'], $returnValue[0]['EndValue'], $returnValue[0]['IncrementValue']);
            }
            
            return $returnValue;
        }
    }
}