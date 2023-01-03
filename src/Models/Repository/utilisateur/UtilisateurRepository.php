<?php

namespace App\Models\Repository\utilisateur;

use App\Models\DataObject\utilisateur\Utilisateur;
use App\Models\Repository\AbstractRepository;
use App\Models\Repository\DatabaseConnection;
use PDOException;

class UtilisateurRepository extends AbstractRepository
{

    protected function getNomTable(): string
    {
        return "Utilisateur";
    }

    protected function getNomClePrimaire(): string
    {
        return "email";
    }

    protected function getNomColonnes(): array
    {
        return array('nom', 'prenom', 'motdepasse', 'telephone', 'email', 'id_role', 'email_a_verifier', 'nonce');
    }

    protected function builder(array $objetFormatTableau): Utilisateur
    {
        return new Utilisateur(
            $objetFormatTableau['nom'],
            $objetFormatTableau['prenom'],
            $objetFormatTableau['motdepasse'],
            $objetFormatTableau['telephone'],
            $objetFormatTableau['email'],
            $objetFormatTableau['id_role'],
            $objetFormatTableau['email_a_valider'],
            $objetFormatTableau['nonce'],
        );
    }
}