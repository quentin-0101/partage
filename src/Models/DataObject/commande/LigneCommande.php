<?php

namespace App\Models\DataObject\commande;

use App\Models\DataObject\AbstractDataObject;

class LigneCommande extends AbstractDataObject
{

    private int $id;
    private int $quantite;

    /**
     * cle etrangères
     */
    private int $idProduit;
    private int $idCommande;

    public function __construct(int $id, int $idProduit, int $quantite, int $idCommande)
    {
        $this->id = htmlspecialchars($id);
        $this->idProduit = htmlspecialchars($idProduit);
        $this->quantite = htmlspecialchars($quantite);
        $this->idCommande = htmlspecialchars($idCommande);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getQuantite(): int
    {
        return $this->quantite;
    }

    /**
     * @return int
     */
    public function getIdCommande(): int
    {
        return $this->idCommande;
    }

    /**
     * @return int
     */
    public function getIdProduit(): int
    {
        return $this->idProduit;
    }


    public function formatTableau(): array
    {
        return array(
            "id" => $this->id,
            "id_produit" => $this->idProduit,
            "quantite" => $this->quantite,
            "id_commande" => $this->idCommande,
        );
    }

    public static function getInstance($object): LigneCommande
    {
        return new LigneCommande($object->id, $object->idProduit, $object->quantite, $object->idCommande);
    }
}