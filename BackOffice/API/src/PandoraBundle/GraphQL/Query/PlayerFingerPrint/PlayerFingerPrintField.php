<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\PlayerFingerPrint;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Type\PlayerFingerPrint\PlayerFingerPrintType;
use PandoraBundle\Resolver\PlayerFingerPrintResolver;
use PandoraBundle\Resolver\PlayerfingerprinthitResolver;
use Youshido\GraphQL\Type\NonNullType;

class PlayerFingerPrintField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Setup Player Finger Print View';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            //'Id' => new IdType(),
            'FingerPrint' => new NonNullType(new StringType())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new PlayerFingerPrintType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        // 1.0 FINGERPRINT
        $entityResolver = $this->container->get(PlayerFingerPrintResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        $fingerPrintTbl = $entityResolver->getQueryBuilderSingleResult();
        
        if(count($fingerPrintTbl) > 0){
            return $fingerPrintTbl;
        }
        
        // 2.0 FINGERPRINTHITS
        $entityResolver = $this->container->get(PlayerfingerprinthitResolver::class);
        $entityResolver->initAbstractResolver($args, $info->getFieldASTList());
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        $fingerPrintTbl = $entityResolver->getQueryBuilderSingleResult();
        
        if(count($fingerPrintTbl) > 0){
            return $fingerPrintTbl;
        }
    }    
}