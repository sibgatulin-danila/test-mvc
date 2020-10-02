<?php

namespace Models;

class Task extends BaseModel
{
    public $email = '';
    public $username = '';
    public $description = '';

    public function loadData()
    {
        return [
            [
                'email' => 'test@mail.ru',
                'username' => 'user1',
                'description' => 'desc1',
            ],
            [
                'email' => 'test1@mail.ru',
                'username' => 'user1',
                'description' => 'desc1',
            ],
            [
                'email' => 'test1@mail.ru',
                'username' => 'user1',
                'description' => 'desc1',
            ],
        ];
    }
}