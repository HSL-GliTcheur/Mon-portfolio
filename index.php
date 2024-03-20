<?php
try {
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost:3306;dbname=admin_cc;charset=utf8', 'xxtofoo_admin', '#admin2024');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die ('Erreur : ' . $e->getMessage());
}
// Si tout va bien, on peut continuer


// On récupère tout le contenu de la table h_compétences
$sqlQuery = "SELECT * FROM `h_competences`";

$codetatement = $mysqlClient->prepare($sqlQuery);
$codetatement->execute();
$code = $codetatement->fetchAll();



// On récupère tout le contenu de la table h_os
$sqlQuery = "SELECT * FROM `h_os`";

$ostatement = $mysqlClient->prepare($sqlQuery);
$ostatement->execute();
$os = $ostatement->fetchAll();


// On récupère tout le contenu de la table h_diplomes
$sqlQuery = "SELECT * FROM `h_diplomes`";

$diplometatement = $mysqlClient->prepare($sqlQuery);
$diplometatement->execute();
$diplome = $diplometatement->fetchAll();


// On récupère tout le contenu de la table h_stages
$sqlQuery = "SELECT * FROM `h_stages`";

$stagetatement = $mysqlClient->prepare($sqlQuery);
$stagetatement->execute();
$stage = $stagetatement->fetchAll();


// On récupère tout le contenu de la table h_realisation
$sqlQuery = "SELECT * FROM `h_realisation`";

$realisationtatement = $mysqlClient->prepare($sqlQuery);
$realisationtatement->execute();
$realisation = $realisationtatement->fetchAll();

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio</title>
    <meta name="description"
        content="Je m'appelle Hugo SIMON, je suis au Lycée Saint Jean-Baptiste de
    La Salle, je suis plus précisément en 1ère SN spécialité RISC. Je suis passionné par l'informatique et voici mon portfolio.">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/74b1f80ce2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- <link rel="stylesheet" href="./node_modules/animate.css/animate.css"> -->
    <link rel="stylesheet" href="./scss/style.css">
</head>

<body>
    <header>
        <nav class=" navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="./">Portfolio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav text-center nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#page2">Compétences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#page3">CV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#page4">Diplômes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Stages</a>
                            <ul class="dropdown-menu">
                                <?php foreach ($stage as $liststage) { ?>
                                    <li><a class="dropdown-item text-center" href="#TP<?php echo $liststage['id']; ?>">
                                            <?php echo $liststage['classement']; ?> stage
                                        </a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#page7">Réalisation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#page8">Inspirations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pagex">Me contacter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Home -->
    <section data-bs-spy="scroll" data-bs-target="#navbarNavDropdown">

        <section id="pag1" class="page1">
            <div class="container">
                <div class="row gy-4 align-items-center">
                    <div class="col-12 col-md-6">
                        <h1 class="fw-bold animate__animated animate__fadeInLeft">Je suis <b class="fw-bold">Hugo
                                SIMON</b>
                            Lycéen au
                            Lycée
                            Saint-Jean-Baptiste de
                            La Salle.</h1>
                        <h2 class="fw-light animate__animated animate__fadeInLeft animate__delay-1s">Bienvenue sur mon
                            site.</h2>
                        <a href="#page6"
                            class="btn bgorange btnorange mt-5 btnFont animate__animated animate__fadeInTopLeft animate__delay-2s">Qui
                            suis-je</a>
                    </div>
                    <div class="col-12 col-md-6">
                        <img class="rounded-1 animate__animated animate__fadeInRight animate__delay-1s"
                            src="../img/ImageCodeHTML.png" alt="image du code source" width="100%">
                    </div>
                </div>
            </div>
        </section>

        <!-- Mes compétences -->

        <section id="page2" class="py-5 section">
            <div class="container">
                <h2 class="mb-0 titre wow animate__animated animate__zoomIn animate__delay-1s">Mes compétences</h2>
                <h3 class="fw-light fs-5 sousTitre wow animate__animated animate__fadeInLeft animate__delay-1s">
                    Développement
                    web et système d'exploitation </h3>
                <!-- Developpement -->
                <div class="row align-items-center gy-4 mt-4">
                    <div class="col-12 col-md-7 wow animate__animated animate__zoomIn animate__delay-1s">

                        <!-- Progress bar -->
                        <?php foreach ($code as $listcode) { ?>
                            <div class="mb-3 p-3 bg-white rounded-3 shadow-sm">
                                <div class="row align-items-center">
                                    <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fab <?php echo $listcode['icon']; ?> fa-2x me-3 corange"
                                                aria-hidden="true"></i>
                                            <p class="fw-bold m-0">
                                                <?php echo $listcode['titre']; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="<?php echo $listcode['pourcentage']; ?>%">
                                            <div class="progress-bar w-<?php echo $listcode['pourcentage']; ?> bgorange"
                                                role="progressbar" aria-valuenow="<?php echo $listcode['pourcentage']; ?>"
                                                aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <div
                        class="col-12 offset-md-1 col-md-4 wow animate__animated animate__fadeInRight animate__delay-1s">
                        <img src="./img/logo code.png" alt="écran montrant du code php" width="100%"
                            class="rounded-3 shadow">
                    </div>
                </div>

                <!-- système d'exploitation -->
                <div class="row align-items-center gy-4 mt-4">
                    <div class="col-12 col-md-4">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Windows_Terminal_logo.svg/2560px-Windows_Terminal_logo.svg.png"
                            alt="écran montrant des designs" width="100%"
                            class="rounded-3 shadow wow animate__animated animate__fadeInLeft animate__delay-1s">
                    </div>
                    <div
                        class="col-12 order-first offset-md-1 col-md-7 order-md-last wow animate__animated animate__zoomIn animate__delay-1s">

                        <!-- Progress bar -->
                        <?php foreach ($os as $listos) { ?>
                            <div class="mb-3 p-3 bg-white rounded-3 shadow-sm">
                                <div class="row align-items-center">
                                    <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fab <?php echo $listos['icon']; ?> fa-2x me-3 corange"
                                                aria-hidden="true"></i>
                                            <p class="fw-bold m-0" style="font-size: 0.8rem;">
                                                <?php echo $listos['titre']; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="<?php echo $listos['pourcentage']; ?>%">
                                            <div class="progress-bar w-<?php echo $listos['pourcentage']; ?> bgorange"
                                                role="progressbar" aria-valuenow="<?php echo $listos['pourcentage']; ?>"
                                                aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>


        </section>

        <!-- CV -->

        <section id="page3" class="py-5 section">
            <!-- Button trigger modal -->
            <button type="button"
                class="btn bgorange btnorange mx-auto d-block btnFont wow animate__animated animate__fadeIn animate__delay-1s"
                data-bs-toggle="modal" data-bs-target="#MesCv">
                Mes CV
            </button>

            <!-- Modal -->
            <div class="modal fade" id="MesCv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Mes CV</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="card">
                                <img src="./img/cv-hugo-simon-1-ere-risc-nouveau-crop.png" class="card-img-top"
                                    alt="Premier CV">
                                <div class="blur"></div>
                                <div class="card-body">
                                    <h5 class="card-title">CV le plus récent</h5>
                                    <p class="card-text">Ce CV contient les stages les plus récents</p>
                                    <a href="./img/cv-hugo-simon-1-ere-risc-modifie.pdf"
                                        class="btn btn-primary btnFont">Télécharger</a>
                                </div>
                            </div>

                            <div class="card mt-2">
                                <img src="./img/cv-hugo-simon-1-ere-risc-crop.png" class="card-img-top"
                                    alt="Deuxième CV">
                                <div class="blur"></div>
                                <div class="card-body">
                                    <h5 class="card-title">CV le plus ancien</h5>
                                    <p class="card-text">Ce CV contient les ancien stages</p>
                                    <a href="./img/cv-hugo-simon-1-ere-risc.pdf"
                                        class="btn btn-primary btnFont">Télécharger</a>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnFont"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mes diplômes -->

        <main>
            <section id="page4" class="py-5 section">
                <div class="container">
                    <h2 class="mb-0 titre wow animate__animated animate__zoomIn animate__delay-1s">Mes diplômes</h2>
                    <h3
                        class="fw-light fs-5 mb-5 sousTitre wow animate__animated animate__fadeInLeft animate__delay-1s">
                        Visualisation et téléchargement</h3>
                </div>
                <div class="container">
                    <div class="row g-5 align-items-end">
                        <?php foreach ($diplome as $listdiplome) { ?>
                            <div
                                class="col-xs-12 col-sm-6 col-md-4 col-lg-4 wow animate__animated animate__flipInX animate__delay-2s ">
                                <div class="card">
                                    <div class="card-header fw-bold text-center">
                                        <?php echo $listdiplome['titre']; ?>
                                    </div>
                                    <div style="max-height: 150px; overflow: hidden;">
                                        <img src="./img/<?php echo $listdiplome['image']; ?>"
                                            class="card-img-top mobile-view border-bottom" alt="certification Pix">
                                    </div>
                                    <div class="blur"></div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?php echo $listdiplome['date']; ?>
                                        </p>
                                        <a href="./img/file-download/<?php echo $listdiplome['page']; ?>"
                                            class="btn bgorange btnorange mb-2 btnFont" target="_blank">Voir la page</a>
                                        <a href="./img/file-download/<?php echo $listdiplome['telechargement']; ?>"
                                            class="btn btn-primary  mb-2 btnFont" target="_blank"
                                            download="Certification PIX Hugo SIMON">Télécharger</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                </div>
            </section>
        </main>

        <!-- Mes stages -->

        <section id="page5" class="py-5 section2 mb-5">
            <div class="container mb-5">
                <h2 class="mb-0 titre wow animate__animated animate__zoomIn animate__delay-1s">Mes Stages</h2>
            </div>
            <div class="container">
                <div class="row">
                    <?php $z = 1;
                    foreach ($stage as $liststage) { ?>
                        <div id="TP<?php echo $liststage['id']; ?>" class="col-xs-12 col-sm-12   col-md-6 col-lg-6     mb-xs-5 mb-sm-5  mb-5  <?php if ($z % 2 != 1)
                               echo "space1"; ?>">
                            <div
                                class="col stage rounded-3 shadow w-auto wow animate__animated animate__fadeInLeft animate__delay-1s">
                                <div class="row bg-sombre">
                                    <div class="col-4 img-center"><img
                                            src="./img/logo-stage/<?php echo $liststage['image']; ?>" alt="" width="100%">
                                    </div>
                                    <div class="col-8 fw-bold fs-5">
                                        <?php echo $liststage['titre']; ?>
                                    </div>
                                </div>
                                <div class="row h-100 bar-top mt-1 mb-3" style="padding-left: 5px;">
                                    <?php echo $liststage['description']; ?>
                                </div>
                            </div>
                        </div>
                        <?php $z++;
                    } ?>

                </div>
        </section>

        <!-- Qui suis-je -->

        <section id="page6" class="py-5">
            <div class="container text-center">
                <h2 class="fw-bold mb-4 titre wow animate__animated animate__zoomIn animate__delay-1s">Qui suis-je ?
                </h2>

                <p
                    class="text-center w-75 mx-auto wow animate__animated animate__zoomInUp animate__delay-1s animate__slow">
                    Je
                    m’appelle Hugo, j’ai 16 ans et je suis en première
                    RISC. Après un cursus général, j’ai intégré une 4ème et une 3ème professionnelle au lycée La Salle
                    de Thillois. J’y ai découvert plusieurs spécialités dont les aménagements paysagers. C’est au cours
                    d’un stage dans une entreprise de développement Web que j’ai pu trouver ma voie.</p>
            </div>

        </section>

        <section id="page7" class="py-5 section3">
            <div class="container mb-5">
                <h2 class="text-center titre wow animate__animated animate__zoomIn animate__delay-1s">Mes réalisation
                </h2>
                <p class="text-center wow animate__animated animate__fadeInLeft animate__delay-1s">Une partie de ses
                    sites seront disponibles sur <a href="#page9" class="corange">mon
                        profil
                        github</a></p>
            </div>


            <div class="container wow animate__animated animate__backInUp animate__slow">
                <div id="carouselExampleCaptions" class="carousel carousel-dark slide contour" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php $data = 0;
                        foreach ($realisation as $listrealisation) { ?>
                            <button type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="<?php echo $data; ?>" class="active" aria-current="true"
                                aria-label="Slide 1"></button>
                            <?php $data++;
                        } ?>
                    </div>
                    <div class="carousel-inner">
                        <?php foreach ($realisation as $listrealisation) { ?>
                            <div class="carousel-item active" data-bs-interval="5000"> <!--  5s -->
                                <img src="./img/realisation/<?php echo $listrealisation['image']; ?>" class="d-block w-100"
                                    alt="<?php echo $listrealisation['titre']; ?>">
                            </div>
                        <?php } ?>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark-clear rounded-1" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark-clear rounded-1" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>


                <div class="accordion mt-5" id="accordionExample">
                    <?php $active = 1;
                    foreach ($realisation as $listrealisation) { ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header"> <!-- ajouter collapsed pour la 2 -->
                                <button class="accordion-button <?php if ($active == 1) {
                                    echo "";
                                } else {
                                    echo "collapsed";
                                }
                                ?>" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?php echo $listrealisation['data']; ?>" aria-expanded="false"
                                    aria-controls="collapse<?php echo $listrealisation['data']; ?>">
                                    <?php echo $listrealisation['titre']; ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $listrealisation['data']; ?>" class="accordion-collapse collapse <?php if ($active == 1) {
                                   echo "show";
                               } else {
                                   echo "";
                               }
                               ?>" data-bs-parent="#accordionExample">
                                <!--  reitrer le show pour la 2 -->
                                <div class="accordion-body">
                                    <?php echo $listrealisation['description']; ?> <br>
                                    <a href="<?php echo $listrealisation['lien']; ?>">
                                        <?php echo $listrealisation['titre']; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php $active++;
                    } ?>
                </div>
            </div>

        </section>

        <img src="./img/wave.svg" alt="background" class="mt-2">

        <!-- Mes inspirations -->

        <section id="page8" class="pb-5">
            <div class="deco text-center"></div>
            <div class="container">
                <h2 class="titre wow animate__animated animate__zoomIn animate__delay-1s">Mes Inspirations</h2>
                <p class="mb-5 sousTitre wow animate__animated animate__fadeInLeft animate__delay-1s">Les sites du
                    moment qui m'inspirent</p>


                <div class="mt-2 row inspirations">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="margin-right: 30px; margin-bottom: 30px;">
                        <img src="./img/Expo-site/Inspiration1.png" alt="" width="240px">
                        <p class="mt-2">Mon site</p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="margin-right: 30px; margin-bottom: 30px;">
                        <img src="./img/Expo-site/Inspiration1.png" alt="" width="240px">
                        <p class="mt-2">Mon site</p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="margin-right: 30px; margin-bottom: 30px;">
                        <img src="./img/Expo-site/Inspiration1.png" alt="" width="240px">
                        <p class="mt-2">Mon site</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Me contacter -->

        <section id="pagex" class="py-5">
            <div class="container wow animate__animated animate__zoomIn animate__delay-1s">
                <div class="row w-100 h-100">
                    <div class="col-12 bg-light rounded-3 test-shadow">
                        <h3 class="text-center border-bottom mb-4 titre">Me contacter</h3>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3 mb-md-0 text-center ">
                                <a href="tel:+33768661249" class="hover-width"
                                    style="color: black; text-decoration: none;"><i class="fa-solid fa-phone"></i> Mon
                                    téléphone 07.68.66.12.49</a>
                            </div>
                            <div class="col-12 col-md-6 text-center">
                                <a href="mailto:hsl.glitcheur@gmail.com, petit.cali@hotmail.fr" class="hover-width"
                                    style="color: black; text-decoration: none;"><i class="fa-solid fa-envelope"></i>
                                    M'envoyer un Email</a>
                            </div>
                        </div>
                        <div class="container text-center mt-3">
                            Disponibilité <span class="fw-bold">Reims</span> et ses alentours
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>


    <footer class="overflow-hidden">
        <div class="row mt-2 pb-5">
            <div
                class="col-xs-12 col-sm-12   col-md-4 col-lg-4 text-center  border-responsive    mb-1 pb-1 mb-md-0 mb-md-0">
                <h4 class="mb-3 titre">Mes réseaux</h4>
                <a href=" https://github.com/HSL-GliTcheur"><i class="fa-brands fa-github fa-xl mb-3"></i>
                    <span class="special">Github</span></a><br>
                <a href="https://fr.linkedin.com/in/hugo-simon-633959233"><i
                        class="fa-brands fa-linkedin fa-xl mb-3"></i> <span class="special">Linkedin</span></a>
            </div>
            <div
                class="col-xs-12 col-sm-12   col-md-4 col-lg-4 text-center  border-responsive   mb-1 pb-1 mb-md-0 mb-md-0">
                <h4 class="mb-3 titre">Tu veux revoir une partie ?</h4>
                <a href="#" class="special">Home</a><br>
                <a href="#page2" class="special">Compétences</a><br>
                <a href="#page3" class="special">CV</a><br>
                <a href="#page4" class="special">Diplômes</a><br>
                <a href="#page5" class="special">Stages</a><br>
                <a href="#page7" class="special">Réalisation</a><br>
                <a href="#page8" class="special">Inspirations</a>
            </div>
            <div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
                <h4 class="mb-3 titre">Mes autres sites !</h4>
                <?php foreach ($realisation as $listrealisation) { ?>
                    <a href="<?php echo $listrealisation['lien']; ?>" class="special">
                        <?php echo $listrealisation['titre']; ?>
                    </a><br>
                <?php } ?>
            </div>
        </div>
    </footer>


    <a href="#" id="backToTop"><i class="fa-solid fa-arrow-up" style="color: orange;"></i></a>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script src="./node_modules/wow.js/dist/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="./js/script.js"></script>

</body>

</html>