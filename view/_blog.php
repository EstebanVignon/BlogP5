<header class="bg-primary text-white text-center masthead-blog">
    <div class="container d-flex align-items-center flex-column">

        <div class="row">
            <h1 class="text-body">Blog</h1>
        </div>

        <div class="row card-columns mt-5">

            <!-- Blog Post -->
            <?php foreach ($posts as $post) : ?>
                <div class=" col-4 mb-3">
                    <div class="card-body border-dark bg-info">
                        <h4 class="card-title"><?= $post->getTitle() . '<br>'; ?></h4>
                        <p class="card-text text-light"><?= $post->getHeading() . '<br>'; ?></p>
                        <a class="btn btn-light mb-3" href="<?= HOST ?>post?id=<?= $post->getId() ?>">Lire</a>
                        <p class="card-text">
                            <small class="text-white-50">
                                <?= 'Le : ' . date('d/m/Y', strtotime($post->getLastModification())) . '<br>'; ?>
                            </small>
                        </p>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</header>