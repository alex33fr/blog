<?php $title = "Dashboard"; ?>
<?php ob_start(); ?>

    <h2>Publier un nouveau post</h2>
    <form action="<?= BASE_URL ?>?action=createPost" method="post">
        <div>
            <label for="title">Titre</label><br/>
            <input type="text" id="title" name="title"/>
        </div>
        <div>
            <script src="https://cloud.tinymce.com/5/tinymce.min.js? apiKey = t85s1gkpfpkpmqhqacg7cmokm4zlqtrb1icavaflwa6y3169"></script>
            <script>tinymce.init({ selector:'textarea' });</script>
            <label for="contents">Contenu</label><br/>
            <textarea id="contents" name="contents"></textarea>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>




<?php $content = ob_get_clean(); ?>

<?php require('view/templateAdmin.php'); ?>