<?php

namespace App\Helper;

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
        include "view/parts/error/404.php";
    }
}