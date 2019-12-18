<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\WalletAdjustment;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\Service\PandoraBackendService;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\FloatType;

class ActionAddDebitWalletAdjustmentMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Action Add Debit Memo';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'PlayerLoginName' => new NonNullType(new StringType()),
            'TransactionDate' => new NonNullType(new DateTimeType()),
            'Amount' => new NonNullType(new FloatType()),
            'Remarks' => new StringType(),
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $pandoraApi = $this->container->get(PandoraBackendService::class);
        $pandoraApi->setParameters('v1/Wallet/DebitMemo', 'POST', [
            'PlayerLoginName' => $args['PlayerLoginName'],
            'TransactionDate' => $args['TransactionDate']->format('c'),
            'Amount' => $args['Amount'],
            'Remarks' => isset($args['Remarks']) ? $args['Remarks'] : '',
        ]);
        
        return ['apiResult' => json_encode($pandoraApi->executeQuery($info))];
    }
}