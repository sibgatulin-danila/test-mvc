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
                $arPostData = file_get_contents('php://input');
                $arData = json_decode($arPostData, true);;
                break;
        }

        return $arData;
    }
}