<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\EmailBlast;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Entity\Emailblast;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\EmailBlast\EmailBlastType;
use PandoraBundle\Joinery\EmailBlastJoinery;
use PandoraBundle\Resolver\EmailBlastResolver;

class EmailBlastMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Email Blast Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new EmailBlastType(), EmailBlastJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new EmailBlastType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        if(isset($args['entity']['Id']) && !$args['entity']['Id']){
            $args['entity']['Status'] = 'Created';
        }
        if(isset($args['entity']['EmailAddress'])){
            $args['entity']['EmailRecipientCount'] = count(explode(';', $args['entity']['EmailAddress']));
        }
        
        $entityResolver = $this->container->get(EmailBlastResolver::class);
        if(isset($args['entity']['Id']) && $args['entity']['Id'] > 0){
            $emailBlastEntity = $entityResolver->getEmailBlastById($args['entity']['Id']);
            if($emailBlastEntity->getStatus() == 'Sent'){
                $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'AppLevel', 'message' => 'Email blast can no longer be editable.']])));
            }
        }
        
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Emailblast::class);
        $entityResolver->mapRelatedObject();
        $entityResolver->validateEntity();
        
        if($entityResolver->mergeEntity()){
            $entityResolver->initEntityResolver();
            $entityResolver->prepareQueryBuilder();
            return $entityResolver->getQueryBuilderSingleResult();
        }
    }
}