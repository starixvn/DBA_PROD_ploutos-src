<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\AffiliateWorkFlow;

//USE FOR API 
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\Service\PandoraBackendService;

class ActionAffiliateWorkFlowMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Affiliate Work Flow';
    }
    
    //CHANGE TYPE USING NEW DECLARATION
    public function build(FieldConfig $config)
    {
        //USE FOR API 
        $this->addArguments([
            'Id' => new NonNullType(new IdType()),
            'Status' => new NonNullType(new IdType()),
            'AssignedTo' => new NonNullType(new StringType()),
            'Remarks' => new StringType(),
        ]);
    }
    
    public function getType()
    {
        //USE FOR API 
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        //USE FOR API 
        if(str_replace(' ', '', $args['Id']) == ''){
            $info->getExecutionContext()->addError(new \Exception(json_encode(['field' => 'Id', 'message' => 'Id is required.'])));
        }       
        if(str_replace(' ', '', $args['Status']) == ''){
            $info->getExecutionContext()->addError(new \Exception(json_encode(['field' => 'Status', 'message' => 'Status is required.'])));
        }
        if(str_replace(' ', '', $args['AssignedTo']) == ''){
            $info->getExecutionContext()->addError(new \Exception(json_encode(['field' => 'AssignedTo', 'message' => 'AssignedTo is required.'])));
        }
        
        if(!$info->getExecutionContext()->hasErrors()){
            $pandoraApi = $this->container->get(PandoraBackendService::class);
            $pandoraApi->setParameters('', 'POST', [
                'Id' => $args['Id'],
                'Status' => $args['Status'],
                'AssignedTo' =>  $args['AssignedTo'],
                'Remarks' => $args['Remarks']
            ]);
            return ['apiResult' => json_encode($pandoraApi->executeQuery())];
        }
    }
}