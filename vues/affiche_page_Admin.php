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
<div class="table-container">
<?php
    require 'modeles/recuperations_donnees/recuperation_bdd_reservations.php';

    ?></div>

    <h3 class="titleh3-admin-form">Supprimer une réservation :</h3>
    <form method="POST" action="modeles/suppressionlignes/deleteReservation.php" class="form-admin-style">
        <label class="label-admin-style">Adresse e-mail : <input type="email" name="email" value="" class="input-admin-style"></label>
        <label class="label-admin-style">Date : <input type="date" name="date" value="" class="input-admin-style"></label>
        <label class="label-admin-style">Horaire : <input type="time" name="horaire" value="" class="input-admin-style"></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>

    <h3 class="titleh3-admin-form">Supprimer toute les  réservations du jour:</h3>
    <form method="POST" action="modeles/suppressionlignes/suppression_reservations.php">
        <input type="submit" value="Supprimer toutes les réservations" class="dishbutonlike">
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

<!-- bouton affichage entées -->
    <button id="afficher-entrees" class="affichage-donnees">Afficher les entrées</button>
<div id="entrees-container"></div>




    <h3 class="titleh3-admin-form">Modifier l'entrée :</h3>
<form method="POST" action="modeles/modifications_donnees/traitement_modif_entree.php" class="form-admin-style">
    <label class="label-admin-style">ID de l'entrée : <input type="text" name="id" value="" class="input-admin-style" required></label>   
    <br>
    <label class="right-align label-admin-style">Titre : <input type="text" name="titre" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Description : <input type="text" name="description" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Prix : <input type="text" name="prix" value="" class="input-admin-style"></label>
    <br>
    <button class="dishbuton" type="submit">Valider</button>
</form>



    <h3 class="titleh3-admin-form">Supprimer entrée : </h3>
    <form method="POST" action="modeles/suppressionlignes/suppressionEntree.php" class="form-admin-style">
        <label class="label-admin-style">Titre : <input type="text" name="titre" value="" class="input-admin-style"></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>


<h3 class="titleh3-admin-form">Insérer plat principal : </h3>
<form method="POST" action="modeles/insertionsdonnees/traitementPlats.php" class="form-admin-style">
    <label class="label-admin-style">Titre : <input type="text" name="titre" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Description : <input type="text" name="description" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Prix : <input type="text" name="prix" value="" class="input-admin-style"></label>
    <br>
    <button class="dishbuton" type="submit">Valider</button>
</form>

<!-- bouton affichage des plats principaux -->
<button id="afficher-plats-principaux" class="affichage-donnees">Afficher les plats principaux</button>
<div id="plats-container"></div>



<h3 class="titleh3-admin-form">Modifier le plat principal :</h3>
<form method="POST" action="modeles/insertionsdonnees/traitementPlats.php" class="form-admin-style">
<label class="label-admin-style">ID du plat principal :<input type="text" name="id" value="" class="input-admin-style" required></label>
    <label class="label-admin-style">Titre : <input type="text" name="titre" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Description : <input type="text" name="description" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Prix : <input type="text" name="prix" value="" class="input-admin-style"></label>
    <br>
    <button class="dishbuton" type="submit">Valider</button>
</form>



    <h3 class="titleh3-admin-form">Supprimer plat principal : </h3>
    <form method="POST" action="modeles/suppressionlignes/suppressionPlatPrincipale.php" class="form-admin-style">
        <label class="label-admin-style">Titre : <input type="text" name="titre" value="" class="input-admin-style"></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>


    <h3 class="titleh3-admin-form">Insérer dessert : </h3>
    <form method="POST" action="modeles/insertionsdonnees/traitementDesserts.php" class="form-admin-style">
        <label class="label-admin-style">Titre : <input type="text" name="titre" value="" class="input-admin-style"></label>
        <label class="label-admin-style">Description : <input type="text" name="description" value="" class="input-admin-style"></label>
        <label class="label-admin-style">Prix : <input type="text" name="prix" value="" class="input-admin-style"></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>

<!-- bouton affichage des desserts -->
<button id="afficher-dessert" class="affichage-donnees">Afficher les desserts</button>
<div id="dessert-container"></div>


    <h3 class="titleh3-admin-form">Modifier le dessert :</h3>
<form method="POST" action="modeles/modifications_donnees/traitment_modif_dessert.php" class="form-admin-style">
<label class="label-admin-style">ID du dessert :<input type="text" name="id" value="" class="input-admin-style"required></label>
    <label class="label-admin-style">Titre : <input type="text" name="titre" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Description : <input type="text" name="description" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Prix : <input type="text" name="prix" value="" class="input-admin-style"></label>
    <br>
    <button class="dishbuton" type="submit">Valider</button>
</form>



    <h3 class="titleh3-admin-form">Supprimer dessert : </h3>
    <form method="POST" action="modeles/suppressionlignes/suppressionDessert.php" class="form-admin-style">
        <label class="label-admin-style">Titre : <input type="text" name="titre" value="" class="input-admin-style"></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>


<h3 class="titleh3-admin-form">Insérer Menu : </h3>
<form method="POST" action="modeles/insertionsdonnees/traitementMenus.php" class="form-admin-style">
    <label class="label-admin-style">Titre : <input type="text" name="titre" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Formule : <input type="text" name="formule" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Description : <input type="text" name="description" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Prix : <input type="text" name="prix" value="" class="input-admin-style"></label>
    <br>
    <button class="dishbuton" type="submit">Valider</button>
</form>

<!-- bouton affichage des menus -->
<button id="afficher-menus" class="affichage-donnees">Afficher les menus</button>
<div id="menus-container"></div>


<h3 class="titleh3-admin-form">Modifier le Menu :</h3>
<form method="POST" action="modeles/modifications_donnees/traitement_modif_menu.php" class="form-admin-style">
<label class="label-admin-style">ID du menu :<input type="text" name="id" value="" class="input-admin-style"required></label>
    <label class="label-admin-style">Titre : <input type="text" name="titre" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Formule : <input type="text" name="formule" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Description : <input type="text" name="description" value="" class="input-admin-style"></label>
    <label class="label-admin-style">Prix : <input type="text" name="prix" value="" class="input-admin-style"></label>
    <br>
    <button class="dishbuton" type="submit">Valider</button>
</form>




</br>
    <h3 class="titleh3-admin-form">Supprimer Menu : </h3>
    <form method="POST" action="modeles/suppressionlignes/suppressionMenu.php" class="form-admin-style">
        <label class="label-admin-style">Titre : <input type="text" name="titre" value=""  class="input-admin-style"></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>



    <h3 class="titleh3-admin-form">Insérer Horaire : </h3>
    <form method="POST" action="modeles/insertionsdonnees/traitementInsertionHoraires.php" class="form-admin-style">
        <div class="form-admin-style-schedules">
        <label class="label-admin-style">Jour : <input type="text" name="jour" placeholder="Jour"></label>
        <label class="label-admin-style">Ouvert : <input type="radio" name="statut" value="OUVERT" ></label>
        <label class="label-admin-style">Fermé : <input type="radio" name="statut" value="FERME" ></label>
        </div>
        <label class="label-admin-style">Ouverture midi : <input type="text" name="ouverture_midi" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm"class="input-admin-style"></label>
        <label class="label-admin-style">Fermeture midi : <input type="text" name="fermeture_midi" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm" class="input-admin-style"></label>
        <label class="label-admin-style">Ouverture soir : <input type="text" name="ouverture_soir" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm" class="input-admin-style"></label>
        <label class="label-admin-style">Fermeture soir : <input type="text" name="fermeture_soir" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm" class="input-admin-style"></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>




    <h3 class="titleh3-admin-form">Modifier Horaire : </h3>
    <form method="POST" action="modeles/insertionsdonnees/traitementModificationHoraires.php" class="form-admin-style">
        <div class="form-admin-style-schedules">
        <label class="label-admin-style">Jour : <input type="text" name="jour" placeholder="Jour"></label>
        <label class="label-admin-style">Ouvert : <input type="radio" name="statut" value="OUVERT" ></label>
        <label class="label-admin-style">Fermé : <input type="radio" name="statut" value="FERME" ></label>
        </div>
        <label class="label-admin-style">Ouverture midi : <input type="text" name="ouverture_midi" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm" class="input-admin-style"></label>
        <label class="label-admin-style">Fermeture midi : <input type="text" name="fermeture_midi" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm" class="input-admin-style"></label>
        <label class="label-admin-style">Ouverture soir : <input type="text" name="ouverture_soir" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm" class="input-admin-style"></label>
        <label class="label-admin-style">Fermeture soir : <input type="text" name="fermeture_soir" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]"placeholder="hh:mm" class="input-admin-style"></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>

    <h3 class="titleh3-admin-form">Modifier nombre de couverts total : </h3>
    <form method="POST" action="modeles/insertionsdonnees/modifier_capacite_totale.php">
        <label class="label-admin-style">Couverts : <input type="number" name="capacite_totale" value="" class="input-admin-style"></label>
        <button class="dishbuton" type="submit">Valider</button>
    </form>


    <h2 class="titleh2-admin-form">Envoyer une image </h2>
    <form method="POST" action="modeles/insertionsdonnees/insertion_images.php" enctype="multipart/form-data">
        <label class="label-admin-style">Choisissez une image : <input type="file" name="image" id="image" value="" class="input-admin-style"></label>
        <label class="label-admin-style">Titre : <input type="text" name="titre" value="" class="input-admin-style"></label>
        <label class="label-admin-style">Description : <input type="text" name="description" value="" class="input-admin-style"></label>
        <label>Numéro d'image <input id="text" name="numero_image" value="" class="input-admin-style" required></label>
        <button class="connexionbutton" type="submit">Valider</button>
    </form>

    <button class="dishbuton" type="button" id="pbutton">Afficher les images stockées</button>
     <div id="table-container" class="my-table"></div>


    <h2 class="titleh2-admin-form">Supprimer une image </h2>
<form method="POST" action="modeles/suppressionlignes/suppressionImage.php" class="form-admin-style">
    <label>Nom de fichier <input id="text" name="titre" value=""  placeholder="Nom du fichier" class="input-admin-style"></label>
    <label>Numéro d'image <input id="text" name="numero_image" value="" class="input-admin-style" required></label>
    <button>Supprimer</button>
</form>


    <h2 class="titleh2-admin-form">Modifier une image </h2>
    <form action="modeles/insertionsdonnees/modifier_images.php" method="post" enctype="multipart/form-data"  class="form-admin-style">
        <label class="label-admin-style" for="titre">Titre :<input type="text" name="titre" id="titre" class="input-admin-style" required></label>
        <label class="label-admin-style" for="description">Description :  <input name="description" id="description" class="input-admin-style" required></label>
        <label class="label-admin-style" for="numero_image">Numéro d'image :<input type="number" name="numero_image" id="numero_image" class="input-admin-style" required></label>
        <label class="label-admin-style " for="image">Image :<input  type="file" name="image" id="image" accept="image/jpeg,image/png,image/gif" class="input-admin-style" required></label>
        <button class="dishbuton" type="submit">Valider</button>
    </form>

<br>
    <h2 class="titleh2-admin-form">Choisissez les trois images de l'accueil</h2>
    <form method="post" class="footer-form-style "  action="modeles/insertionsdonnees/insertion_imagesaccueil.php">
        <label for="num_image_bloc_1">Bloc 1:</label>
        <input type="number" id="num_image_bloc_1" name="num_image_bloc_1" class="input-admin-style" required placeholder="numéro d'image">

        <label for="num_image_bloc_2">Bloc 2:</label>
        <input type="number" id="num_image_bloc_2" name="num_image_bloc_2" class="input-admin-style" required placeholder="numéro d'image">

        <label for="num_image_bloc_3">Bloc 3:</label>
        <input type="number" id="num_image_bloc_3" name="num_image_bloc_3" class="input-admin-style" required placeholder="numéro d'image">

        <button type="submit" class="dishbuton" >Valider</button>
    </form>
    <br>
    <h2 class="titleh2-admin-form">Gérer les administrateurs</h2>

<?php
require 'modeles/recuperations_donnees/recuperation_administrateurs.php';
?>
    <h2 class="titleh2-admin-form">Ajouter un administrateur</h2>
    <form action="modeles/insertionsdonnees/traitementInscriptionAdmin.php" method="post" class="form-admin-style">
        <label class="label-admin-style" for="email">Email :</label>
        <input type="email" name="email" id="email" class="input-admin-style" required>
        <label class="label-admin-style" for="poste">Poste :</label>
        <input type="text" name="poste" id="poste" class="input-admin-style" required>
        <label class="label-admin-style" for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" class="input-admin-style" required>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
    <br>


    <h2 class="titleh2-admin-form">Supprimer un administrateur</h2>
    <form action="modeles/suppressionlignes/suppression_administrateur.php" method="post" class="form-admin-style dernier formulairespressionadmin">
        <label class="label-admin-style" for="email">Email :</label>
        <input type="email" name="email" id="email" class="input-admin-style" required>
        <button class="dishbuton" type="submit">Supprimer</button>
    </form>

    <form action="modeles/logout.php" method="post" class="deconnexionpageadminstyle">
   <input type="submit" value="Déconnexion" class="dishbuton" >
</form>
</div>
    <script src="JS/recup_json_entree.JS"></script>
    <script src="JS/recup_json_plat_principal.JS"></script>
    <script src="JS/recup_json_dessert.JS"></script>
    <script src="JS\recup_json_menus.JS"></script>

<?php

$contenu =ob_get_clean();

require 'layout.php';