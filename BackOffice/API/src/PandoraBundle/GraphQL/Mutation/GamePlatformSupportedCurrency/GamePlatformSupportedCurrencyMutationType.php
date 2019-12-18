<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\GamePlatformSupportedCurrency;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\GamePlatformSupportedCurrency\GamePlatformSupportedCurrencyType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\GamePlatformSupportedCurrencyJoinery;
use PandoraBundle\Resolver\GamePlatformSupportedCurrencyResolver;
use PandoraBundle\Entity\Gameplatformsupportedcurrencies;

class GamePlatformSupportedCurrencyMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Setup Game Platform Supported Currency Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new GamePlatformSupportedCurrencyType(), GamePlatformSupportedCurrencyJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new GamePlatformSupportedCurrencyType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(GamePlatformSupportedCurrencyResolver::class);
        $currencyEntity = $entityResolver->getCurrency($args['entity']['CurrencyId']);
        $gamePlatformEntity = $entityResolver->getGamePlatform($args['entity']['GamePlatformId']);
        
        // AUTO - FILL
        if($currencyEntity){
            $args['entity']['CurrencyCode'] = $currencyEntity->getCurrencyCode();
        }
        if($gamePlatformEntity){
            $args['entity']['GamePlatformCode'] = $gamePlatformEntity->getGamePlatformCode();
        }
        
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Gameplatformsupportedcurrencies::class);
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