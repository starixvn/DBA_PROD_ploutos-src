<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\GamePlatformOAuthCredential;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\GamePlatformOAuthCredentialJoinery;
use PandoraBundle\Resolver\GamePlatformOAuthCredentialResolver;
use PandoraBundle\Entity\Gameplatformoauthcredentials;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\GamePlatformOAuthCredential\GamePlatformOAuthCredentialType;

class GamePlatformOAuthCredentialMutationType extends AbstractContainerAwareField
{

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new GamePlatformOAuthCredentialType(), GamePlatformOAuthCredentialJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new GamePlatformOAuthCredentialType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(GamePlatformOAuthCredentialResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Gameplatformoauthcredentials::class);
        $entityResolver->validateEntity();
        
        if($entityResolver->mergeEntity()){
            $entityResolver->initEntityResolver();
            $entityResolver->prepareQueryBuilder();
            return $entityResolver->getQueryBuilderSingleResult();
        }
        
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}