<?php

namespace App\Form\produit;

use App\Controllers\Controller;
use App\Form\AbstractForm;
use App\Models\DataObject\produit\Produit;

class ProduitFormulaire extends AbstractForm
{

    public static function isUpdate() : bool
    {
        return isset($_POST["id"]);
    }

    public static function getPrimary() : int
    {
        return htmlspecialchars($_POST["id"]);
    }

    public static function isValid() : bool
    {

        return isset($_POST["nom"]) && strlen($_POST['nom']) > 0
            && isset($_POST["prix"]) && strlen($_POST['prix']) > 0
            && isset($_POST["quantite"]) && strlen($_POST['quantite']) > 0
            && isset($_POST["description"]) && strlen($_POST['description']) > 0
            && isset($_POST["id_categorie_produit"]) && strlen($_POST['id_categorie_produit']) > 0
            && isset($_POST["id_marque"]) && strlen($_POST['id_marque']) > 0
            && isset($_POST['poids']);

    }

    public static function getResult() : Produit
    {
        $nom = $_POST["nom"];
        $prix = $_POST["prix"];
        $quantite = $_POST["quantite"];
        $desription = $_POST["description"];
        $idCat = $_POST["id_categorie_produit"];
        $idMarque = $_POST["id_marque"];
        $poids = $_POST['poids'];
        return new Produit(0, $nom, $desription, $prix, $quantite, date('y-m-d'), $idCat, $idMarque, Controller::getUser()->getEmail(), $poids);
    }
}