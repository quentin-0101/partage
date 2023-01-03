<?php

namespace App\Models\Repository\categorie;

use App\Models\DataObject\categorie\CategoriePrincipale;
use App\Models\Repository\DatabaseConnection;
use PDOException;

class CategoriePrincipaleRepository extends \App\Models\Repository\AbstractRepository
{

    protected function getNomTable(): string
    {
        return "categoriePrincipale";
    }

    protected function getNomClePrimaire(): string
    {
        return "id";
    }

    protected function getNomColonnes(): array
    {
        return array("nom", "description", "id");
    }

    protected function builder(array $objetFormatTableau): CategoriePrincipale
    {
        return new CategoriePrincipale(
            $objetFormatTableau["nom"],
            $objetFormatTableau["description"],
            $objetFormatTableau["id"]
        );
    }

    public function selectCategorieProduitWithCategorieProduitId($id): object
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM categoriePrincipale WHERE id = ?');
            $request->execute(array($id));
            $res = $request->fetchAll();

        } catch (PDOException $e){
            echo $e->getMessage();
        }

        return $this->builder($res[0]);
    }


}