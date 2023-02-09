<?php
function createMenus(){
try{
$dsn = 'mysql:host=localhost;dbname=quaiantique';
$pdo = new PDO($dsn,'root','');
$menus  ="CREATE TABLE menus (
id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
titre VARCHAR(50) NOT NULL,
formule VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
prix DECIMAL(10,2) NOT NULL
)";

$pdo->exec($menus);
echo 'La table a été créée';


} catch(Exception $exception) {
echo 'une erreur c\'est produite:' . $exception->getMessage();
}
}

createMenus();
