<?php
//Créer Schéma

    try{
        $dsn = 'mysql:host=localhost';
        $pdo = new PDO($dsn,'root','');
        $pdo->exec('CREATE DATABASE quaiantique');

    }catch(PDOException $PDOException){
        echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
    }






//Création de la table:


function createtable(){
    try{
        $dsn = 'mysql:host=localhost;dbname=quaiantique';
        $pdo = new PDO($dsn,'root','');
        $myTable ="CREATE TABLE entrees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    prix DECIMAL(10,2) NOT NULL)"
        ;
        $pdo->exec(createtable());
        echo 'La table a été créée';


    } catch(Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}

//Création de la table:


function createclient(){
    try{
        $dsn = 'mysql:host=localhost;dbname=quaiantique';
        $pdo = new PDO($dsn,'root','');
        $myClientTable ="CREATE TABLE clients (
        nom VARCHAR(40) NOT NULL,
        prénom VARCHAR(40) NOT NULL,
        email VARCHAR(40) NOT NULL PRIMARY KEY,
        password VARCHAR(60) NOT NULL 
        )";

        $pdo->exec(createclient());
        echo 'La table a été créée';


    } catch(Exception $exception) {
        echo 'une erreur c\'est produite:' . $exception->getMessage();
    }
}











//Insérer les entrées
try{
    $titre = "";
    $description = "";
    $prix=null;

    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->prepare("INSERT INTO entrees (titre, description, prix) VALUES (:titre, :description, :prix)");
    $myTable->bindValue(':titre', $titre, PDO::PARAM_STR);
    $myTable->bindValue(':description', $description, PDO::PARAM_STR);
    $myTable->bindValue(':prix', $prix, PDO::PARAM_STR);
    $myTable->execute();

}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
echo 'ce message lui s\'affiche';







//Afficher les  entrée:
function entrees(){
try{
    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->query('SELECT*FROM entrees');


    foreach ($myTable as $value){
        if(isset($value['titre']) && isset($value['description']) && isset($value['prix'])){
            echo $value['titre'].'<br>';
            echo $value['description'].'<br>';
            echo $value['prix'].'<br>';
        }
    }

}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
}





