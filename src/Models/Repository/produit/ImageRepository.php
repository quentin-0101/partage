<?php

namespace App\Models\Repository\produit;

use App\Models\DataObject\produit\Image;
use App\Models\Repository\AbstractRepository;
use App\Models\Repository\DatabaseConnection;
use PDOException;

class ImageRepository extends AbstractRepository
{

    protected function getNomTable(): string
    {
        return "image";
    }

    protected function getNomClePrimaire(): string
    {
        return "id";
    }

    protected function getNomColonnes(): array
    {
        return array("id", "file", "id_produit");
    }

    protected function builder(array $objetFormatTableau) : Image
    {
        return new Image(
            $objetFormatTableau['id'],
            $objetFormatTableau['file'],
            $objetFormatTableau['id_produit']
        );
    }
    public function selectAllWithIdProduit($idProduit): \ArrayObject
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM image WHERE id_produit = ?');
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