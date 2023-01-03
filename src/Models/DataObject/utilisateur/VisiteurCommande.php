<?php

namespace App\Models\DataObject\utilisateur;

use App\Models\DataObject\AbstractDataObject;

class VisiteurCommande extends AbstractDataObject
{

    private string $nom;
    private string $prenom;
    private string $telephone;
    private string $email;
    private string $adressePostale;
    private string $ville;
    private string $codePostale;
    private string $idPays;
    private int $idCommande;
    private int $id;

    /**
     * @param string $nom
     * @param string $prenom
     * @param string $telephone
     * @param string $email
     * @param string $adressePostale
     * @param string $ville
     * @param string $codePostale
     * @param string $idPays
     */
    public function __construct(string $nom, string $prenom, string $telephone, string $email, string $adressePostale, string $ville, string $codePostale, string $idPays, int $id)
    {
        $this->nom = htmlspecialchars($nom);
        $this->prenom = htmlspecialchars($prenom);
        $this->telephone = htmlspecialchars($telephone);
        $this->email = htmlspecialchars($email);
        $this->adressePostale = htmlspecialchars($adressePostale);
        $this->ville = htmlspecialchars($ville);
        $this->codePostale = htmlspecialchars($codePostale);
        $this->idPays = htmlspecialchars($idPays);
        $this->id = htmlspecialchars_decode($id);
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return htmlspecialchars_decode($this->nom);
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return htmlspecialchars_decode($this->prenom);
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return htmlspecialchars_decode($this->telephone);
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return htmlspecialchars_decode($this->email);
    }

    /**
     * @return string
     */
    public function getAdressePostale(): string
    {
        return htmlspecialchars_decode($this->adressePostale);
    }

    /**
     * @return string
     */
    public function getVille(): string
    {
        return htmlspecialchars_decode($this->ville);
    }

    /**
     * @return string
     */
    public function getCodePostale(): string
    {
        return htmlspecialchars_decode($this->codePostale);
    }

    /**
     * @return string
     */
    public function getIdPays(): string
    {
        return htmlspecialchars_decode($this->idPays);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    public function formatTableau(): array
    {
        return array(
            "nom" => $this->nom,
            "prenom" => $this->prenom,
            "telephone" => $this->telephone,
            "email" => $this->email,
            "adresse_postale" => $this->adressePostale,
            "ville" => $this->ville,
            "code_postal" => $this->codePostale,
            "pays" => $this->idPays,
            "id" => $this->id
        );
    }


    public static function getInstance($object) : VisiteurCommande
    {
        return new VisiteurCommande(
            $object->nom,
            $object->prenom,
            $object->telephone,
            $object->email,
            $object->adressePostale,
            $object->ville,
            $object->codePostale,
            $object->idPays,
            $object->id
        );
    }
}