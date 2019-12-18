<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\Brand;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\Joinery\BrandJoinery;
use PandoraBundle\Resolver\BrandResolver;
use PandoraBundle\Service\PandoraBackendService;
use PandoraBundle\Entity\Brands;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\Brand\BrandType;

class BrandMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Setup Brand Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new BrandType(), BrandJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new BrandType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(BrandResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->prepareEntity(Brands::class);
        $entityResolver->validateEntity();
        $brandId = $entityResolver->mergeEntity();
        
        if($brandId){
            $brandEntity = $entityResolver->getBrandEntity($brandId);
            if(!$brandEntity->getMerchantId()){
                try{
                    // AFTER SUCCESS MERGE CALL API TO ATTACH THE MERCHATN ID
                    $pandoraApi = $this->container->get(PandoraBackendService::class);
                    $pandoraApi->setParameters('Brand/GenerateAuthorization', 'POST', [
                        'BrandId' => $brandId,
                        'UserName' => $brandEntity->getBrandCode().'.user',
                        'Password' => '7+cJ5cjcVQb~EE[',
                        'ConfirmPassword' => '7+cJ5cjcVQb~EE[',
                    ]);
                    $pandoraApi->executeQuery(); // SILENT EXECUTE AND RETURN
                }catch(\Exception $e){}// SILENT ERROR
            }
            
            $entityResolver->initEntityResolver();
            $entityResolver->prepareQueryBuilder();
            return $entityResolver->getQueryBuilderSingleResult();
        }
    }
}