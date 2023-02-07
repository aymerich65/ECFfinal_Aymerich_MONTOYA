<?php
try{
    var_dump($_POST);

    $id=$_POST['id'];
    $jour=$_POST['jour'];
    $ouvert= $_POST['ouvert'];
    $ouverture_midi= $_POST['ouverture_midi'];
    $fermeture_midi= $_POST['fermeture_midi'];
    $ouverture_soir= $_POST['ouverture_soir'];
    $fermeture_soir= $_POST['fermeture_soir'];




    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->prepare("UPDATE horaires SET jour = :jour, ouvert = :ouvert, ouverture = :ouverture_midi, fermeture = :fermeture_midi, ouverture = :ouverture_soir, fermeture = :fermeture_soir WHERE id = :id");

    $myTable->bindValue(':id', $id, PDO::PARAM_INT);
    $myTable->bindValue(':jour', $jour, PDO::PARAM_STR);
    $myTable->bindValue(':ouvert', $ouvert, PDO::PARAM_INT);
    $myTable->bindValue(':ouverture_midi', $ouverture_midi, PDO::PARAM_STR);
    $myTable->bindValue(':fermeture_midi', $fermeture_midi, PDO::PARAM_STR);
    $myTable->bindValue(':ouverture_soir', $ouverture_soir, PDO::PARAM_STR);
    $myTable->bindValue(':fermeture_soir', $fermeture_soir, PDO::PARAM_STR);


    $myTable->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
