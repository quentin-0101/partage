<?php

namespace App\Models\DataObject\utilisateur;


use App\Models\DataObject\AbstractDataObject;
use App\Models\Lib\MotDePasse;

class Utilisateur extends AbstractDataObject
{

    /**
     * attributs
     */
    private string $nom;
    private string $prenom;
    private string $motDePasse;
    private string $telephone;
    private string $email;
    private int $emailAValider;
    private string $nonce;

    /**
     * clés étrangères
     */
    private int $idRole;

    public function __construct(string $nom, string $prenom, string $motDePasse, string $telephone, string $email, int $idRole, int $emailAValider, string $nonce)
    {
        $this->nom = htmlspecialchars($nom);
        $this->prenom = htmlspecialchars($prenom);
        $this->motDePasse = htmlspecialchars($motDePasse);
        $this->telephone = htmlspecialchars($telephone);
        $this->email = htmlspecialchars($email);
        $this->idRole = htmlspecialchars($idRole);
        $this->emailAValider = htmlspecialchars($emailAValider);
        $this->nonce = htmlspecialchars($nonce);
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @param string $motDePasse
     */
    public function setMotDePasse(string $motDePasse): void
    {
        $this->motDePasse = $motDePasse;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * array("nom dans la base de donnée", valeur de l'attribut associe)
     */
    public function formatTableau(): array
    {
        return array(
            "nom" => ($this->nom),
            "prenom" => ($this->prenom),
            "motdepasse" => ($this->motDePasse),
            "telephone" => ($this->telephone),
            "email" => ($this->email),
            "id_role" => ($this->idRole),
            "email_a_valider" => $this->emailAValider,
            "nonce" => $this->nonce
        );
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @return string
     */
    public function getMotDePasse(): string
    {
        return $this->motDePasse;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getIdRole(): int
    {
        return $this->idRole;
    }

    /**
     * @return int
     */
    public function getEmailAValider(): int
    {
        return $this->emailAValider;
    }

    /**
     * @return string
     */
    public function getNonce(): string
    {
        return $this->nonce;
    }

    /**
     * @param int $emailAValider
     */
    public function setEmailAValider(int $emailAValider): void
    {
        $this->emailAValider = $emailAValider;
    }

    /**
     * @param int $idRole
     */
    public function setIdRole(int $idRole): void
    {
        $this->idRole = $idRole;
    }

    /**
     * @param string $nonce
     */
    public function setNonce(string $nonce): void
    {
        $this->nonce = $nonce;
    }



    public function __toString(): string
    {
        return $this->nom.' '.$this->prenom;
    }

    public static function getInstance($object) : Utilisateur
    {
        return new Utilisateur(
            $object->nom,
            $object->prenom,
            $object->motDePasse,
            $object->telephone,
            $object->email,
            $object->idRole,
            $object->emailAValider,
            $object->nonce
        );
    }


}
