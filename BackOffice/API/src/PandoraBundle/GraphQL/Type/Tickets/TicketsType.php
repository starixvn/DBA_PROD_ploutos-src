<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\Tickets;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use PandoraBundle\Joinery\TicketJoinery;

class TicketsType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(TicketJoinery::fields());
    }
}