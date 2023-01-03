<?php

namespace App\Models\Repository\commande;

use App\Models\DataObject\commande\Commande;
use App\Models\Repository\AbstractRepository;
use App\Models\Repository\DatabaseConnection;
use Cassandra\Date;
use PDOException;

class CommandeRepository extends AbstractRepository
{

    protected function getNomTable(): string
    {
        return "commande";
    }

    protected function getNomClePrimaire(): string
    {
        return "id";
    }

    protected function getNomColonnes(): array
    {
        return array("id", "id_utilisateur", "date_", "status", "prix", "id_livraison");
    }

    protected function builder(array $objetFormatTableau): Commande
    {
        return new Commande(
            $objetFormatTableau["id"],
            $objetFormatTableau["id_utilisateur"],
            $objetFormatTableau["date_"],
            $objetFormatTableau["status"],
            $objetFormatTableau["prix"],
            $objetFormatTableau["id_livraison"]
        );
    }

    public function selectAllWithIdUtilisateur($idUtilisateur): \ArrayObject
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM commande WHERE id_utilisateur = ?');
            $request->execute(array($idUtilisateur));
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

    public function selectLastWithIdUtilisateur($idUtilisateur): ?Commande
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM commande WHERE id_utilisateur = ? ORDER BY id DESC');
            $request->execute(array($idUtilisateur));
            $res = $request->fetchAll();

        } catch (PDOException $e){
            echo $e->getMessage();
            return null;
        }
        // $utilisateurLivraison = [];
        return $this->builder($res[0]);
    }
}