<?php

namespace App\Models\DataObject\utilisateur;

use App\Models\DataObject\AbstractDataObject;

class Role extends AbstractDataObject
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
            "id" => htmlspecialchars($this->id),
            "nom" => htmlspecialchars($this->nom),
        );
    }

    public static function getInstance($object): Role
    {
        return new Role($object->id, $object->nom);
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

    public function estGestionnaire(): bool
    {
        return strcmp($this->nom, "GESTIONNAIRE") == 0;
    }

    public function estAdmin(): bool
    {
        return strcmp($this->nom, "ADMIN") == 0;
    }
}