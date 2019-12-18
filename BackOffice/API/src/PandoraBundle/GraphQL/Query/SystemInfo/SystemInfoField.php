<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\SystemInfo;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\GraphQL\Type\SystemInfo\SystemInfoType;
use PandoraBundle\Resolver\UserResolver;
use Youshido\GraphQL\Type\Scalar\StringType;

class SystemInfoField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'System Info';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'CreatedBy' => new StringType(),
            'UpdatedBy' => new StringType()
        ]);
    }
    
    public function getType()
    {
        return new ListType(new SystemInfoType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(UserResolver::class);
        return [
            [
                'CreatedBy' => (!empty($args['CreatedBy'])) ? $entityResolver->getUserNameByUniqueId($args['CreatedBy'], 'System') : 'System',
                'UpdatedBy' => (!empty($args['UpdatedBy'])) ? $entityResolver->getUserNameByUniqueId($args['UpdatedBy'], 'System') : 'System',
            ]
        ];
    }
    
}