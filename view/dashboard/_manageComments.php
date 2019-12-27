<div class="col-md-9 mt-5 targetDiv" id="div-menu-target-4">
    <div class="container d-flex align-items-center flex-column">
        <h2 class="text-body">Gérer les commentaires</h2>
        <div class="row mt-5">
            <?php foreach ($commentsToApprove as $commentToApprove) : ?>
                <div class="mb-4 col-lg-3 offset-lg-1 col-md-5 offset-md-1 card-body border-dark bg-info">
                    <p class="card-text text-light">Rédigé par
                        : <?= $commentToApprove->getUsername() . '<br>Le : ' . date('d/m/Y à G:i', strtotime($commentToApprove->getCreatedAt())) . '<br>'; ?></p>
                    <p class="card-text text-light"><?= $commentToApprove->getContent() . '<br>'; ?></p>

                    <?php if ($commentToApprove->getIsApproved() == 0) : ?>
                        <a class="btn btn-success mb-3"
                           href="<?= HOST ?>approve-comment/<?= $commentToApprove->getId() ?>">Approuver</a>
                    <?php endif ?>

                    <?php if ($commentToApprove->getIsApproved() == 1) : ?>
                        <a class="btn btn-warning mb-3"
                           href="<?= HOST ?>disapprove-comment/<?= $commentToApprove->getId() ?>">Désaprouver</a>
                    <?php endif ?>

                    <a class="btn btn-danger mb-3"
                       href="<?= HOST ?>delete-comment/<?= $commentToApprove->getId() ?>">Supprimer</a>

                    <a href="<?= HOST ?>post?id=<?= $commentToApprove->getBlogPostId() ?>"><p class="card-text text-light">Article en lien</p></a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>