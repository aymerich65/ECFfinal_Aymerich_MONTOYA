<?php

require_once __DIR__ . '/../../vendor/autoload.php';

try{
    var_dump($_POST);
    $titre=$_POST['titre'];


    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USER'];
    $envpassword = $_ENV['DB_PASSWORD'];

    $pdo = new PDO($dsn, $envuser , $envpassword);
    $statement = $pdo->prepare("DELETE FROM desserts WHERE titre = :titre");
    $statement->bindValue(':titre', $titre, PDO::PARAM_STR);

    $statement->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
