<?php

namespace App\Models\DataObject\utilisateur;

use App\Models\DataObject\AbstractDataObject;

class UtilisateurPayement extends AbstractDataObject
{
    private int $typePayement;
    private string $numeroCompte;
    private int $expiration;
    private string $proprietaire;
    private int $id;

    /**
     * clé étrangère
     */
    private int $idUtilisateur;


    public function __construct(int $typePayement, string $numeroCompte, int $expiration, string $proprietaire, int $id, int $idUtilisateur)
    {
        $this->typePayement = htmlspecialchars($typePayement);
        $this->numeroCompte = htmlspecialchars($numeroCompte);
        $this->expiration = htmlspecialchars($expiration);
        $this->proprietaire = htmlspecialchars($proprietaire);
        $this->id = htmlspecialchars($id);
        $this->idUtilisateur = htmlspecialchars($idUtilisateur);
    }


    public function formatTableau(): array
    {
        return array(
            "type_payement" => htmlspecialchars($this->id),
            "numero_compte" => htmlspecialchars($this->numeroCompte),
            "expiration" => htmlspecialchars($this->expiration),
            "proprietaire" => htmlspecialchars($this->proprietaire),
            "id" => htmlspecialchars($this->id),
            "id_utilisateur" => htmlspecialchars($this->idUtilisateur)
        );
    }

    public static function getInstance($object): object
    {
        return new UtilisateurPayement($object->typePayement, $object->numeroCompte, $object->expiration, $object->proprietaire, $object->id, $object->idUtilisateur);
    }
}