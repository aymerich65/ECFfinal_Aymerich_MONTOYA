<?php
try{
    var_dump($_POST);
    $nom=$_POST['nom'];





    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->prepare("INSERT INTO tabletest (nom) VALUES (:nom)");
    $myTable->bindValue(':nom', $nom, PDO::PARAM_STR);

    $myTable->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
