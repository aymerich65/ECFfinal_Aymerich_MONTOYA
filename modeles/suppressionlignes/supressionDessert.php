<?php
try{
    var_dump($_POST);
    $titre=$_POST['titre'];





    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $statement = $pdo->prepare("DELETE FROM desserts WHERE titre = :titre");
    $statement->bindValue(':titre', $titre, PDO::PARAM_STR);

    $statement->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
