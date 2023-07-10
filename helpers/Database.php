<?php

class Database
{
    /**
     * Méthode qui retourne une instance de la classe PDO
     * @return object PDO
     */
    public static function getInstancePDO(): object
    {

        $dsn = 'mysql:host=' . 'localhost' . ';dbname=' . 'refuge' . ';charset=utf8mb4';

        try {
            // création d'une instannce de la classe PDO
            $pdo = new PDO($dsn, 'root', '');
            if ($pdo) {
                return $pdo;
            }
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
}