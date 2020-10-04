<?php

use App\Controller\Api\BaseController;

use App\Helper\Response;

use App\Model\Task;

class TaskController extends BaseController
{
    public function create()
    {
        $arRequestData = $this->getRequestData();
        var_dump($arRequestData);
        $arValidate = $this->validate([
            'email' => ['required', 'email'],
            'username' => ['required'],
            'description' => ['required'],
        ], $arRequestData);

        if ($arValidate['success']) {
            $obTask = new Task([
                'email' => $arRequestData['email'],
                'username' => $arRequestData['username'],
                'description' => $arRequestData['description']
            ]);
            $obTask->save();
            Response::success([
                'item' => $obTask,
            ]);
            return;
        }
    }
}