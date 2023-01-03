<?php

namespace App\Models\Repository\produit;

use App\Models\DataObject\produit\Produit;
use App\Models\Repository\AbstractRepository;
use App\Models\Repository\DatabaseConnection;
use PDOException;

class ProduitRepository extends AbstractRepository
{

    /**
     * @return array|null
     * retourne les produits récents (moins de 15 jours par rapport à la date d'ajout.
     */

    public function getProduitRecent() : ?array
    {
        $date = date("Y-m-d", strtotime('-15days'));
        $dateActuelle = date("Y-m-d");
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM '.$this->getNomTable().' WHERE date_ajout >= ? AND date_ajout <= ? ORDER BY date_ajout DESC');
            $request->execute(array($date, $dateActuelle));
            $produits = $request->fetchAll();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($produits))
            return null;

        $objetProduit = array();
        foreach ($produits as $produit){
            $objetProduit[] = $this->builder($produit);
        }
        return $objetProduit;
    }



    public function getProduitOrdre() : ?array
    {

        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM '.$this->getNomTable().' ORDER BY id DESC');
            $request->execute(array());
            $produits = $request->fetchAll();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($produits))
            return null;

        $objetProduit = array();
        foreach ($produits as $produit){
            $objetProduit[] = $this->builder($produit);
        }
        return $objetProduit;
    }


    protected function getNomTable(): string
    {
        return "produit";
    }

    protected function getNomClePrimaire(): string
    {
        return "id";
    }

    protected function getNomColonnes(): array
    {
        return array('id', 'nom', 'description', 'prix', 'quantite', 'date_ajout', 'id_categorie_produit', 'id_marque', 'id_utilisateur', 'poids');
    }

    protected function builder(array $objetFormatTableau): Produit
    {
        return new Produit(
            $objetFormatTableau['id'],
            $objetFormatTableau['nom'],
            $objetFormatTableau['description'],
            $objetFormatTableau['prix'],
            $objetFormatTableau['quantite'],
            $objetFormatTableau['date_ajout'],
            $objetFormatTableau['id_categorie_produit'],
            $objetFormatTableau['id_marque'],
            $objetFormatTableau['id_utilisateur'],
            $objetFormatTableau['poids']
        );
    }

    public function selectAllWithIdUtilisateur($idUtilisateur): \ArrayObject
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM produit WHERE id_utilisateur = ?');
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

    public function getLastId() : ?int
    {
        try{
            $model = DatabaseConnection::getInstance();
            return (int)$model->lastInsertId();

        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return null;
    }

    public function selectAllWithIdCategProduit($id): \ArrayObject
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM produit WHERE id_categorie_produit = ?');
            $request->execute(array($id));
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

    public function selectAllWithIdCategProduitAndIdMarque($idCateg, $idMarque): \ArrayObject
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT * FROM produit WHERE id_categorie_produit = ? AND id_marque = ?');
            $request->execute(array($idCateg, $idMarque));
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

    public function selectAllWithIdCategPrincipale($idCategP): \ArrayObject
    {
        try{
            $model = DatabaseConnection::getInstance();
            $request = $model->prepare('SELECT p.nom, p.id, p.description, p.id_categorie_produit, p.prix, p.id_marque, p.quantite, p.date_ajout, p.id_utilisateur, p.poids FROM produit p JOIN categorieProduit c ON p.id_categorie_produit = c.id WHERE id_categorie_principale = ?');
            $request->execute(array($idCategP));
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