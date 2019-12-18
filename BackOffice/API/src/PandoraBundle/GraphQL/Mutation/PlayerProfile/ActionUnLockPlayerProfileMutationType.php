<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\PlayerProfile;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\Service\PandoraBackendService;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;

class ActionUnLockPlayerProfileMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Action Un Lock';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Username' => new NonNullType(new StringType())
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        // UN-LOCK PLAYER PROFILE
        $pandoraApi = $this->container->get(PandoraBackendService::class);
        $pandoraApi->setParameters('PlayerAccount/UpdateAccountStatus', 'POST', [
            'UserName' => $args['Username'],
            'AccountStatusCode' => 'U' // MEANS UN-LOCKED
        ]);
        return ['apiResult' => json_encode($pandoraApi->executeQuery($info))];
    }
}