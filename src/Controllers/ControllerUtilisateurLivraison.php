<?php

namespace App\Controllers;

use App\Form\livraison\LivraisonUtilisateurForm;
use App\Models\DataObject\utilisateur\Pays;
use App\Models\DataObject\utilisateur\Utilisateur;
use App\Models\DataObject\utilisateur\UtilisateurLivraison;
use App\Models\Lib\ConnexionUtilisateur;
use App\Models\Lib\MessageFlash;
use App\Models\Repository\commande\PaysRepository;
use App\Models\Repository\utilisateur\UtilisateurLivraisonRepository;

class ControllerUtilisateurLivraison extends Controller
{
    public static function account_address() : void
    {
        if(!ConnexionUtilisateur::estConnecte()){
            ControllerUtilisateur::connect();
            return;
        }

        $user = self::getUser();

        $default = (new UtilisateurLivraisonRepository())->selectDefault($user->getEmail());

        if($default == null){
            MessageFlash::ajouter("warning", "veuillez ajouter une adresse");
        }

        if($default != null){
            $allUtilisateurLivraison = (new UtilisateurLivraisonRepository())->selectAllWithIdUtilisateurAndDifferentByDefault($user->getEmail(), $default->getId());
        }
        else {
            $allUtilisateurLivraison = new \ArrayObject();
        }
        self::render("ControllerUtilisateurLivraison/account_address.php", [
            "user" => $user,
            "login" => ConnexionUtilisateur::estConnecte(),
            "livraisons" => $allUtilisateurLivraison,
            "default" => $default,
            "count" => $allUtilisateurLivraison->count() + 1
        ]);
    }


    public static function account_new_address($adresseLivraison = null){
        if(!ConnexionUtilisateur::estConnecte()) ControllerUtilisateur::connect();

        if(isset($_GET['id']) && $adresseLivraison == null){
            $id = htmlspecialchars(rawurldecode($_GET["id"]));
            $adresseLivraison = UtilisateurLivraison::getInstance((new UtilisateurLivraisonRepository())->select($id));
        }

        self::render("ControllerUtilisateurLivraison/account_new_address.php", [
            "user" => self::getUser(),
            "login" => ConnexionUtilisateur::estConnecte(),
            "listPays" => (new PaysRepository())->selectAll(),
            "livraison" => $adresseLivraison,
        ]);
    }

    public static function account_new_address_valid()
    {
        if(!ConnexionUtilisateur::estConnecte()) ControllerUtilisateur::connect();

        if(LivraisonUtilisateurForm::isValid()){
            $livraison = LivraisonUtilisateurForm::getResult();

            if(LivraisonUtilisateurForm::isUpdate()){
                $livraisonBD = UtilisateurLivraison::getInstance((new UtilisateurLivraisonRepository())->select(LivraisonUtilisateurForm::getUpdate()));
                $livraison->setId($livraisonBD->getId());
                $livraison->setIdUtilisateur(Controller::getUser()->getEmail());
                $livraison->setAdresseDefault($livraisonBD->getAdresseDefault());

                if(LivraisonUtilisateurForm::isDefault()){
                    $lastDefaultLivraison = (new UtilisateurLivraisonRepository())->selectDefault(ConnexionUtilisateur::getLoginUtilisateurConnecte());
                    $lastDefaultLivraison->setAdresseDefault(0);
                    (new UtilisateurLivraisonRepository())->update($lastDefaultLivraison, $lastDefaultLivraison->getId());
                    $livraison->setAdresseDefault(1);
                }
                (new UtilisateurLivraisonRepository())->update($livraison, $livraison->getId());
            } else {

                // compte les livraisons par défaults
                $nb = (new UtilisateurLivraisonRepository())->countAllWithIdUtilisateur(ConnexionUtilisateur::getLoginUtilisateurConnecte());
                // si il y en a aucune, on la met automatiquement par default
                if($nb == 0) $livraison->setAdresseDefault(1);

                // test si le pays est bien connu
                $test = (new PaysRepository())->contain($livraison->getIdPays());
                if($test){
                    // on enlève l'ancienne livraison par default si nécessaire
                    if(LivraisonUtilisateurForm::isDefault()){
                        $lastDefaultLivraison = (new UtilisateurLivraisonRepository())->selectDefault(ConnexionUtilisateur::getLoginUtilisateurConnecte());
                        $lastDefaultLivraison->setAdresseDefault(0);
                        (new UtilisateurLivraisonRepository())->update($lastDefaultLivraison, $lastDefaultLivraison->getId());
                        $livraison->setAdresseDefault(1); // on met la nouvelle par défault
                    }
                    (new UtilisateurLivraisonRepository())->create($livraison);
                } else {
                    MessageFlash::ajouter("danger", "ce pays n'existe pas");
                    $livraisonError = LivraisonUtilisateurForm::getInvalidInformation();
                    self::account_new_address($livraisonError);
                }
            }
            self::account_address();
        } else {
            $livraisonError = LivraisonUtilisateurForm::getInvalidInformation();
            MessageFlash::ajouter("danger", "veuillez remplir les champs obligatoires");
            self::account_new_address($livraisonError);
        }

    }


}