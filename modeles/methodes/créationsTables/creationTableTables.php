<?php
function createTables(){
    try{
        $dsn = 'mysql:host=localhost;dbname=quaiantique';
        $pdo = new PDO($dsn,'root','');
        $tables ="CREATE TABLE tables (
        id int  NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
        tables_disponibles int(2) NULL
        )";

        $pdo->exec($tables);
        echo 'La table a été créée';


    } catch(Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

createTables();