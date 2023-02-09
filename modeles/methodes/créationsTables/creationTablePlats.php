<?php
function mainDish(){
    try{
        $dsn = 'mysql:host=localhost;dbname=quaiantique';
        $pdo = new PDO($dsn,'root','');
        $mainDish ="CREATE TABLE plats (
        id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
        titre VARCHAR(50) NOT NULL,
        description TEXT NOT NULL,
        prix DECIMAL(10,2) NOT NULL
)";

        $pdo->exec($mainDish);
        echo 'La table a été créée';


    } catch(Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

mainDish();