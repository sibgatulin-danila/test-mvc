<?php

require_once "vendor/autoload.php";

includeFilesFromFolder('app/controller/');
includeFilesFromFolder('app/controller/web/');
includeFilesFromFolder('app/controller/api/');
includeFilesFromFolder('app/helper/');
includeFilesFromFolder('app/model/');
includeFilesFromFolder('app/middleware/');

function includeFilesFromFolder($sFolder)
{
    foreach (glob("{$sFolder}*.php") as $filename)
    {
        include_once $filename;
    }
}