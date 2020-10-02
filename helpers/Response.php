<?php

namespace Helpers;
use \Controllers\BaseController;

class Response
{
    public static function success($arData = [])
    {

    }

    public static function error404()
    {
        $sHost = "http://{$_SERVER['HTTP_HOST']}/";
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        include "view/layout/header.php";
        include "view/error/404.php";
    }
}