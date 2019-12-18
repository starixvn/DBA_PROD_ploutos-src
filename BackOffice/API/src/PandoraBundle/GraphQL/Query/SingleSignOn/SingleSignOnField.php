<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\SingleSignOn;

use GuzzleHttp\Client;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\ListType\ListType;
use PandoraBundle\GraphQL\Type\SingleSignOn\SingleSignOnType;

class SingleSignOnField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Single Sign On';
    }

    public function build(FieldConfig $config){}
    
    public function getType()
    {
        return new ListType(new SingleSignOnType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $tokenGeneratorEndpoint = $this->container->getParameter('single_sign_on_token_generator');
        $tokenGeneratorResponseType = $this->container->getParameter('single_sign_on_response_type');
        $tokenGeneratorClientSecret = $this->container->getParameter('single_sign_on_client_secret');
        $tokenGeneratorClientId = $this->container->getParameter('single_sign_on_client_id');
        $athenPortalEndpoint = $this->container->getParameter('pagcor_athena_portal');
        
        $client = new Client([
            'base_uri' => $tokenGeneratorEndpoint,
            'timeout' => 120.0,
        ]);
        
        $gitter = $client->request('POST', '/pagcor-auth/v1/sso-authorize?response_type='.$tokenGeneratorResponseType.'&client_id='.$tokenGeneratorClientId.'&client_secret='.$tokenGeneratorClientSecret, [
            'headers' => [
                'X-SSO-User' => $this->container->get('security.token_storage')->getToken()->getUser()->getUsername()
            ]
        ]);
        $tokenApiResult = json_decode($gitter->getBody()->getContents());
        return [
            [
                'item' => [
                    'tokenInfo' => $tokenApiResult,
                    'portalEndPointReceiver' => $athenPortalEndpoint,
                    'redirectTo' => $athenPortalEndpoint.'/account/external-login?token='.$tokenApiResult->access_token
                ]
            ],
            
        ];
    }
    
}