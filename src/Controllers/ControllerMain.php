<?php

namespace App\Controllers;


use App\Models\DataObject\categorie\CategoriePrincipale;
use App\Models\DataObject\categorie\CategorieProduit;
use App\Models\DataObject\produit\Marque;
use App\Models\DataObject\produit\Produit;
use App\Models\Lib\ConnexionUtilisateur;
use App\Models\Lib\Panier;
use App\Models\Repository\categorie\CategoriePrincipaleRepository;
use App\Models\Repository\categorie\CategorieProduitRepository;
use App\Models\Repository\produit\ImageRepository;
use App\Models\Repository\produit\MarqueRepository;
use App\Models\Repository\produit\ProduitRepository;

class ControllerMain extends Controller
{
    public static function error() : void
    {
        self::render("page_notfound.php", []);
    }

    public static function index() : void
    {
       // var_dump(ConnexionUtilisateur::estConnecte());
       // var_dump(ConnexionUtilisateur::getLoginUtilisateurConnecte());

       // var_dump(ConnexionUtilisateur::estUtilisateur(self::getUser()->getEmail()));
        if(ConnexionUtilisateur::estConnecte()){




            //ConnexionUtilisateur::deconnecter();
            if(self::getRole()->estGestionnaire()) self::render("ControllerUtilisateur/gestionnaire/index.php", []);
            else if(self::getRole()->estAdmin()) self::render("ControllerUtilisateur/admin/index.php", []);
            else {

                $listProduit = (new ProduitRepository())->selectAll();
                $listProduitOrdre = (new ProduitRepository())->getProduitOrdre();
                foreach ($listProduit as $p){
                    $p->setListImages((new ImageRepository())->selectAllWithIdProduit($p->getId()));
                }
                foreach ($listProduitOrdre as $p){
                    $p->setListImages((new ImageRepository())->selectAllWithIdProduit($p->getId()));
                }


                self::render("ControllerMain/index.php", [
                    "user" => ConnexionUtilisateur::estAnonyme() ? null : self::getUser(),
                    "login" => !ConnexionUtilisateur::estAnonyme(),
                    "tabCategoriePrincipale" => self::getAllCategories(),
                    "nbProduits" => Panier::getNombreProduit(),
                    "produitsPanier" => Panier::lirePanier(),
                    "prixTotal" => Panier::getPrixTotal(),
                    "listProduit" => $listProduit,
                    "listProduitOrdre" => $listProduitOrdre
                ]);
            }
        }
        else{
            ConnexionUtilisateur::connecter(ConnexionUtilisateur::$cleAnonyme);
            self::index();
            return;
        }
    }

    public static function search() : void
    {
            if(isset($_GET['categoriePrincipale'])){
                $idCategoriePrincpale = htmlspecialchars(rawurldecode($_GET['categoriePrincipale']));
                $produits = (new ProduitRepository())->selectAllWithIdCategPrincipale($idCategoriePrincpale);
            }

            if(isset($_GET['categorieProduit'])){
                $idCategorieProduit = htmlspecialchars(rawurldecode($_GET['categorieProduit']));
                $produits = (new ProduitRepository())->selectAllWithIdCategProduit($idCategorieProduit);

                if(isset($_GET['marque'])){
                    $idMarque = htmlspecialchars(rawurldecode($_GET['marque']));
                    $produits = (new ProduitRepository())->selectAllWithIdCategProduitAndIdMarque($idCategorieProduit, $idMarque);
                }
            }
        /**
         * @var Produit $p;
         */

            foreach ($produits as $p){
                $p->setListImages((new ImageRepository())->selectAllWithIdProduit($p->getId()));
            }


            self::render("ControllerMain/search.php", [
                "user" => ConnexionUtilisateur::estAnonyme() ? null : self::getUser(),
                "login" => !ConnexionUtilisateur::estAnonyme(),
                "tabCategoriePrincipale" => self::getAllCategories(),
                "produits" => $produits,
                "nbProduits" => Panier::getNombreProduit(),
                "produitsPanier" => Panier::lirePanier(),
                "prixTotal" => Panier::getPrixTotal()
            ]);
    }


    public static function getAllCategories() : array
    {
        $tabCategoriePrincipale = (new CategoriePrincipaleRepository())->selectAll();
        /** @var CategoriePrincipale $catPrincipale */
        /** @var CategorieProduit $catSecondaire */
        /** @var Produit $produit */
        /** @var Marque $marque */


        foreach ($tabCategoriePrincipale as $catPrincipale){
            $listCatSecondaire = (new CategorieProduitRepository())->selectAllCategorieProduitWithId($catPrincipale->getId());
            $catPrincipale->setListCategorieProduit($listCatSecondaire);

            foreach ($listCatSecondaire as $catSecondaire){
                $listProduits = new \ArrayObject();
                $listMarque = array();
                foreach ((new ProduitRepository())->selectAll() as $produit){
                    if($produit->getIdCategorieProduit() == $catSecondaire->getId()){
                        $listProduits->append($produit);
                        $listMarque[] = (new MarqueRepository())->select($produit->getIdMarque());
                    }
                }

                $listMarque = array_unique($listMarque);

                $catSecondaire->setListeMarque($listMarque);
                $catSecondaire->setListeProduits($listProduits);
            }
        }
        return $tabCategoriePrincipale;
    }

}