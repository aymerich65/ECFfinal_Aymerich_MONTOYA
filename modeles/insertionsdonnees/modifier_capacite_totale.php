<?php
try{
    require_once __DIR__ . '/../../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();


    //var_dump($_POST);
    $capacity=htmlspecialchars($_POST['capacite_totale'], ENT_QUOTES);





    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USER'];
    $envpassword = $_ENV['DB_PASSWORD'];

    $pdo = new PDO($dsn, $envuser , $envpassword);
    $myTable = $pdo->prepare("UPDATE capacite_d_accueil SET capacite_totale = :capacite_totale");
    $myTable->bindValue(':capacite_totale', $capacity, PDO::PARAM_INT);
    $myTable->execute();
}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
