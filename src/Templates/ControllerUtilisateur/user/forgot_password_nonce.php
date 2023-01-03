<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

use App\Models\Lib\MessageFlash;

$messages = MessageFlash::lireTousMessages();

foreach ($messages as $type)
{
    foreach ($type as $m){
        echo $m;
    }
}


?>

<form method="post" action="?controller=utilisateur&action=forgot_password">
    <div class='field required-field'>
        <label> email </label>
        <input value="<?php if(isset($email)) echo $email ?>" name='email' type='email' class='form-control'>
    </div>
    <br>
    <div class='field required-field'>
        <label> nonce </label>
        <input value="<?php if(isset($nonce)) echo $nonce ?>" name='nonce' type='text' class='form-control'>
    </div>

    <br>
    <div class='field required-field'>
        <label> mot de passe </label>
        <input name='password' type='password' class='form-control'>
    </div>
    <br>
    <div class='field required-field'>
        <label> retaper votre mot de passe </label>
        <input name='password2' type='password' class='form-control'>
    </div>

    <button class='btn btn-orange' type='submit'>  Envoyer code vérification par email </button>

</form>

</body>
</html>