<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\PlayerProfile;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use PandoraBundle\GraphQL\Enum\PlayerTypeEnum;
use Youshido\GraphQL\Type\Scalar\IdType;
use PandoraBundle\Resolver\PlayerRegistrationResolver;
use PandoraBundle\GraphQL\Type\PlayerRegistration\PlayerRegistrationType;

class ActionChangeTypePlayerProfileMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Action Change Type';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType()),
            'PlayerType' => new NonNullType(new PlayerTypeEnum()),
        ]);
    }
    
    public function getType()
    {
        return new PlayerRegistrationType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        if($args['Id'] > 0 && isset($args['PlayerType'])){
            $entityResolver = $this->container->get(PlayerRegistrationResolver::class);
            $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
            $entityResolver->initEntityResolver();
            return $entityResolver->updatePlayerType($args['Id'], $args['PlayerType']);
        }
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}