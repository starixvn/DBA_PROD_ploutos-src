<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\PlayerSeenMessageHistory;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\Resolver\PlayerMessagesResolver;
use PandoraBundle\Service\PandoraBackendService;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;

class ActionCreatePlayerSeenMessagesHistoryMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Create Player Messages';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'MessageId' => new NonNullType(new IdType()),
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $entityResolver = $this->container->get(PlayerMessagesResolver::class);
        $playerMessageId = $entityResolver->getPlayerMessageIdByMessageId($args['MessageId']);
        $pandoraApi = $this->container->get(PandoraBackendService::class);
        $pandoraApi->setParameters('Message/CreateMessageSeenHistory', 'POST', [
            'PlayerMessageId' => $playerMessageId
        ]);
        return ['apiResult' => json_encode($pandoraApi->executeQuery($info))];

        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}