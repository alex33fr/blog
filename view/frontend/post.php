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

    <h1>Page des Posts (postView)</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>

    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['date_create_fr'] ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($post['contents'])) ?>
        </p>
    </div>

    <h2>Commentaires</h2>
    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
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
    <form action="<?= BASE_URL ?>?action=alertComment&id=<?= $comment['id'] ?>" method="post">
        <div>
            <button name="alertComment" type="submit" value="alertComment">Signaler le commentaire</button>
        </div>
    </form>

        <!-- approuver le commentaire -->
    <?php if (isset($_SESSION['user'])) : //TODO Finir Approuver le commentaire?>
        <form action="index.php?action=validateComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <button name="validateComment" type="submit" value="validateComment">Approuver le commentaire</button>
        </div>
        </form>
        <form action="<?= BASE_URL ?>?action=deleteComment&id=<?= $comment['id'] ?>" method="post">
        <div>
            <button name="deleteComment" type="submit" value="deleteComment">Supprimer le commentaire</button>
        </div>
        </form>
    <?php endif; ?>

    <?php endwhile; ?>

    <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Lire la suite &rarr;</a>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>