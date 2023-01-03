<?php

namespace App\Service\livraison;

class UPS
{
    public static function getPrix() : array
    {
        $prix = array();
        $prix[250] = 4.25;
        $prix[500] = 6.00;
        $prix[750] = 6.90;
        $prix[1000] = 7.55;
        $prix[2000] = 8.85;
        $prix[5000] = 13.05;

        return $prix;
    }

    /**
     * @return int
     * delais de livraison en nombre de jours ouvrés
     */
    public static function getDelais() : int
    {
        return 1;
    }

}