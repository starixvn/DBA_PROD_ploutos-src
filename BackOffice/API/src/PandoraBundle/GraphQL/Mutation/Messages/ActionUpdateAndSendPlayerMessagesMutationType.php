<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\Messages;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\Resolver\MessagesResolver;
use PandoraBundle\Service\PandoraBackendService;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use PandoraBundle\GraphQL\Enum\MessagesTypeEnum;

class ActionUpdateAndSendPlayerMessagesMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Update Player Messages and Send';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType()),
            'MessageNumber' => new NonNullType(new StringType()),
            'SentToAll' => new BooleanType(),
            'PlayerProfileId' => new IdType(),
            'BrandCode' => new NonNullType(new StringType()),
            'CurrencyCode' => new NonNullType(new StringType()),
            'MessageType' =>  new NonNullType(new MessagesTypeEnum()),
            'MessageContent' => new NonNullType(new StringType())
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {       
        // FIRST CALL UPDATEs MESSAGE
        $args['IsFromPlayer'] = false;
        // $args['SendDate'] = date('Y-m-d h:m:s');

        $pandoraApi = $this->container->get(PandoraBackendService::class);
        $pandoraApi->setParameters('Message/Update', 'POST', $args);
        $apiCreationResult = $pandoraApi->executeQuery($info);
        
        // SECOND CALL SENDS THE MESSAGE
        $pandoraApi->setParameters('Message/UpdateStatus', 'POST', [
            'Id' => $apiCreationResult->Data,
            'Status' => 1
        ]);
        return ['apiResult' => json_encode($pandoraApi->executeQuery($info))];
        
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}