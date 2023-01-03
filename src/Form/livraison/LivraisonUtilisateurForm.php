<?php

namespace App\Form\livraison;

use App\Controllers\Controller;
use App\Form\AbstractForm;
use App\Models\DataObject\utilisateur\UtilisateurLivraison;

class LivraisonUtilisateurForm extends AbstractForm
{

    public static function isValid(): bool
    {
        return isset($_POST['adresse']) && strlen($_POST['adresse']) > 0
            && isset($_POST['ville'])  && strlen($_POST['ville']) > 0
            && isset($_POST['code_postal'])  && strlen($_POST['code_postal']) > 0
            && isset($_POST['pays'])  && strlen($_POST['pays']) > 0;
    }

    public static function getInvalidInformation() : UtilisateurLivraison
    {
        if(isset($_POST['adresse'])) $adresse = htmlspecialchars($_POST['adresse']);
        else $adresse = "";

        if(isset($_POST['ville'])) $ville = htmlspecialchars($_POST['ville']);
        else $ville = "";

        if(isset($_POST['code_postal'])) $code_postal = htmlspecialchars($_POST['code_postal']);
        else $code_postal = "";

        if(isset($_POST['pays'])) $pays = htmlspecialchars($_POST['pays']);
        else $pays = "";

        return new  UtilisateurLivraison(-1, $adresse, $ville, $code_postal, $pays, Controller::getUser()->getEmail(), false);

    }

    public static function isUpdate() : bool
    {
        return isset($_POST['update']);
    }

    public static function getUpdate() : int
    {
        return htmlspecialchars($_POST['update']);
    }

    public static function isDefault() : bool
    {
        return isset($_POST['default']);
    }

    public static function getResult()
    {
        $adresse = htmlspecialchars($_POST["adresse"]);
        $ville = htmlspecialchars($_POST["ville"]);
        $codePostal = htmlspecialchars($_POST["code_postal"]);
        $pays = htmlspecialchars($_POST["pays"]);

        return new UtilisateurLivraison(-1, $adresse, $ville, $codePostal, $pays, Controller::getUser()->getEmail(), false);
    }
}