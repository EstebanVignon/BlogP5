<?php $title = 'Erreur' ?>

<?php $description = 'Erreur Sur Le Site CV de Esteban Vignon - Développeur PHP Symphony' ?>

<?php ob_start(); ?>

<header class="bg-primary text-white text-center masthead-blog">
    <div class="container d-flex align-items-center flex-column">

        <div class="row">
            <h1 class="text-body">Erreur !</h1>
        </div>
        <div class="row mt-5">
            <p class="error-text"><?= $errorMessage ?></p>
        </div>
    </div>
</header>

<?php $content = ob_get_clean(); ?>

<?php require('frontend/template.php'); ?>