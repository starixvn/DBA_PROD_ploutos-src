<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\GameBetLimitLevel;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\GameBetLimitLevelJoinery;
use PandoraBundle\Resolver\GameBetLimitLevelResolver;
use PandoraBundle\Entity\Gamebetlimitlevels;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\GameBetLimitLevel\GameBetLimitLevelType;

class GameBetLimitLevelMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Setup Game Bet Limit Level Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new GameBetLimitLevelType(), GameBetLimitLevelJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new GameBetLimitLevelType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(GameBetLimitLevelResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Gamebetlimitlevels::class);
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