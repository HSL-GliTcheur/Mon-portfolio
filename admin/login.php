<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .page1 {
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-content: center;
            flex-wrap: wrap;
        }

        h1 {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            margin-bottom: 20px;
        }

        .formulaire {
            width: 90%;
            height: 90%;
            background-color: #eee;
            border: 1px solid #ddd;
            border-radius: 20px;
        }

        form .inputs {
            display: flex;
            flex-direction: column;
            padding: 20%;
        }

        form .inputs input[type='text'],
        input[type='password'] {
            padding: 15px;
            border: none;
            border-radius: 5px;
            background-color: #f2f2f2;
            outline: none;
            margin-bottom: 15px;
        }

        form p.inscription {
            font-size: 14px;
            margin-bottom: 20px;
            color: #878787;
        }

        form button {
            margin-top: 10px;
            padding: 15px 25px;
            border-radius: 5px;
            border: none;
            font-size: 15px;
            color: #fff;
            background-color: #eb7371;
            outline: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php

    session_start();

    try {
        // On se connecte à MySQL
        $mysqlClient = new PDO('mysql:host=localhost:3306;dbname=admin_cc;charset=utf8', 'xxtofoo_admin', '#admin2024');
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die ('Erreur : ' . $e->getMessage());
    }
    // Si tout va bien, on peut continuer
    
    // On récupère tout le contenu de la table h_stages
    $sqlQuery = "SELECT * FROM `h_admin`";

    $admintatement = $mysqlClient->prepare($sqlQuery);
    $admintatement->execute();
    $admin = $admintatement->fetchAll();
    foreach ($admin as $listadmin) {
        $identifiant = $listadmin['login'];
        $mdp = $listadmin['mdp'];
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $identifiantForm = $_POST['login'];
        $mdpForm = $_POST['mdp'];
        if ($identifiantForm == $identifiant && $mdpForm == $mdp) {
            $_SESSION['logedin'] = true;
            $_SESSION['login'] = $identifiantForm;
            $_SESSION['mdp'] = $mdpForm;
            header('Location: ./admin.php');
            exit;
        } else {
            $message = "Identifiant ou mot de passe incorrect";
        }
    }

    ?>

    <section class="page1">
        <form class="formulaire" method="POST" action="">
            <div class="inputs">
                <h1>Connexion admin</h1>
                <input type="text" name="login" id="login" placeholder="Identifiant" />
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe">
                <button type="submit" name="ok">Se connecter</button>
                <?php if (isset ($message)) {
                    ?>
                    <p>
                        <?php echo $message; ?>
                    </p>
                    <?php
                } ?>
            </div>


        </form>
    </section>
</body>

</html>