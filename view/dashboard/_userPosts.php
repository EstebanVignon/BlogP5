<div class="col-md-9 mt-5 targetDiv" id="div-menu-target-3">
    <div class="container d-flex align-items-center flex-column">
        <h2 class="text-body">Mes articles</h2>
        <div class="row mt-5">
            <?php foreach ($posts as $post) : ?>
                <div class="mb-4 col-lg-5 offset-lg-1 col-md-12 offset-md-0 card-body border-dark bg-info">
                    <h4 class="card-title"><?= $post->getTitle() . '<br>'; ?></h4>
                    <p class="card-text text-light"><?= $post->getHeading() . '<br>'; ?></p>
                    <p class="card-text text-light"><?= substr($post->getContent(), 0, 50) . '...<br>'; ?></p>
                    <a class="btn btn-light mb-3"
                       href="<?= HOST ?>post&id=<?= $post->getId() ?>">Lire</a>
                    <p class="card-text">
                        <small class="text-white-50">
                            <?= 'Le : ' . date('d/m/Y à G:i', strtotime($post->getCreatedAt())) . '<br>'; ?>
                        </small>
                    </p>
                    <a class="btn btn-secondary mb-3" href="<?= HOST ?>edit-post/<?= $post->getId() ?>">Modifier</a>
                    <a class="btn btn-danger mb-3" href="<?= HOST ?>del-post/<?= $post->getId() ?>">Supprimer</a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>