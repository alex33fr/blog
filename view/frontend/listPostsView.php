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

        <h1>Page d'acceuil du blog</h1>
        <p>La liste des derniers billets sur ce blog :</p>


        <?php
        while ($data = $posts->fetch())
        {
        ?>
        <div class="news">
            <h3>
                <?= htmlspecialchars($data['title']); ?>
                <em>le <?= $data['date_create_fr']; ?></em>
            </h3>

            <p>
            <?= nl2br(htmlspecialchars($data['contents'])); ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
            </p>
        </div>
        <?php
        }
        $posts->closeCursor();
        ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>