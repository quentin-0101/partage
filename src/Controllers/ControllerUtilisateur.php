<?php

namespace App\Controllers;

use App\Form\utilisateur\LoginForm;
use App\Form\utilisateur\NonceForm;
use App\Form\utilisateur\RegisterForm;
use App\Models\DataObject\utilisateur\Utilisateur;
use App\Models\Lib\ConnexionUtilisateur;
use App\Models\Lib\EnvoiEmail;
use App\Models\Lib\MessageFlash;
use App\Models\Lib\MotDePasse;
use App\Models\Lib\VerificationEmail;
use App\Models\Repository\utilisateur\UtilisateurRepository;

class ControllerUtilisateur extends Controller
{

    // -----------------  LOGIN ----------------------------------------------------------------------------------------

    public static function connect() : void
    {
        define( 'MEMORY_LIMIT', '256M' );

       // var_dump(ConnexionUtilisateur::getLoginUtilisateurConnecte());
        if(LoginForm::isValid()){
            $user = LoginForm::getResult();
            $test = (new UtilisateurRepository())->select($user->getEmail());
            if($test != null){
                $userBD = Utilisateur::getInstance($test);

                if(!VerificationEmail::aValideEmail($user)){
                    MessageFlash::ajouter("warning", "veuillez activer votre email");
                }
                else if(MotDePasse::verifier($user->getMotDePasse(), $userBD->getMotDePasse())){
                    if(ConnexionUtilisateur::estConnecte()) ConnexionUtilisateur::deconnecter();

                   // var_dump(ConnexionUtilisateur::estConnecte());
                    ConnexionUtilisateur::connecter($user->getEmail());
                   // ConnexionUtilisateur::connecter($user->getEmail());

                    ControllerMain::index();
                    return;
                } else {
                    MessageFlash::ajouter("warning", "mauvais mot de passe");
                }
            } else {
                MessageFlash::ajouter("warning", "mauvais email");
            }
        }

        else if(ConnexionUtilisateur::estConnecte() && !ConnexionUtilisateur::estAnonyme()){
            if(self::getRole()->estGestionnaire()) self::render("ControllerUtilisateur/gestionnaire/index.php", []);
            else ControllerMain::index();
            return;
        } else {
            MessageFlash::ajouter("error", "invalid credentials");
        }

        self::render("ControllerUtilisateur/login/login.php", []);
    }

    public static function disconnect() : void
    {
        if(ConnexionUtilisateur::estConnecte())  {
            ConnexionUtilisateur::deconnecter();
            ConnexionUtilisateur::connecter(ConnexionUtilisateur::$cleAnonyme);
        }

        ControllerMain::index();
    }

    public static function forgot_password($error = false) : void
    {

        if(isset($_POST['email']) && !isset($_POST['nonce'])){
            $email = htmlspecialchars($_POST['email']);

            $user = (new UtilisateurRepository())->select($email);
            if($user == null) MessageFlash::ajouter('warning', 'cet email ne possède pas de compte');
            else {
                $nonce = MotDePasse::genererChaineAleatoire(32);
                $mail = new EnvoiEmail();
                $mail->sendMail($email, $nonce);
                $user = Utilisateur::getInstance($user);
                $user->setNonce($nonce);
                (new UtilisateurRepository())->update($user, $user->getEmail());

                MessageFlash::ajouter('warning', "un mail vient d'être envoyé");

                self::render('ControllerUtilisateur/user/forgot_password_nonce.php', [
                    'email' => $user->getEmail()
                ]);
                return;
            }
        } else if(isset($_POST['email']) && isset($_POST['nonce'])){
            $email = htmlspecialchars($_POST['email']);
            $nonce = htmlspecialchars($_POST['nonce']);

            $user = (new UtilisateurRepository())->select($email);
            if($user == null) {
                MessageFlash::ajouter('warning', 'ce nonce est invalide');
                self::render('ControllerUtilisateur/user/forgot_password_nonce.php', []);
                return;
            }
            else if(isset($_POST['password']) && isset($_POST['password2'])) {
                $user = Utilisateur::getInstance($user);
                if($nonce == $user->getNonce()){
                    $password = htmlspecialchars($_POST['password']);
                    $password2 = htmlspecialchars($_POST['password2']);

                    if(strcmp($password, $password2) == 0){
                        $pass = MotDePasse::hacher($password);
                        $user->setMotDePasse($pass);
                        (new UtilisateurRepository())->update($user, $user->getEmail());
                        MessageFlash::ajouter('info', 'le mot de passe à été mis à jour');
                        self::account();
                        return;
                    } else {
                        MessageFlash::ajouter('info', 'les mots de passes sont différents');
                        self::render('ControllerUtilisateur/user/forgot_password_nonce.php', [
                            'email' => $user->getEmail(),
                            'nonce' => $user->getNonce()
                        ]);
                        return;
                    }
                }
            } else {
                $user = self::getUser();
                MessageFlash::ajouter('info', 'veuillez entrer un mot de passe valide');
                self::render('ControllerUtilisateur/user/forgot_password_nonce.php', [
                    'email' => $user->getEmail(),
                    'nonce' => $user->getNonce()
                ]);
                return;
            }
        }

        self::render('ControllerUtilisateur/user/forgot_password.php', []);

    }

    // -----------------  REGISTER ----------------------------------------------------------------------------------------

    public static function register($user = null) : void
    {
        if(RegisterForm::isValid() && $user == null){
            $user = RegisterForm::getResult();
            $user->setNonce(MotDePasse::genererChaineAleatoire(32));

            if(RegisterForm::isEqualsPasswords()){
                $user->setMotDePasse(MotDePasse::hacher($user->getMotDePasse())); // hash
                $test = (new UtilisateurRepository())->create($user); // sauvegarde
                if($test){
                    VerificationEmail::envoiEmailValidation($user);
                    MessageFlash::ajouter('info', "un mail de vérification à été envoyé à l'adresse : ".$user->getEmail());

                    self::render("ControllerUtilisateur/login/login.php", [
                        "user" => $user
                    ]);
                } else {
                    MessageFlash::ajouter("danger", "cet email possède déjà un compte !");
                    self::register($user);
                }

            } else {
                MessageFlash::ajouter("danger", "Mots de passe distincts");
                self::register($user);
            }
        }
        else{
            if($user == null){
                $user = RegisterForm::getInvalidInformation();
                MessageFlash::ajouter("warning", "veuillez rentrer toutes les informations demandées");
            }
            self::render("ControllerUtilisateur/login/form_register.php", [
                "user" => $user
            ]);
        }
    }

    public static function validateEmail() : void
    {
        if(ConnexionUtilisateur::estAnonyme()) {
            ControllerUtilisateur::connect();
            return;
        }

        // créér formulaire email et nonce

        if(NonceForm::isValid()){
            $user = NonceForm::getResult();
            $test = VerificationEmail::traiterEmailValidation($user->getEmail(), $user->getNonce());
            if($test){
                ConnexionUtilisateur::connecter($user->getEmail()); // connexion session
                ControllerMain::index(); // redirection vers page principale
                return;
            } else {
                MessageFlash::ajouter("error", "Erreur : impossible de valider le compte");
            }
        }
        self::render("ControllerUtilisateur/login/form_valid_nonce.php", []);
        // formulaire non valide

    }


    // -----------------  USER ----------------------------------------------------------------------------------------

    public static function account(){
        var_dump(ConnexionUtilisateur::getLoginUtilisateurConnecte());

        if(ConnexionUtilisateur::estAnonyme()) {
            ControllerUtilisateur::connect();
            return;
        }
        $user = (new UtilisateurRepository())->select(ConnexionUtilisateur::getLoginUtilisateurConnecte());
        if($user == null){
            ControllerUtilisateur::connect();
            return;
        }
        //var_dump(ConnexionUtilisateur::getLoginUtilisateurConnecte());

        self::render("ControllerUtilisateur/user/dashboard.php", [
            "dashboard" => true,
            "user" => $user,
            "login" => ConnexionUtilisateur::estConnecte()
        ]);
    }

    public static function account_info(){
        if(ConnexionUtilisateur::estAnonyme()) {
            ControllerUtilisateur::connect();
            return;
        }
        self::render("ControllerUtilisateur/user/account_info.php", [
            "user" => self::getUser(),
            "login" => ConnexionUtilisateur::estConnecte()
        ]);
    }

    public static function account_info_updated(){
        if(ConnexionUtilisateur::estAnonyme()) {
            ControllerUtilisateur::connect();
            return;
        }
        $user = self::getUser();

        $verif = false;

        if(RegisterForm::isUpdateNom()) {
            $user->setNom(RegisterForm::getNom());
            $verif = true;
        }
        if(RegisterForm::isUpdatePrenom()){
            $user->setPrenom(RegisterForm::getPrenom());
            $verif = true;
        }

        if(RegisterForm::isUpdateMotDePasse()){
            if(RegisterForm::isEqualsPasswords()){
                $pass = RegisterForm::getMotDePasse();
                if(MotDePasse::verifier($pass[0], self::getUser()->getMotDePasse())){
                    $hash = MotDePasse::hacher($pass[1]);
                    $user->setMotDePasse($hash);
                } else {
                    $verif = false;
                    MessageFlash::ajouter("danger", "mauvais mot de passe");
                }
            } else {
                $verif = false;
                MessageFlash::ajouter("danger", "Les mots de passes sont différents");
            }
        }
        if($verif) {
            $test = (new UtilisateurRepository())->update($user, $user->getEmail());
            if($test) MessageFlash::ajouter("success", "les modifications ont bien été effectuées");
        }

        self::render("ControllerUtilisateur/user/account_info.php", [
            "user" => self::getUser(),
            "login" => ConnexionUtilisateur::estConnecte()
        ]);
    }
}