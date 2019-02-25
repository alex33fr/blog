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

        <h1>Accueil du blog</h1>
        <p>La liste des derniers billets sur ce blog:</p>
        </br>


        <?php
        while ($data = $posts->fetch())
        {
        ?>
        <div class="news">
            <h2>
                <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']); ?></a>
                <h5>le <?= $data['date_create_fr']; ?></h5>
                <?php if (isset($_SESSION['user'])) : ?>
                <a href="<?= BASE_URL ?>?action=deletePost&id=<?= $data['id'] ?>">Supprimer le post</a>
                <?php endif; ?>
            </h2>

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

<?php require('view/template.php'); ?>