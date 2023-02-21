<?php

function createHomePictures()
{
    try {
        $dsn = 'mysql:host=localhost;dbname=quaiantique';
        $pdo = new PDO($dsn, 'root', '');
        $homepicturestable = "CREATE TABLE images_accueil (
        id int NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
        titre VARCHAR(60),
        nom_fichier VARCHAR(60),
        description TEXT,
        
        numero_image int NOT NULL 
        )";

        $pdo->exec($homepicturestable);
        echo 'La table a été créée';


    } catch (Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

createHomePictures();
