<?php
/**
 * This file is a part of GraphQL project.
 *
 * @author Alexandr Viniychuk <a@viniychuk.com>
 * created: 4/23/17 11:05 PM
 */

namespace PandoraBundle\GraphQL\Type\EmailTemplate;

use Youshido\GraphQL\Type\Object\AbstractObjectType;
use PandoraBundle\Joinery\EmailTemplateJoinery;

class EmailTemplateType extends AbstractObjectType
{
    public function build($config)
    {
        $config->addFields(EmailTemplateJoinery::fields());
    }
}