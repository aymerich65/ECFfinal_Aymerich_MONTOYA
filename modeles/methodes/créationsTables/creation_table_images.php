<?php

function createImages()
{
    try {
        $dsn = 'mysql:host=localhost;dbname=quaiantique';
        $pdo = new PDO($dsn, 'root', '');
        $picturesTable = "CREATE TABLE images (
        id int NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
        titre VARCHAR(60),
        description TEXT,
        reference VARCHAR(60) 
        )";

        $pdo->exec($picturesTable);
        echo 'La table a été créée';


    } catch (Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

createImages();
