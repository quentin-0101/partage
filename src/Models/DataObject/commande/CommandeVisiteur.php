<?php

namespace App\Models\DataObject\commande;

class CommandeVisiteur extends \App\Models\DataObject\AbstractDataObject
{

    private int $id;
    private int $idVisiteur;
    private string $date;
    private string $statuts;
    private float $prix;

    /**
     * @param int $id
     * @param int $idVisiteur
     * @param string $date
     * @param string $statuts
     * @param float $prix
     */
    public function __construct(int $id, int $idVisiteur, string $date, string $statuts, float $prix)
    {
        $this->id = htmlspecialchars($id);
        $this->idVisiteur = htmlspecialchars($idVisiteur);
        $this->date = htmlspecialchars($date);
        $this->statuts = htmlspecialchars($statuts);
        $this->prix = htmlspecialchars($prix);
    }

    public function formatTableau(): array
    {
        return array(
            "id" => $this->id,
            "id_visiteur" => $this->idVisiteur,
            "date_" => $this->date,
            "status" => $this->statuts,
            "prix" => $this->prix);
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
    public function getIdVisiteur(): int
    {
        return htmlspecialchars_decode($this->idVisiteur);
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return htmlspecialchars_decode($this->date);
    }

    /**
     * @return string
     */
    public function getStatuts(): string
    {
        return htmlspecialchars_decode($this->statuts);
    }

    /**
     * @return float
     */
    public function getPrix(): float
    {
        return htmlspecialchars_decode($this->prix);
    }

    public static function getInstance($object) : CommandeVisiteur
    {
        return new CommandeVisiteur(
            $object->getId(),
            $object->getIdVisiteur(),
            $object->getDate(),
            $object->getStatuts(),
            $object->getPrix()
        );
    }
}