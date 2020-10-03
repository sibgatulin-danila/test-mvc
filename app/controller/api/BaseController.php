<?php

namespace App\Controller\Api;

use App\Controller\Controller;

class BaseController extends Controller
{
    public function getRequestData()
    {
        $arData = [];

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $arData = &$_GET;
                break;
            case 'POST':
                $arData = &$_POST;
                break;
        }

        return $arData;
    }
}