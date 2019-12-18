<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\VIPLevel;

use PandoraBundle\Joinery\VIPLevelJoinery;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class VIPLevelType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(VIPLevelJoinery::fields());
    }
}