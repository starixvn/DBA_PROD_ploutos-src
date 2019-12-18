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
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\Entity\Comments;
use PandoraBundle\Entity\Tickets;
use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;
use PandoraBundle\GraphQL\Enum\TicketStatusTypeEnum;
use PandoraBundle\GraphQL\Type\Tickets\TicketsType;
use PandoraBundle\Resolver\CommentResolver;
use PandoraBundle\Resolver\TicketsResolver;

class ActionCloseTicketMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Ticket Action Close';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType()),
            'Comments' => new NonNullType(new StringType())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new TicketsType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $transactionType = new TicketStatusTypeEnum();
        $args['Status'] = $transactionType->parseValue('Closed');
        $args['entity'] = $args;
        
        // ---- START SAVE COMMENTs AND UNSET FROM ARRAY
        if(isset($args['entity']['Comments']) && $args['entity']['Comments'] != ''){
            
            // GET CURRENT USER
            $currentUser = $this->container->get('security.token_storage')->getToken()->getUser();
            
            $commentModule = new SystemModulesIntTypeEnum();
            $commentArgs = [
                'Id' => 0,
                'SourceObject' => $commentModule->parseValue('Tickets'),
                'SourceObjectId' => $args['entity']['Id'],
                'CommentedBy' => $currentUser->getUsername(),
                'Note' => $args['entity']['Comments'],
            ];
            
            $commentEntityResolver = $this->container->get(CommentResolver::class);
            $commentEntityResolver->initAbstractResolver(['entity' => $commentArgs], []);
            $commentEntityResolver->prepareEntity(Comments::class);
            $commentEntityResolver->validateEntity();
            $commentEntityResolver->mergeEntity();
        }
        unset($args['entity']['Comments']);
        // ---- END SAVE COMMENTs
        
        
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