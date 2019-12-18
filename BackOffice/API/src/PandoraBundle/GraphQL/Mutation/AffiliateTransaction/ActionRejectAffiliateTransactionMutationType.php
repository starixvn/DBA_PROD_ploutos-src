<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\AffiliateTransaction;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use PandoraBundle\Entity\Comments;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\GraphQL\Enum\AffiliateTransactionStatusTypeEnum;
use PandoraBundle\GraphQL\Enum\AffiliateTransactionTypeEnum;
use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;
use PandoraBundle\Resolver\AffiliateTransactionResolver;
use PandoraBundle\Resolver\CommentResolver;
use PandoraBundle\Service\AffiliateBackendService;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class ActionRejectAffiliateTransactionMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Affiliate Transaction Approve Withdrawal';
    }
    
    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' =>  new NonNullType(new IdType()),
            'Note' => new StringType()
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        // GET ENTITY
        $entityResolver = $this->container->get(AffiliateTransactionResolver::class);
        $entityResolver->initAbstractResolver([], []);
        $entityResolver->initEntityResolver();
        $entityResolver->prepareQueryBuilder();
        $entity = $entityResolver->getAffiliateById($args['Id']);
        
        // ------ START VALIDATION
        $transactiontype = new AffiliateTransactionTypeEnum();
        if($entity[0]['TxnType'] == $transactiontype->parseValue('Fund_Transfer')){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'TxnType', 'message' => 'You cannot Reject Fund Transfer Transaction.']])));
        }
        $transactionStatustype = new AffiliateTransactionStatusTypeEnum();
        if($entity[0]['Status'] != $transactionStatustype->parseValue('Pending')){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'Status', 'message' => 'Transaction is already Closed.']])));
        }
        // ------ END VALIDATION
        
        $pandoraApi = $this->container->get(AffiliateBackendService::class);
        if($entity[0]['TxnType'] == $transactiontype->parseValue('Withdrawal')){
            $pandoraApi->setParameters('Affiliate/UpdateWithdrawStatus', 'POST', [
                'WithdrawId' => $args['Id'],
                'ApprovedAmount' => $entity[0]['TransactionAmount'],
                'Status' => $transactionStatustype->parseValue('Reject'),
            ]);
        }else{
            $pandoraApi->setParameters('Affiliate/UpdateAdjustmentMemoStatus', 'POST', [
                'AdjustmentId' => $args['Id'],
                'ApprovedAmount' => $entity[0]['TransactionAmount'],
                'Status' => $transactionStatustype->parseValue('Reject'),
            ]);
        }
        $apiResult = $pandoraApi->executeQuery($info);
        
        // CREATE COMMENT
        if($apiResult->Status){
            if(isset($args['Note']) && str_replace(' ', '', $args['Note']) != ''){
                $currentUser = $this->container->get('security.token_storage')->getToken()->getUser();
                $systemModule = new SystemModulesIntTypeEnum();
                $commentArgs = [
                    'Id' => 0,
                    'SourceObject' => $systemModule->parseValue('Affiliatetransactions'),
                    'SourceObjectId' => $args['Id'],
                    'CommentedBy' => $currentUser->getUsername(),
                    'Note' => $args['Note'],
                ];
                
                $commentEntityResolver = $this->container->get(CommentResolver::class);
                $commentEntityResolver->initAbstractResolver(['entity' => $commentArgs], []);
                $commentEntityResolver->prepareEntity(Comments::class);
                $commentEntityResolver->validateEntity();
                $commentEntityResolver->mergeEntity();
            }
        }
        
        return ['apiResult' => json_encode($apiResult)];
    }
}