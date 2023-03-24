<?php

require_once __DIR__ . '/../../../vendor/autoload.php';


function createCapacity()
{
    try {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../');
        $dotenv->load();

        $dsn = $_ENV['DB_DSN'];
        $envuser = $_ENV['DB_USERNAME'];
        $envpassword = $_ENV['DB_PASSWORD'];
        $pdo = new PDO($dsn, $envuser, $envpassword);
        $capacityTable = "CREATE TABLE capacite_d_accueil (
        id int NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
        capacite_totale int
        )";

        $pdo->exec($capacityTable);
        echo 'La table a été créée';


    } catch (Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

createCapacity();
