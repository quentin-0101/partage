<?php

namespace App\Form;

use App\Controllers\Controller;
use App\Models\DataObject\utilisateur\Utilisateur;
use App\Models\Lib\ConnexionUtilisateur;
use App\Models\Repository\utilisateur\UtilisateurRepository;

abstract class AbstractForm
{

    public abstract static function isValid(): bool;
    public abstract static function getResult();
}