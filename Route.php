<?php

use Helpers\Response;

class Route
{
    public static function init()
    {
        $sControllerName = 'Home';
        $sActionName     = 'index';

        $arRequestUri = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($arRequestUri[1])) {
            $sControllerName = $arRequestUri[1];
        }

        if (!empty($arRequestUri[2])) {
            $sActionName = $arRequestUri[2];
        }
        $sControllerName = ucfirst($sControllerName) . 'Controller';
        $sControllerFilePath = 'controller/' . $sControllerName . '.php';

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