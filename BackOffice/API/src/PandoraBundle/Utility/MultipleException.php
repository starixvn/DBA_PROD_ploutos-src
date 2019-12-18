<?php
namespace PandoraBundle\Utility;

class MultipleException
{
    public static function entityError($errors){
        if (count($errors) > 0) {
            $messages = [];
            foreach ($errors as $violation) {
                $messages[] = [
                    'field' => $violation->getPropertyPath(),
                    'message' => $violation->getMessage()
                ];
            }
            return json_encode($messages);
        }
        return false;
    }
}