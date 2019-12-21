<header class="bg-primary text-white text-center masthead-blog">
    <div class="container d-flex align-items-center flex-column">
        <div class="row">

            <div class="col-md-3 mt-5 dashboard-menu">
                <a class="text-black-50" href="#" data-toggle="#dashboard-menu"><h2 class="text-body">Menu</h2></a>
                <a class="text-black-50" href="#" data-toggle="#dashboard-add-post">Ajouter un article</a><br>
                <a class="text-black-50" href="#" data-toggle="#dashboard-my-posts">Mes articles</a><br>
                <a class="text-black-50" href="#" data-toggle="">Gérer les commentaires</a><br>
                <a class="text-black-50" href="#" data-toggle="">Gérer les utilisateurs</a><br>
            </div>


            <div class="col-md-9 mt-5 dashboard-toggle-item" id="dashboard-menu">
                <h1 class="text-body">Dashboard</h1>
                <h2 class="text-dark mt-5">Bienvenue sur l'interface d'administration du blog de Esteban Vignon</h2>
            </div>

            <div class="col-md-9 mt-5 dashboard-toggle-item" id="dashboard-add-post">
                <h1 class="text-body">Ajouter un article</h1>
                <form class="col-12 mt-5" action="<?= HOST ?>addPost" method="post">
                    <div class="form-group text-black-50">
                        <label for="title">Titre de l'article</label>
                        <input type="text" class="form-control" name="values[title]" id="title" placeholder="Titre"
                               required>
                    </div>
                    <div class="form-group text-black-50">
                        <label for="heading">Chapô</label>
                        <input type="text" class="form-control" name="values[heading]" id="heading" placeholder="chapô"
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

            <div class="col-md-9 mt-5 dashboard-toggle-item" id="dashboard-my-posts">
                <p>mes articles</p>
                <!-- Blog Post -->
                <?php foreach ($posts as $post) : ?>
                    <div class=" col-4 mb-3">
                        <div class="card-body border-dark bg-info">
                            <h4 class="card-title"><?= $post->getTitle() . '<br>'; ?></h4>
                            <p class="card-text text-light"><?= $post->getHeading() . '<br>'; ?></p>
                            <a class="btn btn-light mb-3" href="<?= HOST ?>post&id=<?= $post->getId() ?>">Lire</a>
                            <p class="card-text">
                                <small class="text-white-50">
                                    <?= 'Le : ' . date('d/m/Y à G:i', strtotime($post->getCreatedAt())) . '<br>'; ?>
                                </small>
                            </p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
</header>



