<?php

namespace App\Controllers;

use App\Form\categoriePrincipale\CategoriePrincipaleForm;

use App\Form\produit\ProduitFormulaire;
use App\Models\DataObject\categorie\CategoriePrincipale;
use App\Models\DataObject\categorie\CategorieProduit;
use App\Models\DataObject\produit\Image;
use App\Models\DataObject\produit\Produit;
use App\Models\Http\Session;
use App\Models\Lib\ConnexionUtilisateur;
use App\Models\Lib\MessageFlash;
use App\Models\Lib\Panier;
use App\Models\Repository\categorie\CategoriePrincipaleRepository;
use App\Models\Repository\categorie\CategorieProduitRepository;
use App\Models\Repository\produit\ImageRepository;
use App\Models\Repository\produit\MarqueRepository;
use App\Models\Repository\produit\ProduitRepository;
use App\Models\Repository\produit\ProduitSpecificationRepository;

class ControllerProduit extends Controller
{
    public static function addV1() : void
    {
        if(!self::getRole()->estGestionnaire()){
            ControllerMain::index();
            return;
        }

        if(CategoriePrincipaleForm::isValid()){
            self::addV2(CategoriePrincipaleForm::getResult()->getId());
        } else {
            self::render("ControllerProduit/add/addV1.php", [
                "categories" => (new CategoriePrincipaleRepository())->selectAll()
            ]);
        }
    }


    public static function addV2($id = null) : void
    {
        if(!self::getRole()->estGestionnaire()){
            ControllerMain::index();
            return;
        }

        if($id != null){
            self::render("ControllerProduit/add/addV2.php", [
                "sousCategories" => (new CategorieProduitRepository())->selectAllCategorieProduitWithId($id),
                "marques" => (new MarqueRepository())->selectAll(),
                "produit" => null,
            ]);
        }

        if(ProduitFormulaire::isValid()){

            if(ProduitFormulaire::isUpdate())
                (new ProduitRepository())->update(ProduitFormulaire::getResult(), ProduitFormulaire::getPrimary());
            else
                (new ProduitRepository())->create(ProduitFormulaire::getResult());

            $idProduit = 0;
            if(ProduitFormulaire::isUpdate()){
                $idProduit = ProduitFormulaire::getPrimary();
            } else {
                $idProduit = (new ProduitRepository())->getLastId();
            }

            if (isset($_FILES["files"])) {
                // Loop through each uploaded file
                for ($i = 0; $i < count($_FILES["files"]['name']); $i++) {
                    $file = [
                        'name' => $_FILES["files"]['name'][$i],
                        'type' => $_FILES["files"]['type'][$i],
                        'tmp_name' => $_FILES["files"]['tmp_name'][$i],
                        'error' => $_FILES["files"]['error'][$i],
                        'size' => $_FILES["files"]['size'][$i],
                    ];


                    // Generate a new file name for the uploaded file
                    $newFileName = uniqid('imageProduit_').$file['name'];

                    // $newFileName = generateNewFileName($file['name']);

                    // Move the uploaded file to a server directory and rename it
                    move_uploaded_file($file['tmp_name'], __DIR__ . "/../../public/upload/"."$newFileName");
                    (new ImageRepository())->create(new Image(0, $newFileName, $idProduit));
                }
            }

            ControllerMain::index();
        }
    }

    public static function update() : void
    {
        if(!self::getRole()->estGestionnaire()){
            ControllerMain::index();
            return;
        }

        if(isset($_GET["id"])){
            $id = htmlspecialchars(rawurldecode($_GET["id"]));
            $produit = Produit::getInstance((new ProduitRepository())->select($id));


            $cat = CategorieProduit::getInstance((new CategorieProduitRepository())->select($produit->getIdCategorieProduit()));
            $categoriePrincipale = CategoriePrincipale::getInstance((new CategoriePrincipaleRepository())->selectCategorieProduitWithCategorieProduitId($cat->getIdCategoriePrincipale()));

            $images = (new ImageRepository())->selectAllWithIdProduit($id);

            self::render("ControllerProduit/add/addV2.php", [
                "sousCategories" => (new CategorieProduitRepository())->selectAllCategorieProduitWithId($categoriePrincipale->getId()),
                "marques" => (new MarqueRepository())->selectAll(),
                "produit" => $produit,
                "images" => $images,
                "produitSpecification" => (new ProduitSpecificationRepository())->selectAllWithIdProduit($id)
            ]);
        }
    }

    public static function delete() : void
    {
        if(!self::getRole()->estGestionnaire()){
            ControllerMain::index();
            return;
        }

        if(isset($_GET["id"])){
            $id = htmlspecialchars(rawurldecode($_GET["id"]));
            if((new ProduitRepository())->delete($id)) MessageFlash::ajouter("warning", "le produit a bien été supprimé");
            else MessageFlash::ajouter("warning", "erreur");
            ControllerMain::index();
        }
    }



    public static function readAll() : void
    {
        if(!self::getRole()->estGestionnaire()){
            ControllerMain::index();
            return;
        }

        self::render("ControllerProduit/readAll.php", [
            "produits" => (new ProduitRepository())->selectAllWithIdUtilisateur(self::getUser()->getEmail())
        ]);
    }

    public static function show($id = null) : void
    {

        if(isset($_GET['id']) || isset($id)){ // id produit demandé
            if(isset($_GET['id'])) $id = htmlspecialchars(rawurldecode($_GET['id']));

            $produit = Produit::getInstance((new ProduitRepository())->select($id));
            $produit->setListSpecification((new ProduitSpecificationRepository())->selectAllWithIdProduit($produit->getId()));
            $produit->setListImages((new ImageRepository())->selectAllWithIdProduit($produit->getId()));



            self::render("ControllerProduit/product.php", [
                "produit" => $produit,
                "user" => ConnexionUtilisateur::estAnonyme() ? null : self::getUser(),
                "login" => !ConnexionUtilisateur::estAnonyme(),
                "tabCategoriePrincipale" => ControllerMain::getAllCategories(),
                "nbProduits" => Panier::getNombreProduit(),
                "produitsPanier" => Panier::lirePanier(),
                "prixTotal" => Panier::getPrixTotal()
            ]);
        }
    }

    public static function ajouterPanier() : void
    {
        // get => idProduit | quantite
        if(isset($_GET['idProduit']) && isset($_GET['quantite'])){
            $idProduit = htmlspecialchars(rawurldecode($_GET['idProduit']));
            $quantite = htmlspecialchars(rawurldecode($_GET['quantite']));

            Panier::ajouter($idProduit, $quantite);


            self::show($idProduit);
            $new_url = "?controller=produit&action=show&id=".$idProduit;
            header("Location: $new_url");
        }
    }

    public static function supprimerProduit() : void
    {
        if(isset($_GET['idProduit'])){
            $idProduit = htmlspecialchars(rawurldecode($_GET['idProduit']));
            Panier::supprimerProduit($idProduit);

            self::show($idProduit);

            //$new_url = "?controller=produit&action=show&id=".$idProduit;
            //header("Location: $new_url");
        }
    }

    public static function incrementerProduit() : void
    {
        if(isset($_GET['idProduit'])){
            $idProduit = htmlspecialchars(rawurldecode($_GET['idProduit']));
            Panier::incrementerProduit($idProduit);
        }
    }

    public static function produitMAJ() : void
    {
        if(isset($_GET['idProduit']) && isset($_GET["quantite"])){
            $idProduit = htmlspecialchars(rawurldecode($_GET['idProduit']));
            $quantite = htmlspecialchars(rawurldecode($_GET['quantite']));
            Panier::updateQuantiteProduit($idProduit, $quantite);
        }

    }

    public static function decrementerProduit() : void
    {
        if(isset($_GET['idProduit'])){
            $idProduit = htmlspecialchars(rawurldecode($_GET['idProduit']));
            Panier::decrementerProduit($idProduit);
        }
    }

}