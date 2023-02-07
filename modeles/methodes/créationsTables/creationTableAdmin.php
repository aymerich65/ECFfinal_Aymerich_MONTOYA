<?php
function createAdmin(){
    try{
        $dsn = 'mysql:host=localhost;dbname=quaiantique';
        $pdo = new PDO($dsn,'root','');
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
