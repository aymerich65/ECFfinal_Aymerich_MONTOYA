<?php
ob_start();
?>
<h2>Modifier carte:</h2>
<p>Insérer plat:</p>
<form method="POST" action="methodes/traitementFormulaires.php">
    <label >Titre<input type="text" name="titre" value="<?php if(isset($_POST['titre'])) echo $_POST['titre'];?>"></label>
    <label >Description<input type="text" name="description" value="<?php if(isset($_POST['description'])) echo $_POST['description'];?>"></label>
    <label >Prix<input type="text" name="prix" value="<?php if(isset($_POST['prix'])) echo $_POST['prix'];?>"></label>
    <br>
    <button class="dishbuton" type="submit">Valider</button>
</form>
<h2>Modifier Menu:</h2>
<form method="POST" action="methodes/traitementFormulaires.php">
    <label >Titre<input type="text" name="titre" value="<?php if(isset($_POST['titre'])) echo $_POST['titre'];?>"></label>
    <label >Description<input type="text" name="description" value="<?php if(isset($_POST['description'])) echo $_POST['description'];?>"></label>
    <label >Prix<input type="text" name="prix" value="<?php if(isset($_POST['prix'])) echo $_POST['prix'];?>"></label>
    <br>
    <button class="dishbuton" type="submit">Valider</button>
</form>
    <h2>Insérer Horaire:</h2>
    <form method="POST" action="modeles/insertionsdonnees/traitementInsertionHoraires.php">
        <label >Jour<input type="text" name="jour" value="<?php if(isset($_POST['jour'])) echo $_POST['jour'];?>"></label>
        <label >Ouvert<input type="radio" name="statut" value="OUVERT" ></label>
        <label >Fermé<input type="radio" name="statut" value="FERME" ></label>
        <label >Ouverture midi:<input type="text" name="ouverture_midi" value=""></label>
        <label >Fermeture midi:<input type="text" name="fermeture_midi" value=""></label>
        <label >Ouverture soir:<input type="text" name="ouverture_soir" value=""></label>
        <label >Fermeture soir:<input type="text" name="fermeture_soir" value=""></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
    <h2>Modifier Horaire:</h2>
    <form method="POST" action="modeles/insertionsdonnees/traitementModificationHoraires.php">
        <label >Id<input type="texte" name="id" value="<?php if(isset($_POST['id'])) echo $_POST['id'];?>"></label>
        <label >Ouvert<input type="radio" name="statut" value="OUVERT" ></label>
        <label >Fermé<input type="radio" name="statut" value="FERME" ></label>
        <label >Ouverture midi:<input type="text" name="ouverture_midi" value=""></label>
        <label >Fermeture midi:<input type="text" name="fermeture_midi" value=""></label>
        <label >Ouverture soir:<input type="text" name="ouverture_soir" value=""></label>
        <label >Fermeture soir:<input type="text" name="fermeture_soir" value=""></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>

<?php

$contenu =ob_get_clean();

require_once 'layout.php';