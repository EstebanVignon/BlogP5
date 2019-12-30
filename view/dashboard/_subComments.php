<div class="col-md-9 mt-5 targetDiv" id="div-menu-target-2">
    <div class="container d-flex align-items-center flex-column">
        <h2 class="text-body">Mes commentaires</h2>
        <div class="row mt-5">
            <?php foreach ($comments as $comment) : ?>
                <div class="mb-4 col-lg-3 offset-lg-1 col-md-5 offset-md-1 card-body border-dark bg-info">
                    <p class="card-text text-light">
                        Le : <?= date('d/m/Y à G:i', strtotime($comment->getCreatedAt())) . '<br>'; ?>
                    </p>
                    <p class="card-text text-light"><?= $comment->getContent() . '<br>'; ?></p>

                    <?php if ($comment->getIsApproved() == 0) : ?>
                        <a class="btn btn-danger mb-3">En attente d'approbation</a>
                    <?php endif ?>

                    <?php if ($comment->getIsApproved() == 1) : ?>
                        <a class="btn btn-success mb-3"
                           href="<?= HOST ?>post/id/<?= $comment->getBlogPostId() ?>">Voir le commentaire</a>
                    <?php endif ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>