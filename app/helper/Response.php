<?php

namespace App\Helper;

class Response
{
    public static function success($arData = [])
    {
        $arResponseData = array_merge($arData, ['success' => true]);
        header("HTTP/1.1 200 OK");
        echo json_encode($arResponseData);
    }

    public static function error404()
    {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        include "view/parts/error/404.php";
    }

    public function error($nCode = 400, $sMessage = '')
    {
        header("HTTP/1.1 {$nCode} Not Found");
        header("Status: {$nCode} {$sMessage}");
        include "view/parts/error/{$nCode}.php";
    }
}