<?php
try{
 var_dump($_POST);
    $email=$_POST['email'];
    $password= $_POST['password'];
    $convives= $_POST['convives'];
    $allergies= $_POST['allergies'];




    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $myTable = $pdo->prepare("INSERT INTO clients (email, password, convives, allergies) VALUES (:email, :password, :convives, :allergies)");
    $myTable->bindValue(':email', $email, PDO::PARAM_STR);
    $myTable->bindValue(':password', password_hash($password,PASSWORD_BCRYPT));
    $myTable->bindValue(':convives', $convives, PDO::PARAM_INT);
    $myTable->bindValue(':allergies', $allergies, PDO::PARAM_STR);
    $myTable->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
