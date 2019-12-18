<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\GameBetLimitSetting;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\GameBetLimitSettingJoinery;
use PandoraBundle\Resolver\GameBetLimitSettingResolver;
use PandoraBundle\Entity\Gamebetlimitsettings;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\GameBetLimitSetting\GameBetLimitSettingType;

class GameBetLimitSettingMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Setup Game Bet Limit Setting Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new GameBetLimitSettingType(), GameBetLimitSettingJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new GameBetLimitSettingType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(GameBetLimitSettingResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Gamebetlimitsettings::class);
        $entityResolver->mapRelatedObject();
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