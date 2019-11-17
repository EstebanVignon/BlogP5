<?php $title = 'CV Esteban Vignon - Login'; ?>
<?php $description = 'Se connecter à l\'interface d\'administration'; ?>

<?php ob_start(); ?>

<header class="bg-primary text-white text-center masthead-blog">
    <div class="container d-flex align-items-center flex-column">

        <div class="row">
            <h1 class="text-body">Login</h1>
        </div>

        <div class="row mt-5">

            <form class="col-12" action="index.php?action=login" method="post">

                <div class="form-group text-black-50">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="username" class="form-control" name="username" id="username" placeholder="Nom d'utilisateur" required>
                </div>

                <div class="form-group text-black-50">
                    <label for="pwd">Mot de passe</label>
                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Mot de passe">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

                <div class="row mt-3 text-black-50">
                    <?= $loginErrorMessage ?>
                </div>

           
            </form>

        </div>

    </div>
</header>

<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>