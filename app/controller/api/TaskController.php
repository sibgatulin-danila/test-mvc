<?php

use App\Controller\Api\BaseController;

use App\Helper\Response;

use App\Model\Task;

class TaskController extends BaseController
{
    public function index()
    {
        $arRequestData = $this->getRequestData();
        $arValidate = $this->validate([
            'page' => ['optional', 'numeric'],
        ], $arRequestData);

        if (!$arValidate['success']) {
            return Response::error(400, 'Переданы неправильные данные');
        }

        $nPage = isset($arRequestData['page'])
            ? $arRequestData['page']
            : 1;

        $obTask = new Task;
        $arTasks = $obTask->loadData(intval($nPage));
        $nTaskCount = $obTask->count();
        return Response::success([
            'items' => $arTasks,
            'current_page' => $nPage,
            'page_count' => ceil($nTaskCount / 3),
        ]);
    }

    public function create()
    {
        $arRequestData = $this->getRequestData();
        $arValidate = $this->validate([
            'email' => ['required', 'email'],
            'username' => ['required'],
            'description' => ['required'],
        ], $arRequestData);

        if (!$arValidate['success']) {
            return Response::error(400, 'Переданы неправильные данные');
        }

        $obTask = new Task([
            'email' => $arRequestData['email'],
            'username' => $arRequestData['username'],
            'description' => $arRequestData['description']
        ]);
        $obTask->save();

        $nTaskCount = $obTask->count();

        return Response::success([
            'item' => $obTask,
            'page_count' => ceil($nTaskCount / 3),
        ]);
    }
}