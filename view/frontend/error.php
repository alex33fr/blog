<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01/01/2019
 * Time: 22:20
 */
?>
<?php $title = "Oups !" ?>
<?php ob_start(); ?>

    <h1>Une erreur</h1>
    <p> <?= $errorMessage ?></p>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>