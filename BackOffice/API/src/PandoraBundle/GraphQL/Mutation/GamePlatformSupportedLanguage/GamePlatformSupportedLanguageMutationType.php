<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\GamePlatformSupportedLanguage;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\GamePlatformSupportedLanguage\GamePlatformSupportedLanguageType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\GamePlatformSupportedLanguageJoinery;
use PandoraBundle\Resolver\GamePlatformSupportedLanguageResolver;
use PandoraBundle\Entity\Gameplatformsupportedlanguages;

class GamePlatformSupportedLanguageMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Setup Game Platform Supported Language Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new GamePlatformSupportedLanguageType(), GamePlatformSupportedLanguageJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new GamePlatformSupportedLanguageType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(GamePlatformSupportedLanguageResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Gameplatformsupportedlanguages::class);
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