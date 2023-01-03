<?php

namespace App\Controllers;

use App\Models\DataObject\produit\Image;
use App\Models\Repository\produit\ImageRepository;

class ControllerImage extends Controller
{

    public static function delete() : void
    {
        if(isset($_GET['id'])){
            // id de l'image à supprimer
            $id = htmlspecialchars(rawurldecode($_GET['id']));
            $image = Image::getInstance((new ImageRepository())->select($id));

            unlink(__DIR__ . "/../../public/upload/".$image->getFile());

            (new ImageRepository())->delete($id);

        }
    }

}