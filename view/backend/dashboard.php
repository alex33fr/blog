<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 25/02/2019
 * Time: 07:47
 */
?>


<?php $title = "Tableau de bord Administrateur"; ?>
<?php ob_start(); ?>















<?php $content = ob_get_clean(); ?>

<?php require('view/templateAdmin.php'); ?>