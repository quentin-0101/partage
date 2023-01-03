<?php

namespace App\Models\Repository\utilisateur;

use App\Models\DataObject\utilisateur\VisiteurCommande;
use App\Models\Repository\AbstractRepository;
use App\Models\Repository\DatabaseConnection;
use PDOException;

class VisiteurCommandeRepository extends AbstractRepository
{

    protected function getNomTable(): string
    {
        return "visiteurCommande";
    }

    protected function getNomClePrimaire(): string
    {
        return "id";
    }

    protected function getNomColonnes(): array
    {
        return array("nom", "prenom", "telephone", "email", "adresse_postale", "ville", "code_postal", "pays", "id");
    }

    protected function builder(array $objetFormatTableau) : VisiteurCommande
    {
        return new VisiteurCommande(
            $objetFormatTableau['nom'],
            $objetFormatTableau['prenom'],
            $objetFormatTableau['telephone'],
            $objetFormatTableau['email'],
            $objetFormatTableau['adresse_postale'],
            $objetFormatTableau['ville'],
            $objetFormatTableau['code_postal'],
            $objetFormatTableau['pays'],
            $objetFormatTableau['id']
        );
    }

    public function selectLastWithNomEtPrenom($nom, $prenom): ?VisiteurCommande
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM visiteurCommande WHERE nom = ? AND prenom = ? ORDER BY id DESC');
            $request->execute(array($nom, $prenom));
            $res = $request->fetchAll();

        } catch (PDOException $e){
            echo $e->getMessage();
            return null;
        }
        // $utilisateurLivraison = [];
        return $this->builder($res[0]);
    }
}