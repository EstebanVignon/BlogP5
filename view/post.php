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
                <p class="text-left text-body"><b>Le :</b> <?= date('d/m/Y', strtotime($post->getCreatedAt())) ?></p>
            </div>
        </div>
        <div class="row col-12">
            <div class="mt-5 pl-4 pr-4 col-12">
                <h3 class="text-body">Commentaires</h3>
            </div>

            <?php if ($comments == false) : ?>
                <div>
                    <p id="error-comments">Pas encore de commentaires</p>
                </div>
            <?php endif ?>

            <!-- Start Comments -->
            <?php foreach ($comments as $comment) : ?>
                <div class="comment-post p-3 text-white col-12 mt-3 offset-md-1 col-md-8">
                    <p class="text-left text-body"><b><?= 'Par ' . $comment['firstname'] . ' ' . $comment['lastname'] . ' le ' . date('d/m/Y à G:i', strtotime($comment['created_at'])) ?></b></p>
                    <p class="text-left text-body"><?= (!isset($comment['content'])) ? '<p>Pas encore de commentaire</p>' : nl2br($comment['content']) ?></p>
                </div>
            <?php endforeach ?>
            <!-- End Comments -->

        </div>

        <div class="row mt-5">

            <form class="col-12" action="<?= HOST ?>addComment&amp;id=<?= $post->getId() ?>" method="post">

                <div class="form-group text-black-50">
                    <label for="email">Adresse Email</label>
                    <input type="email" class="form-control" name ="email" id="email" placeholder="Enter email" required>
                </div>

                <div class="form-group text-black-50">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" name ="firstname" id="firstname" placeholder="Prénom" required>
                </div>

                <div class="form-group text-black-50">
                    <label for="lastname">Nom</label>
                    <input type="text" class="form-control" name ="lastname" id="lastname" placeholder="Nom" required>
                </div>

                <div class="form-group text-black-50">
                    <label for="content">Message</label>
                    <textarea class="textarea" name ="content" id="content" cols="30" rows="5" placeholder="Message" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>
</header>