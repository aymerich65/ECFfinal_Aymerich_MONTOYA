<?php
try{
var_dump($_POST);

    $jour =$_POST['jour'];
    $statut = $_POST['statut'];
    $ouverture_midi = $_POST['ouverture_midi'];
    $fermeture_midi = $_POST['fermeture_midi'];
    $ouverture_soir = $_POST['ouverture_soir'];
    $fermeture_soir = $_POST['fermeture_soir'];




    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->prepare("INSERT INTO horaires (jour, statut, ouverture_midi, fermeture_midi, ouverture_soir, fermeture_soir) VALUES (:jour, :statut, :ouverture_midi, :fermeture_midi, :ouverture_soir, :fermeture_soir)");
    $myTable->bindValue(':jour', $jour, PDO::PARAM_STR);
    $myTable->bindValue(':statut', $statut, PDO::PARAM_STR);
    $myTable->bindValue(':ouverture_midi', $ouverture_midi, PDO::PARAM_STR);
    $myTable->bindValue(':fermeture_midi', $fermeture_midi, PDO::PARAM_STR);
    $myTable->bindValue(':ouverture_soir', $ouverture_soir, PDO::PARAM_STR);
    $myTable->bindValue(':fermeture_soir', $fermeture_soir, PDO::PARAM_STR);

    $myTable->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
