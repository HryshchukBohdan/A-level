<?php

class DbConnect
{
    private static $db;

    private function __clone()
    {
        return true;
    }

    private function __wakeup()
    {
        return true;
    }

    private function __construct($host, $db_name, $user, $pwd)
    {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $pwd);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
        }
    }
    public static function getConnect(){
        if (!self::$db) {
            self::$db = new DbConnect("localhost", "chat", "bohdan0516", "0516");
        }
            return self::$db->conn;
    }
}