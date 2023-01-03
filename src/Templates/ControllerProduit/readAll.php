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

use App\Models\Lib\MessageFlash;

$messages = MessageFlash::lireTousMessages();

foreach ($messages as $type)
{
    foreach ($type as $m){
        echo $m;
    }
}

?>

<?php /** @var array $produits */
     /** @var Produit $p */

use App\Models\DataObject\produit\Produit;
?>
<div class="wrapper">

<?php foreach($produits as $p) : ?>
    <p>-------------------------</p>
    <p><?php echo $p->getNom() ?></p>
    <a href="?controller=produit&action=update&id=<?php echo rawurlencode($p->getId()) ?>">Edit</a>
    <a href="?controller=produit&action=delete&id=<?php echo rawurlencode($p->getId()) ?>">Remove</a>
    <p>-------------------------</p>
    <br>
<?php endforeach; ?>

</div>
</body>
</html>