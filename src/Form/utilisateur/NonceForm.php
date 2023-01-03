<?php

namespace App\Form\utilisateur;

use App\Form\AbstractForm;
use App\Models\DataObject\utilisateur\Utilisateur;

class NonceForm extends AbstractForm
{

    public static function isValid(): bool
    {
        return isset($_GET["nonce"]) && strlen($_GET['nonce']) > 0
            && isset($_GET["login"]) && strlen($_GET['login']) > 0;
    }

    public static function getResult() : Utilisateur
    {
        $nonce = htmlspecialchars(rawurldecode($_GET["nonce"]));
        $email = htmlspecialchars(rawurldecode($_GET["login"]));

        return new Utilisateur("", "", "", "", $email, (int)null, 1, $nonce);
    }
}