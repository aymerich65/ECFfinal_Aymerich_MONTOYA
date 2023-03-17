<?php

require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
$dsn = $_ENV['DB_DSN'];
$envuser = $_ENV['DB_USER'];
$envpassword = $_ENV['DB_PASSWORD'];


$pdo = new PDO($dsn, $envuser , $envpassword);



try{
    //var_dump($_POST);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $date = htmlspecialchars($_POST['date'], ENT_QUOTES, 'UTF-8');
    $horaire = htmlspecialchars($_POST['horaire'], ENT_QUOTES, 'UTF-8');



    $pdo = new PDO($dsn, $envuser , $envpassword);
    $statement = $pdo->prepare("DELETE FROM reservations WHERE email = :email AND date = :date AND horaire = :horaire");
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->bindValue(':date', date('Y-m-d', strtotime($date)), PDO::PARAM_STR);
    $statement->bindValue(':horaire', $horaire, PDO::PARAM_STR);

    $statement->execute();
    echo 'Suppression effectuée.';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;

}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}
