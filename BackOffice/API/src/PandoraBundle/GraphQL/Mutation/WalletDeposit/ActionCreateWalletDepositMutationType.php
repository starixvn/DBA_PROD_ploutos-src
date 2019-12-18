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
use Youshido\GraphQL\Type\Scalar\FloatType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\Entity\Comments;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\GraphQL\Enum\SystemModulesIntTypeEnum;
use PandoraBundle\GraphQL\Enum\WalletDepositTypeTypeEnum;
use PandoraBundle\Resolver\CommentResolver;
use PandoraBundle\Service\PandoraBackendService;

class ActionCreateWalletDepositMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Payment Action Create Offline Deposit';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'PaymentMethodId' => new NonNullType(new IdType()),
            'BankAccountId' => new NonNullType(new IdType()),
            'DepositAmount' => new NonNullType(new FloatType()),
            'BonusCode' => new NonNullType(new StringType()),
            'PlayerLoginName' => new NonNullType(new StringType()),
            'DepositType' => new WalletDepositTypeTypeEnum(),
            'Notes' => new StringType()
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $pandoraApi = $this->container->get(PandoraBackendService::class);
        // $depositTypeParser = new WalletDepositTypeTypeEnum();
        $pandoraApi->setParameters('Wallet/DepositFromCS', 'POST', [
            'PaymentMethodId' => $args['PaymentMethodId'],
            'BankAccountId' => (int) $args['BankAccountId'],
            'DepositAmount' => $args['DepositAmount'],
            'BonusCode' => $args['BonusCode'],
            'PlayerLoginName' => $args['PlayerLoginName'],
            // 'DepositType' => $depositTypeParser->parseValue($args['DepositType']),
            'DepositType' => $args['DepositType'],
            'Platform' => 'WEB',
            'DepositPageUsed' => 'MD', // MD means Manual Deposit
            'RollbaseId' => 0,
        ]);
        $apiResult = $pandoraApi->executeQuery($info);
        
        // CREATE COMMENT
        if($apiResult->Status){
            if(isset($args['Notes']) && str_replace(' ', '', $args['Notes']) != ''){
                $currentUser = $this->container->get('security.token_storage')->getToken()->getUser();
                $systemModule = new SystemModulesIntTypeEnum();
                $commentArgs = [
                    'Id' => 0,
                    'SourceObject' => $systemModule->parseValue('Walletdeposits'),
                    'SourceObjectId' => $apiResult->Data->Id,
                    'CommentedBy' => $currentUser->getUsername(),
                    'Note' => $args['Notes'],
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