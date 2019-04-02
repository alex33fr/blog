<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01/01/2019
 * Time: 21:17
 */
?>
    <?php $title = 'Blog | Mr Jean F'; ?>
    <?php ob_start(); ?>


    <div class="col-xs-4 mx-center">
        <?php
        while ($data = $posts->fetch()):
        ?>
            <div class="card mt-4 mb-4">
                <h5 class="card-header text-center"><strong><a href="index.php?action=post&amp;id=<?= $data['id'] ?>" style="text-decoration: none;"><?= htmlspecialchars($data['title']); ?></a></strong></h5>
                <div class="card-body border-light">
                        <p class="card-text"><?= $data['contents']; ?></p>
                </div>
                <div class="text-right">
                    <a href="index.php?action=post&amp;id=<?= htmlspecialchars($data['id']) ?>" class="btn btn-primary">Commenter</a>
                </div>
                <div class="text-muted text-center">
                    <p><small>#Posté le &nbsp;<?= htmlspecialchars($data['date_create_fr']); ?></small></p>
                </div>
            </div>
        <?php
        endwhile;
        $posts->closeCursor();

        ?>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>