<?php

namespace App\Controllers;

use App\Form\commande\VisiteurCommandeForm;
use App\Models\DataObject\commande\Commande;
use App\Models\DataObject\commande\CommandeVisiteur;
use App\Models\DataObject\commande\LigneCommande;
use App\Models\DataObject\commande\LigneCommandeVisiteur;
use App\Models\DataObject\produit\Produit;
use App\Models\DataObject\utilisateur\Utilisateur;
use App\Models\DataObject\utilisateur\UtilisateurLivraison;
use App\Models\DataObject\utilisateur\VisiteurCommande;
use App\Models\Http\Session;
use App\Models\Lib\ConnexionUtilisateur;
use App\Models\Lib\EnvoiEmail;
use App\Models\Lib\MessageFlash;
use App\Models\Lib\Panier;
use App\Models\Repository\commande\CommandeRepository;
use App\Models\Repository\commande\CommandeVisiteurRepository;
use App\Models\Repository\commande\LigneCommandeRepository;
use App\Models\Repository\commande\LigneCommandeVisiteurRepository;
use App\Models\Repository\commande\PaysRepository;
use App\Models\Repository\produit\ProduitRepository;
use App\Models\Repository\utilisateur\UtilisateurLivraisonRepository;
use App\Models\Repository\utilisateur\UtilisateurRepository;
use App\Models\Repository\utilisateur\VisiteurCommandeRepository;
use App\Service\livraison\LaPoste;
use App\Service\livraison\UPS;
use App\Service\livraison\VHL;
use Exception;

class ControllerCommande extends Controller
{
    public static function account_orders() : void
    {
        if(ConnexionUtilisateur::estAnonyme()) {
            ControllerUtilisateur::connect();
            return;
        }

        $user = self::getUser();
        // select tous les commandes faites par l'utilisateur
        // select tous les articles par commandes pour demander prix et claculer résultats
        $allCommandes = (new CommandeRepository())->selectAllWithIdUtilisateur(ConnexionUtilisateur::getLoginUtilisateurConnecte());

        self::render("ControllerCommande/account_orders.php", [
            "user" => $user,
            "login" => ConnexionUtilisateur::estConnecte(),
            "commandes" => $allCommandes
        ]);
    }

    // rawencode pour les liens $get
    public static function order_details() : void
    {
        if(ConnexionUtilisateur::estAnonyme()) {
            ControllerUtilisateur::connect();
            return;
        }

        $user = self::getUser();

        $id = htmlspecialchars($_GET["id"]);
        $commande = Commande::getInstance((new CommandeRepository())->select($id));
        if(ConnexionUtilisateur::getLoginUtilisateurConnecte() != $commande->getIdUtilisateur()){
            throw new Exception("non autorisé");
        }
        $lignesCommandes = (new LigneCommandeRepository())->selectAllWithIdCommande($commande->getId());

        $prix = 0;
        $produits = [];
        foreach($lignesCommandes as $l){
            $p = (new ProduitRepository())->select($l->getIdProduit());
            $produits[] = $p;
            $prix = $prix + $p->getPrix() * $l->getQuantite();
        }

        $livraison = (new UtilisateurLivraisonRepository())->select($commande->getIdLivraison());

        self::render("ControllerCommande/order_details.php", [
            "user" => $user,
            "login" => ConnexionUtilisateur::estConnecte(),
            "lignesCommandes" => $lignesCommandes,
            "produits" => $produits,
            "prix" => $prix,
            "livraison" => $livraison,
            "dashboard" => false,
            "prixLivraison" => $commande->getPrix() - $prix,
            "prixTotal" => $commande->getPrix(),
            "commande" => $commande
        ]);
        // récupérer les produits qui appartiennent à ligne commandes
    }

    public static function cart() : void
    {
        if(ConnexionUtilisateur::estAnonyme()) {
            ControllerUtilisateur::connect();
            return;
        }

        self::render("ControllerCommande/cart.php", [
            "user" => self::getUser(),
            "login" => ConnexionUtilisateur::estConnecte(),
            "tabCategoriePrincipale" => ControllerMain::getAllCategories(),
            "nbProduits" => Panier::getNombreProduit(),
            "produitsPanier" => Panier::lirePanier(),
            "prixTotal" => Panier::getPrixTotal()
        ]);
    }

    public static function checkout($error = false) : void
    {
        $adresses = array();
        $default = null;
        if(ConnexionUtilisateur::estConnecte() && !ConnexionUtilisateur::estAnonyme()){
            $default = (new UtilisateurLivraisonRepository())->selectDefault(ConnexionUtilisateur::getLoginUtilisateurConnecte());
            if(!is_null($default)) $adresses = (new UtilisateurLivraisonRepository())->selectAllWithIdUtilisateurAndDifferentByDefault(ConnexionUtilisateur::getLoginUtilisateurConnecte(), $default->getId());
        }

       // var_dump(ConnexionUtilisateur::estAnonyme());
       // var_dump(VisiteurCommandeForm::isValid());
     //   var_dump(VisiteurCommandeForm::getResult());

        if(ConnexionUtilisateur::estAnonyme() && VisiteurCommandeForm::isValid()){
            $object = VisiteurCommandeForm::getResult();
            (new VisiteurCommandeRepository())->create($object);
            $objectBD = (new VisiteurCommandeRepository())->selectLastWithNomEtPrenom($object->getNom(), $object->getPrenom());
            Session::getInstance()->enregistrer('addr', $objectBD->getId());
            self::checkout2();
            return;

            // refaire sans le idCommande  => VisiteurCommandeRepository
        }

        if(isset($_POST['address']) && !$error){
            $id = htmlspecialchars($_POST['address']);
            $addr = (new UtilisateurLivraisonRepository())->select($id);
            if(isset($addr)){
                $addr = UtilisateurLivraison::getInstance($addr);
                if(ConnexionUtilisateur::getLoginUtilisateurConnecte() != $addr->getIdUtilisateur()){
                    self::checkout(true);
                    return;
                }
            }
            Session::getInstance()->enregistrer('addr', $id);
           // $addr = (new UtilisateurLivraisonRepository())->select($id);
            self::checkout2();
            return;
        }




        self::render("ControllerCommande/checkout/shipping_adress.php", [
            "user" => ConnexionUtilisateur::estAnonyme() ? null : self::getUser(),
            "login" => !ConnexionUtilisateur::estAnonyme(),
            "tabCategoriePrincipale" => ControllerMain::getAllCategories(),
            "nbProduits" => Panier::getNombreProduit(),
            "produitsPanier" => Panier::lirePanier(),
            "prixTotal" => Panier::getPrixTotal(),
            "adresses" => $adresses,
            "adresseDefault" => $default,
            "listPays" => (new PaysRepository())->selectAll(),
        ]);
    }

    public static function getPrixLivraison() : array
    {
        $livraisons = [];
        $livraisons['La Poste (Domicile)'] = [self::calculer(Panier::getPoidsPanier(), LaPoste::getPrix()), LaPoste::getDelais()];
        $livraisons['UPS (Domicile)'] = [self::calculer(Panier::getPoidsPanier(), UPS::getPrix()), UPS::getDelais()];
        $livraisons['VHL (Domicile)'] = [self::calculer(Panier::getPoidsPanier(), VHL::getPrix()), VHL::getDelais()];
        return $livraisons;
    }

    public static function checkout2($error = false) : void
    {

        if(isset($_POST['service']) && !$error){
            $idService = htmlspecialchars($_POST['service']); // 0 - 1 - 2
            $idService = (int) $idService;

            if($idService == 0 || $idService == 1 || $idService == 2){
                Session::getInstance()->enregistrer('service', $idService);
                self::checkout3();
            } else {
               // var_dump($idService);
               // echo $idService;
                self::checkout2(true);
            }
            return;
        }

        if(ConnexionUtilisateur::estConnecte()){
            $livraisons = self::getPrixLivraison();
        }

        self::render("ControllerCommande/checkout/livraison.php", [
            "user" => ConnexionUtilisateur::estAnonyme() ? null : self::getUser(),
            "login" => !ConnexionUtilisateur::estAnonyme(),
            "tabCategoriePrincipale" => ControllerMain::getAllCategories(),
            "nbProduits" => Panier::getNombreProduit(),
            "produitsPanier" => Panier::lirePanier(),
            "prixTotal" => Panier::getPrixTotal(),
            "livraisons" => $livraisons,
        ]);
    }

    public static function checkout3() : void
    {
        if(Session::getInstance()->contient('addr') && Session::getInstance()->contient('service')){
            $addr = Session::getInstance()->lire('addr');
            $service = Session::getInstance()->lire('service');

            if(ConnexionUtilisateur::estAnonyme()){
                $adresse = VisiteurCommande::getInstance((new VisiteurCommandeRepository())->select($addr))->getAdressePostale();
            } else {
                $adresse = UtilisateurLivraison::getInstance((new UtilisateurLivraisonRepository())->select($addr))->getAdresse();
            }


            $livraison = self::getPrixLivraison();

            $prix = 0;
            $delais = 0;

            $count = 0;
            foreach ($livraison as $cle => $value){
                if($service == $count){
                    $prix = $value[0];
                    $delais = $value[1];
                    $service = $cle;
                    break;
                }
                $count++;
            }

            $prixTotal = Panier::getPrixTotal() + $prix;

            Session::getInstance()->enregistrer('prixTotal', $prixTotal);

            self::render("ControllerCommande/checkout/checkout_3.php", [
                "user" => ConnexionUtilisateur::estAnonyme() ? null : self::getUser(),
                "login" => !ConnexionUtilisateur::estAnonyme(),
                "tabCategoriePrincipale" => ControllerMain::getAllCategories(),
                "nbProduits" => Panier::getNombreProduit(),
                "produitsPanier" => Panier::lirePanier(),
                "prixTotal" => $prixTotal,
                "livraisonPrix" => $prix,
                "delais" => $delais,
                "service" => $service,
                "adresse" => $adresse
            ]);
        }
    }

    public static function commander() : void
    {



        if(ConnexionUtilisateur::estConnecte()){
            $panier = Panier::lirePanier();
        }

        $prixTotal = Session::getInstance()->lire('prixTotal');

        if(ConnexionUtilisateur::estAnonyme()){
            $addr = Session::getInstance()->lire('addr');
            $idVisiteur = VisiteurCommande::getInstance((new VisiteurCommandeRepository())->select($addr));
            $commande = new CommandeVisiteur(0, $idVisiteur->getId(), date('d-m-y'), 'en cours de préparation', $prixTotal);
            (new CommandeVisiteurRepository())->create($commande);
            $idCommandeO = (new CommandeVisiteurRepository())->selectLastWithIdVisiteur($idVisiteur->getId());
            (new VisiteurCommandeRepository())->update($idVisiteur, $idVisiteur->getId());


            $nom = $idVisiteur->getNom();
            $prenom = $idVisiteur->getPrenom();
            $adresse = $idVisiteur->getAdressePostale().' '.$idVisiteur->getCodePostale().' '.$idVisiteur->getVille();
            $idCommande = $idCommandeO->getId();
            $email = $idVisiteur->getEmail();

        } else {
            $commande = new Commande(0, ConnexionUtilisateur::getLoginUtilisateurConnecte(), date('d-m-y'), 'en cours de préparation', $prixTotal, Session::getInstance()->lire('addr'));
            (new CommandeRepository())->create($commande);
            $commande = (new CommandeRepository())->selectLastWithIdUtilisateur(ConnexionUtilisateur::getLoginUtilisateurConnecte());


            $nom = self::getUser()->getNom();
            $prenom = self::getUser()->getPrenom();
            $email = self::getUser()->getEmail();

            $addr = (new UtilisateurLivraisonRepository())->select(Session::getInstance()->lire('addr'));
            $addr = UtilisateurLivraison::getInstance($addr);
            $adresse = $addr->getAdresse().' '.$addr->getCodePostal().' '.$addr->getVille();
            $idCommande = $commande->getId();
        }

        $produitsEmail = "";

        foreach ($panier as $produit){

            $produitBD = Produit::getInstance((new ProduitRepository())->select($produit->getId()));
            $produitBD->setQuantite($produitBD->getQuantite() - Panier::getQuantite($produit->getId()));
            (new ProduitRepository())->update($produitBD, $produitBD->getId());

            $produitsEmail = $produitsEmail."<br> NOM : ".$produitBD->getNom()."<br> QTY : ".Panier::getQuantite($produitBD->getId())."<br> prix : ".$produitBD->getPrix() * Panier::getQuantite($produitBD->getId())." <br>";

            if(ConnexionUtilisateur::estAnonyme()){
                $ligneCommande = new LigneCommandeVisiteur(0, $produit->getId(), Panier::getQuantite($produit->getId()), $commande->getId());
                echo (new LigneCommandeVisiteurRepository())->create($ligneCommande);
            } else {
                $ligneCommande = new LigneCommande(0, $produit->getId(), $produit->getQuantite(), $commande->getId());
                echo (new LigneCommandeRepository())->create($ligneCommande);

            }


        //    var_dump($ligneCommande);
            $ligneCommande->getId();
        }

        $sendMail = new EnvoiEmail();

        $emailContent = $nom." <br> ".$prenom." <br> ".$adresse." <br> id commande :".$idCommande." <br>".$produitsEmail;
        $sendMail->sendMail($email, $emailContent);

        Panier::vider();
        MessageFlash::ajouter('info', "la commande à bien été prise en compte");

        if(ConnexionUtilisateur::estAnonyme()){
            echo "commande passée : une confirmation à été enovyé par email";
        } else {
            self::account_orders();
        }



    }



    public static function calculer($poidsCommande, array $tarifs) : float
    {
        foreach ($tarifs as $poids => $prix){
            if($poids > $poidsCommande){
                return $prix;
            }
        }
        return 0;
    }



    public static function coupon() : void
    {
        if(isset($_POST['code'])) // foormulaire reçu
        {

        }
    }
}