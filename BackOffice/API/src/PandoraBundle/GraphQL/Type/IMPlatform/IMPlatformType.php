<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\IMPlatform;

use PandoraBundle\Joinery\IMPlatformJoinery;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class IMPlatformType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(IMPlatformJoinery::fields());
    }
}