<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\TicketCategory;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use PandoraBundle\Joinery\TicketCategoryJoinery;

class TicketCategoryType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(TicketCategoryJoinery::fields());
    }
}