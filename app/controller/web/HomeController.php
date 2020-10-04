<?php

use App\Controller\Web\BaseController;
use App\Model\Task;
use App\Helper\Response;

class HomeController extends BaseController
{
    public function index()
    {
        $arResult = $this->validate([
            'page' => [
                'optional',
                'numeric'
            ],
        ], $_GET);

        if (!$arResult['success']) {
            Response::error404();
            return;
        }

        $obTask = new Task;
        $arTasks = $obTask->loadData();

        $arResult = [
            'tasks' => $arTasks,
            'is_admin' => false,

            'is_paginate' => true,
        ];
        $this->render('home.index', $arResult);
    }
}