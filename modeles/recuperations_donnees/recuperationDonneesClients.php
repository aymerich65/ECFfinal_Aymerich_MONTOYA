<?php
header("Access-Control-Allow-Origin: *");

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');

$dotenv->load();

try{


if(isset($_SESSION['password']) && isset($_SESSION['email'])){
    $password = $_SESSION['password'];
    $email = $_SESSION['email'];
    $dsn = $_ENV['DB_DSN'];
    $pdo = new PDO($dsn,'root','');

    $statement = $pdo->prepare("SELECT*FROM clients WHERE email =:email");
    $statement->bindValue(':email', $email);
    if($statement->execute()){
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if($user === false) {
            echo 'identifiant invalide';
        }else{
            if(password_verify($password,$user['password'])){

                $guestsnumber = $user['convives'];
                $allergies = $user['allergies'];
            }else{
                echo 'password invalide';
            }
        }
    }

}

}catch(ExceptionA $e){

}








