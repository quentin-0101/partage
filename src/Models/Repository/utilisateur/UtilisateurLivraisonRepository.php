<?php

namespace App\Models\Repository\utilisateur;

use App\Models\DataObject\utilisateur\UtilisateurLivraison;
use App\Models\Repository\AbstractRepository;
use App\Models\Repository\DatabaseConnection;
use PDOException;

class UtilisateurLivraisonRepository extends AbstractRepository
{

    protected function getNomTable(): string
    {
        return "UtilisateurLivraison";
    }

    protected function getNomClePrimaire(): string
    {
        return "id";
    }

    protected function getNomColonnes(): array
    {
        return array("id", "adresse", "ville", "code_postal", "id_pays", "id_utilisateur", "adresse_default");
    }

    protected function builder(array $objetFormatTableau) : UtilisateurLivraison
    {
        return new UtilisateurLivraison(
            $objetFormatTableau['id'],
            $objetFormatTableau['adresse'],
            $objetFormatTableau['ville'],
            $objetFormatTableau['code_postal'],
            $objetFormatTableau['id_pays'],
            $objetFormatTableau['id_utilisateur'],
            $objetFormatTableau['adresse_default']
        );
    }



    public function countAllWithIdUtilisateur($id) : int
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT COUNT(*) FROM UtilisateurLivraison WHERE id_utilisateur = ?');
            $request->execute(array($id));
            $nb = $request->fetchColumn();

        } catch (PDOException $e){
            echo $e->getMessage();
        }
        // Attention, si il n'y a pas de résultats, on renvoie false
        return $nb;
    }

    public function selectDefault($idUser) : ?UtilisateurLivraison
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM UtilisateurLivraison WHERE id_utilisateur = ? AND adresse_default = 1');
            $request->execute(array($idUser));
            $res = $request->fetchAll();

        } catch (PDOException $e){
            echo $e->getMessage();
        }
        if(!isset($res[0])) return null;
        return $this->builder($res[0]);
    }

    public function selectAllWithIdUtilisateurAndDifferentByDefault($idUtilisateur, $idDefault): \ArrayObject
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM UtilisateurLivraison WHERE id_utilisateur = ? AND id <> ?');
            $request->execute(array($idUtilisateur, $idDefault));
            $res = $request->fetchAll();

        } catch (PDOException $e){
            echo $e->getMessage();
        }
        $utilisateurLivraison = [];
        $test = new \ArrayObject();
        foreach ($res as $u){
            $test->append($this->builder($u));
            //$utilisateurLivraison[] = $this->builder($u);
        }
        return $test;
    }
}