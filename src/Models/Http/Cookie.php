<?php

namespace App\Models\Http;

class Cookie
{
    public static function enregistrer(string $cle, mixed $valeur, ?int $dureeExpiration = null): void
    {
        if($dureeExpiration == null) setcookie($cle, serialize($valeur), 0);
        else setcookie($cle, serialize($valeur), time() + $dureeExpiration);
    }

    public static function lire(string $cle) : mixed
    {
        if(isset($_COOKIE[$cle])) return $_COOKIE[$cle];
        return null;
    }

    public static function contient($cle) : bool
    {
        return isset($_COOKIE[$cle]);
    }

    public static function supprimer($cle) : void
    {
        if(self::contient($cle)){
            unset($_COOKIE[$cle]);
            setcookie($cle, "", 1);
        }

    }
}