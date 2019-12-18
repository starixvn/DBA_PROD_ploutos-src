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
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Scalar\IdType;
use PandoraBundle\Entity\Tickets;
use PandoraBundle\GraphQL\Type\Tickets\TicketsType;
use PandoraBundle\Resolver\TicketsResolver;
use PandoraBundle\GraphQL\Enum\TicketStatusTypeEnum;

class ActionAcknowledgeTicketMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Ticket Action Acknowledge';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new TicketsType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        // MODIFY AND OVERRIDE ENTITY
        $transactionType = new TicketStatusTypeEnum();
        $args['Status'] = $transactionType->parseValue('Acknowledged');
        $args['entity'] = $args;
        
        $entityResolver = $this->container->get(TicketsResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Tickets::class);
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