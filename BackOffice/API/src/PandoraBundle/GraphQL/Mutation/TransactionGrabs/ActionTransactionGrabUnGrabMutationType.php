<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\TransactionGrabs;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\GraphQL\Type\TransactionGrabs\TransactionGrabsType;
use PandoraBundle\Joinery\TransactionGrabsJoinery;
use PandoraBundle\Resolver\CommentResolver;
use PandoraBundle\Resolver\TransactionGrabsResolver;
use PandoraBundle\Entity\Comments;
use PandoraBundle\Entity\Transactiongrabs;

class ActionTransactionGrabUnGrabMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Grab / UnGrab';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new TransactionGrabsType(), TransactionGrabsJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new TransactionGrabsType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(TransactionGrabsResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Transactiongrabs::class);
        $entityResolver->initEntityResolver();
        
        // DELETE
        if(isset($args['entity']['Id']) && $args['entity']['Id'] > 0){
            return $entityResolver->deleteTransactionGrabEntity($args['entity']['Id']);
        }else{
            $entityResolver->validateEntity();
            if($entityResolver->mergeEntity()){
                
                // CREATE COMMENT
                if(isset($args['entity']['Note']) && str_replace(' ', '', $args['entity']['Note']) != ''){
                    $currentUser = $this->container->get('security.token_storage')->getToken()->getUser();
                    $commentArgs = [
                        'Id' => 0,
                        'SourceObject' => $args['entity']['TransactionType'],
                        'SourceObjectId' => $args['entity']['SourceObjectId'],
                        'CommentedBy' => $currentUser->getUsername(),
                        'Note' => $args['entity']['Note'],
                    ];
                    
                    $commentEntityResolver = $this->container->get(CommentResolver::class);
                    $commentEntityResolver->initAbstractResolver(['entity' => $commentArgs], []);
                    $commentEntityResolver->prepareEntity(Comments::class);
                    $commentEntityResolver->validateEntity();
                    $commentEntityResolver->mergeEntity();
                }
                
                $entityResolver->prepareQueryBuilder();
                return $entityResolver->getQueryBuilderSingleResult();
            }
        }
        
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}