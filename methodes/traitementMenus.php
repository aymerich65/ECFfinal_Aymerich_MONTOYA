<?php
try{
    $titre="";
    $description= "";
    $prix=null;

    if(isset($_POST['titre'])) {
        $titre = $_POST['titre'];
    };
    if(isset($_POST['formule1'])) {
        $formule1 = $_POST['formule1'];
    } else {
        $formule1 = null;
    };

    if(isset($_POST['2'])) {
        $formule2 = $_POST['formule2'];
    } else {
        $formule2 = null;
    };


    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->prepare("INSERT INTO desserts (titre, formule1, formule2) VALUES (:titre, :formule1, :formule2)");
    $myTable->bindValue(':titre', $titre, PDO::PARAM_STR);
    $myTable->bindValue(':description', $description, PDO::PARAM_STR);
    $myTable->bindValue(':prix', $prix, PDO::PARAM_STR);
    $myTable->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
