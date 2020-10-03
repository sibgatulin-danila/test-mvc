<?php

namespace App\Helper;

class Route
{
    public static function init()
    {
        $sControllerName = 'Home';
        $sActionName     = 'index';

        $arRequestUri = explode('/', parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));

        $bApiCall = isset($arRequestUri[1]) && $arRequestUri[1] == 'api';

        if (!empty($arRequestUri[1]) && !$bApiCall) {
            $sControllerName = $arRequestUri[1];

            if (!empty($arRequestUri[2])) {
                $sActionName = $arRequestUri[2];
            }
        } elseif(!empty($arRequestUri[2]) && $bApiCall) {
            $sControllerName = $arRequestUri[2];
            if (!empty($arRequestUri[3])) {
                $sActionName = $arRequestUri[3];
            }
        }

        $sControllerName = ucfirst($sControllerName) . 'Controller';

        if ($bApiCall) {
            $sControllerFilePath = 'app/controller/api/' . $sControllerName . '.php';
        } else {
            $sControllerFilePath = 'app/controller/web/' . $sControllerName . '.php';
        }

        if (file_exists($sControllerFilePath)) {
            include_once $sControllerFilePath;
            $obController = new $sControllerName;
            if (method_exists($obController, $sActionName)) {
                return $obController->$sActionName();
            } else {
                Response::error404();
            }
        } else {
            Response::error404();
        }
    }
}