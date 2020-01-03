<div class="col-md-9 mt-5 targetDiv" id="div-menu-target-4">
    <div class="container d-flex align-items-center flex-column">
        <h2 class="text-body">Gérer les commentaires</h2>
        <div class="row mt-5">
            <?php foreach ($comments as $comment) : ?>
                <div class="mb-4 col-lg-3 offset-lg-1 col-md-5 offset-md-1 card-body border-dark bg-info">
                    <p class="card-text text-light">Rédigé par
                        : <?= $comment->getUsername() . '<br>Le : ' . date('d/m/Y à G:i', strtotime($comment->getCreatedAt())) . '<br>'; ?></p>
                    <p class="card-text text-light"><?= $comment->getContent() . '<br>'; ?></p>

                    <?php if ($comment->getApproved() == 0) : ?>
                        <a class="btn btn-success mb-3"
                           href="<?= HOST ?>approve-comment/id/<?= $comment->getId() ?>">Approuver</a>
                    <?php endif ?>

                    <?php if ($comment->getApproved() == 1) : ?>
                        <a class="btn btn-warning mb-3"
                           href="<?= HOST ?>disapprove-comment/id/<?= $comment->getId() ?>">Désaprouver</a>
                    <?php endif ?>

                    <a class="btn btn-danger mb-3"
                       href="<?= HOST ?>delete-comment/id/<?= $comment->getId() ?>">Supprimer</a>

                    <a href="<?= HOST ?>post/id/<?= $comment->getBlogPostId() ?>">
                        <p class="card-text text-light">Article en lien</p>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

