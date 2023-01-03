<?php

namespace App\Models\Repository\commande;

use App\Models\DataObject\commande\LigneCommande;
use App\Models\Repository\AbstractRepository;
use App\Models\Repository\DatabaseConnection;
use PDOException;

class LigneCommandeRepository extends AbstractRepository
{

    protected function getNomTable(): string
    {
        return "ligneCommande";
    }

    protected function getNomClePrimaire(): string
    {
        return "id";
    }

    protected function getNomColonnes(): array
    {
        return array("id_produit", "quantite", "id_commande", "id");
    }

    protected function builder(array $objetFormatTableau): LigneCommande
    {
        return new LigneCommande(
            $objetFormatTableau["id"],
            $objetFormatTableau["id_produit"],
            $objetFormatTableau["quantite"],
            $objetFormatTableau["id_commande"]
        );
    }

    public function selectAllWithIdCommande($idCommande): \ArrayObject
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM ligneCommande WHERE id_commande = ?');
            $request->execute(array($idCommande));
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