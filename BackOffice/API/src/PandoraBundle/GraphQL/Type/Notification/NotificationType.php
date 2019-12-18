<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\Notification;

use PandoraBundle\Joinery\NotificationJoinery;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class NotificationType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(NotificationJoinery::fields());
    }
}