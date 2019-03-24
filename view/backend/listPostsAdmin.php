<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11/03/2019
 * Time: 15:01
 */
?>

<?php $title = 'Liste des Posts'; ?>
<?php ob_start(); ?>


<div class="table-responsive text-center mt-5">
    <table class="table table-sm ">
        <thead>
        <tr>
            <th scope="col">Date du Post</th>
            <th scope="col">Nom du Post</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($data = $posts->fetch()) :  ?>
            <tr>
                <td class="text-nowrap"><?= htmlspecialchars($data['date_create_fr']); ?></td>
                <th scope="row"><a href="<?= BASE_URL ?>?action=post&id=<?= $data['id'] ?>"><?= $data['title'] ?></a></th>
                <td><a class="btn btn-secondary m-1" href="<?= BASE_URL ?>?action=editPost&id=<?= $data['id'] ?>">&nbsp;&nbsp;&nbsp;&nbsp;Editer&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    <a class="btn btn-danger m-1" href="<?= BASE_URL ?>?action=deletePost&id=<?= $data['id']?>">Supprimer</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/templateAdmin.php'); ?>
