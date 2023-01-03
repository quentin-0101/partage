<?php

namespace App\Models\DataObject\categorie;

use App\Models\DataObject\AbstractDataObject;

class CategoriePrincipale extends AbstractDataObject
{
    private string $nom;
    private string $description;
    private int $id;

    private \ArrayObject $listCategorieProduit;

    public function __construct(string $nom, string $description, int $id)
    {
        $this->nom = htmlspecialchars($nom);
        $this->description = htmlspecialchars($description);
        $this->id = htmlspecialchars($id);
    }


    public function formatTableau(): array
    {
        return array(
            "nom" => $this->nom,
            "description" => $this->description,
            "id" => $this->id
        );
    }

    public static function getInstance($object): CategoriePrincipale
    {
        return new CategoriePrincipale($object->nom, $object->description, $object->id);
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
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return \ArrayObject
     */
    public function getListCategorieProduit(): \ArrayObject
    {
        return $this->listCategorieProduit;
    }

    /**
     * @param \ArrayObject $listCategorieProduit
     */
    public function setListCategorieProduit(\ArrayObject $listCategorieProduit): void
    {
        $this->listCategorieProduit = $listCategorieProduit;
    }
}