<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\FraudRiskLevel;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\FraudRiskLevel\FraudRiskLevelType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\FraudRiskLevelJoinery;
use PandoraBundle\Resolver\FraudRiskLevelResolver;
use PandoraBundle\Entity\Fraudrisklevels;

class FraudRiskLevelMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Fraud Risk  Setup Level Create/edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new FraudRiskLevelType(), FraudRiskLevelJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new FraudRiskLevelType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        
        if( !isset($args['entity']['BrandId']) || $args['entity']['BrandId'] == 0) {
                 throw new \Exception(' Brand is Required! ');
        }
        $entityResolver = $this->container->get(FraudRiskLevelResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Fraudrisklevels::class);
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