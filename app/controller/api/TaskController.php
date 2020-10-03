<?php

use App\Controller\Api\BaseController;

class TaskController extends BaseController
{
    public function create()
    {
        $arRequestData = $this->getRequestData();

        $arValidate = $this->validate([
            'email' => ['required', 'email'],
            'username' => ['required'],
            'description' => ['required'],
        ], $arRequestData);
    }
}