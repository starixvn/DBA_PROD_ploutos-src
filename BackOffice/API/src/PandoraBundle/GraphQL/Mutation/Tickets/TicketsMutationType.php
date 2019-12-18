<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\Tickets;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\Tickets\TicketsType;
use PandoraBundle\Joinery\TicketJoinery;
use PandoraBundle\Resolver\TicketsResolver;
use PandoraBundle\Entity\Tickets;

class TicketsMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Ticket Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new TicketsType(), TicketJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new TicketsType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(TicketsResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Tickets::class);
        $entityResolver->mapRelatedObject();
        $entityResolver->validateEntity();
        $entityMerge = $entityResolver->mergeEntity();
        
        if($entityMerge){
            
            // GENERATE TICKET NO
            if(!$args['entity']['Id']){
                $entityResolver->generateTicketNo($entityMerge);
            }
            
            $entityResolver->initEntityResolver();
            $entityResolver->prepareQueryBuilder();
            return $entityResolver->getQueryBuilderSingleResult();
        }
        
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}