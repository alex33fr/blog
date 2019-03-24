<?php $title = "Dashboard"; ?>
<?php ob_start(); ?>


    <form action="<?= BASE_URL ?>?action=editPost&id=<?= $data['id'] ?>" method="post">

        <div>
            <label for="title">Titre</label><br/>
            <input  type="text" id="title" name="title" value="<?= htmlspecialchars($data['title']) ?>"/>
        </div>
        <div>
            <textarea class="editor" id="contents" name="contents"><?= $data['contents'] ?></textarea>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>




<?php $content = ob_get_clean(); ?>

<?php require('view/templateAdmin.php'); ?>