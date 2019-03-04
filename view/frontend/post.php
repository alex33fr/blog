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

    <div class="news">
        <h3>
            <?= $post['title'] ?>
            <em><?= $post['date_create_fr'] ?></em>
        </h3>
        <p>
            <?= $post['contents']?>
        </p>
    </div>

    <h2>Commentaires</h2>
    <form action="<?= BASE_URL ?>?action=addComment&id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br/>
            <input type="text" id="author" name="author"/>
        </div>
        <div>
            <label for="comment">Commentaire</label><br/>
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>

<?php
    //la liste entiere de posts
    while ($comment = $comments->fetch()) :  ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

    <!-- signaler le commentaire -->
    <form action="<?= BASE_URL ?>?action=reportComment&id=<?= $comment['id'] ?>" method="post">
        <div>
            <button type="submit"  class="btn btn-warning">Signaler le commentaire</button>
        </div>
    </form>

    <?php endwhile; ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>