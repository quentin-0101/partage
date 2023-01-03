<?php

namespace App\Models\DataObject\produit;

use App\Models\DataObject\AbstractDataObject;

class ProduitSpecification extends AbstractDataObject
{

    private int $id;
    private string $nom;

    // cle etrangere
    private int $idProduit;

    public function __construct(int $id, string $nom, int $idProduit)
    {
        $this->id = htmlspecialchars($id);
        $this->nom = htmlspecialchars($nom);
        $this->idProduit = htmlspecialchars($idProduit);
    }

    public function formatTableau(): array
    {
        return array(
            "id" => $this->id,
            "nom" => $this->nom,
            "id_produit" => $this->idProduit,
        );
    }

    public static function getInstance($object) : ProduitSpecification
    {
        return new ProduitSpecification($object->getId(), $object->getNom(), $object->getIdProduit());
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return htmlspecialchars_decode($this->id);
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return htmlspecialchars_decode($this->nom);
    }

    /**
     * @return int
     */
    public function getIdProduit(): int
    {
        return htmlspecialchars_decode($this->idProduit);
    }
}