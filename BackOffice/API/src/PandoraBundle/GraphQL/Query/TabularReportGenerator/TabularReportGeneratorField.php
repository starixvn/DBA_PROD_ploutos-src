<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace PandoraBundle\GraphQL\Query\TabularReportGenerator;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use PandoraBundle\GraphQL\Config\ColumnTypes\SerializedType;
use PandoraBundle\GraphQL\Enum\FilterExpressionsType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use PandoraBundle\GraphQL\Type\TabularReportGenerator\TabularReportGeneratorType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;

class TabularReportGeneratorField extends AbstractContainerAwareField
{
    public function getDescription(){
        return 'Tabular Report Generator View';
    }

    public function build(FieldConfig $config)
    {
        $this->addArguments([
            'config' => new NonNullType(new SerializedType())
        ]);
    }
    
    public function getType()
    {
        return new ListType(new TabularReportGeneratorType());
    }
    
    public function resolve($value, array $args, ResolveInfo $info)
    {
        // TODO: STUDY ONLY - resolveList then resolveObject of Processor
        try{
            $argumentFormat = [
                'export' => (bool) $args['config']['export'],
                'count' => true,
                'paging' => [
                    'offset' => (int) $args['config']['offset'],
                    'limit' => (int) $args['config']['limit']
                ],
                'filter' => $this->getFilterAndPrepare($args['config']['tabularColumns']),
                'sort' => $args['config']['orderColumns'],
                'group' => array_column($args['config']['groupByColumns'], 'field'),
                'sum' => $this->getAllGrandTotalColumns($args['config']['tabularColumns'])
            ];
            $entityResolver = $this->container->get('PandoraBundle\\Resolver\\'.$args['config']['candidateModule'].'Resolver');
            $entityResolver->initAbstractResolver($argumentFormat, $this->getAllDisplayColumns($args['config']['tabularColumns']));
            $entityResolver->initEntityResolver();
            $entityResolver->prepareQueryBuilder();
            
            return [
                ['TabularData' => $entityResolver->getQueryBuilderTabularResult()]
            ];
        }catch(\Exception $e){
            return [
                ['TabularData' => []]
            ];
        }

    }
    
    private function getFilterAndPrepare($fields = []){
        $filterFields = [];
        $filterEnum = new FilterExpressionsType();
        foreach ($fields as $value){
            if($value['expression'] !== ''){
                $filterFields[$value['field']] = [
                    'expression' => $filterEnum->parseValue($value['expression']),
                    'parameter' =>  $this->getParameterFormat($value['parameter'], $value['fieldType'], $value['expression']),
                    'parameter_one' => $this->getParameterFormat($value['parameter_one'], $value['fieldType'], $value['expression']),
                ];
            }
        }
        return $filterFields;
    }
    
    private function getParameterFormat($parameter, $fieldType = '', $expression= ''){
        if($fieldType == 'ID' || substr_compare($fieldType, 'TypeEnum', -strlen('TypeEnum')) === 0){
            if($expression == 'EQUALS'){
                return (is_array($parameter) && count($parameter) > 0) ? $parameter['value'] : '';
            }else{
                return (is_array($parameter)) ? array_column($parameter, 'value') : '';
            }
        }
        if($fieldType == 'DateTime'){
            $dateParser = new DateTimeType();
            return $dateParser->parseInputValue($parameter);
        }
        return $parameter;
    }
    
    private function getAllDisplayColumns($fields = []){
        $colFields = [];
        foreach ($fields as $value){
            if($value['display']){
                $colFields[] = $value['field'];
            }
        }
        return $colFields;
    }
    
    private function getAllGrandTotalColumns($fields = []){
        $sumFields = [];
        foreach ($fields as $value){
            if($value['grandTotal'] && $value['display']){
                $sumFields[] = $value['field'];
            }
        }
        return $sumFields;
    }
}