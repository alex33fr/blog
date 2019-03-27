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
    <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-10 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Se connecter</h5>
                        <form action="" method='post' class="form-signin">
                            <div class="form-label-group">
                                <input type="email" id="email" name="email" value="<?php if(isset($email)) { echo $email; } ?>" class="form-control mb-2"  placeholder="Email" required autofocus>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="password" name="password" value="<?php if(isset($password)) { echo $password; } ?>" class="form-control mb-3" placeholder="Mot de passe" required>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="login">Connecter</button>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>