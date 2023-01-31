<?php
try{
    $titre="";
    $description= "";
    $prix=null;

    if(isset($_POST['titre'])) {
        $titre = $_POST['titre'];
    };
    if(isset($_POST['description'])) {
        $description = $_POST['description'];
    };
    if(isset($_POST['prix'])) {
        $titre = $_POST['prix'];
    };

    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->prepare("INSERT INTO desserts (titre, description, prix) VALUES (:titre, :description, :prix)");
    $myTable->bindValue(':titre', $titre, PDO::PARAM_STR);
    $myTable->bindValue(':description', $description, PDO::PARAM_STR);
    $myTable->bindValue(':prix', $prix, PDO::PARAM_STR);
    $myTable->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
