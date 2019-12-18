<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\WalletDeposit;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\Service\PandoraBackendService;
use Youshido\GraphQL\Type\Scalar\BooleanType;

class ActionWagerFulfilledWalletDepositMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Action Wager Fulfilled Deposit ';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType()),
            'IsWageringFulfilled' => new BooleanType(),
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        if(!isset($args['IsWageringFulfilled']) || !$args['IsWageringFulfilled']){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'IsWageringFulfilled', 'message' => 'Is Wagering Fulfilled should be checked.']])));
        }
        
        if(!$info->getExecutionContext()->hasErrors()){
            $pandoraApi = $this->container->get(PandoraBackendService::class);
            $pandoraApi->setParameters('v1/PlayerAccount/FulfillDepositWagering', 'POST', [
                'Id' => $args['Id']
            ]);
            return ['apiResult' => json_encode($pandoraApi->executeQuery($info))];
        }
    }
}