<?php

require_once 'Route.php';

includeFilesFromFolder('controller/');
includeFilesFromFolder('helpers/');
includeFilesFromFolder('model/');

function includeFilesFromFolder($sFolder)
{
    foreach (glob("{$sFolder}*") as $filename)
    {
        include_once $filename;
    }
}