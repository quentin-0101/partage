<?php

namespace App\Form\commande;

use App\Form\AbstractForm;
use App\Models\DataObject\utilisateur\VisiteurCommande;

class VisiteurCommandeForm extends AbstractForm
{

    public static function isValid(): bool
    {
        return isset($_POST['nom']) && strlen($_POST['nom'] > 0)
            && isset($_POST['prenom']) && strlen($_POST['prenom'] > 0)
            && isset($_POST['telephone']) && strlen($_POST['telephone'] > 0)
            && isset($_POST['email']) && strlen($_POST['email'] > 0)
            && isset($_POST['adresse_postale']) && strlen($_POST['adresse_postale'] > 0)
            && isset($_POST['ville']) && strlen($_POST['ville'] > 0)
            && isset($_POST['code_postale']) && strlen($_POST['code_postale'] > 0)
            && isset($_POST['pays']);
    }

    public static function getResult() : VisiteurCommande
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $email = htmlspecialchars($_POST['email']);
        $addr = htmlspecialchars($_POST['adresse_postale']);
        $ville = htmlspecialchars($_POST['ville']);
        $code = htmlspecialchars($_POST['code_postale']);
        $pays = htmlspecialchars($_POST['pays']);

        return new VisiteurCommande(
            $nom,
            $prenom,
            $telephone,
            $email,
            $addr,
            $ville,
            $code,
            $pays,
            0
        );
    }
}