<?php

namespace App\Models\Lib;

use App\Models\DataObject\produit\Produit;
use App\Models\Http\Session;
use App\Models\Repository\produit\ImageRepository;
use App\Models\Repository\produit\ProduitRepository;

class Panier
{
    private static string $clePanier = "_panier";

    public static function create(): void
    {
        //Session::getInstance()->enregistrer(self::$clePanier, array());
  //      var_dump($_SESSION);
       // if (!isset($_SESSION)) {
        //    $_SESSION[self::$clePanier] = [];
        //}
        //$_SESSION[session_id()] = $loginUtilisateur;

        if(!isset($_SESSION[self::$clePanier])){
            $_SESSION[self::$clePanier] = [];
        }

    }

    public static function ajouter(int $idProduit, int $quantite) : void
    {
        // ne surtout pas supprimer cette ligne qui ne sert à rien sinon ça ne fonctionne plus !!!!
        Session::getInstance()->contient(self::$clePanier);
       // var_dump( Session::getInstance()->lire(self::$clePanier));
        if (!isset($_SESSION[self::$clePanier][$idProduit])) {
            $_SESSION[self::$clePanier][$idProduit] = $quantite;
            MessageFlash::ajouter('info', "votre produit à bien été ajouté dans votre panier");
        } else {
            $_SESSION[self::$clePanier][$idProduit] += $quantite;
            MessageFlash::ajouter('info', "votre panier à bien été mis à jour");
        }
    }

    public static function vider() : void
    {
        foreach (self::lirePanier() as $idProduit => $quantite){
            Panier::supprimerProduit($idProduit);
        }
    }

    public static function updateQuantiteProduit($idProduit, $qty){
        if (isset($_SESSION[self::$clePanier][$idProduit])) {
            $_SESSION[self::$clePanier][$idProduit] += $qty;
        } else {
            self::ajouter($idProduit ,$qty);
        }
    }

    public static function incrementerProduit($idProduit) : void
    {
        if (isset($_SESSION[self::$clePanier][$idProduit])) {
            $_SESSION[self::$clePanier][$idProduit]++;
            echo "la";
        } else {
            self::ajouter($idProduit ,1);
            echo "ici";
        }
    }

    public static function decrementerProduit($idProduit) : void
    {
        if (isset($_SESSION[self::$clePanier][$idProduit])) {
            $_SESSION[self::$clePanier][$idProduit]--;

            if ($_SESSION[self::$clePanier][$idProduit] == 0) {
                unset($_SESSION[self::$clePanier][$idProduit]);
            }
        }
    }

    public static function supprimerProduit($idProduit) : void
    {
        // ne surtout pas supprimer cette ligne qui ne sert à rien sinon ça ne fonctionne plus !!!!
         Session::getInstance()->contient(self::$clePanier);
        //var_dump( Session::getInstance()->lire(self::$clePanier));

        unset($_SESSION[self::$clePanier][$idProduit]);

        if(!isset($_SESSION[self::$clePanier][$idProduit])){
            MessageFlash::ajouter('info', "votre produit à bien été supprimé de votre panier");
        } else {
            echo "error";
        }

        //var_dump($_SESSION[self::$clePanier][$idProduit]);
    }

    public static function getQuantite($id) : int
    {
        foreach ($_SESSION[self::$clePanier] as $idProduit => $quantite){
            if($idProduit == $id) return $quantite;
        }
        return 0;

       // return $_SESSION[self::$clePanier][$idProduit] ?? 0;
    }

    public static function lirePanier() : array
    {
       // var_dump($_SESSION[self::$clePanier]);
        $arr = [];
        foreach ($_SESSION[self::$clePanier] as $idProduit => $quantite){
            $produit = Produit::getInstance((new ProduitRepository())->select($idProduit));
            $produit->setListImages((new ImageRepository())->selectAllWithIdProduit($idProduit));
            $produit->setQuantite($quantite);
            $arr[] = $produit;
        }
        return $arr;
    }

    public static function getPoidsPanier() : float
    {
        $poids = 0;
        foreach (Panier::lirePanier() as $p){
            $p = Produit::getInstance($p);
            $poids += $p->getPoids() * 1000 * self::getQuantite($p->getId());
        }
        return $poids;
    }

    public static function getNombreProduit() : int
    {
        if(!isset($_SESSION[self::$clePanier])){
            $_SESSION[self::$clePanier] = [];
        }

        $number = 0;
        foreach ($_SESSION[self::$clePanier] as $idProduit => $quantite){
            $number += $quantite;
        }
        return $number;
    }

    public static function getPrixTotal() : float
    {


        $prixTotal = 0;
        foreach ($_SESSION[self::$clePanier] as $idProduit => $quantite) {
            $prixProduit = (Produit::getInstance((new ProduitRepository())->select($idProduit))->getPrix());
            $prixTotal += $prixProduit * $quantite;
        }
        return $prixTotal;
    }
}