<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
function createMenus(){
    try{
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../');
        $dotenv->load();

        $dsn = $_ENV['DB_DSN'];
        $envuser = $_ENV['DB_USER'];
        $envpassword = $_ENV['DB_PASSWORD'];
        $pdo = new PDO($dsn, $envuser , $envpassword);
        $myMenutable  ="CREATE TABLE menus2 (
        id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
        titre VARCHAR(255) NOT NULL ,
        formule_id INT NOT NULL,
        CONSTRAINT constraintFormules FOREIGN KEY (formule_id) REFERENCES formules(id)
        )";

        $pdo->exec($myMenutable);
        echo 'La table a été créée';


    } catch(Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

createMenus();