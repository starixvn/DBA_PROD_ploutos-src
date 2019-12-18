<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\AffiliateCommision;

use PandoraBundle\Joinery\AffiliateCommisionJoinery;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class AffiliateCommisionType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(AffiliateCommisionJoinery::fields());
    }
}