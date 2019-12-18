<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\OnlineBank;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use PandoraBundle\Joinery\OnlineBanksJoinery;

class OnlineBankType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(OnlineBanksJoinery::fields());
    }
}