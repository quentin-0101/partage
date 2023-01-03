<?php

namespace App\Models\DataObject\commande;

use App\Models\DataObject\AbstractDataObject;
use Cassandra\Date;

class Commande extends AbstractDataObject
{

    private int $id;
    private string $date; // default => null
    private string $status; // default => null
    private float $prix; // default => null
    private int $idLivraison;

    /**
     * cle etrangere
     */
    private string $idUtilisateur;

    public function __construct(int $id, string $idUtilisateur, string $date, string $status, float $prix, int $idLivraison)
    {
        $this->id = htmlspecialchars($id);
        $this->idUtilisateur = htmlspecialchars($idUtilisateur);
        $this->date = htmlspecialchars($date);
        $this->status = htmlspecialchars($status);
        $this->prix = htmlspecialchars($prix);
        $this->idLivraison = htmlspecialchars($idLivraison);
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @param float $prix
     */
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

    public function formatTableau(): array
    {
        return array(
            "id" => $this->id,
            "id_utilisateur" => $this->idUtilisateur,
            "date_" => $this->date,
            "status" => $this->status,
            "prix" => $this->prix,
            "id_livraison" => $this->idLivraison
        );
    }

    /**
     * @return float
     */
    public function getPrix(): float
    {
        return $this->prix;
    }

    /**
     * @return int
     */
    public function getIdLivraison(): int
    {
        return $this->idLivraison;
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
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getIdUtilisateur(): string
    {
        return $this->idUtilisateur;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    public static function getInstance($object): Commande
    {
        return new Commande($object->id, $object->idUtilisateur, $object->date, $object->status, $object->prix, $object->idLivraison);
    }
}
