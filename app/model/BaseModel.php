<?php

namespace App\Model;

use App\Helper\DB;

class BaseModel
{
    protected $table = '';

    public function __construct ($arData = [])
    {
        foreach ($arData as $sName => $value) {
            $this->{$sName} = $value;
        }
    }

    public function save () {
        $obDb = DB::init();

        $sAction = 'create';
        if ($this->id) {
            $sAction = 'update';
        }
        $sQuery = $this->generateQuery($sAction);
        $obDb->executeQuery($sQuery);

        if ($sAction == 'create') {
            $rs = $obDb->executeQuery("SELECT MAX(id) as id FROM `{$this->table}`");
            $this->id = $rs->fetch_assoc()['id'];
        }
    }

    private function generateQuery($sAction)
    {
        $sQuery = '';
        switch ($sAction)
        {
            case 'create':
                $sQuery .= "INSERT INTO {$this->table} (";
                $arFieldsToInsert = [];
                $arValueToInsert = [];
                foreach ($this as $key => $value) {
                    if ($key == 'id' || $key == 'table') continue;
                    if (!empty($value)) {
                        $arFieldsToInsert[] = "{$key}";
                        $sReplacedString = str_replace("'", "''", $value);
                        $arValueToInsert[] = "'{$sReplacedString}'";
                    }
                }
                $sQuery .= implode(', ', $arFieldsToInsert) . ') ';
                $sQuery .= "VALUES (" . implode(', ', $arValueToInsert) . ");";
                break;
            case 'update':
                $sQuery = "UPDATE {$this->table} SET ";
                $nId = '';
                $arUpdatedValues = [];
                foreach ($this as $key => $value) {
                    if ($key == 'id' || $key == 'table') {
                        $nId = $value;
                        continue;
                    }
                    if (!empty($value)) {
                        $arUpdatedValues[] = "{$key} = '{$value}'";
                    }
                }

                $sQuery .= implode(', ', $arUpdatedValues);
                $sQuery .= " WHERE id = {$nId}";
                break;
            default:
        }

        return $sQuery;
    }

    public function count()
    {
        $obDb = DB::init();
        $rs = $obDb->executeQuery("SELECT COUNT(id) as count FROM {$this->table}");
        $nCount = 0;
        while($row = $rs->fetch_assoc()) {
            $nCount = $row['count'];
        }
        return $nCount;
    }
}