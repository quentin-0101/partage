<?php

namespace App\Form\categoriePrincipale;

use App\Models\DataObject\categorie\CategoriePrincipale;

class CategoriePrincipaleForm extends \App\Form\AbstractForm
{

    public static function isValid(): bool
    {
        return isset($_POST['id_categorie_principale']) && strlen($_POST['id_categorie_principale']) > 0;
    }

    public static function getResult() : CategoriePrincipale
    {
        $id = htmlspecialchars($_POST['id_categorie_principale']);
        return new CategoriePrincipale("", "", $id);
    }

    public static function isUpdate() : bool
    {
        return isset($_POST['id']);
    }

    public static function getPrimary() : int
    {
        return htmlspecialchars($_POST['id']);
    }
}