<?php
try{
 var_dump($_POST);
    $email=$_POST['email'];
    $password= $_POST['password'];
    $convives= $_POST['convives'];
    $allergies= $_POST['allergies'];


    require_once __DIR__ . '/../../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USER'];
    $envpassword = $_ENV['DB_PASSWORD'];

    $pdo = new PDO($dsn, $envuser , $envpassword);
    $myTable = $pdo->prepare("INSERT INTO clients (email, password, convives, allergies) VALUES (:email, :password, :convives, :allergies)");
    $myTable->bindValue(':email', $email, PDO::PARAM_STR);
    $myTable->bindValue(':password', password_hash($password,PASSWORD_BCRYPT));
    $myTable->bindValue(':convives', $convives, PDO::PARAM_INT);
    $myTable->bindValue(':allergies', $allergies, PDO::PARAM_STR);
    $myTable->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
