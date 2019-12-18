<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\CMSManagement;

use GuzzleHttp\Client;
use PandoraBundle\GraphQL\Type\CMSManagement\CMSManagementType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\Scalar\StringType;

class CMSManagementMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'CMS Management';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'index' => [
                'type' => new StringType()
            ],
        ]);
    }
    
    public function getType()
    {
        return new CMSManagementType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $cmsEndpoints = $this->container->getParameter('cms_management')[$args['index']];
        $cookie = new \GuzzleHttp\Cookie\CookieJar;
        $client = new Client([
            'base_uri' => $cmsEndpoints['endpoint'],
            'timeout' => 10.0,
            'cookies' => $cookie
        ]);
        $responseBody = $client->request('POST', '/user/login?_format=json', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'body' => json_encode(['name' => $cmsEndpoints['username'], 'pass' => $cmsEndpoints['password']])
        ]);
        
        return [
            'authDetail' => [
                'cookie' => json_encode($client->getConfig('cookies')->toArray()[0]),
                'info' => $responseBody->getBody()->getContents(),
                'domain' => $cmsEndpoints['subdomain']
            ],
        ];
        
        // DEFAULT ERROR
        throw new \Exception('Unable to process you request. Please contact Administrator.');
    }
}