<?php

namespace Models;

use App\Helper\DB;

class Task extends BaseModel
{
    private $STATUS_PROGRESS = 'progress';
    private $STATUS_DONE = 'done';

    protected $table = 'task';

    public $id = '';
    public $email = '';
    public $username = '';
    public $description = '';
    public $status_id = '';

    public function loadData()
    {
        $obDb = DB::init();
        return $obDb->executeQuery(
            "SELECT `id`, `email`, `username`, `description`, `status_id` FROM `{$this->table}`"
        );
    }
}