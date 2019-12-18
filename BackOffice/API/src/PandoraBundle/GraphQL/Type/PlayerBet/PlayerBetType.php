<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\PlayerBet;

use PandoraBundle\Joinery\PlayerBetJoinery;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class PlayerBetType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(PlayerBetJoinery::fields());
    }
}