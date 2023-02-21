<?php

function createImages()
{
    try {
        $dsn = 'mysql:host=localhost;dbname=quaiantique';
        $pdo = new PDO($dsn, 'root', '');
        $picturesTable = "CREATE TABLE images (
        id int NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
        titre VARCHAR(60),
        nom_fichier VARCHAR(60),
        description TEXT,
        numero_image int NOT NULL 
        )";

        $pdo->exec($picturesTable);
        echo 'La table a été créée';


    } catch (Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

createImages();
