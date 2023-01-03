<?php

namespace App\Form\categorieProduit;

use App\Form\AbstractForm;
use App\Models\DataObject\categorie\CategoriePrincipale;
use App\Models\DataObject\categorie\CategorieProduit;

class CategorieProduitForm extends AbstractForm
{

    public static function isValid(): bool
    {
        return isset($_POST['id_categorie_principale']) && strlen($_POST['id_categorie_principale']) > 0
            && isset($_POST['nom'])  && strlen($_POST['nom']) > 0
            && isset($_POST['description']) && strlen($_POST['description']) > 0;
    }

    public static function getResult() : CategorieProduit
    {
        $nom = htmlspecialchars($_POST['nom']);
        $description = htmlspecialchars($_POST['description']);
        $idCat = htmlspecialchars($_POST['id_categorie_principale']);
        return new CategorieProduit((int) null, $nom, $description, $idCat);
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