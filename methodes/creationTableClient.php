<?php
function createclient(){
    try{
        $dsn = 'mysql:host=localhost;dbname=quaiantique';
        $pdo = new PDO($dsn,'root','');
        $myClientTable ="CREATE TABLE clients (
        guests int  NOT NULL,
        email VARCHAR(40) NOT NULL PRIMARY KEY UNIQUE,
        password VARCHAR(60) NOT NULL 
        )";

        $pdo->exec($myClientTable);
        echo 'La table a été créée';


    } catch(Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

createclient();

