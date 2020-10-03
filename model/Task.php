<?php

namespace Models;

use Helpers\DB;

class Task extends BaseModel
{
    protected $table = 'task';

    public $email = '';
    public $username = '';
    public $description = '';

    public function loadData()
    {
        $obDb = DB::init();
        return $obDb->executeQuery("SELECT * FROM `{$this->table}`");
    }
}