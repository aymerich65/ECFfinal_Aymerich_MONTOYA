<?php
try{

    $email=$_POST['email'];
    $poste= $_POST['poste'];
    $password= $_POST['password'];


    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->prepare("INSERT INTO Administrateurs (email, poste, password) VALUES (:email, :poste,  :password)");
    $myTable->bindValue(':email', $email, PDO::PARAM_STR);
    $myTable->bindValue(':poste', $poste, PDO::PARAM_STR);
    $myTable->bindValue(':password', password_hash($password,PASSWORD_BCRYPT));

    $myTable->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}

