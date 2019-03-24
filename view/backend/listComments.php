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

<div class="table-responsive text-center mt-5">
    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">Auteur</th>
            <th scope="col">Signalements</th>
            <th scope="col">Post</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>
        <?php while ($data = $listComments->fetch()) :  ?>
        <tr>
            <th scope="row" class="text-nowrap"><?= $data['author'] ?></th>
            <td><?= $data['alert_counter'] ?></td>
            <td class="text-nowrap"><a href="index.php?action=post&id=<?= $data['post_id'] ?>"><?= htmlspecialchars($data['title']) ?></a></td>
            <td><?= htmlspecialchars($data['comment']) ?></td>
            <td><?= $data['comment_date_fr'] ?></td>
            <td>
                <?php if ($data['validate_comment'] == 0): ?>
                <a class="btn btn-success w-100 my-1" href="<?= BASE_URL ?>?action=validateComment&id=<?= $data['id'] ?>">Valider</a>
                <?php endif; ?>

                <?php if ($data['validate_comment'] == 1): ?>
                    <div class="alert alert-success text-center text-muted" role="alert">
                        Commentaire vérifié
                    </div>
                <?php endif; ?>
                <a class="btn btn-danger w-100" href="<?= BASE_URL ?>?action=deleteComment&id=<?= $data['id'] ?>">Supprimer</a></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/templateAdmin.php'); ?>
