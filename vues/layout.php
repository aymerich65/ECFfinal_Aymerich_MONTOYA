<!DOCTYPE html>
<html lang="fr">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body class="bodystyle">
    
<div class="header">
    <?php require 'header.php'; ?>
</div>

    <div class="main">
        <?php
        echo $contenu;
        ?>
    </div>

    <div class="footerstyle">
        <div class="col-10 offset-1">
            <?php require_once 'affiche_horraires.php'; ?>
        </div>









</div>
<script src="JS/appelle_script_recuperation_table_image.js"></script>
<script src="JS/scriptControleTablesDisponibles.js"></script>
<script src="../JS/bootstrap.bundle.min.js"></script>

</body>
</html>

