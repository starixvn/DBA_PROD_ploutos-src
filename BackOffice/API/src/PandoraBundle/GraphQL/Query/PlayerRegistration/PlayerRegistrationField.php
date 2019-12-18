<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\PlayerRegistration;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use PandoraBundle\Entity\Playerregistrations;
use PandoraBundle\GraphQL\Type\PlayerRegistration\PlayerRegistrationType;

class PlayerRegistrationField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Registration View';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new PlayerRegistrationType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        return $this->container->get('doctrine.orm.entity_manager')->getRepository(Playerregistrations::class)->findBy(['Id' => $args['Id']]);
    }
    
}