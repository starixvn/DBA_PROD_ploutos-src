<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\TabularReport;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\TabularReport\TabularReportType;
use PandoraBundle\Joinery\TabularReportJoinery;
use PandoraBundle\Resolver\TabularReportResolver;
use AppBundle\Entity\TabularReport;

class TabularReportMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Tabular Report Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new TabularReportType(), TabularReportJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new TabularReportType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(TabularReportResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareEntity(TabularReport::class);
        
        // ONLY OWNER AND ADMIN CAN EDIT THE 
        if((int) $args['entity']['Id'] > 0 && !$entityResolver->isCurrentUserOwnerOfReport($args['entity']['Id'])){
            throw new \Exception('You are not allowed to edit this report.');
        }
        
        $entityResolver->validateEntity();
        if($entityResolver->mergeEntity()){
            $entityResolver->prepareQueryBuilder();
            return $entityResolver->getQueryBuilderSingleResult();
        }
        
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}