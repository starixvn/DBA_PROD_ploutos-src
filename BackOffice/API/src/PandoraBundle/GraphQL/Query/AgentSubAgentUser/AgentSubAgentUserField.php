<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\AgentSubAgentUser;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use PandoraBundle\GraphQL\Type\AgentSubAgentUser\AgentSubAgentUserType;

class AgentSubAgentUserField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Agent Sub Agent User View';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new AgentSubAgentUserType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get('PandoraBundle\\Resolver\\AgentSubAgentUserResolver');
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        
        return $entityResolver->getQueryBuilderSingleResult();
    }
    
}