<?php

namespace App\Models\DataObject\produit;

use App\Models\DataObject\AbstractDataObject;

class Marque extends AbstractDataObject
{
    private int $id;
    private string $nom;

    public function __construct(int $id, string $nom)
    {
        $this->id = htmlspecialchars($id);
        $this->nom = htmlspecialchars($nom);
    }

    public function formatTableau(): array
    {
        return array(
            "id" => $this->id,
            "nom" => $this->nom
        );
    }

    public static function getInstance($object): Marque
    {
        return new Marque($object->id, $object->nom);
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
    public function getNom(): string
    {
        return $this->nom;
    }

    public function __toString(): string
    {
        return $this->getNom();
    }
}