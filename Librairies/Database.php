<?php

namespace Librairies;

class Database
{
    private static $options = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    ];

    public static function getPDO()
    {
        $pdo = new \PDO(
            'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],
            $_ENV['USERNAME'],
            $_ENV['PASSWORD'],
            self::$options
        );
        return $pdo;
    }
}
