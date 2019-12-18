<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\PlayerRebateDetail;

use PandoraBundle\Joinery\PlayerRebateDetailJoinery;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class PlayerRebateDetailType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(PlayerRebateDetailJoinery::fields());
    }
}