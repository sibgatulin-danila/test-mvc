<?php

require_once "vendor/autoload.php";
require_once 'Route.php';

includeFilesFromFolder('controller/web/');
includeFilesFromFolder('controller/api/');
includeFilesFromFolder('helpers/');
includeFilesFromFolder('model/');

function includeFilesFromFolder($sFolder)
{
    foreach (glob("{$sFolder}*") as $filename)
    {
        include_once $filename;
    }
}