<?php
// session_start();
// if ($_SESSION['logedin'] == false) {
//     header('Location: ./login.php');
//     exit;
// }

try {
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost:3306;dbname=admin_cc;charset=utf8', 'xxtofoo_admin', '#admin2024');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die ('Erreur : ' . $e->getMessage());
}
// Si tout va bien, on peut continuer

require_once 'db.php';

$titre = $_GET['titre'];
$id = $_GET['edit'];
echo $id, " ", $titre;
$selection = "SELECT * FROM `$titre` WHERE id='$id'";
$list = $mysqlClient->prepare($selection);
$list->execute();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upgrade
        <?php echo $titre ?>
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php foreach ($list as $final) { ?>
        <?php
        if ($titre == "h_competences") {
            $un = $final['titre'];
            $deux = $final['pourcentage'];
            $trois = $final['icon'];
            $quatre = "";
            $cinq = "";

            $name1 = "titre";
            $name2 = "pourcentage";
            $name3 = "icon";
            $name4 = "";
            $name5 = "";
        }
        if ($titre == "h_diplomes") {
            $un = $final['titre'];
            $deux = $final['image'];
            $trois = $final['date'];
            $quatre = $final["page"];
            $cinq = $final["telechargement"];

            $name1 = "titre";
            $name2 = "image";
            $name3 = "date";
            $name4 = "page";
            $name5 = "telechargement";
        }

        if (isset ($_POST['modifier'])) {
            if ($titre == "h_competences") {
                $id = $_GET['edit'];

                $listUn = $_POST['titre'];
                $listDeux = $_POST['pourcentage'];
                $listTrois = $_POST['icon'];

                $update = "UPDATE $titre SET titre='$listUn', pourcentage='$listDeux', icon='$listTrois' WHERE id='$id'";
                $stmt2 = $mysqlClient->prepare($update);
                $stmt2->execute();
                echo "<script> window.location.href='admin.php';</script>";
            }
            if ($titre == "h_diplomes") {
                $id = $_GET['edit'];

                $listUn = $_POST['titre'];
                $listDeux = $_POST['image'];
                $listTrois = $_POST['date'];
                $listQuatre = $_POST['page'];
                $listCinq = $_POST['telechargement'];

                $update2 = "UPDATE $titre SET titre='$listUn', image='$listDeux', date='$listTrois', page='$listQuatre', telechargement='$listCinq' WHERE id='$id'";
                $stmt3 = $mysqlClient->prepare($update2);
                $stmt3->execute();
                echo "<script> window.location.href='admin.php';</script>";
            }
        }
        ?>
        <form action="" method="post" class="form-group">
            <input type="text" placeholder="<?php echo $name1 ?>" name="<?php echo $name1 ?>" value="<?php echo $un ?>">
            <input type="text" placeholder="<?php echo $name2 ?>" name="<?php echo $name2 ?>" value="<?php echo $deux ?>">
            <input type="text" placeholder="<?php echo $name3 ?>" name="<?php echo $name3 ?>" value="<?php echo $trois ?>">
            <input type="text" placeholder="<?php echo $name4 ?>" name="<?php echo $name4 ?>" value="<?php echo $quatre ?>">
            <input type="text" placeholder="<?php echo $name5 ?>" name="<?php echo $name5 ?>" value="<?php echo $cinq ?>">
            <input class="btn btn-success" type="submit" value="Modifier" name="modifier">
        </form>
    <?php } ?>
</body>

</html>