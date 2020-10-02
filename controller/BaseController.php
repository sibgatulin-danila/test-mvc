<?php

namespace Controllers;

use Helpers\Response;

class BaseController
{
    public function render($sPage, $arData = [])
    {
        $sFilePath = "view/{$sPage}.php";
        include "view/layout/header.php";
        if (file_exists($sFilePath)) {
            include_once $sFilePath;
        } else {
            Response::error404();
        }
    }
}