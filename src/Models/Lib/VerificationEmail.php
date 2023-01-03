<?php

namespace App\Models\Lib;

use App\Config\Conf;
use App\Models\DataObject\utilisateur\Utilisateur;
use App\Models\Repository\utilisateur\UtilisateurRepository;

class VerificationEmail
{
    public static function envoiEmailValidation(Utilisateur $utilisateur): void
    {
        $loginURL = rawurlencode($utilisateur->getEmail());
        $nonceURL = rawurlencode($utilisateur->getNonce());
        $absoluteURL = Conf::getAbsoluteURL();
        $lienValidationEmail = "$absoluteURL?action=validateEmail&controller=utilisateur&login=$loginURL&nonce=$nonceURL";
        $corpsEmail = "<a href=\"$lienValidationEmail\">Validation</a>";

        // Temporairement avant d'envoyer un vrai mail
       // MessageFlash::ajouter("success", $corpsEmail);

        $mailer = new EnvoiEmail();
        $mailer->sendMail($utilisateur->getEmail(), $corpsEmail);
    }

    public static function traiterEmailValidation($login, $nonce): bool
    {
        $userBD = Utilisateur::getInstance((new UtilisateurRepository())->select($login));
        if($userBD->getNonce() == $nonce) {
            $userBD->setEmailAValider(0);
            (new UtilisateurRepository())->update($userBD, $userBD->getEmail());
            return true;
        }
        return false;
    }

    public static function aValideEmail(Utilisateur $utilisateur) : bool
    {
        return $utilisateur->getEmailAValider() == 0;
    }
}