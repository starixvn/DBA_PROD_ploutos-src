<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\Wallet;

use PandoraBundle\Joinery\WalletJoinery;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class WalletType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(WalletJoinery::fields());
    }
}