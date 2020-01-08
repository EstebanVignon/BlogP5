<div class="col-md-9 mt-5 targetDiv" id="div-menu-target-5">
    <div class="container d-flex align-items-center flex-column">
        <h2 class="text-body">Gérer les comptes uilisateurs</h2>
        <div class="row mt-5">
            <?php foreach ($accounts as $account) : ?>
                <div class="mb-4 col-lg-3 offset-lg-1 col-md-5 offset-md-1 card-body border-dark bg-info">
                    <p class="card-text text-light">
                        Nom d'utilisateur : <?= $account->getUsername(); ?>
                    </p>
                    <p class="card-text text-light">
                        <?= $account->getRole() . '<br>'; ?>
                    </p>


                    <?php if ($account->getRole() === 'Abonné') : ?>
                        <a class="btn btn-success mb-3" href="<?= HOST ?>promote-account/id/<?= $account->getId() ?>">
                            Promouvoir
                        </a>
                    <?php endif ?>

                    <?php if ($account->getRole() === "Admin") : ?>
                        <a class="btn btn-warning mb-3" href="<?= HOST ?>decrease-account/id/<?= $account->getId() ?>">
                            Destituer
                        </a>
                    <?php endif ?>

                    <a class="btn btn-danger mb-3" href="<?= HOST ?>delete-account/id/<?= $account->getId() ?>">
                        Supprimer
                    </a>

                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

