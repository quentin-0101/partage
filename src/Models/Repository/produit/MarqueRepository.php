<?php

namespace App\Models\Repository\produit;

use App\Models\DataObject\produit\Marque;
use App\Models\Repository\AbstractRepository;

class MarqueRepository extends AbstractRepository
{

    protected function getNomTable(): string
    {
        return "marque";
    }

    protected function getNomClePrimaire(): string
    {
        return "id";
    }

    protected function getNomColonnes(): array
    {
        return array("id", "nom");
    }

    protected function builder(array $objetFormatTableau): Marque
    {
        return new Marque(
            $objetFormatTableau["id"],
            $objetFormatTableau["nom"]
        );
    }
}