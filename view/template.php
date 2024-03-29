<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $pageDesc ?>">

    <title><?= $pageTitle ?></title>

    <!-- Custom fonts for this theme -->
    <link href="<?= ASSETS ?>fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= HOST ?>favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= HOST ?>favicon.ico" type="image/x-icon">

    <!-- Theme CSS -->
    <link href="<?= ASSETS ?>css/style.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?= HOST ?>home">Accueil</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
            Menu <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?= HOST ?>blog">Blog</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?= HOST ?>home#about">À
                        Propos</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?= HOST ?>home#contact">Contact</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?= HOST ?>login"><i class="fas fa-sign-in-alt"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?= $contentPage ?>

<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <div class="row">

            <!-- Footer Location -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">Emplacement</h4>
                <p class="lead mb-0">Lyon 5ème
                    <br>France</p>
            </div>

            <!-- Footer Social Icons -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">Mes Reseaux</h4>
                <a class="btn btn-outline-light btn-social mx-1" href="https://github.com/EstebanVignon"
                   target="_blank">
                    <i class="fab fa-github"></i>
                </a>
                <a class="btn btn-outline-light btn-social mx-1" href="https://www.linkedin.com/in/estebanvignon/"
                   target="_blank">
                    <i class="fab fa-fw fa-linkedin-in"></i>
                </a>
            </div>

        </div>
    </div>
</footer>

<!-- Copyright Section -->
<section class="copyright py-4 text-center text-white">
    <div class="container">
        <small>Copyright &copy; Esteban Vignon - 2019</small>
    </div>
    <div class="container">
        <?php if (!isset($accountRole)) : ?>
            <small><a href="<?= HOST ?>login">Se connecter</a></small><br>
        <?php elseif (isset($accountRole)) : ?>
            <small><a href="<?= HOST ?>dashboard">Dashboard</a></small><br>
            <small><a href="<?= HOST ?>logout">Se déconnecter</a></small>
        <?php endif; ?>
    </div>
</section>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?= ASSETS ?>jquery/jquery.min.js"></script>
<script src="<?= ASSETS ?>bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="<?= ASSETS ?>jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="<?= ASSETS ?>js/freelancer.js"></script>

</body>

</html>

