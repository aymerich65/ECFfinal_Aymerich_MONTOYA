<?php
function starter(){
    try{
        $dsn = 'mysql:host=localhost;dbname=quaiantique';
        $pdo = new PDO($dsn,'root','');
        $starter ="CREATE TABLE entrees (
        id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
        titre VARCHAR(50) NOT NULL,
        description TEXT NOT NULL,
        prix DECIMAL(10,2) NOT NULL
)";

        $pdo->exec($starter);
        echo 'La table a été créée';


    } catch(Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

starter();