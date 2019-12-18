<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\AuditTrail;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\AuditTrailJoinery;
use PandoraBundle\GraphQL\Type\AuditTrail\AuditTrailType;
use PandoraBundle\Resolver\AuditTrailResolver;
// use PandoraBundle\Entity\Audittrail;

class AuditTrailViewedMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Audit Trail Tag as Viewed';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new AuditTrailType(), AuditTrailJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new AuditTrailType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        // OVERRIDE VALUES
        $entityResolver = $this->container->get(AuditTrailResolver::class);
        
        return [['Id' => $entityResolver->tagRecordAsViewed($args)]];
        
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}