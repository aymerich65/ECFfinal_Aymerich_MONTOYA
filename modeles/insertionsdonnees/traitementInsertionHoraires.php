<?php

/* Utilisation du fichier config pour récupérer les variables d'environnement:*/
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../vendor/autoload.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);



try{
//var_dump($_POST);

    $jour =htmlspecialchars($_POST['jour'], ENT_QUOTES);
    $statut =htmlspecialchars($_POST['statut'], ENT_QUOTES) ;
    $ouverture_midi = htmlspecialchars($_POST['ouverture_midi'], ENT_QUOTES);
    $fermeture_midi = htmlspecialchars($_POST['fermeture_midi'], ENT_QUOTES);
    $ouverture_soir = htmlspecialchars($_POST['ouverture_soir'], ENT_QUOTES);
    $fermeture_soir = htmlspecialchars($_POST['fermeture_soir'], ENT_QUOTES);



    $myTable = $pdo->prepare("INSERT INTO horaires (jour, statut, ouverture_midi, fermeture_midi, ouverture_soir, fermeture_soir) VALUES (:jour, :statut, :ouverture_midi, :fermeture_midi, :ouverture_soir, :fermeture_soir)");
    $myTable->bindValue(':jour', $jour, PDO::PARAM_STR);
    $myTable->bindValue(':statut', $statut, PDO::PARAM_STR);
    $myTable->bindValue(':ouverture_midi', $ouverture_midi, PDO::PARAM_STR);
    $myTable->bindValue(':fermeture_midi', $fermeture_midi, PDO::PARAM_STR);
    $myTable->bindValue(':ouverture_soir', $ouverture_soir, PDO::PARAM_STR);
    $myTable->bindValue(':fermeture_soir', $fermeture_soir, PDO::PARAM_STR);

    $myTable->execute();
    echo '<script>alert("Horaire inséré en base de donnée")</script>';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;


}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}
