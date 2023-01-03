<?php

namespace App\Models\Repository\produit;

use App\Models\DataObject\produit\ProduitSpecification;
use App\Models\Repository\DatabaseConnection;
use PDOException;

class ProduitSpecificationRepository extends \App\Models\Repository\AbstractRepository
{

    protected function getNomTable(): string
    {
        return "produitSpecification";
    }

    protected function getNomClePrimaire(): string
    {
        return "id";
    }

    protected function getNomColonnes(): array
    {
        return array("id", "nom", "id_produit");
    }

    protected function builder(array $objetFormatTableau) : ProduitSpecification
    {
        return new ProduitSpecification(
            $objetFormatTableau['id'],
            $objetFormatTableau['nom'],
            $objetFormatTableau['id_produit']
        );
    }

    public function selectAllWithIdProduit($idProduit): \ArrayObject
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM produitSpecification WHERE id_produit = ?');
            $request->execute(array($idProduit));
            $res = $request->fetchAll();

        } catch (PDOException $e){
            echo $e->getMessage();
        }
        // $utilisateurLivraison = [];
        $test = new \ArrayObject();
        foreach ($res as $u){
            $test->append($this->builder($u));
            //$utilisateurLivraison[] = $this->builder($u);
        }
        return $test;
    }
}