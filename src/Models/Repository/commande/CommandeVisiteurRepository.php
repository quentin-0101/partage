<?php

namespace App\Models\Repository\commande;

use App\Models\DataObject\commande\CommandeVisiteur;
use App\Models\DataObject\utilisateur\VisiteurCommande;
use App\Models\Repository\AbstractRepository;
use App\Models\Repository\DatabaseConnection;

class CommandeVisiteurRepository extends AbstractRepository
{

    protected function getNomTable(): string
    {
        return "commandeVisiteur";
    }

    protected function getNomClePrimaire(): string
    {
        return "id";
    }

    protected function getNomColonnes(): array
    {
        return array("id", "id_visiteur", "date_", "status", "prix");
    }

    protected function builder(array $objetFormatTableau)
    {
        return new CommandeVisiteur(
            $objetFormatTableau["id"],
            $objetFormatTableau["id_visiteur"],
            $objetFormatTableau["date_"],
            $objetFormatTableau["status"],
            $objetFormatTableau["prix"]
        );
    }

    public function selectLastWithIdVisiteur($id): ?CommandeVisiteur
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM commandeVisiteur WHERE id_visiteur = ? ORDER BY id DESC');
            $request->execute(array($id));
            $res = $request->fetchAll();

        } catch (PDOException $e){
            echo $e->getMessage();
            return null;
        }
        // $utilisateurLivraison = [];
        return $this->builder($res[0]);
    }
}