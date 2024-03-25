<?php
// session_start();
// if ($_SESSION['logedin'] == false) {
//     header('Location: ./login.php');
//     exit;
// }

require_once 'db.php';

try {
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost:3306;dbname=admin_cc;charset=utf8', 'xxtofoo_admin', '#admin2024');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die ('Erreur : ' . $e->getMessage());
}
// Si tout va bien, on peut continuer




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        input[type="text"] {
            text-align: center;
            border: 1px solid black;
            border-radius: 10px;
            padding: 3px;
        }
    </style>
</head>

<body class="mx-2">
    <h1>Bonjour
        <?php echo $_SESSION['login'] ?>
    </h1>
    <h3 class="mt-5">Tableau compétence :</h3>

    <!-- php -->
    <div>
        <?php

        // ajouter des lignes
        if (isset ($_POST['competences'])) {
            $titreForm = $_POST['titre'];
            $pourcentageForm = $_POST['pourcentage'];
            $iconForm = $_POST['icon'];
            $tailleForm = $_POST['taille'];
            $competence = "INSERT INTO `h_competences` (`titre`, `pourcentage`, `icon`, `taille`) VALUES ('$titreForm', '$pourcentageForm', '$iconForm', '$tailleForm')";

            $send = $mysqlClient->prepare($competence);
            $send->execute();
            echo "<script> window.location.href='./admin.php';</script>";
        }


        //afficher un tableau
        $competence = "SELECT * FROM `h_competences`";

        $listcompetence = $mysqlClient->query($competence);


        // surpimer des lignes
        if (isset ($_GET['sup'])) {
            $titre = $_GET['titre'];
            if ($titre == "h_competences") {

                $id = $_GET['sup'];
                $competenceSup = "DELETE FROM `h_competences` WHERE id='$id'";
                $deletecompetence = $mysqlClient->prepare($competenceSup);
                $deletecompetence->execute();
                echo "<script> window.location.href='./admin.php';</script>";
            }
        }
        ?>
    </div>

    <form action="" method="post" class="form-group">
        <input type="text" placeholder="titre" name="titre">
        <input type="text" placeholder="pourcentage" name="pourcentage">
        <input type="text" placeholder="icon" name="icon">
        <input type="text" placeholder="taille" name="taille">
        <input class="btn btn-success" type="submit" value="créer" name="competences">
    </form>

    <table class="table">
        <thead>
            <th>titre</th>
            <th>pourcentage</th>
            <th>icon</th>
            <th>taille</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($listcompetence as $competences) { ?>
                <tr>
                    <td>
                        <?php echo $competences['titre']; ?>
                    </td>
                    <td>
                        <?php echo $competences['pourcentage']; ?>
                    </td>
                    <td>
                        <?php echo $competences['icon']; ?>
                    </td>
                    <td>
                        <?php echo $competences['taille']; ?>
                    </td>
                    <td>
                        <a href="./update.php?edit=<?php echo $competences['id'] ?>&titre=h_competences"
                            class="btn btn-primary">Modifier</a>
                        <a href="./admin.php?sup=<?php echo $competences['id'] ?>&titre=h_competences"
                            class="btn btn-danger">Suprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- ----------------------------------------------------  diplome ------------------------------------------------------------------------- -->


    <h3>Tableau diplômes :</h3>

    <!-- php -->
    <div>
        <?php

        // ajouter des lignes
        if (isset ($_POST['diplomes'])) {
            $titreForm2 = $_POST['titre'];
            $imageForm2 = $_POST['image'];
            $dateForm2 = $_POST['date'];
            $pageForm2 = $_POST['page'];
            $telechargementForm2 = $_POST['telechargement'];
            $diplomes = "INSERT INTO `h_diplomes` (`titre`, `image`, `date`, `page`, `telechargement`) VALUES ('$titreForm2', '$imageForm2', '$dateForm2', '$pageForm2', '$telechargementForm2')";

            $send2 = $mysqlClient->prepare($diplomes);
            $send2->execute();
            echo "<script> window.location.href='./admin.php';</script>";
        }


        //afficher un tableau
        $diplome = "SELECT * FROM `h_diplomes`";

        $listdiplome = $mysqlClient->query($diplome);


        // surpimer des lignes
        if (isset ($_GET['sup'])) {
            $titre2 = $_GET['titre'];
            if ($titre2 == "h_diplomes") {
                $id2 = $_GET['sup'];
                $diplomesSup = "DELETE FROM `h_diplomes` WHERE id='$id2'";
                $deletediplomes = $mysqlClient->prepare($diplomesSup);
                $deletediplomes->execute();
                echo "<script> window.location.href='./admin.php';</script>";
            }
        }
        ?>
    </div>

    <form action="" method="post" class="form-group">
        <input type="text" placeholder="titre" name="titre">
        <input type="text" placeholder="image" name="image">
        <input type="text" placeholder="date" name="date">
        <input type="text" placeholder="page" name="page">
        <input type="text" placeholder="telechargement" name="telechargement">
        <input class="btn btn-success" type="submit" value="créer" name="diplomes">
    </form>

    <table class="table">
        <thead>
            <th>titre</th>
            <th>image</th>
            <th>date</th>
            <th>page</th>
            <th>telechargement</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($listdiplome as $diplomes2) { ?>
                <tr>
                    <td>
                        <?php echo $diplomes2['titre']; ?>
                    </td>
                    <td>
                        <?php echo $diplomes2['image']; ?>
                    </td>
                    <td>
                        <?php echo $diplomes2['date']; ?>
                    </td>
                    <td>
                        <?php echo $diplomes2['page']; ?>
                    </td>
                    <td>
                        <?php echo $diplomes2['telechargement']; ?>
                    </td>
                    <td>
                        <a href="./update.php?edit=<?php echo $diplomes2['id'] ?>&titre=h_diplomes"
                            class="btn btn-primary">Modifier</a>
                        <a href="./admin.php?sup=<?php echo $diplomes2['id'] ?>&titre=h_diplomes"
                            class="btn btn-danger">Suprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- ----------------------------------------------------  inspiration ------------------------------------------------------------------------- -->


    <h3>Tableau inspiration :</h3>
    <!-- php -->
    <div>
        <?php

        // ajouter des lignes
        if (isset ($_POST['inspirations'])) {
            $titreForm3 = $_POST['titre'];
            $imageForm3 = $_POST['image'];
            $lienForm3 = $_POST['lien'];
            $inspirations = "INSERT INTO `h_inspiration` (`titre`, `image`, `lien`) VALUES ('$titreForm3', '$imageForm3', '$lienForm3')";

            $send3 = $mysqlClient->prepare($inspirations);
            $send3->execute();
            echo "<script> window.location.href='./admin.php';</script>";
        }


        //afficher un tableau
        $inspiration = "SELECT * FROM `h_inspiration`";

        $listinspiration = $mysqlClient->query($inspiration);


        // surpimer des lignes
        if (isset ($_GET['sup'])) {
            $titre3 = $_GET['titre'];
            if ($titre3 == "h_inspiration") {
                $id3 = $_GET['sup'];
                $inspirationsSup = "DELETE FROM `h_inspiration` WHERE id='$id3'";
                $deleteinspirations = $mysqlClient->prepare($inspirationsSup);
                $deleteinspirations->execute();
                echo "<script> window.location.href='./admin.php';</script>";
            }
        }
        ?>
    </div>

    <form action="" method="post" class="form-group">
        <input type="text" placeholder="titre" name="titre">
        <input type="text" placeholder="image" name="image">
        <input type="text" placeholder="lien" name="lien">
        <input class="btn btn-success" type="submit" value="créer" name="inspirations">
    </form>

    <table class="table">
        <thead>
            <th>titre</th>
            <th>image</th>
            <th>lien</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($listinspiration as $inspirations2) { ?>
                <tr>
                    <td>
                        <?php echo $inspirations2['titre']; ?>
                    </td>
                    <td>
                        <?php echo $inspirations2['image']; ?>
                    </td>
                    <td>
                        <?php echo $inspirations2['lien']; ?>
                    </td>
                    <td>
                        <a href="./update.php?edit=<?php echo $inspirations2['id'] ?>&titre=h_inspiration"
                            class="btn btn-primary">Modifier</a>
                        <a href="./admin.php?sup=<?php echo $inspirations2['id'] ?>&titre=h_inspiration"
                            class="btn btn-danger">Suprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <!-- ----------------------------------------------------  os ------------------------------------------------------------------------- -->


    <h3>Tableau os :</h3>

    <!-- php -->
    <div>
        <?php

        // ajouter des lignes
        if (isset ($_POST['os'])) {
            $titreForm4 = $_POST['titre'];
            $pourcentageForm4 = $_POST['pourcentage'];
            $iconForm4 = $_POST['icon'];
            $os = "INSERT INTO `h_os` (`titre`, `pourcentage`, `icon`) VALUES ('$titreForm4', '$pourcentageForm4', '$iconForm4')";

            $send4 = $mysqlClient->prepare($os);
            $send4->execute();
            echo "<script> window.location.href='./admin.php';</script>";
        }


        //afficher un tableau
        $os1 = "SELECT * FROM `h_os`";

        $listos = $mysqlClient->query($os1);


        // surpimer des lignes
        if (isset ($_GET['sup'])) {
            $titre4 = $_GET['titre'];
            if ($titre4 == "h_os") {
                $id4 = $_GET['sup'];
                $osSup = "DELETE FROM `h_os` WHERE id='$id4'";
                $deleteos = $mysqlClient->prepare($osSup);
                $deleteos->execute();
                echo "<script> window.location.href='./admin.php';</script>";
            }
        }
        ?>
    </div>

    <form action="" method="post" class="form-group">
        <input type="text" placeholder="titre" name="titre">
        <input type="text" placeholder="pourcentage" name="pourcentage">
        <input type="text" placeholder="icon" name="icon">
        <input class="btn btn-success" type="submit" value="créer" name="os">
    </form>

    <table class="table">
        <thead>
            <th>titre</th>
            <th>pourcentage</th>
            <th>icon</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($listos as $os2) { ?>
                <tr>
                    <td>
                        <?php echo $os2['titre']; ?>
                    </td>
                    <td>
                        <?php echo $os2['pourcentage']; ?>
                    </td>
                    <td>
                        <?php echo $os2['icon']; ?>
                    </td>
                    <td>
                        <a href="./update.php?edit=<?php echo $os2['id'] ?>&titre=h_os" class="btn btn-primary">Modifier</a>
                        <a href="./admin.php?sup=<?php echo $os2['id'] ?>&titre=h_os" class="btn btn-danger">Suprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- ---------------------------------------------------- réalisation ------------------------------------------------------------------------- -->


    <h3>Tableau réalisation :</h3>

    <!-- php -->
    <div>
        <?php

        // ajouter des lignes
        if (isset ($_POST['realisations'])) {
            $titreForm5 = $_POST['titre'];
            $imageForm5 = $_POST['image'];
            $descriptionForm5 = $_POST['description'];
            $lienForm5 = $_POST['lien'];
            $dataForm5 = $_POST['data'];
            $realisations = "INSERT INTO `h_realisation` (`titre`, `image`, `description`, `lien`, `data`) VALUES ('$titreForm5', '$imageForm5', '$descriptionForm5', '$lienForm5', '$dataForm5')";

            $send5 = $mysqlClient->prepare($realisations);
            $send5->execute();
            echo "<script> window.location.href='./admin.php';</script>";
        }


        //afficher un tableau
        $realisation = "SELECT * FROM `h_realisation`";

        $listrealisation = $mysqlClient->query($realisation);


        // surpimer des lignes
        if (isset ($_GET['sup'])) {
            $titre5 = $_GET['titre'];
            if ($titre5 == "h_realisation") {
                $id5 = $_GET['sup'];
                $realisationSup = "DELETE FROM `h_realisation` WHERE id='$id5'";
                $deleterealisation = $mysqlClient->prepare($realisationSup);
                $deleterealisation->execute();
                echo "<script> window.location.href='./admin.php';</script>";
            }
        }
        ?>
    </div>

    <form action="" method="post" class="form-group">
        <input type="text" placeholder="titre" name="titre">
        <input type="text" placeholder="image" name="image">
        <input type="text" placeholder="description" name="description">
        <input type="text" placeholder="lien" name="lien">
        <input type="text" placeholder="data" name="data">
        <input class="btn btn-success" type="submit" value="créer" name="realisations">
    </form>

    <table class="table">
        <thead>
            <th>titre</th>
            <th>image</th>
            <th>description</th>
            <th>lien</th>
            <th>data</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($listrealisation as $realisation2) { ?>
                <tr>
                    <td>
                        <?php echo $realisation2['titre']; ?>
                    </td>
                    <td>
                        <?php echo $realisation2['image']; ?>
                    </td>
                    <td>
                        <?php echo $realisation2['description']; ?>
                    </td>
                    <td>
                        <?php echo $realisation2['lien']; ?>
                    </td>
                    <td>
                        <?php echo $realisation2['data']; ?>
                    </td>
                    <td>
                        <a href="./update.php?edit=<?php echo $realisation2['id'] ?>&titre=h_realisation"
                            class="btn btn-primary">Modifier</a>
                        <a href="./admin.php?sup=<?php echo $realisation2['id'] ?>&titre=h_realisation"
                            class="btn btn-danger">Suprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- ---------------------------------------------------- stages ------------------------------------------------------------------------- -->


    <h3>Tableau stages :</h3>

    <!-- php -->
    <div>
        <?php

        // ajouter des lignes
        if (isset ($_POST['stages'])) {
            $titreForm6 = $_POST['titre'];
            $imageForm6 = $_POST['image'];
            $descriptionForm6 = $_POST['description'];
            $classementForm6 = $_POST['classement'];

            $stages = "INSERT INTO `h_stages` (`titre`, `image`, `description`, `classement`) VALUES ('$titreForm6', '$imageForm6', '$descriptionForm6', '$classementForm6')";

            $send6 = $mysqlClient->prepare($stages);
            $send6->execute();
            echo "<script> window.location.href='./admin.php';</script>";
        }


        //afficher un tableau
        $stage = "SELECT * FROM `h_stages`";

        $liststage = $mysqlClient->query($stage);


        // surpimer des lignes
        if (isset ($_GET['sup'])) {
            $titre6 = $_GET['titre'];
            if ($titre6 == "h_stages") {
                $id6 = $_GET['sup'];
                $stageSup = "DELETE FROM `h_stages` WHERE id='$id6'";
                $deletestage = $mysqlClient->prepare($stageSup);
                $deletestage->execute();
                echo "<script> window.location.href='./admin.php';</script>";
            }
        }
        ?>
    </div>

    <form action="" method="post" class="form-group">
        <input type="text" placeholder="titre" name="titre">
        <input type="text" placeholder="image" name="image">
        <input type="text" placeholder="description" name="description">
        <input type="text" placeholder="classement" name="classement">
        <input class="btn btn-success" type="submit" value="créer" name="stages">
    </form>

    <table class="table">
        <thead>
            <th>titre</th>
            <th>image</th>
            <th>description</th>
            <th>classement</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($liststage as $stages2) { ?>
                <tr>
                    <td>
                        <?php echo $stages2['titre']; ?>
                    </td>
                    <td>
                        <?php echo $stages2['image']; ?>
                    </td>
                    <td>
                        <?php echo $stages2['description']; ?>
                    </td>
                    <td>
                        <?php echo $stages2['classement']; ?>
                    </td>
                    <td>
                        <a href="./update.php?edit=<?php echo $stages2['id'] ?>&titre=h_stages"
                            class="btn btn-primary">Modifier</a>
                        <a href="./admin.php?sup=<?php echo $stages2['id'] ?>&titre=h_stages"
                            class="btn btn-danger">Suprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- ---------------------------------------------------- admin ------------------------------------------------------------------------- -->


    <h3>Tableau admin :</h3>

    <!-- php -->
    <div>
        <?php

        // ajouter des lignes
        if (isset ($_POST['admin'])) {
            $loginForm7 = $_POST['login'];
            $imageForm7 = $_POST['mdp'];

            $admin = "INSERT INTO `h_admin` (`login`, `mdp`) VALUES ('$loginForm7', '$imageForm7')";

            $send7 = $mysqlClient->prepare($admin);
            $send7->execute();
            echo "<script> window.location.href='./admin.php';</script>";
        }


        //afficher un tableau
        $admin2 = "SELECT * FROM `h_admin`";

        $listadmin = $mysqlClient->query($admin2);


        // surpimer des lignes
        if (isset ($_GET['sup'])) {
            $titre7 = $_GET['titre'];
            if ($titre7 == "h_admin") {
                $id7 = $_GET['sup'];
                $adminSup = "DELETE FROM `h_admin` WHERE id='$id7'";
                $deleteadmin = $mysqlClient->prepare($adminSup);
                $deleteadmin->execute();
                echo "<script> window.location.href='./admin.php';</script>";
            }
        }
        ?>
    </div>

    <form action="" method="post" class="form-group">
        <input type="text" placeholder="login" name="login">
        <input type="text" placeholder="mdp" name="mdp">
        <input class="btn btn-success" type="submit" value="créer" name="admin">
    </form>

    <table class="table">
        <thead>
            <th>login</th>
            <th>mdp</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($listadmin as $admin3) { ?>
                <tr>
                    <td>
                        <?php echo $admin3['login']; ?>
                    </td>
                    <td>
                        <?php echo $admin3['mdp']; ?>
                    </td>
                    <td>
                        <a href="./update.php?edit=<?php echo $admin3['id'] ?>&titre=h_admin"
                            class="btn btn-primary">Modifier</a>
                        <a href="./admin.php?sup=<?php echo $admin3['id'] ?>&titre=h_admin"
                            class="btn btn-danger">Suprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>