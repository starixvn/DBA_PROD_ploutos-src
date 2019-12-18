<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\RebateDetail;

use PandoraBundle\Joinery\RebateDetailJoinery;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class RebateDetailType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(RebateDetailJoinery::fields());
    }
}