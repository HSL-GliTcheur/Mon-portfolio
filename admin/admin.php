<?php session_start();
if ($_SESSION['logedin'] == false) {
    header('Location: ./login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>

<body>
    <h1>Bonjour
        <?php echo $_SESSION['login'] ?>
    </h1>
</body>

</html>