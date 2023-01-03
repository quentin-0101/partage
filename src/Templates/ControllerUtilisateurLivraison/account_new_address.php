<?php

/** @var Utilisateur $user */
/** @var boolean $dashboard */
/** @var UtilisateurLivraison $livraison */
/** @var UtilisateurLivraison $livraisonErreur */



use App\Models\DataObject\utilisateur\Utilisateur;
use App\Models\DataObject\utilisateur\UtilisateurLivraison;

$paysOptions = "";
if($livraison != null){
    foreach ($listPays as $pays){
        if($livraison->getIdPays() == $pays) $paysOptions = $paysOptions." <option value='$pays' selected> $pays </option>";
        $paysOptions = $paysOptions." <option value='$pays'> $pays </option>";
    }
} else if(isset($livraisonErreur)) {
    foreach ($listPays as $pays){
        if($pays == $livraisonErreur->getIdPays()) $paysOptions = $paysOptions." <option value='$pays' selected> $pays </option>";
        else  $paysOptions = $paysOptions." <option value='$pays'> $pays </option>";
    }
} else {
    foreach ($listPays as $pays){
        if($pays == "France") $paysOptions = $paysOptions." <option value='$pays' selected> $pays </option>";
        else  $paysOptions = $paysOptions." <option value='$pays'> $pays </option>";
    }
}

if($livraison == null){
    $data  ="
<form method='post' action='?controller=utilisateurLivraison&action=account_new_address_valid'>

    <h4> Address </h4>

    <div class='field required-field'>
        <label> Street Address </label>
        <input name='adresse' type='text' class='form-control' required>
    </div>

    <div class='field required-field'>
        <label> City  </label>
        <input name='ville' type='text' class='form-control' required>
    </div>

    <div class='field required-field'>
        <label> Zip/Postal Code  </label>
        <input name='code_postal' type='text' class='form-control' required>
    </div>

    <div class='field required-field'>
        <label> Country  </label>
        <select name='pays' required>
            $paysOptions
        </select>
    </div>

    <div class='form-check'>
        <input name='default' type='checkbox' class='form-check-input'>
        <label class='form-check-label'> Use as my default shipping address </label>
    </div>

    <button class='btn btn-orange' type='submit'>  Save </button>
</form>
";
} else {
    $data  ="
<form method='post' action='?controller=utilisateurLivraison&action=account_new_address_valid'>

    <h4> Address </h4>

    <div class='field required-field'>
        <label> Street Address </label>
        <input name='adresse' type='text' class='form-control' value='{$livraison->getAdresse()}' required>
    </div>

    <div class='field required-field'>
        <label> City  </label>
        <input name='ville' type='text' class='form-control' value='{$livraison->getVille()}' required>
    </div>

    <div class='field required-field'>
        <label> Zip/Postal Code  </label>
        <input name='code_postal' type='text' class='form-control' value='{$livraison->getCodePostal()}' required>
    </div>

    <div class='field required-field'>
        <label> Country  </label>
        <select name='pays' required>
            $paysOptions
        </select>
    </div>

    <div class='form-check'>
        <input name='default' type='checkbox' class='form-check-input'>
        <label class='form-check-label'> Use as my default shipping address </label>
    </div>
            <input hidden name='update' type='text' class='form-control' value='{$livraison->getId()}' required>


    <button class='btn btn-orange' type='submit'>  Save </button>
</form>
";
}



extract([
        "data" => $data,
        "dashboard" => false,
        "user" => $user,
        "login" => $login,
        "id" => 4
    ]
);
require(__DIR__ . "/../base1.php");
