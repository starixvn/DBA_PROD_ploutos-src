<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\ABBetHistory;

use PandoraBundle\Joinery\ABBetHistoryJoinery;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class ABBetHistoryType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(ABBetHistoryJoinery::fields());
    }
}