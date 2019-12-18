<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\PlayerProfile;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Scalar\IdType;
use PandoraBundle\GraphQL\Type\PlayerProfile\PlayerProfileType;
use PandoraBundle\Resolver\PlayerProfileResolver;

class PlayerProfileField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player View';
    }
    
    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new IdType(),
            'UserName' => new IdType()
        ]);
    }
    
    public function getType()
    {
        return new ListType(new PlayerProfileType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        if(empty($args['Id']) && empty($args['UserName'])){
            throw new \Exception('Please provide either Id or UserName.');
        }
        $entityResolver = $this->container->get(PlayerProfileResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        return $entityResolver->getQueryBuilderSingleResult();
    }
    
}