<?php $title = 'Accueil - CV Esteban Vignon ' ?>

<?php $description = 'Site CV de Esteban Vignon - Développeur PHP Symphony' ?>

<?php ob_start(); ?>
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image -->
        <img class="masthead-avatar mb-5" src="./public/img/esteban.png" alt="">
        <!-- Masthead Heading -->
        <h1 class="masthead-heading text-uppercase mb-0">Esteban Vignon</h1>
        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading -->
        <p class="masthead-subheading font-weight-light mb-0">Développeur PHP - Symphony</p>
    </div>
</header>
<!-- About Section -->
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-white">À Propos</h2>
        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content -->
        <div class="row">
            <div class="col-lg-6 mr-auto offset-lg-3">
                <p class="lead">J'ai étudié chez OpenClassrooms PHP et Symphony grâce à leur parcours. Vous pouvez
                    télécharger mon CV au format PDF en cliquant ci-dessous :</p>
            </div>
        </div>
        <!-- About Section Button -->
        <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-light" href="files/cv.pdf" target="_blank">
                <i class="fas fa-download mr-2"></i>
                Télécharger
            </a>
        </div>
    </div>
</section>
<!-- Contact Section -->
<section class="page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Me Contacter</h2>
        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form name="sentMessage" id="contactForm" novalidate="novalidate">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Nom</label>
                            <input class="form-control" id="name" type="text" placeholder="Nom" required="required" data-validation-required-message="Merci de saisir votre nom">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Adresse Email</label>
                            <input class="form-control" id="email" type="email" placeholder="Adresse Email" required="required" data-validation-required-message="Merci de saisir votre adresse email">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>