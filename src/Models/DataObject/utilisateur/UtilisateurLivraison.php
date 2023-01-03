<?php

namespace App\Models\DataObject\utilisateur;

use App\Models\DataObject\AbstractDataObject;

class UtilisateurLivraison extends AbstractDataObject
{
    private int $id;
    private string $adresse;
    private string $ville;
    private string $codePostal;
    private int $adresse_default;

    /**
     * clés étrangères
     */
    private string $idPays;
    private string $idUtilisateur;

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
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @return string
     */
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * @return string
     */
    public function getCodePostal(): string
    {
        return $this->codePostal;
    }

    /**
     * @return string
     */
    public function getIdPays(): string
    {
        return $this->idPays;
    }

    /**
     * @return string
     */
    public function getIdUtilisateur(): string
    {
        return $this->idUtilisateur;
    }

    /**
     * @return int
     */
    public function getAdresseDefault(): int
    {
        return $this->adresse_default;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @param string $ville
     */
    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @param int $codePostal
     */
    public function setCodePostal(string $codePostal): void
    {
        $this->codePostal = $codePostal;
    }

    /**
     * @param int $adresse_default
     */
    public function setAdresseDefault(int $adresse_default): void
    {
        $this->adresse_default = $adresse_default;
    }

    /**
     * @param string $idPays
     */
    public function setIdPays(string $idPays): void
    {
        $this->idPays = $idPays;
    }

    /**
     * @param string $idUtilisateur
     */
    public function setIdUtilisateur(string $idUtilisateur): void
    {
        $this->idUtilisateur = $idUtilisateur;
    }


    public function __construct(int $id, string $adresse, string $ville, string $codePostal, string $idPays, string $idUtilisateur, int $default)
    {
        $this->id = htmlspecialchars($id);
        $this->adresse = htmlspecialchars($adresse);
        $this->ville = htmlspecialchars($ville);
        $this->codePostal = htmlspecialchars($codePostal);
        $this->idPays = htmlspecialchars($idPays);
        $this->idUtilisateur = htmlspecialchars($idUtilisateur);
        $this->adresse_default = htmlspecialchars($default);
    }

    public function formatTableau(): array
    {
        return array(
            "id" => htmlspecialchars($this->id),
            "adresse" => htmlspecialchars($this->adresse),
            "ville" => htmlspecialchars($this->ville),
            "code_postal" => htmlspecialchars($this->codePostal),
            "id_pays" => htmlspecialchars($this->idPays),
            "id_utilisateur" => htmlspecialchars($this->idUtilisateur),
            "adresse_default" => htmlspecialchars($this->adresse_default)
        );
    }


    public static function getInstance($object): UtilisateurLivraison
    {
        return new UtilisateurLivraison($object->id, $object->adresse, $object->ville, $object->codePostal, $object->idPays, $object->idUtilisateur, $object->adresse_default);
    }

    public function __toString(): string
    {
        return $this->getAdresse().', '.$this->getCodePostal().' '.$this->getVille().', '.$this->getIdPays();
    }
}