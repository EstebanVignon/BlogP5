<header class="bg-primary text-white text-center masthead-blog">
    <div class="container d-flex align-items-center flex-column">

        <div class="row">
            <div class="col-md-3 mt-5 dashboard-menu">

                <a class="text-black-50 dashboard-menu-item" id="menu-target-1" href="#"><h2 class="text-body">Menu</h2></a>

                <?php if ($_SESSION['role'] === 'Admin') : ?>
                    <a class="text-black-50 dashboard-menu-item" id="menu-target-2" href="#">Ajouter un article</a><br>
                    <a class="text-black-50 dashboard-menu-item" id="menu-target-3" href="#">Mes articles</a><br>
                    <a class="text-black-50 dashboard-menu-item" id="menu-target-4" href="#">Gérer les commentaires</a><br>
                    <a class="text-black-50 dashboard-menu-item" id="menu-target-5" href="#">Gérer les utilisateurs</a><br>
                <?php elseif ($_SESSION['role'] === 'Abonné') : ?>

                <?php endif ?>
                <div class="mt-3"><a class="logout-link" href="<?= HOST ?>logout">Se déconnecter</a><br></div>
            </div>

            <!-- DASHBOARD MAIN MENU -->
            <?php include_once('_mainDashboardMenu.php') ?>

            <?php if ($_SESSION['role'] === 'Admin') : ?>

                <!-- DASHBOARD ADD POST -->
                <?php include_once('_addPost.php') ?>
                <!-- DASHBOARD USER'S POSTS -->
                <?php include_once('_userPosts.php') ?>
                <!-- MANAGE COMMENTS -->
                <?php include_once('_manageComments.php') ?>

            <?php elseif ($_SESSION['role'] === 'Abonné') : ?>

            <?php endif ?>

        </div>
    </div>
</header>



