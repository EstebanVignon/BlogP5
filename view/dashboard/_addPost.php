<div class="col-lg-8 offset-lg-1 col-md-12 mt-5 targetDiv" id="div-menu-target-2">
    <h2 class="text-body">Ajouter un article</h2>
    <form class="col-12 mt-5" action="<?= HOST ?>addPost" method="post">
        <div class="form-group text-black-50">
            <label for="title">Titre de l'article</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Titre"
                   required>
        </div>
        <div class="form-group text-black-50">
            <label for="heading">Chapô</label>
            <input type="text" class="form-control" name="heading" id="heading"
                   placeholder="chapô"
                   required>
        </div>
        <div class="form-group text-black-50">
            <label for="content">Contenu de l'article</label>
            <textarea class="textarea" name="content" id="content" cols="30" rows="5"
                      placeholder="Message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>