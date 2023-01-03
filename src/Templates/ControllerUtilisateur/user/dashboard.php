<?php

/** @var Utilisateur $user */
/** @var boolean $dashboard */

use App\Models\DataObject\utilisateur\Utilisateur;


$data = "
<h2> Default Addresses  </h2>
<h3> Hello $user </h3>
<p> From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information. </p>

<div class='row'>
    <div class='col-12 col-sm-6'>
        <div class='info-box'>
            <div class='info-head'> Contact Information </div>
            <div class='info-body'>
                <p> $user </p>
                <p> {$user->getEmail()} </p>
            </div>
            <div class='info-footer'>
                <a href='?controller=utilisateur&action=account_info' class='btn btn-orange'> <i class='icofont-edit'></i>  Edit </a>
                <a href='?controller=utilisateur&action=account_info' class='btn btn-orange'> Change Password  </a>
            </div>
        </div>
    </div>
    <div class='col-12 col-sm-6'>
        <div class='info-box'>
            <div class='info-head'> Newsletters </div>
            <div class='info-body'>
                <p> You don t subscribe to our newsletter. </p>
            </div>
            <div class='info-footer'>
                <a href='account-news.html' class='btn btn-orange'> <i class='icofont-edit'></i>  Edit </a>
            </div>
        </div>
    </div>
</div>

<h3> Address Book </h3>
<div class='row'>
    <div class='col-12 col-sm-6'>
        <div class='info-box'>
            <div class='info-head'> Default Shipping Address </div>
            <div class='info-body'>
                <p> You have not set a default shipping address. </p>
            </div>
            <div class='info-footer'>
                <a href='?controller=utilisateur&action=account_address' class='btn btn-orange'> <i class='icofont-edit'></i>  Edit </a>
            </div>
        </div>
    </div>
</div>
";

extract([
        "data" => $data,
        "dashboard" => $dashboard,
        "user" => $user,
        "login" => $login,
        "id" => 2
    ]
);
require(__DIR__ . "/../../base1.php");
