<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\BetLogsLatestFetch;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use PandoraBundle\Joinery\BetLogsLatestFetchJoinery;

class BetLogsLatestFetchType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(BetLogsLatestFetchJoinery::fields());
    }
}