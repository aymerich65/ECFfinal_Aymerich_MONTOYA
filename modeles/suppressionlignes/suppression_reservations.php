<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;



$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();


$dsn = $_ENV['DB_DSN'];
$envuser = $_ENV['DB_USER'];
$envpassword = $_ENV['DB_PASSWORD'];
$pdo = new PDO($dsn, $envuser, $envpassword);

try {

    $currentDate = date('Y-m-d');


    $statement = $pdo->prepare("DELETE FROM reservations WHERE date = :currentDate");
    $statement->bindValue(':currentDate', $currentDate, PDO::PARAM_STR);
    $statement->execute();


    echo 'Suppression effectuée.';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
} catch (PDOException $PDOException) {
    echo 'Il y a une erreur : ' . $PDOException->getMessage();
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}
