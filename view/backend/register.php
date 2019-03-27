<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01/01/2019
 * Time: 22:20
 */
/*
?>
<!--
<?php $title = "S'enregister"; ?>
<?php ob_start(); ?>

    <div>
        <h2 align="center">Formulaire d'inscription</h2>
        <form method="POST" action="">
            <table>
                <tr>
                    <td align="right">
                        <label for="first_name">Nom :</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Votre nom" id="first_name" name="first_name" value="<?php if(isset($firstName)) { echo $firstName; } ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="last_name">Prénom :</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Votre prénom" id="last_name" name="last_name" value="<?php if(isset($lastName)) { echo $lastName; } ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="email">Mail :</label>
                    </td>
                    <td>
                        <input type="email" placeholder="Votre mail" id="email" name="email" value="<?php if(isset($email)) { echo $email; } ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="email_control">Confirmation du mail :</label>
                    </td>
                    <td>
                        <input type="email" placeholder="Confirmez votre mail" id="email_control" name="email_control" value="<?php if(isset($emailControl)) { echo $emailControl; } ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="password">Mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Votre mot de passe" id="password" name="password" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="password_control">Confirmation du mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Confirmez votre mot de passe" id="password_control" name="password_control" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td align="center">
                        <br />
                        <input type="submit" name="formulary_register" value="Inscription" />
                    </td>
                </tr>
            </table>
        </form>
    </div>


<?php $content = ob_get_clean(); ?>

<?php require('view/templateAdmin.php'); ?>