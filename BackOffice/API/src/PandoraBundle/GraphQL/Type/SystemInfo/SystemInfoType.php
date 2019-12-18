<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\SystemInfo;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class SystemInfoType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields([
            'CreatedBy' => [
                'type' => new StringType(),
            ],
            'UpdatedBy' => [
                'type' => new StringType(),
            ]        
        ]);
    }
}