<?php

namespace App\Helper;

class DB
{
    private static $db;
    private $connection;

    public static function init()
    {
        if (self::$db) {
            return self::$db;
        }
        return new DB();
    }

    private function __construct()
    {
        return $this->connection =
            mysqli_connect(
                $_ENV['DB_HOST'],
                $_ENV['DB_USERNAME'],
                $_ENV['DB_PASSWORD'],
                $_ENV['DB_DATABASE']
            ) or die('Ошибка подклюения к базе данных');
    }

    public function executeQuery($sQuery)
    {
        $db = self::init();
        $result = mysqli_query($db->connection, $sQuery) or die(mysqli_error($db->connection));
        if ($result) {
            return $result;
        }
        mysqli_close($db->connection);
        return false;
    }
}