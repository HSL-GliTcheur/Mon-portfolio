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

$alltatement = $mysqlClient->prepare($sqlQuery);
$alltatement->execute();
$all = $alltatement->fetchAll();

// On affiche chaque recette une à une
foreach ($all as $listall) {
}
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
                            <a class="nav-link" href="#TP3">CV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#page4">Diplômes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Stages</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#page5">Premier stage</a></li>
                                <li><a class="dropdown-item" href="#TP4">Deuxième stage</a></li>
                                <li><a class="dropdown-item" href="#TP5">Troisème stage</a></li>
                                <li><a class="dropdown-item" href="#TP6">Quatrième stage</a></li>

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
                        <?php foreach ($all as $listall) { ?>
                            <div class="mb-3 p-3 bg-white rounded-3 shadow-sm">
                                <div class="row align-items-center">
                                    <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                                        <div class="d-flex align-items-center">
                                            <i class="fab <?php echo $listall['icon']; ?> fa-2x me-3 corange"
                                                aria-hidden="true"></i>
                                            <p class="fw-bold m-0">
                                                <?php echo $listall['titre']; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress" data-bs-toggle="tooltip" title=""
                                            data-bs-original-title="<?php echo $listall['pourcentage']; ?>%">
                                            <div class="progress-bar w-<?php echo $listall['pourcentage']; ?> bgorange"
                                                role="progressbar" aria-valuenow="<?php echo $listall['pourcentage']; ?>"
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
                        <div class="mb-3 p-3 bg-white rounded-3 shadow-sm">
                            <div class="row align-items-center">
                                <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fab fa-windows fa-2x me-3 corange" aria-hidden="true"></i>
                                        <p class="fw-bold m-0" style="font-size: 0.8rem;">Windows</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress" data-bs-toggle="tooltip" title=""
                                        data-bs-original-title="75%">
                                        <div class="progress-bar w-75 bgorange" role="progressbar" aria-valuenow="75"
                                            aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 p-3 bg-white rounded-3 shadow-sm">
                            <div class="row align-items-center">
                                <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-brands fa-linux fa-2xl me-3 corange" aria-hidden="true"></i>
                                        <p class="fw-bold m-0">Linux</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress" data-bs-toggle="tooltip" title=""
                                        data-bs-original-title="50%">
                                        <div class="progress-bar w-50 bgorange role=" progressbar" aria-valuenow="50"
                                            aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 p-3 bg-white rounded-3 shadow-sm">
                            <div class="row align-items-center">
                                <div class="col-5 col-sm-4 col-lg-3 col-xl-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-brands fa-apple fa-2xl me-3 corange" aria-hidden="true"></i>
                                        <p class="fw-bold m-0">Mac os</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress" data-bs-toggle="tooltip" title=""
                                        data-bs-original-title="25%">
                                        <div id="TP3" class="progress-bar w-25 bgorange" role="progressbar"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



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

                        <div
                            class="col-xs-12 col-sm-6 col-md-4 col-lg-4 wow animate__animated animate__flipInX animate__delay-2s ">
                            <div class="card">
                                <div class="card-header fw-bold text-center">
                                    Pix
                                </div>
                                <img src="./img/pix-certif-crop.png" class="card-img-top mobile-view border-bottom"
                                    alt="certification Pix">
                                <div class="blur"></div>
                                <div class="card-body">
                                    <p class="card-text">
                                        Obtenu le 23 mai 2022.
                                    </p>
                                    <a href="./img/file-download/pix-certif.pdf"
                                        class="btn bgorange btnorange mb-2 btnFont" target="_blank">Voir la page</a>
                                    <a href="./img/file-download/pix-certif.pdf" class="btn btn-primary  mb-2 btnFont"
                                        target="_blank" download="Certification PIX Hugo SIMON">Télécharger</a>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-xs-12 col-sm-6 col-md-4 col-lg-4 wow animate__animated animate__flipInX animate__delay-1s">
                            <div class="card">
                                <div class="card-header fw-bold text-center">
                                    DIPLÔME NATIONAL DU BREVET
                                </div>
                                <img src="./img/dnb-diplomes-1.jpg" class="card-img-top mobile-view border-bottom"
                                    alt="DIPLÔME NATIONAL DU BREVET">
                                <div class="blur"></div>
                                <div class="card-body">
                                    <p class="card-text">
                                        Obtenu le 07 juillet 2022.
                                    </p>
                                    <a href="./img/file-download/dnb-diplomes.pdf"
                                        class="btn bgorange btnorange  mb-2 btnFont" target="_blank">Voir la page</a>
                                    <a href="./img/file-download/dnb-diplomes.pdf" class="btn btn-primary  mb-2 btnFont"
                                        target="_blank"
                                        download="Diplôme national du brevet Hugo SIMON.pdf">Télécharger</a>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-xs-12 col-sm-6 col-md-4 col-lg-4 wow animate__animated animate__flipInX animate__delay-2s">
                            <div class="card">
                                <div class="card-header fw-bold text-center">
                                    ASSR2
                                </div>
                                <img src="./img/Attestation-ASSR2.png" class="card-img-top mobile-view border-bottom"
                                    alt="certification Attestation ASSR2">
                                <div class="blur"></div>
                                <div class="card-body">
                                    <p class="card-text">
                                        Obtenu le 20 juillet 2022.
                                    </p>
                                    <a href="./img/file-download/Attestation ASSR2.pdf"
                                        class="btn bgorange btnorange  mb-2 btnFont" target="_blank">Voir la page</a>
                                    <a href="./img/file-download/Attestation ASSR2.pdf"
                                        class="btn btn-primary  mb-2 btnFont" target="_blank"
                                        download="Attestation ASSR 2 Hugo SIMON.pdf">Télécharger</a>
                                </div>
                            </div>
                        </div>

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
                    <div class="col-xs-12 col-sm-12   col-md-6 col-lg-6     mb-xs-5 mb-sm-5  mb-5">
                        <div
                            class="col stage rounded-3 shadow w-auto wow animate__animated animate__fadeInLeft animate__delay-1s">
                            <div class="row bg-sombre">
                                <div class="col-4 img-center"><img src="./img/logo-stage/collège-paul-fort.jpg" alt=""
                                        width="100%"></div>
                                <div class="col-8 fw-bold fs-5">Collège Paul Fort | 06 Novembre au 08 Décembre 2023
                                </div>
                            </div>
                            <div id="TP4" class="row h-100 bar-top mt-1 mb-3" style="padding-left: 5px;">
                                - Paramétrage et installation de Windows<br>
                                - Utilisation d’un serveur<br>
                                - Gestion des utilisateurs windows (Editeur de registre, IACA)
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12   col-md-6 col-lg-6     mb-xs-5 mb-sm-5  mb-5 space1">
                        <div
                            class="col stage rounded-3 shadow w-auto wow animate__animated animate__fadeInRight animate__delay-1s">
                            <div class="row bg-sombre">
                                <div class="col-4 img-center"><img src="./img/logo-stage/Logo-VIVESCIA.png" alt=""
                                        width="100%"></div>
                                <div class="col-8 fw-bold fs-5">Entreprise VIVESCIA | 12 Juin au 07 Juillet 2023</div>
                            </div>
                            <div id="TP5" class="row h-100 bar-top mt-1 mb-3" style="padding-left: 5px;">
                                - Mettre en images des ordinateurs<br>
                                - Remplacement d’ordinateurs sur les sites<br>
                                - Tri du matériel défectueux

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12   col-md-6 col-lg-6     mb-xs-5 mb-sm-5  mb-5">
                        <div
                            class="col stage rounded-3 shadow w-auto wow animate__animated animate__fadeInLeft animate__delay-1s">
                            <div class="row bg-sombre">
                                <div class="col-4 img-center"><img src="./img/logo-stage/Nutab-logo.png" alt=""
                                        width="100%"></div>
                                <div class="col-8 fw-bold fs-5">Entreprise NUTAB | 7 au 18 Mars 2021</div>
                            </div>
                            <div id="TP6" class="row h-100 bar-top mt-1 mb-3" style="padding-left: 5px;">
                                - Développer des sites internet pour les clients<br>
                                - Mettre en avant le site sur les réseaux sociaux
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12   col-md-6 col-lg-6     mb-xs-5 mb-sm-5  mb-5 space1">
                        <div
                            class="col stage rounded-3 shadow w-auto wow animate__animated animate__fadeInRight animate__delay-1s">
                            <div class="row bg-sombre">
                                <div class="col-4 img-center"><img src="./img/logo-stage/Lantana-logo.png" alt=""
                                        width="100%">
                                </div>
                                <div class="col-8 fw-bold fs-5">Entreprise Lantana | 29 novembre au 3 décembre 2021
                                </div>
                            </div>
                            <div class="row h-100 bar-top mt-1 mb-3" style="padding-left: 5px;">
                                - Intervention chez des particuliers <br>
                                - Utilisation de plusieurs outils (souffleur, taille-haie)
                            </div>
                        </div>
                    </div>
                </div>
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
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">

                        <div class="carousel-item active" data-bs-interval="20000"> <!--  20s -->
                            <video controls autoplay="true" loop src="./img/test-site.mp4" class="d-block w-100">
                        </div>

                        <div class="carousel-item" data-bs-interval="5000"> <!--  5s -->
                            <img src="./img/temp.png" class="d-block w-100" alt="...">
                        </div>

                        <div class="carousel-item" data-bs-interval="5000"> <!--  5s -->
                            <img src="./img/temp.png" class="d-block w-100" alt="...">
                        </div>

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
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Premier site en exposistion
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Aucun site disponibles pour le moment.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Deuxième site en exposistion
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Aucun site disponibles pour le moment.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Troisième site en exposistion
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Aucun site disponibles pour le moment.
                            </div>
                        </div>
                    </div>
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


                <div class="mt-2 box">
                    <a href="https://www.resonancecommunication.com/projets" target="_blank"><img class="img"
                            src="./img/Expo-site/Site1.png" alt="" width="200px"></a>
                    <a href="https://www.renflowdesigns.com/our-work" target="_blank"><img class="img"
                            src="./img/Expo-site/Site2.png" alt="" width="200px"></a>
                    <a href="https://google.fr" target="_blank"><img class="img" src="./img/Mon site.png" alt=""
                            width="200px"></a>
                    <a href="https://google.fr" target="_blank"><img class="img" src="./img/Mon site.png" alt=""
                            width="200px"></a>
                    <a href="https://google.fr" target="_blank"><img class="img" src="./img/Mon site.png" alt=""
                            width="200px"></a>
                    <a href="https://google.fr" target="_blank"><img class="img" src="./img/Mon site.png" alt=""
                            width="200px"></a>

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
                <a href="#TP3" class="special">CV</a><br>
                <a href="#page4" class="special">Diplômes</a><br>
                <a href="#page5" class="special">Stages</a><br>
                <a href="#page7" class="special">Réalisation</a><br>
                <a href="#page8" class="special">Inspirations</a>
            </div>
            <div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
                <h4 class="mb-3 titre">Mes autres sites !</h4>
                <a href="#pagex" class="special">Site 1</a><br>
                <a href="#pagex" class="special">Site 2</a><br>
                <a href="#pagex" class="special">Site 3</a><br>
                <a href="#pagex" class="special">Site 4</a><br>
                <a href="#pagex" class="special">Site 5</a><br>
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