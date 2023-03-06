<?php

require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
$dsn = $_ENV['DB_DSN'];
$envuser = $_ENV['DB_USER'];
$envpassword = $_ENV['DB_PASSWORD'];


$pdo = new PDO($dsn, $envuser , $envpassword);



try{
    var_dump($_POST);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');



    $pdo = new PDO($dsn, $envuser , $envpassword);
    $statement = $pdo->prepare("DELETE FROM reservations WHERE email = :email");
    $statement->bindValue(':email', $email, PDO::PARAM_STR);

    $statement->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
