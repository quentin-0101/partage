

<?php

/** @var Utilisateur $user */

use App\Models\DataObject\utilisateur\Utilisateur;

if(isset($user)){
    $data = "
    <form method='POST' action='?controller=utilisateur&action=register'>
        <div class='field required-field'>
            <label> First Name </label>
            <input name='prenom' type='text' class='form-control' placeholder='First Name' value='{$user->getPrenom()}' required>
        </div>
    
        <div class='field required-field'>
            <label> Last Name </label>
            <input name='nom' type='text' class='form-control' placeholder='Last Name' value='{$user->getPrenom()}' required>
        </div>
    
        <div class='field required-field'>
            <label> Email </label>
            <input name='email' type='email' class='form-control' placeholder='Email' value='{$user->getEmail()}' required>
        </div>
    
        <div class='field required-field'>
            <label> Phone Number </label>
            <input name='telephone' type='tel' class='form-control' placeholder='Phone number' value='{$user->getTelephone()}' required>
        </div>
    
        <div class='field required-field'>
            <label> Password </label>
            <input name='motDePasse' type='password' id='password' class='form-control' placeholder='Password' onkeyup='return passwordChanged();' required>
            <div class='strength' id='strength-result'> Password Strength: No Password </div>
        </div>
    
        <div class='field required-field'>
            <label> Confirm Password </label>
            <input name='motDePasse2' type='password' class='form-control' placeholder='Password' required>
        </div>
    
        <button class='btn btn-orange' type='submit'>  Sign In </button>
    </form>
";
} else {
    $data = "
       <form method='POST' action='?controller=utilisateur&action=register'>
        <div class='field required-field'>
            <label> First Name </label>
            <input name='prenom' type='text' class='form-control' placeholder='First Name' required>
        </div>
    
        <div class='field required-field'>
            <label> Last Name </label>
            <input name='nom' type='text' class='form-control' placeholder='Last Name' required>
        </div>
    
        <div class='field required-field'>
            <label> Email </label>
            <input name='email' type='email' class='form-control' placeholder='Email' required>
        </div>
    
        <div class='field required-field'>
            <label> Phone Number </label>
            <input name='telephone' type='tel' class='form-control' placeholder='Phone number' required>
        </div>
    
        <div class='field required-field'>
            <label> Password </label>
            <input name='motDePasse' type='password' id='password' class='form-control' placeholder='Password' onkeyup='return passwordChanged();' required>
            <div class='strength' id='strength-result'> Password Strength: No Password </div>
        </div>
    
        <div class='field required-field'>
            <label> Confirm Password </label>
            <input name='motDePasse2' type='password' class='form-control' placeholder='Password' required>
        </div>
    
        <button class='btn btn-orange' type='submit'>  Sign In </button>
    </form>
";
}

extract([
    "data" => $data,
]
);
require("base_register.php");
