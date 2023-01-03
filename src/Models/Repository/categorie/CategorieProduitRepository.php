<?php

namespace App\Models\Repository\categorie;

use App\Models\DataObject\categorie\CategorieProduit;
use App\Models\Repository\AbstractRepository;
use App\Models\Repository\DatabaseConnection;
use PDOException;

class CategorieProduitRepository extends AbstractRepository
{

    protected function getNomTable(): string
    {
        return "categorieProduit";
    }

    protected function getNomClePrimaire(): string
    {
        return "id";
    }

    protected function getNomColonnes(): array
    {
        return array("id", "nom", "description", "id_categorie_principale");
    }

    protected function builder(array $objetFormatTableau): CategorieProduit
    {
        return new CategorieProduit(
            $objetFormatTableau["id"],
            $objetFormatTableau["nom"],
            $objetFormatTableau["description"],
            $objetFormatTableau["id_categorie_principale"]
        );
    }

    public function selectAllCategorieProduitWithId($id): \ArrayObject
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM categorieProduit WHERE id_categorie_principale = ?');
            $request->execute(array($id));
            $res = $request->fetchAll();

        } catch (PDOException $e){
            echo $e->getMessage();
        }
        $test = new \ArrayObject();
        foreach ($res as $u){
            $test->append($this->builder($u));
            //$utilisateurLivraison[] = $this->builder($u);
        }
        return $test;
    }
}