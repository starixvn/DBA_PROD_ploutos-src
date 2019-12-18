<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\BSBonusWin;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use PandoraBundle\Joinery\BSBonusWinJoinery;

class BSBonusWinType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(BSBonusWinJoinery::fields());
    }
}