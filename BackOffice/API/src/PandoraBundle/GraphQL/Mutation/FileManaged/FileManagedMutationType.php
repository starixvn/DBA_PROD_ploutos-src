<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\FileManaged;

use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\FileManaged\FileManagedType;
use PandoraBundle\Joinery\FileManagedJoinery;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Resolver\FileManagedResolver;
use PandoraBundle\Service\FileManageService;
use PandoraBundle\Entity\Filemanaged;

class FileManagedMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'File Manage Upload';
    }
    
    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new FileManagedType(), FileManagedJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new FileManagedType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        // SAVE THE FILE FIRST
        $fileService = $this->container->get(FileManageService::class);
        $fileService->init($args['entity']['PayLoad'], $args['entity']['FileName'], (int) $args['entity']['FileSize']);
        $fileService->validate();
        $fileService->blobToPhysicalFile();
        
        // OVERRIDE USER INPUTs WITH SYSTEM GENERATED
        $args['entity']['Uri'] = $fileService->systemFileLocation.'/'.$fileService->systemFileName;
        $args['entity']['FileMime'] = $fileService->fileMime;
        
        $entityResolver = $this->container->get(FileManagedResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Filemanaged::class);
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