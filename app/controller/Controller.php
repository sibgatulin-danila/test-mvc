<?php

namespace App\Controller;

use Valitron\Validator;

class Controller
{
    public function validate($arValidationRules, $arRequestData)
    {
        $obValidator = new Validator($arRequestData);
        $obValidator->mapFieldsRules($arValidationRules);
        if ($obValidator->validate()) {
            return [
                'success' => true,
            ];
        }
        return [
            'success' => false,
            'message' => 'invalid data',
        ];
    }

    public function getRequestData()
    {
        $arData = [];

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $arData = &$_GET;
                break;
            case 'POST':
                $arPostData = file_get_contents('php://input');
                $arData = json_decode($arPostData, true);;
                break;
        }

        return $arData;
    }
}