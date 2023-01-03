<?php

namespace App\Form\utilisateur;

use App\Form\AbstractForm;
use App\Models\DataObject\utilisateur\Utilisateur;

class RegisterForm extends AbstractForm
{

    public static function isValid(): bool
    {
        return isset($_POST['nom']) && strlen($_POST['nom']) > 0
            && isset($_POST['prenom']) && strlen($_POST['prenom']) > 0
            && isset($_POST['email']) && strlen($_POST['email']) > 0
            && isset($_POST['telephone']) && strlen($_POST['telephone']) > 0
            && isset($_POST['motDePasse']) && strlen($_POST['motDePasse']) > 0
            && isset($_POST['motDePasse2']) && strlen($_POST['motDePasse2']) > 0
            && filter_var(htmlspecialchars($_POST['email']), FILTER_VALIDATE_EMAIL);
    }

    public static function getInvalidInformation() : Utilisateur
    {
        if(isset($_POST['nom'])) $nom = htmlspecialchars($_POST['nom']);
        else $nom = "";

        if(isset($_POST['prenom'])) $prenom = htmlspecialchars($_POST['prenom']);
        else $prenom = "";

        if(isset($_POST['email'])) $email = htmlspecialchars($_POST['email']);
        else $email = "";

        if(isset($_POST['telephone'])) $telephone = htmlspecialchars($_POST['telephone']);
        else $telephone = "";

        if(isset($_POST['motDePasse'])) $motDePasse = htmlspecialchars($_POST['motDePasse']);
        else $motDePasse = "";

        return new Utilisateur($nom, $prenom, $motDePasse, $telephone, $email, 2, 1, "");

    }

    public static function isUpdateNom() : bool
    {
        return isset($_POST['nom']);
    }

    public static function getNom() : string
    {
        return htmlspecialchars($_POST['nom']);
    }

    public static function isUpdatePrenom() : bool
    {
        return isset($_POST['prenom']);
    }

    public static function getPrenom() : string
    {
        return htmlspecialchars($_POST['prenom']);
    }

    public static function isUpdateMotDePasse() : bool
    {
        return isset($_POST['check_change_password'])
            && isset($_POST['ancienMotDePasse'])
            && isset($_POST['motDePasse'])
            && isset($_POST['motDePasse2']);
    }

    public static function isEqualsPasswords() : bool
    {
        return strcmp(htmlspecialchars($_POST['motDePasse']), htmlspecialchars($_POST['motDePasse2'])) == 0;
    }

    public static function getMotDePasse() : array
    {
        $ancien = htmlspecialchars($_POST['ancienMotDePasse']);
        $nouveau = htmlspecialchars($_POST['motDePasse']);
        return array($ancien, $nouveau);
    }

    public static function getResult() : Utilisateur
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $motDePasse = htmlspecialchars($_POST['motDePasse']);
        return new Utilisateur($nom, $prenom, $motDePasse, $telephone, $email, 2, 1, "");
    }
}