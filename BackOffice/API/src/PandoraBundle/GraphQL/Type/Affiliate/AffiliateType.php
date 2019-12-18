<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\Affiliate;

use PandoraBundle\Joinery\AffiliateJoinery;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class AffiliateType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(AffiliateJoinery::fields());
    }
}