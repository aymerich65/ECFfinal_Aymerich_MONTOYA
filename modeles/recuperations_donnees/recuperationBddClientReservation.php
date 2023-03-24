<?php
require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
try{

    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USERNAME'];
    $envpassword = $_ENV['DB_PASSWORD'];
    $pdo = new PDO($dsn, $envuser , $envpassword);
    $myTable = $pdo->query("SELECT FROM client WHERE email = :email");
    $myTable->execute();
    $row = $myTable->fetch(PDO::FETCH_ASSOC);


    $availablesTable = htmlspecialchars($row['tables_disponibles']);


    header("Content-Type: application/json");
    echo json_encode($availablesTable);

} catch(PDOException $e){
    echo 'il y a une erreur:'.$e->getMessage();
}

