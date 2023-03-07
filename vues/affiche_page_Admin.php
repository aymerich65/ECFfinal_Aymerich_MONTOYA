<?php
ob_start();
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


require_once 'JWT/validate_jwt.php';


if (isset($_SESSION['jwt'])) {
    $jwt = $_SESSION['jwt'];

    // Valider le jeton JWT
    $user = validateJWT($jwt);


    if ($user !== false && isset($_SESSION['admin']) && $_SESSION['admin'] === 'approuved') {
        echo 'Bienvenue administrateur !';

    } else {

        header('Location: index.php?page=connexion');
        exit;
    }
} else {

    header('Location: index.php?page=connexion');
    exit;
}

?>
<h1 class="tableaudebordstyle">TABLEAU DE BORD</h1>
<br>
<h2>Réservations</h2>
<?php
    require 'modeles/recuperations_donnees/recuperation_bdd_reservations.php';

    ?>

    <h3 class="titleh3-admin-form">Supprimer une réservation:</h3>
    <form method="POST" action="../modeles/suppressionlignes/supression_reservation.php" class="form-admin-style">
        <label class="label-admin-style">Adresse e-mail : <input type="email" name="email" value="" class="input-admin-style"></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
    <h3 class="titleh3-admin-form">Supprimer toute les  réservations du jour:</h3>
    <form method="POST" action="modeles/suppressionlignes/supression_reservations.php">
        <input type="submit" value="Supprimer toutes les réservations">
    </form>



<h2 class="titleh2-admin-form">Modifier carte:</h2>
    <h3 class="titleh3-admin-form">Insérer entrée : </h3>
    <form method="POST" action="modeles/insertionsdonnees/traitementEntrées.php" class="form-admin-style">
        <label class="right-align label-admin-style">Titre : <input type="text" name="titre" value="" class="input-admin-style"></label>
        <label class="label-admin-style">Description : <input type="text" name="description" value="" class="input-admin-style"></label>
        <label class="label-admin-style">Prix : <input type="text" name="prix" value="" class="input-admin-style"></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>

    <h3 class="titleh3-admin-form">Supprimer entrée : </h3>
    <form method="POST" action="modeles/suppressionlignes/supressionEntree.php" class="form-admin-style">
        <label class="label-admin-style">Titre : <input type="text" name="titre" value="" ></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
<h3 class="titleh3-admin-form">Insérer plat principal : </h3>
<form method="POST" action="modeles/insertionsdonnees/traitementPlats.php" class="form-admin-style">
    <label class="label-admin-style">Titre : <input type="text" name="titre" value=""></label>
    <label class="label-admin-style">Description : <input type="text" name="description" value="" ></label>
    <label class="label-admin-style">Prix : <input type="text" name="prix" value="" "></label>
    <br>
    <button class="dishbuton" type="submit">Valider</button>
</form>
    <h3 class="titleh3-admin-form">Supprimer plat principal : </h3>
    <form method="POST" action="modeles/suppressionlignes/supressionPlatPrincipale.php" class="form-admin-style">
        <label class="label-admin-style">Titre : <input type="text" name="titre" value="" ></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
    <h3 class="titleh3-admin-form">Insérer dessert : </h3>
    <form method="POST" action="modeles/insertionsdonnees/traitementDesserts.php" class="form-admin-style">
        <label class="label-admin-style">Titre : <input type="text" name="titre" value="" ></label>
        <label class="label-admin-style">Description : <input type="text" name="description" value="" ></label>
        <label class="label-admin-style">Prix : <input type="text" name="prix" value="" ></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
    <h3 class="titleh3-admin-form">Supprimer dessert : </h3>
    <form method="POST" action="modeles/suppressionlignes/supressionDessert.php" class="form-admin-style">
        <label class="label-admin-style">Titre : <input type="text" name="titre" value="" ></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
<h3 class="titleh3-admin-form">Insérer Menu : </h3>
<form method="POST" action="modeles/insertionsdonnees/traitementMenus.php" class="form-admin-style">
    <label class="label-admin-style">Titre : <input type="text" name="titre" value="" ></label>
    <label class="label-admin-style">Formule : <input type="text" name="formule" value="" ></label>
    <label class="label-admin-style">Description : <input type="text" name="description" value="" ></label>
    <label class="label-admin-style">Prix : <input type="text" name="prix" value="" ></label>
    <br>
    <button class="dishbuton" type="submit">Valider</button>
</form>
</br>
    <h3 class="titleh3-admin-form">Supprimer Menu : </h3>
    <form method="POST" action="modeles/suppressionlignes/supressionMenu.php" class="form-admin-style">
        <label class="label-admin-style">Titre : <input type="text" name="titre" value="" ></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>

    <h3 class="titleh3-admin-form">Insérer Horaire : </h3>
    <form method="POST" action="modeles/insertionsdonnees/traitementInsertionHoraires.php" class="form-admin-style">
        <label class="label-admin-style">Jour : <input type="text" name="jour" placeholder="Jour"></label>
        <label class="label-admin-style">Ouvert : <input type="radio" name="statut" value="OUVERT" ></label>
        <label class="label-admin-style">Fermé : <input type="radio" name="statut" value="FERME" ></label>
        <label class="label-admin-style">Ouverture midi : <input type="text" name="ouverture_midi" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm"></label>
        <label class="label-admin-style">Fermeture midi : <input type="text" name="fermeture_midi" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm"></label>
        <label class="label-admin-style">Ouverture soir : <input type="text" name="ouverture_soir" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm"></label>
        <label class="label-admin-style">Fermeture soir : <input type="text" name="fermeture_soir" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm"></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>

    <h3 class="titleh3-admin-form">Modifier Horaire : </h3>
    <form method="POST" action="modeles/insertionsdonnees/traitementModificationHoraires.php" class="form-admin-style">
        <label class="label-admin-style">Jour : <input type="text" name="jour" placeholder="Jour"></label>
        <label class="label-admin-style">Ouvert : <input type="radio" name="statut" value="OUVERT" ></label>
        <label class="label-admin-style">Fermé : <input type="radio" name="statut" value="FERME" ></label>
        <label class="label-admin-style">Ouverture midi : <input type="text" name="ouverture_midi" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm"></label>
        <label class="label-admin-style">Fermeture midi : <input type="text" name="fermeture_midi" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm"></label>
        <label class="label-admin-style">Ouverture soir : <input type="text" name="ouverture_soir" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm"></label>
        <label class="label-admin-style">Fermeture soir : <input type="text" name="fermeture_soir" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm"></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>

    <h3 class="titleh3-admin-form">Modifier nombre de tables : </h3>
    <form method="POST" action="../brouillons/insertionTables.php">
        <label class="label-admin-style">Tables : <input type="number" name="tables" value=""></label>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
    <h2 class="titleh2-admin-form">Envoyer une image </h2>
    <form method="POST" action="modeles/insertionsdonnees/insertion_images.php" enctype="multipart/form-data">
        <label class="label-admin-style">Choisissez une image : <input type="file" name="image" id="image" value=""></label>
        <label class="label-admin-style">Titre : <input type="text" name="titre" value="" ></label>
        <label class="label-admin-style">Description : <input type="text" name="description" value="" ></label>
        <label>Numéro d'image <input id="text" name="numero_image" value="" required></label>
        <button class="dishbuton" type="submit">Valider</button>
    </form>

    <button class="" type="button" id="pbutton">Afficher les images stockées</button>
     <div id="table-container" class="my-table"></div>
    <h2 class="titleh2-admin-form">Supprimer une image </h2>
<form method="POST" action="../modeles/suppressionlignes/supressionImage.php" class="form-admin-style">
    <label>Nom de fichier <input id="text" name="titre" value=""  placeholder="Nom du fichier"></label>
    <label>Numéro d'image <input id="text" name="numero_image" value="" required></label>
    <button>Supprimer</button>
</form>
<br>
    <h2 class="titleh2-admin-form">Choisissez les trois images de l'accueil</h2>
    <form method="post" class="footer-form-style "  action="modeles/insertionsdonnees/insertion_imagesaccueil.php">
        <label for="num_image_bloc_1">Bloc 1:</label>
        <input type="number" id="num_image_bloc_1" name="num_image_bloc_1" required placeholder="numéro d'image">

        <label for="num_image_bloc_2">Bloc 2:</label>
        <input type="number" id="num_image_bloc_2" name="num_image_bloc_2" required placeholder="numéro d'image">

        <label for="num_image_bloc_3">Bloc 3:</label>
        <input type="number" id="num_image_bloc_3" name="num_image_bloc_3" required placeholder="numéro d'image">

        <button type="submit">Valider</button>
    </form>



<?php

$contenu =ob_get_clean();

require 'layout.php';