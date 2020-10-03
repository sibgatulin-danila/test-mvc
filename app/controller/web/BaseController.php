<?php

namespace App\Controller\Web;

use App\Controller\Controller;
use App\Helper\Response;

class BaseController extends Controller
{
    public function render($sPage, $arViewData = [])
    {
        $sFilePath = "view/{$sPage}.php";
        include "view/layout/header.php";
        if (file_exists($sFilePath)) {
            include_once $sFilePath;
        } else {
            Response::error404();
        }
        include "view/layout/footer.php";
    }
}