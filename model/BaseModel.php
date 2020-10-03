<?php

namespace Models;

class BaseModel
{
    protected $table = '';

    public function __construct($arData = [])
    {
        foreach ($arData as $sName => $value) {
            $this->{$sName} = $value;
        }
    }
}