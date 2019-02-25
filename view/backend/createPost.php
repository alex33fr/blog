<?php $title = "Ajouter un article"; ?>
<?php ob_start(); ?>

    <h2>Créer un nouveau post</h2>
    <form action="index.php?action=createPost" method="post">
        <div>
            <label for="title">Titre</label><br/>
            <input type="text" id="title" name="title"/>
        </div>
        <div>
            <label for="contents">Contenu</label><br/>
            <textarea id="contents" name="contents"></textarea>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('view/templateAdmin.php'); ?>