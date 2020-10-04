<?php

namespace App\Model;

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

    public function loadData($nPage = 1)
    {
        $obDb = DB::init();
        $nOffset = ($nPage - 1) * 3;
        $rs = $obDb->executeQuery(
            "SELECT `id`, `email`, `username`, `description`, `status_id` "
            . "FROM `{$this->table}` ORDER BY `id` DESC "
            . "LIMIT {$nOffset}, 3"
        );

        $arResult = [];
        while ($row = $rs->fetch_assoc()) {
            $arResult[] = $row;
        }
        return $arResult;
    }
}