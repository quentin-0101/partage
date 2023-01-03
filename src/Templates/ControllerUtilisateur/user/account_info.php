<?php

/** @var Utilisateur $user */
/** @var boolean $dashboard */

use App\Models\DataObject\utilisateur\Utilisateur;



$data = "

<form method='post' action='?controller=utilisateur&action=account_info_updated'>
    <div class='field required-field'>
        <label> First Name </label>
        <input name='nom' type='text' class='form-control' value='{$user->getNom()}'>
    </div>

    <div class='field required-field'>
        <label> Last Name </label>
        <input name='prenom' type='text' class='form-control' value='{$user->getPrenom()}'>
    </div>

    <div class='form-check'>
        <input name='check_change_password' type='checkbox' class='form-check-input' id='change-password'>
        <label class='form-check-label' for='change-password'>   Change Password </label>
    </div>

   

    <div class='change-password-form' id='change-password-form'>
        <h5> Change Password </h5>
        <div class='field required-field'>
            <label> Current Password </label>
            <input name='ancienMotDePasse' type='password' class='form-control' placeholder='Password'>
        </div>
        <div class='field required-field'>
            <label> New Password </label>
            <input name='motDePasse' type='password' id='password' class='form-control' placeholder='Password' onkeyup='return passwordChanged();'>
            <div class='strength' id='strength-result'> Password Strength: No Password </div>
        </div>
        <div class='field required-field'>
            <label> Confirm  New Password </label>
            <input name='motDePasse2' type='password' class='form-control' placeholder='Password'>
        </div>
    </div>

    <button class='btn btn-orange' type='submit'>  Save </button>
</form>
";

extract([
        "data" => $data,
        "dashboard" => false,
        "user" => $user,
        "login" => $login,
        "id" => 3
    ]
);
require(__DIR__ . "/../../base1.php");


?>