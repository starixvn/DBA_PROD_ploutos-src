<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\AuditTrail;

use PandoraBundle\Joinery\AuditTrailJoinery;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class AuditTrailType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(AuditTrailJoinery::fields());
    }
}