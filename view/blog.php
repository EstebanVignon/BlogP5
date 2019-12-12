<?php $title = 'CV Esteban Vignon - Blog'; ?>
<?php $description = 'Blog - Esteban Vignon Freelance PHP Symfony'; ?>

<?php ob_start(); ?>

<header class="bg-primary text-white text-center masthead-blog">
    <div class="container d-flex align-items-center flex-column">

        <div class="row">
            <h1 class="text-body">Blog</h1>
        </div>
        <div class="card-columns mt-5">

            <!-- Blog Post -->
            <?php foreach ($posts as $data) : ?>
                <div class="card">
                    <div class="card-body border-dark bg-info">
                        <h4 class="card-title"><?= $data['title'] . '<br>'; ?></h4>
                        <p class="card-text text-light"><?= $data['heading'] . '<br>'; ?></p>
                        <a class="btn btn-light mb-3" href="index.php?action=post&id=<?= $data['id'] ?>">Lire</a>
                        <p class="card-text"><small class="text-white-50"><?= 'Le : ' . date('d/m/Y à G:i', strtotime($data['created_at'])) . '<br>'; ?></small></p>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</header>

<?php $content = ob_get_clean(); ?>

<?php require(VIEW . 'template.php'); ?>