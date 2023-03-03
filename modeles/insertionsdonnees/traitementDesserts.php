<?php
try{
    require_once __DIR__ . '/../../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();


    var_dump($_POST);
    $titre=$_POST['titre'];
    $description= $_POST['description'];
    $prix= $_POST['prix'];

    $dsn = $_ENV['DB_DSN'];
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->prepare("INSERT INTO desserts (titre, description, prix) VALUES (:titre, :description, :prix)");
    $myTable->bindValue(':titre', $titre, PDO::PARAM_STR);
    $myTable->bindValue(':description', $description, PDO::PARAM_STR);
    $myTable->bindValue(':prix', $prix, PDO::PARAM_STR);
    $myTable->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
