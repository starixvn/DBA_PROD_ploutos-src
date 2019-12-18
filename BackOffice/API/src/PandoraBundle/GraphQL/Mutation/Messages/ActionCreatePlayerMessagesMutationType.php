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

class ActionCreatePlayerMessagesMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Create Player Messages';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
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
        $entityResolver = $this->container->get(MessagesResolver::class);
        $lastId = $entityResolver->getLastMessageId();
        
        $args['IsFromPlayer'] = false;
        // $args['SendDate'] = date('Y-m-d h:m:s');
        // $args['MessageNumber'] = 'MN'.date('ymd').sprintf('%05d', ($lastId + 1));
        $pandoraApi = $this->container->get(PandoraBackendService::class);
        $pandoraApi->setParameters('Message/Create', 'POST', $args);
        return ['apiResult' => json_encode($pandoraApi->executeQuery($info))];

        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}