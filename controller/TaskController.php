<?php

use Controllers\BaseController;
use Models\Task;

class TaskController extends BaseController
{
    public function index()
    {
        $obTask = new Task;
        $arTasks = $obTask->loadData();

        $arResult = [
            'tasks' => $arTasks,
        ];
        $this->render('task.index', $arResult);
    }
}