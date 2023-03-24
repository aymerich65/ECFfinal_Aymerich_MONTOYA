<?php
require_once __DIR__ . '/../../../vendor/autoload.php';



function dessert(){
    try{
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../');
        $dotenv->load();

        $dsn = $_ENV['DB_DSN'];
        $envuser = $_ENV['DB_USERNAME'];
        $envpassword = $_ENV['DB_PASSWORD'];
        $pdo = new PDO($dsn, $envuser , $envpassword);
        $dessert ="CREATE TABLE desserts (
        id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
        titre VARCHAR(50) NOT NULL,
        description TEXT NOT NULL,
        prix DECIMAL(10,2) NOT NULL
)";

        $pdo->exec($dessert);
        echo 'La table a été créée';


    } catch(Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

dessert();