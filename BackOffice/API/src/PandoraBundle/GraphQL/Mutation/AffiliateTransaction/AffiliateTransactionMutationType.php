<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\AffiliateTransaction;

//USE FOR API 
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\GraphQL\Config\EntityParameters\EntityParametersType;
use PandoraBundle\GraphQL\Type\AffiliateTransaction\AffiliateTransactionType;
use PandoraBundle\Joinery\AffiliateTransactionUIJoinery;
use PandoraBundle\Service\AffiliateBackendService;

class AffiliateTransactionMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Affiliate Transaction Create/Edit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'entity' => new EntityParametersType(new AffiliateTransactionType(), AffiliateTransactionUIJoinery::fields())
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $pandoraApi = $this->container->get(AffiliateBackendService::class);
        if($args['entity']['Id'] == 0){
            $pandoraApi->setParameters('Affiliate/CreateAdjustmentMemo', 'POST', [
                'TransactionAmount' => $args['entity']['TransactionAmount'],
                'TxnType' => $args['entity']['TxnType'],
                'AffiliateUserName' => $args['entity']['AffiliateUserName'],
            ]);
        }else{
            $pandoraApi->setParameters('Affiliate/UpdateAdjustmentMemo', 'POST', [
                'AdjustmentId' => $args['entity']['Id'],
                'TransactionAmount' => $args['entity']['TransactionAmount'],
                'TxnType' => $args['entity']['TxnType'],
                'AffiliateUserName' => $args['entity']['AffiliateUserName'],
            ]);
        }
        return ['apiResult' => json_encode($pandoraApi->executeQuery($info))];
    }
}