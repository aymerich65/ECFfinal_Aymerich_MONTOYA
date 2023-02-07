<?php
try{
    $dsn = 'mysql:host=localhost';
    $pdo = new PDO($dsn,'root','');
    $pdo->exec('CREATE DATABASE quaiantique');

}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}



