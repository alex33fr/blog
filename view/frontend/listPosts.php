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

        <?php
        while ($data = $posts->fetch())
        {
        ?>
        <div class="news">
            <h2>
                <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']); ?></a>
                <h5><?= $data['date_create_fr']; ?></h5>
            </h2>
            <p>
            <?= nl2br(($data['contents'])); ?>
            <br />
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a>
            </p>
        </div>
        <?php
        }
        $posts->closeCursor();

        ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>