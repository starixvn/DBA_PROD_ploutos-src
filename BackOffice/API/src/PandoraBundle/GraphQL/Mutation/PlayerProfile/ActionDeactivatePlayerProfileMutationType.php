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
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;

class ActionDeactivatePlayerProfileMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Action Deactivate';
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
        $pandoraApi = $this->container->get('PandoraBundle\Service\PandoraBackendService');
        
        // LOGOUT
        $pandoraApi->setParameters('User/ForceLogOut', 'POST', ['UserName' => $args['Username']]);
        $pandoraApi->executeQuery($info);
        
        // LOCK PLAYER PROFILE
        $pandoraApi->setParameters('PlayerAccount/UpdateAccountStatus', 'POST', [
            'UserName' => $args['Username'],
            'AccountStatusCode' => 'D' // MEANS LOCKED
        ]);
        return ['apiResult' => json_encode($pandoraApi->executeQuery($info))];
    }
}