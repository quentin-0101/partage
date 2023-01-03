<?php

namespace App\Models\Lib;

use App\Models\DataObject\utilisateur\Utilisateur;
use App\Models\Http\Session;

class ConnexionUtilisateur
{
    // L'utilisateur connecté sera enregistré en session associé à la clé suivante
    private static string $cleConnexion = "_utilisateurConnecte";
    public static string $cleAnonyme = "_utilisateurAnonyme";

    public static function connecter(string $loginUtilisateur): void
    {
        //if(ConnexionUtilisateur::estConnecte()) ConnexionUtilisateur::deconnecter();
        if(self::estConnecte()) return;
        Session::getInstance()->enregistrer(session_id(), $loginUtilisateur);
        //time_nanosleep(0, 500);

        /*
                if(Session::getInstance() == null){
                    self::connecter($loginUtilisateur);
                }
        */


        //$_SESSION[session_id()] = $loginUtilisateur;
    }

    public static function estAnonyme() : bool
    {
        return self::estConnecte() && strcmp(self::getLoginUtilisateurConnecte(), self::$cleAnonyme) == 0;
    }

    public static function estConnecte(): bool
    {
        return Session::getInstance()->contient(session_id());
        //return isset($_SESSION[session_id()]);
    }

    public static function deconnecter(): void
    {
        Session::getInstance()->detruire();
        time_nanosleep(0, 1000);

/*
        if(Session::getInstance() !== null){
            self::deconnecter();
        }*/
        //unset($_SESSION[session_id()]);
    }

    public static function getLoginUtilisateurConnecte(): ?string
    {
        return Session::getInstance()->lire(session_id());
        //return self::connecter() ? $_SESSION[session_id()] : null;
    }

    public static function estUtilisateur($login): bool
    {
        return self::estConnecte() && $login == self::getLoginUtilisateurConnecte();
    }


}