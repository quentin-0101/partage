<?php

namespace App\Service\livraison;

class LaPoste
{
    public static function getPrix() : array
    {
        $prix = array();
        $prix[250] = 4.95;
        $prix[500] = 6.70;
        $prix[750] = 7.60;
        $prix[1000] = 8.25;
        $prix[2000] = 9.55;
        $prix[5000] = 14.65;
        $prix[10000] = 21.30;
        $prix[15000] = 26.95;
        $prix[30000] = 33.40;

        return $prix;
    }

    /**
     * @return int
     * delais de livraison en nombre de jours ouvrés
     */
    public static function getDelais() : int
    {
        return 2;
    }

}