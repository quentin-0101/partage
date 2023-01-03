<?php

namespace App\Models\Repository\utilisateur;

use App\Models\DataObject\utilisateur\UtilisateurPayement;
use App\Models\Repository\AbstractRepository;

class UtilisateurPayementRepository extends AbstractRepository
{

    protected function getNomTable(): string
    {
        return "UtilisateurPayement";
    }

    protected function getNomClePrimaire(): string
    {
        return "id";
    }

    protected function getNomColonnes(): array
    {
        return array("type_payement", "numero_compte", "expiration", "proprietaire", "id", "id_utilisateur");
    }

    protected function builder(array $objetFormatTableau) : UtilisateurPayement
    {
        return new UtilisateurPayement(
            $objetFormatTableau['type_payement'],
            $objetFormatTableau['numero_compte'],
            $objetFormatTableau['expiration'],
            $objetFormatTableau['proprietaire'],
            $objetFormatTableau['id'],
            $objetFormatTableau['id_utilisateur']
        );
    }
}