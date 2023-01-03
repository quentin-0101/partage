<?php

namespace App\Form\utilisateur;

use App\Form\AbstractForm;
use App\Models\DataObject\utilisateur\Utilisateur;

class LoginForm extends AbstractForm
{

    public static function isValid(): bool
    {
        return isset($_POST['email']) && strlen($_POST['email']) > 0
            && isset($_POST['motDePasse']) && strlen($_POST['motDePasse']) > 0
            && filter_var(htmlspecialchars($_POST['email']), FILTER_VALIDATE_EMAIL);
    }

    public static function getResult() : Utilisateur
    {
        $motDePasse = htmlspecialchars($_POST["motDePasse"]);
        $email = htmlspecialchars($_POST["email"]);
        return new Utilisateur("", "", $motDePasse, "", $email, (int)null, (int) null, "");
    }
}