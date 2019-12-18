<?php

namespace PandoraBundle\Utility;

class GraphQLFieldsToArray{
    public static function objFieldsToArr($objectFields = []){
        $fieldItems = [];
        foreach ($objectFields as $key => $value){
            $nameObject = $value['type']->getName();
            if(!is_null($nameObject)){
                $item = [
                    // 'fieldName' => ($nameObject == 'ID' && $key !== 'Id') ? substr($key, 0, -2) : $key,
                    'fieldName' => $key,
                    'type' => $nameObject,
                    'enumValues' => (method_exists($value['type'], 'getValues')) ? $value['type']->getValues() : []
                ];
                if($item['type'] == 'ID'){
                    $item['searchConfig'] = (isset($value['searchConfig'])) ? $value['searchConfig'] : [];
                }
                $fieldItems[] = $item;
            }
        }
        return $fieldItems;
    }
}