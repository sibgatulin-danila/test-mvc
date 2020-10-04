<?php

use App\Controller\Web\BaseController;
use App\Model\Task;
use App\Helper\Response;

class HomeController extends BaseController
{
    public function index()
    {
        $arRequestParams = $this->getRequestData();

        $arValidation = $this->validate([
            'page' => ['optional', 'numeric'],
        ], $arRequestParams);

        if (!$arValidation['success']) {
            Response::error404();
            return;
        }

        $nCurrentPage = isset($arRequestParams['page'])
            ? $arRequestParams['page']
            : 1;

        $arResult = [
            'current_page' => $nCurrentPage,
        ];

        $obTask = new Task;
        $arTasks = $obTask->loadData($nCurrentPage);
        $nTaskCount = $obTask->count();

        $arResult['tasks'] = $arTasks;
        $arResult['is_admin'] = false;
        $arResult['is_paginate'] = true;
        $arResult['page_count'] = ceil($nTaskCount / 3);

        $this->render('home.index', $arResult);
    }
}