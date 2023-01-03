<?php

namespace App\Models\Repository\utilisateur;

use App\Models\DataObject\utilisateur\Role;
use App\Models\Repository\AbstractRepository;

class RoleRepository extends AbstractRepository
{

    protected function getNomTable(): string
    {
        return "role";
    }

    protected function getNomClePrimaire(): string
    {
        return "id";
    }

    protected function getNomColonnes(): array
    {
        return array("id", "nom");
    }

    protected function builder(array $objetFormatTableau)
    {
        return new Role(
            $objetFormatTableau["id"],
            $objetFormatTableau["nom"]
        );
    }
}