<?php

class DB
{
    private static $db;

    /**
     * set connection to
     */
    public static function connectDB()
    {
        self::$db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASSWORD);
        self::$db->exec("set names utf8");
    }

    public static function getConnectionDB(){
        return self::$db;
    }
}
