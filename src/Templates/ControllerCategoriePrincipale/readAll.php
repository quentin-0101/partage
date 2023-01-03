
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
/** @var array $mainCategories */
/** @var CategoriePrincipale $m */

use App\Models\DataObject\categorie\CategoriePrincipale;

?>
<p>============Main Categories=============<p>
<?php
foreach($mainCategories as $m) : ?>
    <p><?php echo $m->getNom() ?></p>
    <a href="?controller=categoriePrincipale&action=update&id=<?php echo rawurlencode($m->getId())?>">Edit</a>
    <br>
    <a href="?controller=categoriePrincipale&action=delete&id=<?php echo rawurlencode($m->getId()) ?>">Remove</a>
    <br>
    <a href="?controller=categorieProduit&action=show&id=<?php echo rawurlencode($m->getId()) ?>">Voir les sous-catégories</a>
    <br>
<?php endforeach; ?>

</body>
</html>