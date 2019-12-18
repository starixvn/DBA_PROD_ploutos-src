<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
namespace PandoraBundle\GraphQL\Mutation\BannedWords;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\GraphQL\Type\BandWord\BandWordType;
use PandoraBundle\Joinery\BandWordJoinery;
use PandoraBundle\Resolver\BandWordResolver;
use PandoraBundle\Entity\Bandwords;

class BannedWordsMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Banned Words Create/Edit';
    }
    
    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new BandWordType(), BandWordJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new BandWordType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(BandWordResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Bandwords::class);
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