<?php

/** @var Utilisateur $user */
/** @var boolean $dashboard */

use App\Models\DataObject\commande\Commande;
use App\Models\DataObject\commande\LigneCommande;
use App\Models\DataObject\produit\Produit;
use App\Models\DataObject\utilisateur\Utilisateur;
use App\Models\DataObject\utilisateur\UtilisateurLivraison;

$data = "
<h2> Items Ordered </h2>

<div class='table-box'>
    <table class='table order-details'>
        <thead>
        <tr>
            <th scope='col'> Product Name </th>
            <th scope='col'> SKU </th>
            <th scope='col'> Price </th>
            <th scope='col'> Qty </th>
            <th scope='col'> Subtotal </th>
        </tr>
        </thead>
        <tbody>
        ";

/** @var ArrayObject $lignesCommandes */
/** @var LigneCommande $ligne */
/** @var Produit $produit */
/** @var array $produits */
/** @var UtilisateurLivraison $livraison */
$i = 0;
foreach ($lignesCommandes as $ligne){
    $produit = $produits[$i];
    $p = $produit->getPrix() * $ligne->getQuantite();

    $data = $data."
        <tr>
            <th> {$produit->getNom()} </th>
            <td> {$produit->getIdUtilisateur()} </td>
            <td> $ {$produit->getPrix()} </td>
            <td> {$ligne->getQuantite()} </td>
            <td> {$p} </td>
        </tr>
    ";

    $i++;
}

/** @var Commande $commande */
$date = $commande->getDate();

$data = $data. "
    <tr class='yellow-row'>
            <th  colspan='4'> Subtotal </th>
            <td> $ {$prix} </td>
        </tr>
        <tr class='yellow-row'>
            <th colspan='4'> Shipping & Handling </th>
            <td> $ {$prixLivraison} </td>
        </tr>
        <tr class='yellow-row'>
            <th colspan='4'> 'Estimated Total' </th>
            <td> $ {$prixTotal} </td>
        </tr>
         <tr class='yellow-row'>
            <th colspan='4'> 'Date commande' </th>
            <td> {$date} </td>
        </tr>
        </tbody>
    </table>
</div>

<div class='order-information'>
    <h2> Order Information </h2>
    <div class='row'>
        <div class='col-12 col-sm-6'>

            <div class='info-box'>
                <div class='info-head'> Shipping Address </div>
                <div class='info-body'>
                    <p> {$user} </p>
                    <p> {$livraison->getAdresse()} </p>
                    <p> {$livraison->getVille()}, {$livraison->getCodePostal()} </p>
                    <p> {$livraison->getIdPays()} </p>
                </div>
            </div>
        </div>
        <div class='col-12 col-sm-6'>
            <div class='method-box'>
                <h3> Shipping Method </h3>
                <p> Flat Rate - Fixed </p>
            </div>
            <div class='method-box'>
                <h3> Payment Method  </h3>
                <p> Cash On Delivery </p>
            </div>
        </div>
    </div>
</div>

";

extract([
        "data" => $data,
        "dashboard" => false,
        "user" => $user,
        "login" => $login,
        "id" => 5
    ]
);
require(__DIR__ . "/../base1.php");







