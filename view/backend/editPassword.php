<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11/03/2019
 * Time: 15:01
 */
?>

<?php $title = 'Changer mot de passe'; ?>
<?php ob_start(); ?>

 <p><?= $message ?></p>

<form class="form" method="POST">
    <div class="form-group">
        <label for="ancient_password">Ancien mot de passe</label>
        <input type="password" id="ancient_password" name="ancient_password" class="form-control mt-2 mb-2" aria-describedby="passwordHelpInline" minlength="8" required>

        <label for="new_password">Nouveau mot de passe</label>
        <input type="password" id="new_password" name="new_password" class="form-control mt-2 mb-2" aria-describedby="passwordHelpInline" minlength="8" required>

        <label for="repeat_new_password">Confirmez votre mot de passe</label>
        <input type="password" id="repeat_new_password" name="repeat_new_password" class="form-control mt-2 mb-2" aria-describedby="passwordHelpInline" minlength="8" required>

        <input type="submit" class="btn btn-primary btn-lg btn-block p-2 mt-2 mb-2" name="editPassword" value="Changer" />
        <small id="passwordHelpInline" class="text-muted">
           Mot de passe doit comporter entre 8 et 20 caractères.
        </small>
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/templateAdmin.php'); ?>
