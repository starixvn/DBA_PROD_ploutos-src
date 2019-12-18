<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\WalletWithdrawal;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Exception;
use PandoraBundle\Entity\Comments;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;
use PandoraBundle\GraphQL\Enum\TransactionsTypeEnum;
use PandoraBundle\Resolver\CommentResolver;
use PandoraBundle\Resolver\TransactionGrabsResolver;
use PandoraBundle\Service\PandoraBackendService;
// use Unirest\Exception;

class ActionForFraudWalletWithdrawalMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Action For Fraud Withdrawal';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType()),
            'TransactionGrabId' => new NonNullType(new IdType()),
            'Remarks' => new StringType(),
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $transactionType = new TransactionsTypeEnum();
        $pandoraApi = $this->container->get(PandoraBackendService::class);
        $pandoraApi->setParameters('v1/Wallet/UpdateWithdrawalStatus', 'POST', [
            'WithdrawalId' => $args['Id'],
            'Status' => $transactionType->parseValue('Fraud_Processing'),
            'Remarks' => $args['Remarks']
        ]);
        $apiResult = $pandoraApi->executeQuery($info);
        
        // CREATE COMMENT
        if($apiResult->Status){
            if(isset($args['Remarks']) && str_replace(' ', '', $args['Remarks']) != ''){
                $currentUser = $this->container->get('security.token_storage')->getToken()->getUser();
                $systemModule = new SystemModulesIntTypeEnum();
                $commentArgs = [
                    'Id' => 0,
                    'SourceObject' => $systemModule->parseValue('Walletwithdrawals'),
                    'SourceObjectId' => $args['Id'],
                    'CommentedBy' => $currentUser->getUsername(),
                    'Note' => $args['Remarks'],
                ];
                
                $commentEntityResolver = $this->container->get(CommentResolver::class);
                $commentEntityResolver->initAbstractResolver(['entity' => $commentArgs], []);
                $commentEntityResolver->prepareEntity(Comments::class);
                $commentEntityResolver->validateEntity();
                $commentEntityResolver->mergeEntity();
            }
        }
        
        // REMOVED CURRENTLY OWNER OF THE TASK
        try{
            if($apiResult->Status && !empty($args['TransactionGrabId'])){
                $entityResolver = $this->container->get(TransactionGrabsResolver::class);
                $entityResolver->deleteTransactionGrabEntity($args['TransactionGrabId']);
            }
        }catch(Exception $error){
        }
        
        return ['apiResult' => json_encode($apiResult)];
    }
}