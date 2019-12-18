<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\StateProvince;

use PandoraBundle\Joinery\StateProvinceJoinery;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class StateProvinceType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(StateProvinceJoinery::fields());
    }
}