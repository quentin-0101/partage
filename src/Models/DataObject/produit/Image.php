<?php

namespace App\Models\DataObject\produit;

use App\Models\DataObject\AbstractDataObject;

class Image extends AbstractDataObject
{

    private int $id;
    private string $file;

    /**
     * cle etrangere
     */
    private int $idProduit;

    /**
     * @param int $id
     * @param string $file
     * @param int $idProduit
     */
    public function __construct(int $id, string $file, int $idProduit)
    {
        $this->id = htmlspecialchars($id);
        $this->file = htmlspecialchars($file);
        $this->idProduit = htmlspecialchars($idProduit);
    }


    public function formatTableau(): array
    {
        return array(
            "id" => $this->id,
            "file" => $this->file,
            "id_produit" => $this->idProduit
        );
    }

    public static function getInstance($object): Image
    {
        return new Image($object->id, $object->file, $object->idProduit);
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->getFile();
    }
}
