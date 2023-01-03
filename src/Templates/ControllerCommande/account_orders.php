<?php

/** @var Utilisateur $user */
/** @var boolean $dashboard */

use App\Models\DataObject\commande\Commande;
use App\Models\DataObject\utilisateur\Utilisateur;

$data = "
<div class='filter-head'>
    <p> 1 Item </p>
    <ul>
        <li> show </li>
        <li>
            <select>
                <option value='10'> 10 </option>
                <option value='20'> 20 </option>
                <option value='30'> 30 </option>
            </select>
        </li>
        <li> per page</li>
    </ul>
</div>

<div class='table-box'>
    <table class='table orders-table'>
        <thead>
        <tr>
            <th scope='col'> #Order </th>
            <th scope='col'> Date </th>
            <th scope='col'> Total </th>
            <th scope='col'> Status </th>
            <th scope='col'>   </th>
        </tr>
        </thead>
        <tbody>
";

/** @var ArrayObject $commandes */
/** @var Commande $c */
foreach ($commandes as $c){
    $data = $data."
        <tr>
            <th scope='row'> {$c->getId()} </th>
            <td> {$c->getDate()} </td>
            <td> $ {$c->getPrix()}	 </td>
            <td> {$c->getStatus()} </td>
            <td>
                <a href='?controller=commande&action=order_details&id={$c->getId()}'> View  </a>
                <a href='cart.html'> Reorder </a>
            </td>
        </tr>
    ";
}

$data = $data."
        </tbody>
    </table>
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