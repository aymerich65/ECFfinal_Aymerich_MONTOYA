<?php
function createSchedules(){
    try{
        $dsn = 'mysql:host=localhost;dbname=quaiantique';
        $pdo = new PDO($dsn,'root','');
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
