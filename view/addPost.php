<header class="bg-primary text-white text-center masthead-blog">
    <div class="container d-flex align-items-center flex-column">


        <div class="row">
            <div class="col-md-3 mt-5 dashboard-menu">
                <h2 class="text-body">Menu</h2>
                <p class="text-dark">Ajouter un article</p>
                <p class="text-dark">Modifier / Supprimer un article</p>
                <p class="text-dark">Gérer les commentaires</p>
                <p class="text-dark">Gérer les utilisateurs</p>
            </div>

            <div class="col-md-9 mt-5">
                <h1 class="text-body">Ajouter un article</h1>

                <form class="col-12" action="<?= HOST ?>addPostForm" method="post">

                    <div class="form-group text-black-50">
                        <label for="title">Titre de l'article</label>
                        <input type="text" class="form-control" name="values[title]" id="title"
                               placeholder="Titre"
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
        </div>


    </div>
</header>