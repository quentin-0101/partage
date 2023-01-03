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

/** @var array $sousCategories */
/** @var array $marques */
/** @var CategorieProduit $sousCateg */
/** @var Marque $m */
/** @var Produit $produit */
/** @var Image $img */
/** @var ProduitSpecification $spec */


use App\Models\DataObject\categorie\CategorieProduit;
use App\Models\DataObject\produit\Image;
use App\Models\DataObject\produit\Marque;
use App\Models\DataObject\produit\Produit;
use App\Models\DataObject\produit\ProduitSpecification;

$listeSousCategorie = "";

foreach($sousCategories as $sousCateg)
{
    if(isset($produit) && $produit->getIdCategorieProduit() == $sousCateg->getId()){
        $listeSousCategorie = $listeSousCategorie . "<option value='{$sousCateg->getId()}' selected>{$sousCateg->getNom()}</option>";
    } else {
        $listeSousCategorie = $listeSousCategorie . "<option value='{$sousCateg->getId()}'>{$sousCateg->getNom()}</option>";
    }
}

$selectMarque = "";
foreach ($marques as $m){
    if(isset($produit) && $produit->getIdMarque() == $m->getId()){
        $selectMarque = $selectMarque." <option value='{$m->getId()}' selected>{$m->getNom()}</option> ";
    } else {
        $selectMarque = $selectMarque." <option value='{$m->getId()}'>{$m->getNom()}</option> ";
    }

}

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
<form method='post' action='?controller=produit&action=addV2' enctype='multipart/form-data'>
    <div class='field required-field'>
        <label> Product Name </label>
        <input name='nom' type='text' class='form-control' value='<?php if(isset($produit)) echo $produit->getNom() ?>' required>
    </div>
    <div class='field required-field'>
        <label> Price </label>
        <input name='prix' type='number' step='0.01' class='form-control' value='<?php if(isset($produit)) echo $produit->getPrix() ?>' required>
    </div> 
    <div class='field required-field'>
        <label> Quantity </label>
        <input name='quantite' type='number' class='form-control' value='<?php if(isset($produit)) echo $produit->getQuantite() ?>' required>
    </div>
    <div class='field required-field'>
        <label> Description </label>
        <textarea id='editor' class='col-md-12' name='description' rows='6' ><?php if(isset($produit)) echo ($produit->getDescription()) ?></textarea>
    </div>
    <div class='field required-field'>
        <label> Poids (Kg) </label>
        <input name='poids' type="number" class='form-control' value='<?php if(isset($produit)) echo $produit->getPoids() ?>' required>
    </div>
    <div class='field required-field'>
        <label> Sub categories </label>
        <select name='id_categorie_produit' type='text' class='form-control' required>
            <?php echo $listeSousCategorie; ?>
        </select>
    </div>
    
    <div class='field required-field'>
        <label> Marque </label>
        <select name='id_marque' type='text' class='form-control' required>
            <?php echo $selectMarque; ?>
        </select>
    </div>




    <br>
    <br>


    <input name='files[]' type='file' multiple />

    <?php if(isset($produit)): ?>
        <br>
        <br>

        <h4>ajouter des spécifications</h4>
        <input id="produitSpecification" name="produitSpecification" type="text" class="form-control"/>
        <a onclick="httpGet('?controller=produitSpecification&action=add&id=<?php echo rawurlencode($produit->getId())?>', 0)" href="">ajouter</a>

        <br>
        <br>

        <h4>les spécifications :</h4>
        <?php foreach ($produitSpecification as $spec): ?>
            <p><?php echo $spec->getNom() ?></p>
            <a href="" onclick="httpGet('?controller=produitSpecification&action=delete&id=<?php echo rawurlencode($spec->getId())?>', 1)">supprimer</a>
            <p>--------------------------</p>
            <br>
        <?php endforeach; ?>

        <br>
        <br>

        <?php foreach ($images as $img) : ?>
            <img src="upload/<?php echo $img->getFile()?>" alt="">
            <a onclick="httpGet('?controller=image&action=delete&id=<?php echo rawurlencode($img->getId())?>', 1)" href="">delete this image</a>
            <br>
            <br>
            <br>
        <?php endforeach; ?>

        <br>

        <input hidden name='id' type='int' class='form-control' value='<?php echo $produit->getId() ?>' required>
    <?php endif; ?>

    <button class='btn btn-orange' type='submit'>  save </button>
    <a href="?">back</a>
</form>

<?php

echo " <script src='https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js'></script>";
echo "
    <script>
        ClassicEditor
           .create(document.querySelector('#editor'), {})
           .catch(error => {
               console.log(error);
           });
        
        function httpGet(theUrl, mode)
        {
            var xmlHttp = new XMLHttpRequest();
           
            if(mode === 1){
                 xmlHttp.open( 'GET', theUrl, false ); // false for synchronous request
                xmlHttp.send( null );
            } else {
                text = document.getElementById('produitSpecification').value;
                xmlHttp.open( 'GET', theUrl.concat('&produitSpecification='.concat(text)), false ); // false for synchronous request
                console.log(text);
                xmlHttp.send(null);
            }
            //console.log(xmlHttp.responseText);
            location.reload();
            
            //return ;
        }
    </script>
";

/*
extract([
        "data" => $data,
        "dashboard" => false,
        "user" => $user,
        "login" => $login,
        "id" => 3
    ]
);
require(__DIR__."/../base1.php");
*/


?>


</body>
</html>
