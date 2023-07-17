<?php

class Database
{
    private static $instance;
    private $dbh;

    private function __construct()
    {
        try {
            $this->dbh = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASE, USER_DATABASE, PASSWORD_DATABASE);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public static function getInstancePDO()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->dbh;
    }
}
