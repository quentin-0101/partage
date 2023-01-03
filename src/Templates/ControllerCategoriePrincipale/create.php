<?php

/**
 * @var CategoriePrincipale $categorieP;
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

<form method='POST' action='?controller=categoriePrincipale&action=<?php echo $type; ?>'>
    <div class='field required-field'>
        <label> Category Name </label>
        <input name='nom' type='text' value='<?php if(isset($categorieP)) echo $categorieP->getNom(); ?>' class='form-control' required>
    </div>
    <div class='field required-field'>
        <label> Description </label>
        <textarea name='description' rows='10' cols='50'><?php if(isset($categorieP)) echo $categorieP->getDescription(); ?></textarea>
    </div>
    <?php if(isset($categorieP)) : ?>
        <input hidden name='id' type='number' value='<?php echo $categorieP->getId(); ?>'>
    <?php endif; ?>
    <button class='btn btn-orange' type='submit'>  Add </button>
</form>



