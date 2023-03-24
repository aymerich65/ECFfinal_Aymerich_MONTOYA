<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

function createSchedules(){
    try{
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../../');
        $dotenv->load();

        $dsn = $_ENV['DB_DSN'];
        $envuser = $_ENV['DB_USERNAME'];
        $envpassword = $_ENV['DB_PASSWORD'];
        $pdo = new PDO($dsn, $envuser , $envpassword);
        $createSchedulestable ="CREATE TABLE horaires (
        jour varchar(10) not null primary key,
        statut varchar(10),
        ouverture_midi time  NULL DEFAULT '00:00',
        fermeture_midi time   NULL DEFAULT '00:00',
        ouverture_soir time  NULL DEFAULT '00:00',
        fermeture_soir time   NULL DEFAULT '00:00'


        )";

        $pdo->exec($createSchedulestable);
        echo 'La table a été créée';


    } catch(Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

createSchedules();
