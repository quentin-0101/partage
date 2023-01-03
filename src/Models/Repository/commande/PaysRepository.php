<?php

namespace App\Models\Repository\commande;

use App\Models\DataObject\utilisateur\Pays;

class PaysRepository extends \App\Models\Repository\AbstractRepository
{

    protected function getNomTable(): string
    {
        return "pays";
    }

    protected function getNomClePrimaire(): string
    {
        return "nom";
    }

    protected function getNomColonnes(): array
    {
        return array("nom");
    }

    protected function builder(array $objetFormatTableau): Pays
    {
        return new Pays($objetFormatTableau["nom"]);
    }

    public function contain($name) : bool
    {
        $listPays = (new PaysRepository())->selectAll();
        foreach ($listPays as $pays){
            if($pays->getNom() == $name){
                return true;
            }
        }
        return false;
    }
}