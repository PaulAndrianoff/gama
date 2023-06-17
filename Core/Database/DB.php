<?php

namespace Core\Database;

class DB
{
    protected static $connection;

    public static function connect($host, $database, $username, $password)
    {
        $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
        self::$connection = new \PDO($dsn, $username, $password);
    }

    public static function table($table)
    {
        return new QueryBuilder($table, self::$connection);
    }
}
