<header class="bg-primary text-white text-center masthead-blog">
    <div class="container d-flex align-items-center flex-column">
        <div class="row">
            <h1 class="text-body">Login</h1>
        </div>
        <div class="row mt-5">
            <!-- START LOGIN FORM -->
            <form class="col-12" action="<?= HOST ?>checkLogin" method="post">
                <div class="form-group text-black-50">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="username" class="form-control" name="values[username]" id="username" placeholder="Nom d'utilisateur">
                </div>
                <div class="form-group text-black-50">
                    <label for="pwd">Mot de passe</label>
                    <input type="password" class="form-control" name="values[password]" id="pwd" placeholder="Mot de passe">
                </div>
                <button type="submit" name="values[submit-connexion]" class="btn btn-primary">Se Connecter</button>
                <button type="submit" name="values[submit-register]" class="btn btn-warning">S'inscrire</button>
                <div class="row mt-3 text-black-50 login-error-message align-text">
                    <?= !empty($errorMessage) ? $errorMessage : ''; ?>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
    </div>
</header>