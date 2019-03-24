<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01/01/2019
 * Time: 22:20
 */
?>
<?php $title = htmlspecialchars($post['title']); ?>
<?php ob_start(); ?>


    <p><a href="<?= BASE_URL ?>?action=listPosts">Retour à la liste des billets</a></p>


    <div class="card mt-4 mb-4" >
        <h5 class="card-header text-center"><strong><?= htmlspecialchars($post['title']) ?></strong></h5>
        <div class="card-body border-light">
            <p class="card-text"><?= $post['contents'] ?></p>
        </div>
        <div class="text-muted text-center">
            <p>
                <small>#Posté le &nbsp;<?= htmlspecialchars($post['date_create_fr']) ?></small>
            </p>
        </div>
    </div>


    <form action="<?= BASE_URL ?>?action=addComment&id=<?= htmlspecialchars($post['id']) ?>" method="post">
        <div class="card rounded-0 mb-5">
            <div class="card-header p-0">
                <div class="bg-info text-white text-center py-2">
                    <h3><i class="fa"></i>Commenter</h3>
                </div>
            </div>
            <div class="card-body p-3">
                <!--Body-->
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                        </div>
                        <input type="text" class="form-control" id="author" name="author"
                               placeholder="Votre nom" minlength="3" maxlength="50" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                        </div>
                        <textarea class="form-control" placeholder="Contenu ne doit pas dépasser 350 caractères." id="comment" name="comment"
                                  minlength="3" maxlength="350" required></textarea>
                    </div>
                </div>

                <div class="text-center">
                    <input type="submit" value="Envoyer" class="btn btn-info btn-block rounded-0 py-2">
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <?php
        //la liste entiere de commentaires lie a ce post
        while ($comment = $comments->fetch()) : ?>
            <div class="col-lg-12 col-md-10 mx-auto m-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?= htmlspecialchars($comment['author']) ?></strong></h5>
                        <p class="card-text mb-5"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                        <?php if ($comment['validate_comment'] == 0): ?>
                            <!-- signaler le commentaire -->
                            <form action="<?= BASE_URL ?>?action=reportComment&id=<?= $comment['id'] ?>" method="post">
                                <div>
                                    <button type="submit" class="btn btn-warning">Signaler le commentaire</button>
                                </div>
                            </form>
                        <?php endif; ?>
                        <?php if ($comment['validate_comment'] == 1): ?>
                            <div class="alert alert-success col-md-3 text-center text-muted" role="alert">
                                Commentaire vérifié
                            </div>
                        <?php endif; ?>
                        <div class="text-muted">
                            <p>
                                <small>#Posté le&nbsp;<?= $comment['comment_date_fr'] ?></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>