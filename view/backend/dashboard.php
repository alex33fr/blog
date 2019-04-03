<?php $title = "Créer un nouveau Post"; ?>
<?php ob_start(); ?>

    <form action="<?= BASE_URL ?>?action=createPost" method="post">
        <div class="card mt-5 mb-5">

            <div class="card-header">
                <div class="bg-light text-dark text-center py-2">
                    <h3><i class="fa"></i>Créer nouveau Post</h3>
                </div>
            </div>
            <div class="card-body">
                <!--Body-->
                <div class="mb-2 py-1">
                    <label for="title" class="text-muted">Titre du Post</label>
                    <input class="form-control form-control-lg " type="text" id="title" name="title" minlength="3" required>
                </div>
                <div class="form-group mb-2">
                    <label for="contents" class="text-muted">Contenu du Post</label>
                    <textarea class="form-control form-control-lg editor" id="contents" minlength="3" name="contents" rows="3"></textarea>
                </div>

                <div class="text-center">
                    <input type="submit" id="contents" value="Publier" class="btn btn-primary btn-block rounded-0 py-2">
                </div>
            </div>
        </div>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('view/templateAdmin.php'); ?>