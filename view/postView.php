<?php $title = 'CV Esteban Vignon - ' . $post['title']; ?>

<?php $description = 'Article de blog : ' . $post['title']; ?>

<?php ob_start(); ?>
<header class="bg-primary text-white text-center masthead-blog">
    <div class="container d-flex align-items-center flex-column">
        <div class="row col-12">
            <div class="col-12">
                <h1 class="text-body"><?= $post['title']; ?></h1>
                <p class="text-black-50 chapo"><?= $post['heading']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="mt-4 pl-4 pr-4 col-md-10 offset-md-1">

                <p class="text-body text-left"><?= $post['content']; ?></p>

                <p class="text-left text-body mt-5"><b>Rédigé par : </b><?= $author['username'] ?></p>
                <p class="text-left text-body"><b>Le :</b> <?= date('d/m/Y', strtotime($post['created_at'])) ?></p>
            </div>
        </div>
        <div class="row col-12">
            <div class="mt-5 pl-4 pr-4 col-12">
                <h3 class="text-body">Commentaires</h3>
            </div>
            <!-- Start Comments -->
            <?php foreach ($comments as $comment) : ?>
                <div class="comment-post p-3 text-white col-12 mt-3 offset-md-1 col-md-8">
                    <p class="text-left text-body"><b><?= 'Par ' . $comment['firstname'] . ' ' . $comment['lastname'] . ' le ' . date('d/m/Y à g:i', strtotime($comment['created_at'])) ?></b></p>
                    <p class="text-left text-body">Super article de blog ! Continuez comme ça ! :)</p>
                </div>
            <?php endforeach ?>
            <!-- End Comments -->
        </div>
        <div class="row mt-5">
            <form role="form" class="col-12">
                <div class="form-group text-black-50">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="text-black-50">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</header>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>