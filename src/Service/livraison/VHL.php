<?php

namespace App\Service\livraison;

class VHL
{
    public static function getPrix() : array
    {
        $prix = array();
        $prix[500] = 4.40;
        $prix[1000] = 4.90;
        $prix[2000] = 6.40;
        $prix[3000] = 6.60;
        $prix[4000] = 7.00;
        $prix[5000] = 9.90;
        $prix[7000] = 12.10;
        $prix[10000] = 13.80;
        $prix[15000] = 18.30;
        $prix[20000] = 21.50;
        $prix[30000] = 26.90;

        return $prix;
    }

    /**
     * @return int
     * delais de livraison en nombre de jours ouvrés
     */
    public static function getDelais() : int
    {
        return 5;
    }
}