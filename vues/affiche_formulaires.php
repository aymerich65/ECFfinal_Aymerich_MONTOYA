<?php
ob_start();
?>
<h2>Modifier carte:</h2>
    <p>Insérer entrée:</p>
    <form method="POST" action="modeles/insertionsdonnees/traitementEntrées.php">
        <label >Titre<input type="text" name="titre" value=""></label>
        <label >Description<input type="text" name="description" value=""></label>
        <label >Prix<input type="text" name="prix" value=""></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
    <p>Supprimer entrée:</p>
    <form method="POST" action="modeles/suppressionlignes/supressionEntree.php">
        <label >Titre<input type="text" name="titre" value=""></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
<p>Insérer plat principal:</p>
<form method="POST" action="modeles/insertionsdonnees/traitementPlats.php">
    <label >Titre<input type="text" name="titre" value=""></label>
    <label >Description<input type="text" name="description" value=""></label>
    <label >Prix<input type="text" name="prix" value=""></label>
    <br>
    <button class="dishbuton" type="submit">Valider</button>
</form>
    <p>Supprimer plat principal:</p>
    <form method="POST" action="modeles/suppressionlignes/supressionPlatPrincipale.php">
        <label >Titre<input type="text" name="titre" value=""></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
    <p>Insérer dessert:</p>
    <form method="POST" action="modeles/insertionsdonnees/traitementDesserts.php">
        <label >Titre<input type="text" name="titre" value=""></label>
        <label >Description<input type="text" name="description" value=""></label>
        <label >Prix<input type="text" name="prix" value=""></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
    <p>Supprimer dessert:</p>
    <form method="POST" action="modeles/suppressionlignes/supressionDessert.php">
        <label >Titre<input type="text" name="titre" value=""></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
<h2>Insérer Menu:</h2>
<form method="POST" action="modeles/insertionsdonnees/traitementMenus.php">
    <label >Titre<input type="text" name="titre" value=""></label>
    <label >Formule<input type="text" name="formule" value=""></label>
    <label >Description<input type="text" name="description" value=""></label>
    <label >Prix<input type="text" name="prix" value=""></label>
    <br>
    <button class="dishbuton" type="submit">Valider</button>
</form>
</br>
    <h2>Supprimer Menu:</h2>
    <form method="POST" action="modeles/suppressionlignes/supressionMenu.php">
        <label >Titre<input type="text" name="titre" value=""></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>


    <h2>Insérer Horaire:</h2>
    <form method="POST" action="modeles/insertionsdonnees/traitementInsertionHoraires.php">
        <label >Jour<input type="text" name="jour" value=""></label>
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
        <label >Jour<input type="text" name="jour" value=""></label>
        <label >Ouvert<input type="radio" name="statut" value="OUVERT" ></label>
        <label >Fermé<input type="radio" name="statut" value="FERME" ></label>
        <label >Ouverture midi:<input type="text" name="ouverture_midi" value=""></label>
        <label >Fermeture midi:<input type="text" name="fermeture_midi" value=""></label>
        <label >Ouverture soir:<input type="text" name="ouverture_soir" value=""></label>
        <label >Fermeture soir:<input type="text" name="fermeture_soir" value=""></label>
        <br>
        <button class="dishbuton" type="submit">Valider</button>
    </form>
    <h2>Modifier nombre de tables:</h2>
    <form method="POST" action="../modeles/insertionsdonnees/insertionTables.php">
        <label >tables<input type="number" name="tables" value=""></label>
        <button class="dishbuton" type="submit">Valider</button>
    </form>

<?php

$contenu =ob_get_clean();

require_once 'layout.php';