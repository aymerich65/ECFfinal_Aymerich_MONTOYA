<?php
try{
var_dump($_POST);
$titre=$_POST['titre'];
$formule=$_POST['formule'];
$description= $_POST['description'];
$prix= $_POST['prix'];

    require_once __DIR__ . '/../../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USER'];
    $envpassword = $_ENV['DB_PASSWORD'];

    $pdo = new PDO($dsn, $envuser , $envpassword);
    $myTable = $pdo->prepare("INSERT INTO menus (titre, formule, description, prix) VALUES (:titre, :formule, :description, :prix)");
    $myTable->bindValue(':titre', $titre, PDO::PARAM_STR);
    $myTable->bindValue(':formule', $formule, PDO::PARAM_STR);
    $myTable->bindValue(':description', $description, PDO::PARAM_STR);
    $myTable->bindValue(':prix', $prix, PDO::PARAM_STR);
    $myTable->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
