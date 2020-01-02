<header class="bg-primary text-white text-center masthead-blog">
    <div class="container d-flex align-items-center flex-column">
        <div class="row">
            <div class="col-8 offset-2 mt-5">
                <h2 class="text-body">Modifier Article</h2>
                <form class="col-12 mt-5" action="<?= HOST ?>edit-post-send" method="post">

                    <input type="hidden" name="id" value="<?= $post->getId() ?>"/>

                    <div class="form-group text-black-50">
                        <label for="title">Titre de l'article</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Titre"
                               required value="<?= $post->getTitle() ?>">
                    </div>

                    <div class="form-group text-black-50">
                        <label for="heading">Chapô</label>
                        <input type="text" class="form-control" name="heading" id="heading" placeholder="chapô"
                               required value="<?= $post->getHeading() ?>">
                    </div>

                    <div class="form-group text-black-50">
                        <label for="content">Contenu de l'article</label>
                        <textarea class="textarea" name="content" id="content" cols="30" rows="5"
                                  placeholder="Message" required><?= $post->getContent() ?></textarea>
                    </div>
                    <div class="form-group text-black-50">
                        <label for="account-select">Changer l'auteur :</label>
                        <select name="account" id="account-select">
                            <option value="<?= $accountId ?>"><?= $accountUsername ?></option>
                            <?php foreach ($accounts as $account): ?>
                                <option value="<?= $account->getId() ?>"><?= $account->getUsername() ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Modifier</button>

                </form>
            </div>

        </div>
    </div>
</header>



