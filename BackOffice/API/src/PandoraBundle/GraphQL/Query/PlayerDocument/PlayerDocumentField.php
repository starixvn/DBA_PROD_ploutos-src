<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\PlayerDocument;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;
use PandoraBundle\GraphQL\Type\PlayerDocument\PlayerDocumentType;
use PandoraBundle\Resolver\FileManagedResolver;
use PandoraBundle\Resolver\PlayerDocumentResolver;

class PlayerDocumentField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Document View';
    }
    
    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new PlayerDocumentType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PlayerDocumentResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        $playerDocs = $entityResolver->getQueryBuilderSingleResult();
        
        if(count($playerDocs) > 0){
            $selectedFields = $entityResolver->getFieldArray();
            
            $entityResolver = $this->container->get(FileManagedResolver::class);
            $entityResolver->initAbstractResolver([], []);
            $systemModules = new SystemModulesIntTypeEnum();
            
            if(in_array('FileIds', $selectedFields)){
                $playerDocs[0]['FileIds'] = array_column($entityResolver->getFileIds($args['Id'], $systemModules->parseValue('Playerdocuments')), 'Id');
            }
            if(in_array('FileInfos', $selectedFields)){
                $playerDocs[0]['FileInfos'] = $entityResolver->getFileInfos($args['Id'], $systemModules->parseValue('Playerdocuments'));
            }
        }
        return $playerDocs;
    }
    
}