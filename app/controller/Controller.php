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
}