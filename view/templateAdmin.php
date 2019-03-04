<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
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
                <li>
                    <a class="nav-link" href="<?= BASE_URL ?>?action=register">Créer l'utilisateur</a>
                </li>
                <li>
                    <a class="nav-link" href="<?= BASE_URL ?>?action=listComments">Commentaire signalées</a>
                </li>
                <li >
                    <a class="nav-link" href="<?= BASE_URL ?>?action=logout">Se déconnecter</a>
                </li>
                <li class="nav-link">
                    <?= $_SESSION['user']['last_name'] ?> <?= $_SESSION['user']['first_name'] ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Page Header -->
<header class="masthead" style="background-color:#0018ff;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
    </div>
        </div>
    </div>
</header>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <?= $content ?>
            </div>
            <!-- Pager -->
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Blog Jean Forteroche 2019</p>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JavaScript -->
<script src="Bootstrap/vendor/jquery/jquery.min.js"></script>
<script src="Bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="Bootstrap/js/clean-blog.min.js"></script>

</body>

</html>
