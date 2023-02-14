<?php

function createReservations()
{
    try {
        $dsn = 'mysql:host=localhost;dbname=quaiantique';
        $pdo = new PDO($dsn, 'root', '');
        $reservationsTable = "CREATE TABLE reservations (
        reservation int NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
        tables int NOT NULL,
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
