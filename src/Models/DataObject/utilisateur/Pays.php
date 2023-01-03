<?php

namespace App\Models\DataObject\utilisateur;

use App\Models\DataObject\AbstractDataObject;

class Pays extends AbstractDataObject
{
    private string $nom;

    public function __construct(string $nom)
    {
        $this->nom = htmlspecialchars($nom);
    }

    public function formatTableau(): array
    {
        return array(
            "nom" => $this->nom
        );
    }

    public function __toString(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    public static function getInstance($object): Pays
    {
        return new Pays($object->nom);
    }
}