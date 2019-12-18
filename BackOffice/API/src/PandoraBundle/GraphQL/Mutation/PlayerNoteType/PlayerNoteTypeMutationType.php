<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\PlayerNoteType;

use PandoraBundle\Entity\Playernotetype;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\PlayerNoteType\PlayerNoteTypeType;
use PandoraBundle\Joinery\PlayerNoteTypeJoinery;
use PandoraBundle\Resolver\PlayerNoteTypeResolver;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
// use PandoraBundle\GraphQL\Type\PlayerNoteCategory\PlayerNoteCategoryType;
// use PandoraBundle\Joinery\PlayerNoteCategoryJoinery;
// use PandoraBundle\Resolver\PlayerNoteCategoryResolver;
// use PandoraBundle\Entity\Playernotecategory;

class PlayerNoteTypeMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Setup Player Note Type Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new PlayerNoteTypeType(), PlayerNoteTypeJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new PlayerNoteTypeType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PlayerNoteTypeResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Playernotetype::class);
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