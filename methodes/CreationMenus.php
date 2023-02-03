<?php
function createMenus(){
    try{
        $dsn = 'mysql:host=localhost;dbname=quaiantique';
        $pdo = new PDO($dsn,'root','');
        $myMenutable  ="CREATE TABLE menus (
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