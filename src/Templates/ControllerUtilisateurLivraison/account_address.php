<?php

/** @var Utilisateur $user */
/** @var boolean $dashboard */

use App\Models\DataObject\utilisateur\Utilisateur;
use App\Models\DataObject\utilisateur\UtilisateurLivraison;


$data = '<h2> Default Addresses  </h2>';

/** @var array $livraisons */
/** @var UtilisateurLivraison $default */
/** @var UtilisateurLivraison $livraison */

$var = 1;

if($default == null){
    $data = "
        <div class='row'>
            <div class='col-12 col-sm-6'></div>
        <!-- </div> -->
        
";
}
else {
    $data = "
        <div class='row'>
            <div class='col-12 col-sm-6'>
                <div class='info-box'>
                    <div class='info-head'> Default Shipping Address </div>
                    <div class='info-body'>
                         <p> {$user} </p>
                        <p> {$default->getAdresse()} </p>
                        <p> {$default->getVille()}, {$default->getCodePostal()} </p>
                        <p> {$default->getIdPays()} </p>
                       <!-- <p> <label> T : </label> 01099285016 </p> -->
                    </div>
                    <div class='info-footer'>
                        <a href='?controller=utilisateurLivraison&action=account_new_address&id={$default->getId()}' class='btn btn-orange'>   Change Shipping Address </a>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        
";
}



foreach ($livraisons as $livraison) {
    if($var == 1){ // 1 element sur la meme ligne donc on peut en rajouter 1
        $data = $data."
        
            <div class='col-12 col-sm-6'>
                <div class='info-box'>
                    <div class='info-body'>
                         <p> {$user} </p>
                        <p> {$livraison->getAdresse()} </p>
                        <p> {$livraison->getVille()}, {$livraison->getCodePostal()} </p>
                        <p> {$livraison->getIdPays()} </p>
                       <!-- <p> <label> T : </label> 01099285016 </p> -->
                    </div>
                    <div class='info-footer'>
                        <a href='?controller=utilisateurLivraison&action=account_new_address&id={$livraison->getId()}' class='btn btn-orange'>   Change Shipping Address </a>
                    </div>
                </div>
            </div>
        </div>
    ";
        $var = 0;
    } else {
        $data = $data."
        <div class='row'>
            <div class='col-12 col-sm-6'>
                <div class='info-box'>
                    <div class='info-body'>
                         <p> {$user} </p>
                        <p> {$livraison->getAdresse()} </p>
                        <p> {$livraison->getVille()}, {$livraison->getCodePostal()} </p>
                        <p> {$livraison->getIdPays()} </p>
                       <!-- <p> <label> T : </label> 01099285016 </p> -->
                    </div>
                    <div class='info-footer'>
                        <a href='?controller=utilisateurLivraison&action=account_new_address&id={$livraison->getId()}' class='btn btn-orange'>   Change Shipping Address </a>
                    </div>
                </div>
            </div>
    ";
        $var++;
    }

}

if($count % 2 != 0) $data = $data." </div>"; // mise à zero de l'html

$data = $data."

    <h2> Additional Address Entries  </h2>
    <p> You have no other address entries in your address book </p>    
    <a href='?controller=utilisateurLivraison&action=account_new_address' class='btn btn-orange'> Add New Address </a>
";


extract([
        "data" => $data,
        "dashboard" => false,
        "user" => $user,
        "login" => $login,
        "id" => 4
    ]
);
require(__DIR__ . "/../base1.php");

?>
