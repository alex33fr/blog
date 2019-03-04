<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 25/02/2019
 * Time: 21:17
 */
?>

<?php $title = "Moderation"; ?>
<?php ob_start(); ?>

<div></br>
    </br>
    </br>

<?php
//la liste des commentaires

while ($data = $listComments->fetch()) :  ?>
    <p><strong><a href="<?= BASE_URL ?>?action=post&id=<?= $data['post_id'] ?>"><?= htmlspecialchars($data['title']) ?></a></strong> <p> <?= $data['comment_date_fr'] ?></p>
    <h3>Auteur&nbsp;:&nbsp;<?= $data['author'] ?></h3>
    <strong>Commentaire&nbsp;:&nbsp;</strong><p><?= nl2br(htmlspecialchars($data['comment'])) ?></p>

    <!-- approuver le commentaire -->
    <a href="<?= BASE_URL ?>?action=validateComment&id=<?= $data['id'] ?>">Valider le commentaire</a>


    <!-- supprimer le commentaire -->
    <a href="<?= BASE_URL ?>?action=deleteComment&id=<?= $data['id'] ?>">Supprimer le commentaire</a>

<?php endwhile; ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/templateAdmin.php'); ?>
