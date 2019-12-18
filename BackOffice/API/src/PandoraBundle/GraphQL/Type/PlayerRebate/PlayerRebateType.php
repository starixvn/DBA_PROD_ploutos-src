<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\PlayerRebate;

use PandoraBundle\Joinery\PlayerRebateJoinery;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class PlayerRebateType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(PlayerRebateJoinery::fields());
    }
}