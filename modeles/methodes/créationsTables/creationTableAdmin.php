<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

function createAdmin(){
    try{
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../');
        $dotenv->load();

        $dsn = $_ENV['DB_DSN'];
        $envuser = $_ENV['DB_USERNAME'];
        $envpassword = $_ENV['DB_PASSWORD'];
        $pdo = new PDO($dsn, $envuser , $envpassword);
        $AdministratorsTable ="CREATE TABLE Administrateurs (
        email VARCHAR(254) NOT NULL PRIMARY KEY UNIQUE,
        poste VARCHAR(60) NOT NULL,
        password VARCHAR(60) NOT NULL 
        )";

        $pdo->exec($AdministratorsTable);
        echo 'La table a été créée';


    } catch(Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

createAdmin();
