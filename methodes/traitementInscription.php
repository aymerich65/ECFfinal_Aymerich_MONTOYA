<?php
try{

    $email=$_POST['email'];
    $password= $_POST['password'];
    $guests= $_POST['guests'];




    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->prepare("INSERT INTO clients (email, password, guests) VALUES (:email, :password, :guests)");
    $myTable->bindValue(':email', $email, PDO::PARAM_STR);
    $myTable->bindValue(':password', password_hash($password,PASSWORD_BCRYPT));
    $myTable->bindValue(':guests', $guests, PDO::PARAM_INT);
    $myTable->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
