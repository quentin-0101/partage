<?php

namespace App\Controllers;

use App\Form\categorieProduit\CategorieProduitForm;
use App\Models\DataObject\categorie\CategorieProduit;
use App\Models\Lib\MessageFlash;
use App\Models\Repository\categorie\CategoriePrincipaleRepository;
use App\Models\Repository\categorie\CategorieProduitRepository;

class ControllerCategorieProduit extends Controller
{
    public static function show() : void
    {
        if(!self::getRole()->estAdmin()){
            ControllerMain::index();
            return;
        }
        if(isset($_GET['id'])){
            $id = htmlspecialchars(rawurldecode($_GET['id']));
            self::render("ControllerCategorieProduit/show.php", [
                "categoriesProduit" => (new CategorieProduitRepository())->selectAllCategorieProduitWithId($id)
            ]);
        }
        else ControllerMain::index();
    }

    public static function create() : void
    {
        if(!self::getRole()->estAdmin()){
            ControllerMain::index();
            return;
        }

        if(CategorieProduitForm::isValid()){
            $cat = CategorieProduitForm::getResult();
            $test = (new CategorieProduitRepository())->create($cat);
            if($test) MessageFlash::ajouter("success", "La catégorie à bien été créé");
            else MessageFlash::ajouter("warning", "erreur : impossible de créé la catégorie");
            ControllerMain::index();
            return;
        }

        self::render("ControllerCategorieProduit/create.php", [
            "categories" => (new CategoriePrincipaleRepository())->selectAll(),
            "type" => "create"
        ]);
    }

    public static function update() : void
    {
        if(!self::getRole()->estAdmin()){
            ControllerMain::index();
            return;
        }

        if(isset($_GET['id'])){  // demande de formulaire
            $id = htmlspecialchars(rawurldecode($_GET['id']));
            $categorieP = CategorieProduit::getInstance((new CategorieProduitRepository())->select($id));
            self::render("ControllerCategorieProduit/create.php", [
                "categorieP" => $categorieP,
                "categories" => (new CategoriePrincipaleRepository())->selectAll(),
                "type" => "update"
            ]);
            return;
        }

        if(CategorieProduitForm::isValid() && CategorieProduitForm::isUpdate()){ // formulaire rempli retourné
            $categorieForm = CategorieProduitForm::getResult();
            $test = (new CategorieProduitRepository())->update($categorieForm, CategorieProduitForm::getPrimary());
            if($test) MessageFlash::ajouter("success", "La catégorie à bien été modifiée");
            else MessageFlash::ajouter("warning", "erreur : impossible de modifier la catégorie");
            ControllerMain::index();
            return;
        }
    }

    public static function delete() : void
    {
        if(!self::getRole()->estAdmin()){
            ControllerMain::index();
            return;
        }

        if(isset($_GET['id'])){
            $id = htmlspecialchars(urldecode($_GET['id']));
            $test = (new CategorieProduitRepository())->delete($id);
            if($test) MessageFlash::ajouter("success", "La catégorie à bien été créé");
            else MessageFlash::ajouter("warning", "erreur : impossible de créé la catégorie");

        }
        ControllerMain::index();
    }
}