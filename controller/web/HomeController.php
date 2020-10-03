<?php

use Controllers\Web\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $this->render('home.index');
    }
}