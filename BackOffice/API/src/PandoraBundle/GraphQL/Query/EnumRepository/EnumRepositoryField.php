<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\EnumRepository;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use PandoraBundle\GraphQL\Type\EnumType\EnumType;

class EnumRepositoryField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Picklist Selections. *Please allow every role.';
    }
    
    public function build(FieldConfig $config)
    {}
    
    public function getType()
    {
        return new ListType(new EnumType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $returnEnums = ['item' => []];
        
        $selectedEnums = $info->getFieldASTList();
        if(count($selectedEnums) > 0){
            foreach ($selectedEnums as $value){
                if($value->getName() != '__typename'){
                    $enumResolver = $this->container->get('PandoraBundle\\GraphQL\\Enum\\'.$value->getName());
                    $returnEnums['item'][$value->getName()] = $enumResolver->getValues();
                }
            }
        }
        
        return $returnEnums;
    }
}