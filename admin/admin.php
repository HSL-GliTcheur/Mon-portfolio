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






// On récupère tout le contenu de la table h_os
$os = "SELECT * FROM `h_os`";

$ostatement = $mysqlClient->prepare($os);
$ostatement->execute();
$os = $ostatement->fetchAll();


// On récupère tout le contenu de la table h_diplomes
$diplome = "SELECT * FROM `h_diplomes`";

$diplometatement = $mysqlClient->prepare($diplome);
$diplometatement->execute();
$diplome = $diplometatement->fetchAll();


// On récupère tout le contenu de la table h_stages
$stage = "SELECT * FROM `h_stages`";

$stagetatement = $mysqlClient->prepare($stage);
$stagetatement->execute();
$stage = $stagetatement->fetchAll();


// On récupère tout le contenu de la table h_realisation
$realisation = "SELECT * FROM `h_realisation`";

$realisationtatement = $mysqlClient->prepare($realisation);
$realisationtatement->execute();
$realisation = $realisationtatement->fetchAll();


// On récupère tout le contenu de la table h_inspiration
$inspiration = "SELECT * FROM `h_inspiration`";

$inspirationtatement = $mysqlClient->prepare($inspiration);
$inspirationtatement->execute();
$inspiration = $inspirationtatement->fetchAll();


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
            $competence = "INSERT INTO `h_competences` (`titre`, `pourcentage`, `icon`) VALUES (:titre, :pourcentage, :icon)";

            $send = $mysqlClient->prepare($competence);
            $send->bindParam(":titre", $titreForm);
            $send->bindParam(":pourcentage", $pourcentageForm);
            $send->bindParam(":icon", $iconForm);
            $send->execute();
            echo "<script> window.location.href='admin.php';</script>";
        }


        //afficher un tableau
        $competence = "SELECT * FROM `h_competences`";

        $listcompetence = $mysqlClient->query($competence);


        // surpimer des lignes
        if (isset ($_GET['sup'])) {
            $id = $_GET['sup'];
            $competenceSup = "DELETE FROM `h_competences` WHERE id='$id'";
            $deletecompetence = $mysqlClient->prepare($competenceSup);
            $deletecompetence->execute();
            echo "<script> window.location.href='admin.php';</script>";
        }
        ?>
    </div>

    <form action="" method="post" class="form-group">
        <input type="text" placeholder="titre" name="titre">
        <input type="text" placeholder="pourcentage" name="pourcentage">
        <input type="text" placeholder="icon" name="icon">
        <input class="btn btn-success" type="submit" value="créer" name="competences">
    </form>

    <table class="table">
        <thead>
            <th>titre</th>
            <th>pourcentage</th>
            <th>icon</th>
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
                        <a href="./update.php?edit=<?php echo $competences['id'] ?>&titre=h_competences"
                            class="btn btn-primary">Modifier</a>
                        <a href="./admin.php?sup=<?php echo $competences['id'] ?>" class="btn btn-danger">Suprimer</a>
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
            // $send2->bindParam(":titre", $titreForm2);
            // $send2->bindParam(":image", $imageForm2);
            // $send2->bindParam(":date", $dateForm2);
            // $send2->bindParam(":page", $pageForm2);
            // $send2->bindParam(":telechargement", $telechargementForm2);
            $send2->execute();
            echo "<script> window.location.href='admin.php';</script>";
        }


        //afficher un tableau
        $diplome = "SELECT * FROM `h_diplomes`";

        $listdiplome = $mysqlClient->query($diplome);


        // surpimer des lignes
        if (isset ($_GET['sup'])) {
            $id = $_GET['sup'];
            $diplomesSup = "DELETE FROM `h_diplomes` WHERE id='$id'";
            $deletediplomes = $mysqlClient->prepare($diplomesSup);
            $deletediplomes->execute();
            echo "<script> window.location.href='admin.php';</script>";
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
                        <a href="./admin.php?sup=<?php echo $diplomes2['id'] ?>" class="btn btn-danger">Suprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h3>Tableau inspiration :</h3>
    <h3>Tableau os :</h3>
    <h3>Tableau réalisation :</h3>
    <h3>Tableau stages :</h3>
    <h3>Tableau admin :</h3>

</body>

</html>