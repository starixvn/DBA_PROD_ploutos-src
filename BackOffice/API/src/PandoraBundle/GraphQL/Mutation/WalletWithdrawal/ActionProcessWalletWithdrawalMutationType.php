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
use PandoraBundle\Entity\Comments;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\Resolver\CommentResolver;
use PandoraBundle\Resolver\WalletWithdrawalResolver;
use PandoraBundle\Service\PandoraBackendService;
use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;
use PandoraBundle\GraphQL\Enum\TransactionsTypeEnum;

class ActionProcessWalletWithdrawalMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Action Process Withdrawal';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'Id' => new NonNullType(new IdType()),
            'Remarks' => new StringType(),
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        // GET ENTITY
        $entityResolver = $this->container->get(WalletWithdrawalResolver::class);
        $entityResolver->initAbstractResolver([], []);
        $entityResolver->initEntityResolver();
        $entity = $entityResolver->getWalletWithdrawalById($args['Id']);
        
        $transactionType = new TransactionsTypeEnum();
        $pandoraApi = $this->container->get(PandoraBackendService::class);
        $pandoraApi->setParameters('v1/Wallet/UpdateWithdrawalStatus', 'POST', [
            'WithdrawalId' => $args['Id'],
            'Status' => $transactionType->parseValue('Processing'),
            'WithdrawalBankAccountId' => $entity->getWithdrawalBankAccountId(),
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
        
        return ['apiResult' => json_encode($apiResult)];
    }
}