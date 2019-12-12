<?php $title = 'CV Esteban Vignon - Login'; ?>
<?php $description = 'Se connecter à l\'interface d\'administration'; ?>

<?php ob_start(); ?>

<header class="bg-primary text-white text-center masthead-blog">
    <div class="container d-flex align-items-center flex-column">
        <div class="row">
            <h1 class="text-body">Dashboard</h1>
        </div>
    </div>
</header>

<?php $content = ob_get_clean(); ?>

<?php require(VIEW . 'template.php'); ?>