<?php
header("Access-Control-Allow-Origin: *");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);




try{


if(isset($_SESSION['password']) && isset($_SESSION['email'])){
    $password = $_SESSION['password'];
    $email = $_SESSION['email'];








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

}catch(Exception $e){
echo 'un erreur c\'est produite';
}
//var_dump($_SESSION);







