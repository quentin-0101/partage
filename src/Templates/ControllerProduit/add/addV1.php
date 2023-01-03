<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/espace.css">
    <title>Document</title>
</head>
<body>

<?php


/** @var array $categories */
/** @var CategoriePrincipale $categ */

use App\Models\DataObject\categorie\CategoriePrincipale;
?>

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
<div class="wrapper">

<form method='post' action='?controller=produit&action=addV1'>
    <div class='field required-field'>
        <label> Category </label>
        <select name='id_categorie_principale' type='text' class='form-control' required>
            <?php foreach ($categories as $categ) :?>
                <?php echo "<option value='{$categ->getId()}'>{$categ->getNom()}</option>"; ?>
            <?php endforeach; ?>
        </select>
    </div>


    <button class='btn btn-orange' type='submit'>  Next </button>
</form>
</div>

</body>
</html>