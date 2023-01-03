<?php

/**
 * @var CategoriePrincipale $c;
 */

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

<form method='POST' action='?controller=categorieProduit&action=<?php echo $type ?>'>
    <div class='field required-field'>
        <label> Category </label>
        <select name='id_categorie_principale' type='text' class='form-control' required>
            <?php foreach($categories as $c): ?>
                <?php if(isset($categorieP) && $c->getId() == $categorieP->getId()): ?>
                    <option value='<?php echo $c->getId() ?>' selected><?php echo $c->getNom() ?></option>
                <?php else : ?>
                    <option value='<?php echo $c->getId() ?>'><?php echo $c->getNom() ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>

    <div class='field required-field'>
        <label> Category Name </label>
        <input name='nom' type='text' value='<?php if(isset($categorieP)) echo $categorieP->getNom(); ?>' class='form-control' required>
    </div>
    <div class='field required-field'>
        <label> Description </label>
        <textarea name='description' rows='10' cols='50'><?php if(isset($categorieP)) echo $categorieP->getDescription(); ?></textarea>
    </div>
    <input hidden name='id' value='<?php if(isset($categorieP)) echo $categorieP->getId(); ?>'>
    <button class='btn btn-orange' type='submit'>  Add </button>
</form>



