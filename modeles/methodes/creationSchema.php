<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

try{
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../');
    $dotenv->load();

    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USER'];
    $envpassword = $_ENV['DB_PASSWORD'];
    $pdo = new PDO($dsn, $envuser , $envpassword);
    $pdo->exec('CREATE DATABASE quaiantique');

}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}



