<?php
require_once __DIR__ . '/../../../vendor/autoload.php';



function createReservations()
{
    try {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../');
        $dotenv->load();

        $dsn = $_ENV['DB_DSN'];
        $envuser = $_ENV['DB_USERNAME'];
        $envpassword = $_ENV['DB_PASSWORD'];
        $pdo = new PDO($dsn, $envuser , $envpassword);
        $reservationsTable = "CREATE TABLE reservations (
        reservation int NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
        couverts int NOT NULL,
        email VARCHAR(254) NOT NULL,
        allergies VARCHAR(60) NULL,
        date  DATE NOT NULL,
        horaire VARCHAR(60) NOT NULL 
        )";

        $pdo->exec($reservationsTable);
        echo 'La table a été créée';


    } catch (Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

createReservations();
