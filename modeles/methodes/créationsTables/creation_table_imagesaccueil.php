<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

function createHomePictures()
{
    try {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../');
        $dotenv->load();

        $dsn = $_ENV['DB_DSN'];
        $envuser = $_ENV['DB_USERNAME'];
        $envpassword = $_ENV['DB_PASSWORD'];

        $pdo = new PDO($dsn, $envuser , $envpassword);
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
