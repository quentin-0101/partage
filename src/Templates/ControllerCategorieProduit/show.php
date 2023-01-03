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
/** @var array $categoriesProduit */
/** @var CategorieProduit $c */

use App\Models\DataObject\categorie\CategoriePrincipale;
use App\Models\DataObject\categorie\CategorieProduit;

?>
<p>============Sub Categories=============<p>
    <?php
    foreach($categoriesProduit as $c) : ?>
    <p><?php echo $c->getNom() ?></p>
    <a href="?controller=categorieProduit&action=update&id=<?php echo rawurlencode($c->getId())?>">Edit</a>
    <br>
    <a href="?controller=categorieProduit&action=delete&id=<?php echo rawurlencode($c->getId()) ?>">Remove</a>
<?php endforeach; ?>

</body>
</html>