<?php

namespace App\Models\Repository;

use App\Config\Conf;
use PDO;
use PDOException;

class DatabaseConnection {

    private static $pdo = null;

    public function __construct()
    {
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();

        try{
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo $e->getMessage();
            die();
        }


    }

    /**
     * @return PDO|null
     */
    public static function getPdo(): ?PDO
    {
        return self::$pdo;
    }

    public static function getInstance(): ?PDO
    {
        // Si la connexion à la BDD n'a jamais été initialisé,
        // on l'initialise en appelant le constructeur
        if (is_null(self::$pdo))
            new self();

        return self::$pdo;
    }

}