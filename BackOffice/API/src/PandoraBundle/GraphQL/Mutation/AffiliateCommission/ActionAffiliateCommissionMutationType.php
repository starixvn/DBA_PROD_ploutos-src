<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Mutation\AffiliateCommission;

//USE FOR API 
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use PandoraBundle\GraphQL\Config\ApiTypes\ApiResponseType;
use PandoraBundle\GraphQL\Config\ColumnTypes\DecimalType;
use PandoraBundle\GraphQL\Enum\AffiliateCommissionStatusTypeEnum;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use PandoraBundle\Resolver\AffiliateCommisionResolver;

class ActionAffiliateCommissionMutationType extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Affiliate Commission Edit';
    }

    public function build(FieldConfig $config)
    {
        //USE FOR API 
        $this->addArguments([       
            'Id' =>  new NonNullType(new IdType()),           
            'CommissionDate' =>  new NonNullType(new DateTimeType()),      
            'PeriodStart' =>  new NonNullType(new DateTimeType()),      
            'PeriodEnd' =>  new NonNullType(new DateTimeType()),        
            'TotalSignUps' =>  new NonNullType(new IntType()),                
            'NumberOfClicks' =>  new NonNullType(new IntType()),               
            'CompanyWin' =>  new NonNullType(new DecimalType()),              
            'Bonuses' =>  new NonNullType(new DecimalType()),              
            'Rebates' =>  new NonNullType(new DecimalType()),             
            'NetWinLoss' =>  new NonNullType(new DecimalType()),             
            'Income' =>  new NonNullType(new DecimalType()),            
            'RunningIncome' =>  new NonNullType(new DecimalType()),         
            'PrevEarning' =>  new NonNullType(new DecimalType()),        
            'TotalEarning' =>  new NonNullType(new DecimalType()),            
            'AffiliateCode' =>  new NonNullType(new StringType()),
            'AssignedTo' => new NonNullType(new StringType()),              
            'BrandCode' =>  new NonNullType(new StringType()),      
            'Status' =>  new NonNullType(new AffiliateCommissionStatusTypeEnum())
        ]);       
    }
    
    public function getType()
    {
        //USE FOR API 
        return new ApiResponseType();
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        //USE FOR API 
        if(str_replace(' ', '', $args['CommissionDate']) == ''){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'CommissionDate', 'message' => 'CommissionDate Type is required.']])));
        }
        if(str_replace(' ', '', $args['PeriodStart']) == ''){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'PeriodStart', 'message' => 'PeriodStart is required.']])));
        }
        if(str_replace(' ', '', $args['PeriodEnd']) == ''){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'PeriodEnd', 'message' => 'PeriodEnd is required.']])));
        }
        if(str_replace(' ', '', $args['AffiliateCode']) == ''){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'AffiliateCode', 'message' => 'AffiliateCode is required.']])));
        }
        if(str_replace(' ', '', $args['BrandCode']) == ''){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'BrandCode', 'message' => 'BrandCode is required.']])));
        }
        if(str_replace(' ', '', $args['Status']) == ''){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'Status', 'message' => 'Status is required.']])));
        }
        if(str_replace(' ', '', $args['AssignedTo']) == ''){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'AssignedTo', 'message' => 'AssignedTo is required.']])));
        }

        try{
            $entityResolveAffiliateCommission = $this->container->get(AffiliateCommisionResolver::class);
            $entityShellAffiliateCommission = $entityResolveAffiliateCommission->getEntity($args['Id']);
                        
            $tokenStorage = $this->container->get('security.token_storage')->getToken();
            if(!$tokenStorage){
                $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'AppLevel', 'message' => 'Unable to process you request. Please contact Administrator.']])));
            }
            
            // DEFAULT VALUESr
            $entityRest = [
                'Id' =>  $entityShellAffiliateCommission->getId(),           
                'CommissionDate' =>  $entityShellAffiliateCommission->getCommissionDate(),      
                'PeriodStart' =>  $entityShellAffiliateCommission->getPeriodStart(),      
                'PeriodEnd' =>  $entityShellAffiliateCommission->getPeriodEnd(),        
                'TotalSignUps' =>  $entityShellAffiliateCommission->getTotalSignUps(),                
                'NumberOfClicks' =>  $entityShellAffiliateCommission->getNumberOfClicks(),             
                'CompanyWin' =>  $entityShellAffiliateCommission->getCompanyWin(),          
                'Bonuses' =>  $entityShellAffiliateCommission->getBonuses(),
                'Rebates' =>  $entityShellAffiliateCommission->getRebates(),
                'NetWinLoss' => $entityShellAffiliateCommission->getNetWinLoss(),
                'Income' =>  $entityShellAffiliateCommission->getIncome(),
                'RunningIncome' =>  $entityShellAffiliateCommission->getRunningIncome(),
                'PrevEarning' =>  $entityShellAffiliateCommission->getPrevEarning(),
                'TotalEarning' =>  $entityShellAffiliateCommission->getTotalEarning(),
                'AffiliateCode' =>  $entityShellAffiliateCommission->getAffiliateCode(),
                'AssignedTo' => $entityShellAffiliateCommission->getAssignedTo(),            
                'BrandCode' =>  $entityShellAffiliateCommission->getBrandCode(),
                'Status' =>  $entityShellAffiliateCommission->getStatus()
            ];
                      
            // OVERRIDE WITH NEW ONES
            if(!empty($args['CommissionDate'])){
                $entityRest['CommissionDate'] = $args['CommissionDate'];
            }
            if(!empty($args['PeriodStart'])){
                $entityRest['PeriodStart'] = $args['PeriodStart'];
            }
            if(!empty($args['PeriodEnd'])){
                $entityRest['PeriodEnd'] = $args['PeriodEnd'];
            }
            if(!empty($args['TotalSignUps'])){
                $entityRest['TotalSignUps'] = $args['TotalSignUps'];
            }    
            if(!empty($args['NumberOfClicks'])){
                $entityRest['NumberOfClicks'] = $args['NumberOfClicks'];
            }      
            if(!empty($args['CompanyWin'])){
                $entityRest['CompanyWin'] = $args['CompanyWin'];
            }     
            if(!empty($args['Bonuses'])){
                $entityRest['Bonuses'] = $args['Bonuses'];
            }     
            if(!empty($args['Rebates'])){
                $entityRest['Rebates'] = $args['Rebates'];
            }     
            if(!empty($args['NetWinLoss'])){
                $entityRest['NetWinLoss'] = $args['NetWinLoss'];
            }     
            if(!empty($args['Income'])){
                $entityRest['Income'] = $args['Income'];
            }     
            if(!empty($args['RunningIncome'])){
                $entityRest['RunningIncome'] = $args['RunningIncome'];
            }     
            if(!empty($args['PrevEarning'])){
                $entityRest['PrevEarning'] = $args['PrevEarning'];
            }     
            if(!empty($args['TotalEarning'])){
                $entityRest['TotalEarning'] = $args['TotalEarning'];
            }     
            if(!empty($args['AffiliateCode'])){
                $entityRest['AffiliateCode'] = $args['AffiliateCode'];
            }     
            if(!empty($args['AssignedTo'])){
                $entityRest['AssignedTo'] = $args['AssignedTo'];
            }     
            if(!empty($args['BrandCode'])){
                $entityRest['BrandCode'] = $args['BrandCode'];
            }     
            if(!empty($args['Status'])){
                $entityRest['Status'] = $args['Status'];
            }         
            
            $pandoraApi = $this->container->get('PandoraBundle\Service\AffiliateBackendService');
            $pandoraApi->setParameters('', 'POST', $entityRest);
            return ['apiResult' => json_encode($pandoraApi->executeQuery($info))];
        }catch(\Exception $e){
            $info->getExecutionContext()->addError(new \Exception(json_encode([['field' => 'AppLevel', 'message' => 'Unable to process you request. Please contact Administrator.']])));
        }    
    }
}