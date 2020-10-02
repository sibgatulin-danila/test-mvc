<?php

namespace Models;

class BaseModel
{
    public function __construct($arData = [])
    {
        foreach ($arData as $sName => $value) {
            $this->{$sName} = $value;
        }
    }
}