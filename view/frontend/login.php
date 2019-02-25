<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 29/01/2019
 * Time: 15:03
 */
?>

<?php $title = "Se connecter"; ?>
<?php ob_start(); ?>
<div>
    <form action="" method='post'>
        <table>
            <tr>
                <td><label for="email">Mail :</label></td>
                <td><input type="email" placeholder="Votre mail" id="email" name="email" value="<?php if(isset($email)) { echo $email; } ?>" /></td>
            </tr>
            <tr>
                <td><label for="password">Mot de passe :</label></td>
                <td><input type="password" placeholder="Votre mot de passe" id="password" name="password" value="<?php if(isset($password)) { echo $password; } ?>" /></td>
            </tr>
            <tr>
                <td><input type="submit" name="login" value="Se connecter"></td>
            </tr>
        </table>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>