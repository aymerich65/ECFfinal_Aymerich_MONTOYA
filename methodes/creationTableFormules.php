<?php
function createFormules(){
try{
$dsn = 'mysql:host=localhost;dbname=quaiantique';
$pdo = new PDO($dsn,'root','');
$myformulatable  ="CREATE TABLE formules (
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
prix DOUBLE NOT NULL
)";

$pdo->exec($myformulatable);
echo 'La table a été créée';


} catch(Exception $exception) {
echo 'une erreur c\'est produite:' . $exception->getMessage();
}
}

createFormules();
