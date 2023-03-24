<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

function createclient(){
    try{
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../');
        $dotenv->load();

        $dsn = $_ENV['DB_DSN'];
        $envuser = $_ENV['DB_USERNAME'];
        $envpassword = $_ENV['DB_PASSWORD'];
        $pdo = new PDO($dsn, $envuser , $envpassword);
        $myClientTable ="CREATE TABLE clients (
        convives int  NOT NULL,
        email VARCHAR(40) NOT NULL PRIMARY KEY UNIQUE,
        password VARCHAR(60) NOT NULL,
        allergies VARCHAR(60)  NULL 
        )";

        $pdo->exec($myClientTable);
        echo 'La table a été créée';


    } catch(Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

createclient();

