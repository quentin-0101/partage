<?php

namespace App\Controllers;

use App\Models\DataObject\produit\ProduitSpecification;
use App\Models\Repository\produit\ProduitSpecificationRepository;

class ControllerProduitSpecification
{
    public static function add()
    {
        if(isset($_GET["produitSpecification"]) && isset($_GET["id"])){

            $nom = htmlspecialchars(rawurldecode($_GET["produitSpecification"]));
            $idProduit = htmlspecialchars(rawurldecode($_GET["id"]));
            $test = (new ProduitSpecificationRepository())->create(new ProduitSpecification(0, $nom, $idProduit));
            if(!$test) return new \Exception("erreur : impossible de créer ProduitSpecification");
        }
        return true;
    }

    public static function delete(): \Exception|bool
    {
        if(isset($_GET['id'])){
            $id = htmlspecialchars(rawurldecode($_GET['id']));
            $test = (new ProduitSpecificationRepository())->delete($id);
            if(!$test) return new \Exception("erreur : impossible de supprimer produitSpecification");
        }
        return true;
    }

}