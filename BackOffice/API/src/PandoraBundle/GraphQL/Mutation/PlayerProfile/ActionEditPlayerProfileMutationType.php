<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\PlayerProfile;

use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQLBundle\Security\Manager\SecurityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\Resolver\PlayerProfileResolver;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use PandoraBundle\Resolver\PlayerRegistrationResolver;
use PandoraBundle\Security\GraphQLVoter;

class ActionEditPlayerProfileMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Player Edit Profile';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'UserName' => new NonNullType(new StringType()),
            'FullName' => new NonNullType(new StringType()),
            'FirstName' => new StringType(),
            'LastName' => new StringType(),
            'BirthDate' => new NonNullType(new DateTimeType()),
            'Email' => new NonNullType(new StringType()),
            'MobileNumber' => new NonNullType(new StringType()),
            'WebChatUserName' => new StringType(),
            'QQUserName' => new StringType(),
            'KakaoTalkId' => new StringType(),
            'SkypeId' => new StringType(),
            'WhatsappId' => new StringType(),
            'LineId' => new StringType()
        ]);
    }
    
    public function getType()
    {
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        try{
            $entityResolverProfile = $this->container->get(PlayerProfileResolver::class);
            $entityShellProfile = $entityResolverProfile->getEntity($args['UserName']);

            $entityResolverRegistration = $this->container->get(PlayerRegistrationResolver::class);
            $entityShellRegistration = $entityResolverRegistration->getEntity($args['UserName']);
            
            $tokenStorage = $this->container->get('security.token_storage')->getToken();
            if(!$tokenStorage){
                $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'AppLevel', 'message' => 'Unable to process you request. Please contact Administrator.']])));
            }
            
            // DEFAULT VALUES
            $entityRest = [
                'Id' => $entityShellProfile->getId(),
                'UserName' => $entityShellProfile->getUserName(),
                'FullName' => $entityShellProfile->getFullName(),
                'FirstName' => $entityShellProfile->getFirstName(),
                'LastName' => $entityShellProfile->getLastName(),
                'BirthDate' => $entityShellProfile->getBirthDate()->format('c'),
                'Email' => $entityShellRegistration->getEmail(),
                'MobileNumber' => $entityShellRegistration->getMobileNo(),
                'WebChatUserName' => $entityShellProfile->getWebChatUserName(),
                'QQUserName' => $entityShellProfile->getQQUserName(),
                'KakaoTalkId' => $entityShellProfile->getKakaoTalkId(),
                'SkypeId' => $entityShellProfile->getSkypeId(),
                'WhatsappId' => $entityShellProfile->getWhatsappId(),
                'LineId' => $entityShellProfile->getLineId()
            ];
            
            // OVERRIDE VALUES ONLY WHEN BIZ RULES IS SATISFIED
            if(!empty($args['BirthDate']) ){
                $entityRest['BirthDate'] = $args['BirthDate']->format('c');
            }
            $voter = new GraphQLVoter($entityResolverProfile->default_em);
            if(!empty($args['Email']) && $voter->vote($tokenStorage, 'FieldPlayerEmail', [SecurityManagerInterface::RESOLVE_ROOT_OPERATION_ATTRIBUTE])){
                $entityRest['Email'] = $args['Email'];
            }
            if(!empty($args['MobileNumber']) && $voter->vote($tokenStorage, 'FieldPlayerMobile', [SecurityManagerInterface::RESOLVE_ROOT_OPERATION_ATTRIBUTE])){
                $entityRest['MobileNumber'] = $args['MobileNumber'];
            }
            
            // OVERRIDE WITH NEW ONES
            if(!empty($args['FullName'])){
                $entityRest['FullName'] = $args['FullName'];
            }
            if(!empty($args['FirstName'])){
                $entityRest['FirstName'] = $args['FirstName'];
            }
            if(!empty($args['LastName'])){
                $entityRest['LastName'] = $args['LastName'];
            }
            if(!empty($args['WebChatUserName'])){
                $entityRest['WebChatUserName'] = $args['WebChatUserName'];
            }
            if(!empty($args['QQUserName'])){
                $entityRest['QQUserName'] = $args['QQUserName'];
            }
            if(!empty($args['KakaoTalkId'])){
                $entityRest['KakaoTalkId'] = $args['KakaoTalkId'];
            }
            if(!empty($args['SkypeId'])){
                $entityRest['SkypeId'] = $args['SkypeId'];
            }
            if(!empty($args['WhatsappId'])){
                $entityRest['WhatsappId'] = $args['WhatsappId'];
            }
            if(!empty($args['LineId'])){
                $entityRest['LineId'] = $args['LineId'];
            }
            
            $pandoraApi = $this->container->get('PandoraBundle\Service\PandoraBackendService');
            $pandoraApi->setParameters('Player/UpdatePlayerDetailsFromBackOffice', 'POST', $entityRest);
            return ['apiResult' => json_encode($pandoraApi->executeQuery($info))];
        }catch(\Exception $e){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'AppLevel', 'message' => 'Unable to process you request. Please contact Administrator.']])));
        }
    }
}