<?php

namespace App\Models\DataObject\categorie;

use App\Models\DataObject\AbstractDataObject;

class CategorieProduit extends AbstractDataObject
{
    private int $id;
    private string $nom;
    private string $description;

    private \ArrayObject $listeProduits;
    private array $listeMarque;

    /**
     * cle etrangère
     */
    private int $idCategoriePrincipale;

    public function __construct(int $id, string $nom, string $description, int $idCategoriePrincipale)
    {
        $this->id = htmlspecialchars($id);
        $this->nom = htmlspecialchars($nom);
        $this->description = htmlspecialchars($description);
        $this->idCategoriePrincipale = htmlspecialchars($idCategoriePrincipale);
    }

    public function formatTableau(): array
    {
        return array(
            "id" => $this->id,
            "nom" => $this->nom,
            "description" => $this->description,
            "id_categorie_principale" => $this->idCategoriePrincipale
        );
    }

    public static function getInstance($object): CategorieProduit
    {
        return new CategorieProduit($object->id, $object->nom, $object->description, $object->idCategoriePrincipale);
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getIdCategoriePrincipale(): int
    {
        return $this->idCategoriePrincipale;
    }

    /**
     * @return \ArrayObject
     */
    public function getListeProduits(): \ArrayObject
    {
        return $this->listeProduits;
    }

    /**
     * @param \ArrayObject $listeProduits
     */
    public function setListeProduits(\ArrayObject $listeProduits): void
    {
        $this->listeProduits = $listeProduits;
    }

    /**
     * @return array
     */
    public function getListeMarque(): array
    {
        return $this->listeMarque;
    }

    /**
     * @param array $listeMarque
     */
    public function setListeMarque(array $listeMarque): void
    {
        $this->listeMarque = $listeMarque;
    }


}