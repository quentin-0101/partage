<?php

namespace App\Config;

class Conf {

    static private array $databases = array(
        // Le nom d'hote est webinfo a l'IUT
        // ou localhost sur votre machine
        //
        // ou webinfo.iutmontp.univ-montp2.fr
        // pour accéder à webinfo depuis l'extérieur
        'hostname' => 'webinfo.iutmontp.univ-montp2.fr',
        // A l'IUT, vous avez une BDD nommee comme votre login
        // Sur votre machine, vous devrez creer une BDD
        'database' => 'gaunyq',
        // A l'IUT, c'est votre login
        // Sur votre machine, vous avez surement un compte 'root'
        'login' => 'gaunyq',
        // A l'IUT, c'est votre mdp (INE par defaut)
        // Sur votre machine personelle, vous avez creez ce mdp a l'installation
        'password' => '070173163DC'
    );

    static public function getLogin() : string {
        //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
        return self::$databases['login'];
    }

    /**
     * @return string
     */
    public static function getDatabase(): string
    {
        return self::$databases['database'];
    }

    static public function getHostname() : string
    {
        return self::$databases['hostname'];
    }

    public static function getPassword() : string
    {
        return self::$databases['password'];
    }

    public static function getDureeExpiration() : int
    {
        return 3000000000000000;
    }

    public static function getAbsoluteURL() : string
    {
        return "http://127.0.0.1:8001";
    }

}


