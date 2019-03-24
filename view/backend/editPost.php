<?php $title = "Dashboard"; ?>
<?php ob_start(); ?>


    <form action="<?= BASE_URL ?>?action=editPost&id=<?= $data['id'] ?>" method="post">
        <div class="card mt-5 mb-5">

            <div class="card-header">
                <div class="bg-light text-dark text-center py-2">
                    <h3><i class="fa"></i>Éditer le post "<?= htmlspecialchars($data['title']) ?>"</h3>
                </div>
            </div>
            <div class="card-body">
                <!--Body-->
                <div class="mb-2 py-1">
                    <label for="title" class="text-muted">Titre</label>
                    <input class="form-control form-control-lg " type="text" id="title" value="<?= htmlspecialchars($data['title']) ?>" name="title" minlength="3" placeholder="Titre du post" required>
                </div>
                <div class="form-group mb-2">
                    <label for="contents" class="text-muted">Contenu</label>
                    <textarea class="form-control form-control-lg editor" id="contents" name="contents" rows="3"><?= $data['contents'] ?></textarea>
                </div>

                <div class="text-center">
                    <input type="submit" id="contents" value="Editer" class="btn btn-primary btn-block rounded-0 py-2">
                </div>
            </div>
        </div>
    </form>


<?php $content = ob_get_clean(); ?>

<?php require('view/templateAdmin.php'); ?>