<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\FileManaged;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use PandoraBundle\GraphQL\Type\FileManaged\FileManagedType;
use PandoraBundle\Resolver\FileManagedResolver;

class FileManagedField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'File Management View';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new FileManagedType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(FileManagedResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        
        $returnValue = $entityResolver->getQueryBuilderSingleResult();
        
        if(count($returnValue) > 0 && isset($returnValue[0]['PayLoad'])){
            if(isset($returnValue[0]['Uri'])){
                $filePath = $this->container->get('kernel')->getRootDir() . '/..'.$this->container->getParameter('file_upload_location').$returnValue[0]['Uri'];
                $fileContent = file_get_contents($filePath);
                $returnValue[0]['PayLoad'] = base64_encode($fileContent);
            }else{
                throw new \Exception('Unable to process you request. Please contact Administrator.');
            }
        }
        return $returnValue;
    }
    
}