<?php
namespace PandoraBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Youshido\GraphQL\Execution\ResolveInfo;
use Exception;
use GuzzleHttp\Client;

class PandoraBackendService
{

    private $headers = [];

    private $body = [];

    private $container;

    private $endpoint;

    private $token;

    private $method = 'POST';

    private $url = '';

    private $formatReturn = true;
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->endpoint = $this->container->getParameter('pandora_api_endpoint') . '/api/';
        $this->token = $this->container->getParameter('pandora_api_token');
    }

    public function setParameters(string $url, string $method, array $body, array $header = [], bool $formatReturn = true)
    {
        // GET CURRENT LOGGED-IN USER
        $usr = $this->container->get('security.token_storage')
            ->getToken()
            ->getUser();
        $this->formatReturn = $formatReturn;
        $defaultHeaders = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'X-API-KEY' => $this->token,
            'X-CREATEDBYID' => $usr->getAspNetUserId()
        ];
        
        $this->url = $url;
        $this->method = $method;
        $this->headers = array_merge($defaultHeaders, $header);
        $this->body = $body;
        return $this;
    }

    public function executeQuery(ResolveInfo $info = null)
    {
        // set_time_limit(300);
        $apiResult = $this->consumeServerApi();
        if (isset($apiResult->Status) && !$apiResult->Status && $this->formatReturn && !is_null($info)) {
            // FORMAT RETURN INTO DIGESTABLE ARRAY FOR UI
            if(isset($apiResult->Messages->Errors) && count($apiResult->Messages->Errors) > 0){
                foreach ($apiResult->Messages->Errors as $value){
                    $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => $value->Code, 'message' => $value->Description]])));
                }
            }else{
                $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'AppLevel', 'message' => 'Unable to process you request. Please contact Administrator.']])));
            }
        }
        return $apiResult;
    }
    
    private function consumeServerApi()
    {
        $apiReturn = new \stdClass();
        $apiReturn->Status = false;
        $apiReturn->Data = [];
        $apiReturn->Messages = [];
        $apiReturn->hasInfo = false;
        $apiReturn->hasError = false;
        $apiReturn->hasWarning = false;
        
        $apiReturn->ModelState = '';
        $apiReturn->Message = '';
        $apiReturn->ExceptionMessage = '';
        $apiReturn->ExceptionType = '';
        $apiReturn->StackTrace = '';
        
        try {
            $response = new \stdClass();
            $response->body = [];
            
            $client = new Client([
                'base_uri' => $this->endpoint,
                'timeout' => 120.0,
                'headers' => $this->headers
            ]);
            try {
                switch ($this->method) {
                    case 'POST':
                        $gitter = $client->request('POST', $this->url, [
                            'headers' => $this->headers,
                            'body' => json_encode($this->body)
                        ]);
                        $response->body = json_decode($gitter->getBody()->getContents());
                        break;
                    case 'GET':
                        $gitter = $client->request('GET', $this->url, [
                            'headers' => $this->headers,
                            'body' => json_encode($this->body)
                        ]);
                        $response->body = json_decode($gitter->getBody()->getContents());
                        break;
                    default:
                        break;
                }
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                $errResponse = $e->getResponse();
                $response->body = json_decode($errResponse->getBody()->getContents());
            }
            
            // IF NOT IN SWITCH CASE RETURN DEFAULT VALUES
            if (!$response->body) {
                return $apiReturn;
            }
            
            if ($this->formatReturn) {
                if (isset($response->body->Status)) {
                    $apiReturn->Status = ($response->body->Status == 'SUCCESS') ? true : false;
                }
                if (isset($response->body->Data)) {
                    $apiReturn->Data = $response->body->Data;
                }
                if (isset($response->body->Messages)) {
                    $apiReturn->Messages = $response->body->Messages;
                }
                if (isset($response->body->hasInfo)) {
                    $apiReturn->hasInfo = $response->body->hasInfo;
                }
                if (isset($response->body->hasError)) {
                    $apiReturn->hasError = $response->body->hasError;
                }
                if (isset($response->body->hasWarning)) {
                    $apiReturn->hasWarning = $response->body->hasWarning;
                }
                if (isset($response->body->ModelState)) {
                    $apiReturn->ModelState = $response->body->ModelState;
                }
                if (isset($response->body->Message)) {
                    $apiReturn->Message = $response->body->Message;
                }
                if (isset($response->body->ExceptionMessage)) {
                    $apiReturn->ExceptionMessage = $response->body->ExceptionMessage;
                }
                if (isset($response->body->ExceptionType)) {
                    $apiReturn->ExceptionType = $response->body->ExceptionType;
                }
                if (isset($response->body->StackTrace)) {
                    $apiReturn->StackTrace = $response->body->StackTrace;
                }
            } else {
                return $response->body;
            }
            
            return $apiReturn;
        } catch (Exception $error) {
            $apiReturn->ExceptionMessage = (string) $error;
            return $apiReturn;
        }
    }
}