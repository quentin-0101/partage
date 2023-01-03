<?php

namespace App\Models\DataObject\produit;

use App\Models\DataObject\AbstractDataObject;
use Cassandra\Date;

class Produit extends AbstractDataObject
{

    /**
     * attributs
     */
    private int $id;
    private string $nom;
    private string $description;
    private float $prix;
    private int $quantite;
    private string $dateAjout;
    private float $poids;

    /**
     * clés étrangères
     */
    private int $idCategorieProduit;
    private int $idMarque;
    private string $idUtilisateur;

    private \ArrayObject $listSpecification;
    private \ArrayObject $listImages;

    public function __construct(int $id, string $nom, string $description, float $prix, int $quantite, string $dateAjout, int $idCategorieProduit, int $idMarque, string $idUtilisateur, float $poids)
    {
        $this->id = htmlspecialchars($id);
        $this->nom = htmlspecialchars($nom);
        $this->description = htmlspecialchars($description);
        $this->prix = htmlspecialchars($prix);
        $this->quantite = htmlspecialchars($quantite);
        $this->dateAjout = htmlspecialchars($dateAjout);
        $this->idCategorieProduit = htmlspecialchars($idCategorieProduit);
        $this->idMarque = htmlspecialchars($idMarque);
        $this->idUtilisateur = htmlspecialchars($idUtilisateur);
        $this->poids = htmlspecialchars($poids);
    }

    /**
     * array("nom dans la base de donnée", valeur de l'attribut associe)
     */
    public function formatTableau(): array
    {
        return array(
            "id" => ($this->id),
            "nom" => ($this->nom),
            "description" => ($this->description),
            "prix" => ($this->prix),
            "quantite" => ($this->quantite),
            "date_ajout" => ($this->dateAjout),
            "id_categorie_produit" => ($this->idCategorieProduit),
            "id_marque" => ($this->idMarque),
            "id_utilisateur" => ($this->idUtilisateur),
            "poids" => $this->poids
        );
    }

    /**
     * @return string
     */
    public function getDateAjout(): string
    {
        return htmlspecialchars_decode($this->dateAjout);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return htmlspecialchars_decode($this->description);
    }

    /**
     * @return float
     */
    public function getPoids(): float
    {
        return htmlspecialchars_decode($this->poids);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return htmlspecialchars_decode($this->id);
    }

    /**
     * @return int
     */
    public function getIdCategorieProduit(): int
    {
        return htmlspecialchars_decode($this->idCategorieProduit);
    }

    /**
     * @return int
     */
    public function getIdMarque(): int
    {
        return htmlspecialchars_decode($this->idMarque);
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return htmlspecialchars_decode($this->nom);
    }

    /**
     * @return float
     */
    public function getPrix(): float
    {
        return htmlspecialchars_decode($this->prix);
    }

    /**
     * @return int
     */
    public function getQuantite(): int
    {
        return htmlspecialchars_decode($this->quantite);
    }

    /**
     * @return string
     */
    public function getIdUtilisateur(): string
    {
        return htmlspecialchars_decode($this->idUtilisateur);
    }

    public static function getInstance($object): Produit
    {
        return new Produit(
            $object->getId(),
            $object->getNom(),
            $object->getDescription(),
            $object->getPrix(),
            $object->getQuantite(),
            $object->getDateAjout(),
            $object->getIdCategorieProduit(),
            $object->getIdMarque(),
            $object->getIdUtilisateur(),
            $object->getPoids());
    }

    /**
     * @return \ArrayObject
     */
    public function getListSpecification(): \ArrayObject
    {
        return $this->listSpecification;
    }

    /**
     * @param \ArrayObject $listSpecification
     */
    public function setListSpecification(\ArrayObject $listSpecification): void
    {
        $this->listSpecification = $listSpecification;
    }

    /**
     * @param \ArrayObject $listImages
     */
    public function setListImages(\ArrayObject $listImages): void
    {
        $this->listImages = $listImages;
    }

    /**
     * @return \ArrayObject
     */
    public function getListImages(): \ArrayObject
    {
        return $this->listImages;
    }

    /**
     * @param int $quantite
     */
    public function setQuantite(int $quantite): void
    {
        $this->quantite = htmlspecialchars($quantite);
    }



}
