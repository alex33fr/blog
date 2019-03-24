<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="Bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="Bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="Bootstrap/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" style="color: #1d2124" href="index.php">Accueil (Frontend)</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <!--  <li>  -->
                    <!--       <a class="nav-link" href="<?= BASE_URL ?>?action=register">Créer l'utilisateur</a> -->
                <!--  </li> -->
                <li>
                    <a class="nav-link" href="<?= BASE_URL ?>?action=listComments">Commentaire signalées</a>
                </li>
                <li>
                    <a class="nav-link" href="<?= BASE_URL ?>?action=listPostsAdmin">Liste des Posts</a>
                </li>
                <li>
                    <a class="nav-link" href="<?= BASE_URL ?>?action=logout">Se déconnecter</a>
                </li>
                <li>
                    <a class="nav-link"
                       href="<?= BASE_URL ?>?action=dashboard"><?= $_SESSION['user']['last_name'] ?> <?= $_SESSION['user']['first_name'] ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Page Header -->
<header style="background-color:#0018ff;">
</header>

<!-- Main Content -->
<div class="container mt-5" style="padding-top: 60px;">
        <?= $content ?>
        <!-- Pager -->
    </div>
</div>
<hr>

<!-- Footer -->
<footer>
    <p class="copyright text-muted">Copyright &copy; Blog Jean Forteroche 2019</p>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="Bootstrap/vendor/jquery/jquery.min.js"></script>
<script src="Bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom scripts for this template -->
<script src="Bootstrap/js/clean-blog.min.js"></script>
<script src="public/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector: 'textarea.editor',height:400});</script>

</body>

</html>
