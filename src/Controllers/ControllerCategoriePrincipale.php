<?php

namespace App\Controllers;

use App\Form\categoriePrincipale\CategoriePrincipaleForm;
use App\Models\DataObject\categorie\CategoriePrincipale;
use App\Models\DataObject\categorie\CategorieProduit;
use App\Models\Lib\MessageFlash;
use App\Models\Repository\categorie\CategoriePrincipaleRepository;
use App\Models\Repository\categorie\CategorieProduitRepository;

class ControllerCategoriePrincipale extends Controller
{
    public static function readAll() : void
    {
        if(!self::getRole()->estAdmin()){
            ControllerMain::index();
            return;
        }

        self::render("ControllerCategoriePrincipale/readAll.php", [
            "mainCategories" => (new CategoriePrincipaleRepository())->selectAll(),
            //"productCategories" => (new CategorieProduitRepository())->selectAll()
        ]);
    }

    public static function create() : void
    {
        if(!self::getRole()->estAdmin()){
            ControllerMain::index();
            return;
        }

        if(CategoriePrincipaleForm::isValid()){
            $test = (new CategoriePrincipaleRepository())->create(CategoriePrincipaleForm::getResult());
            if($test) MessageFlash::ajouter("success", "La catégorie à bien été créé");
            else MessageFlash::ajouter("warning", "erreur : impossible de créé la catégorie");
            ControllerMain::index();
            return;
        }

        self::render("ControllerCategoriePrincipale/create.php", [
            "type" => "create"
        ]);
    }

    public static function delete() : void
    {
        if(!self::getRole()->estAdmin()){
            ControllerMain::index();
            return;
        }

        if(isset($_GET['id'])){
            $id = htmlspecialchars(rawurldecode($_GET['id']));
            $test = (new CategoriePrincipaleRepository())->delete($id);
            if($test) MessageFlash::ajouter("success", "La catégorie à bien été supprimée");
            else MessageFlash::ajouter("warning", "erreur : impossible de supprimer la catégorie");

        }
        ControllerMain::index();
    }

    public static function update() : void
    {
        if(!self::getRole()->estAdmin()){
            ControllerMain::index();
            return;
        }

        if(isset($_GET['id'])){  // demande de formulaire
            $id = htmlspecialchars(rawurldecode($_GET['id']));
            $categorieP = CategoriePrincipale::getInstance((new CategoriePrincipaleRepository())->select($id));
            self::render("ControllerCategoriePrincipale/create.php", [
                "categorieP" => $categorieP,
                "type" => "update"
            ]);
            return;
        }

        if(CategoriePrincipaleForm::isValid() && CategoriePrincipaleForm::isUpdate()){ // formulaire rempli retourné
            $categorieForm = CategoriePrincipaleForm::getResult();
            $test = (new CategoriePrincipaleRepository())->update($categorieForm, CategoriePrincipaleForm::getPrimary());
            if($test) MessageFlash::ajouter("success", "La catégorie à bien été modifiée");
            else MessageFlash::ajouter("warning", "erreur : impossible de modifier la catégorie");
            ControllerMain::index();
            return;
        }

    }




}