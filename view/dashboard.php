<header class="bg-primary text-white text-center masthead-blog">
    <div class="container d-flex align-items-center flex-column">
        <div class="row">


            <div class="col-md-3 mt-5 dashboard-menu">
                <a class="text-black-50" href="#" data-toggle="#dashboard-menu"><h2 class="text-body">Menu</h2></a>
                <?php if ($_SESSION['role'] === 'Admin') : ?>
                    <a class="text-black-50" href="#" data-toggle="#dashboard-add-post">Ajouter un article</a><br>
                    <a class="text-black-50" href="#" data-toggle="#dashboard-my-posts">Mes articles</a><br>
                    <a class="text-black-50" href="#" data-toggle="#dashboard-manage-comments">Gérer les
                        commentaires</a><br>
                    <a class="text-black-50" href="#" data-toggle="">Gérer les utilisateurs</a><br>
                <?php elseif ($_SESSION['role'] === 'Abonné') : ?>

                <?php endif ?>
            </div>

            <!-- DASHBOARD MAIN MENU -->
            <div class="col-md-9 mt-5 dashboard-toggle-item" id="dashboard-menu">
                <h1 class="text-body">Tableau de board</h1>
                <h3 class="text-dark mt-5">Bienvenue <?= $_SESSION['username'] ?> sur l'administration du blog
                    Esteban
                    Vignon</h3>
            </div>

            <?php if ($_SESSION['role'] === 'Admin') : ?>

                <!-- DASHBOARD ADD POST -->
                <div class="col-lg-8 offset-lg-1 col-md-12 mt-5 dashboard-toggle-item" id="dashboard-add-post">
                    <h2 class="text-body">Ajouter un article</h2>
                    <form class="col-12 mt-5" action="<?= HOST ?>addPost" method="post">
                        <div class="form-group text-black-50">
                            <label for="title">Titre de l'article</label>
                            <input type="text" class="form-control" name="values[title]" id="title" placeholder="Titre"
                                   required>
                        </div>
                        <div class="form-group text-black-50">
                            <label for="heading">Chapô</label>
                            <input type="text" class="form-control" name="values[heading]" id="heading"
                                   placeholder="chapô"
                                   required>
                        </div>
                        <div class="form-group text-black-50">
                            <label for="content">Contenu de l'article</label>
                            <textarea class="textarea" name="values[content]" id="content" cols="30" rows="5"
                                      placeholder="Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <!-- DASHBOARD USER'S POSTS -->
                <div class="col-md-9 mt-5 dashboard-toggle-item" id="dashboard-my-posts">
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

                <!-- MANAGE COMMENTS -->
                <div class="col-md-9 mt-5 dashboard-toggle-item" id="dashboard-manage-comments">
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
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

            <?php elseif ($_SESSION['role'] === 'Abonné') : ?>

            <?php endif ?>


        </div>
    </div>
</header>



