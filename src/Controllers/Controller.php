<?php

namespace App\Controllers;

use App\Models\DataObject\AbstractDataObject;
use App\Models\DataObject\utilisateur\Role;
use App\Models\DataObject\utilisateur\Utilisateur;
use App\Models\Lib\ConnexionUtilisateur;
use App\Models\Repository\utilisateur\RoleRepository;
use App\Models\Repository\utilisateur\UtilisateurRepository;

class Controller
{

    public static function getUser() : ?Utilisateur
    {
        /**
         * @var Utilisateur $object;
         */
        if(ConnexionUtilisateur::estConnecte() && !ConnexionUtilisateur::estAnonyme()){
            $object = (new UtilisateurRepository())->select(ConnexionUtilisateur::getLoginUtilisateurConnecte());
            return Utilisateur::getInstance($object);
        }
        return null;
    }

    public static function getRole() : ?Role
    {
        /**
         * @var Utilisateur $user;
         * @var Role $object;
         */

        if(ConnexionUtilisateur::estConnecte()){
            $user = self::getUser();
            if($user == null) return Role::getInstance((new RoleRepository())->select(4)); // ANONYME
            $object = (new RoleRepository())->select($user->getIdRole());
            return Role::getInstance($object);
        }
        return null;
    }

    public static function render(string $cheminVue, array $parametres = []) : void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__."/../Templates/$cheminVue"; // Charge la vue
    }

    public static function secureURL(string $str) : string
    {
        return htmlspecialchars(rawurlencode($str));
    }

    public static function secure(string $str): string
    {
        return htmlspecialchars($str);
    }
}