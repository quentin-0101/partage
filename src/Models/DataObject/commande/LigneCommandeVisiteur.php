<?php

namespace App\Models\DataObject\commande;

use App\Models\DataObject\AbstractDataObject;

class LigneCommandeVisiteur extends AbstractDataObject
{

    private int $id;
    private int $quantite;

    /**
     * cle etrangères
     */
    private int $idProduit;
    private int $id_commande_visiteur;

    public function __construct(int $id, int $idProduit, int $quantite, int $id_commande_visiteur)
    {
        $this->id = htmlspecialchars($id);
        $this->idProduit = htmlspecialchars($idProduit);
        $this->quantite = htmlspecialchars($quantite);
        $this->id_commande_visiteur = htmlspecialchars($id_commande_visiteur);
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
    public function getIdCommandeVisiteur(): int
    {
        return $this->id_commande_visiteur;
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
            "id_commande_visiteur" => $this->id_commande_visiteur
        );
    }

    public static function getInstance($object): LigneCommande
    {
        return new LigneCommande($object->id, $object->idProduit, $object->quantite, $object->id_commande_visiteur);
    }
}