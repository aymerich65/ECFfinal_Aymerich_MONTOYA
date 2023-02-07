<?php
session_start();
$_SESSION['logged_in']= false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuaiAntique</title>
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


</head>
<body class="bodystyle">

<?php
require '../templates/header.php';
?>
<div class="connexionstyle">
<h1>Connexion/Inscription</h1>
    <div>
        <form method="post">
            <button class="btn"><input type="submit" name="connexion" value="Connexion" ></button>
            <button class="btn"><input type="submit" name="inscription" value="Inscription" ></button>
        </form>
    </div>
    <?php
    require '../methodes/scriptconnexion_inscription.php';
    ?>
</div>
    <?php
    echo'ICI SERONT LES HORAIRES---------------';
    ?>

    <script src="../JS/bootstrap.bundle.min.js"></script>
</body>
</html>



}