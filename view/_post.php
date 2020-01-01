<header class="bg-primary text-white text-center masthead-blog">
    <div class="container d-flex align-items-center flex-column">
        <div class="row col-12">
            <div class="col-12">
                <h1 class="text-body"><?= $post->getTitle(); ?></h1>
                <p class="text-black-50 chapo"><?= $post->getHeading(); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="mt-4 pl-4 pr-4 col-md-10 offset-md-1">

                <p class="text-body text-left"><?= $post->getContent(); ?></p>
                <p class="text-left text-body mt-5"><b>Rédigé par : </b><?= $author->username ?></p>
                <p class="text-left text-body"><b>Le :</b> <?= date('d/m/Y', strtotime($post->getLastModification())) ?>
                </p>
            </div>
        </div>
        <div class="row col-12">
            <div class="mt-5 pl-4 pr-4 col-12">
                <h3 id="commentaires" class="text-body">Commentaires</h3>
            </div>

            <?php if ($comments == false) : ?>
                <div class="row col-6 offset-3 mt-5">
                    <p id="error-comments">Pas encore de commentaires</p>
                </div>
            <?php else : ?>
                <?php foreach ($comments as $comment) : ?>
                    <div class="comment-post p-3 text-white col-12 mt-3 offset-md-2 col-md-8">
                        <p class="text-left text-body">
                            <b><?= 'Par ' . $comment->getUsername() . ' le ' . date('d/m/Y à G:i', strtotime($comment->getCreatedAt())) ?></b>
                        </p>
                        <p class="text-left text-body"><?= nl2br($comment->getContent()) ?></p>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>

        <div class="row mt-5">

            <?php if (isset($message) && $message == 1) : ?>
                <div class="row col-6 offset-3">
                    <p id="comment-message">Merci, commentaire bien reçu. Celui-ci est en attente de modération</p>
                </div>
            <?php endif ?>

            <?php if (isset($accountRole)) : ?>
                <div class="row">
                    <div class="mt-4 pl-4 pr-4 col-md-10 offset-md-1">
                        <form action="<?= HOST ?>addComment" method="post">

                            <input type="hidden" name="id" value="<?= $post->getId() ?>"/>

                            <div class="form-group text-black-50">
                                <label for="content">Message</label>
                                <textarea class="textarea" name="content" id="content" cols="30" rows="5"
                                          placeholder="Message" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Envoyer le commentaire</button>

                        </form>
                    </div>
                </div>
            <?php else : ?>
                <div class="row">
                    <div class="mt-4 pl-4 pr-4 col-md-10 offset-md-1">
                        <h3 id="commentaires" class="text-body">Ecrire un commentaire</h3>
                        <p class="text-body">Vous n'êtes pas connecté, veuillez vous connecter ou créer un compte</p>
                        <br>
                        <a href="<?= HOST ?>login">
                            <button type="button" class="btn btn-primary">Se connecter</button>
                        </a>
                    </div>
                </div>
            <?php endif ?>

        </div>
    </div>
</header>