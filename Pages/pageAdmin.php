
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
<div class="main">
<h2>Modifier carte:</h2>
<p>Insérer entrée:</p>
<form method="POST" action="../methodes/traitementEntrées.php">
    <label >Titre <input type="text" name="titre" placeholder="Titre" value="" required></label>
    <label>Description<input type="text" name="description" placeholder="Description" value="" required></label>
    <label>Prix<input type="number" step="0.01" name="prix" placeholder="Prix" value="" required></label>
    <br>
    <button class="dishbuton" type="submit">Valider</button>
</form>

    <p>Insérer plat:</p>
    <form method="POST" action="../methodes/traitementPlats.php">
        <label >Titre <input type="text" name="titre" placeholder="Titre" value="" required></label>
        <label>Description<input type="text" name="description" placeholder="Description" value="" required></label>
        <label>Prix<input type="number" step="0.01" name="prix" placeholder="Prix" value="" required></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>

        <p>Insérer dessert:</p>
    <form method="POST" action="../methodes/traitementDesserts.php">
        <label >Titre <input type="text" name="titre" placeholder="Titre" value="" required></label>
        <label>Description<input type="text" name="description" placeholder="Description" value="" required></label>
        <label>Prix<input type="number" step="0.01" name="prix" placeholder="Prix" value="" required></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>

                   <h2>Modifier Menu:</h2>
    <form method="POST" action="../methodes/traitementMenus.php">
        <label >Titre <input type="text" name="titre" placeholder="Titre" value="" required></label>
        <label>Formule<input type="formule1" name="formule1" placeholder="formule1" value="" required></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>


    <p>Insérer Formule:</p>
    <form method="POST" action="">
        <label>Description<input type="text" name="description" placeholder="Description" value="" required></label>
        <label>Prix<input type="number" step="0.01" name="prix" placeholder="Prix" value="" required></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>



           </div>
        <script src="../JS/bootstrap.bundle.min.js"></script>
    </body>
</html>