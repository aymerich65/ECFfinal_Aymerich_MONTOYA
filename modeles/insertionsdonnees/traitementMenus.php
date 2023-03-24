<?php
try{
//var_dump($_POST);
$titre= htmlspecialchars($_POST['titre'], ENT_QUOTES);
$formule=htmlspecialchars($_POST['formule'], ENT_QUOTES);
$description= htmlspecialchars($_POST['description'], ENT_QUOTES);
$prix= htmlspecialchars($_POST['prix'], ENT_QUOTES);

    require_once __DIR__ . '/../../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USERNAME'];
    $envpassword = $_ENV['DB_PASSWORD'];

    $pdo = new PDO($dsn, $envuser , $envpassword);
    $myTable = $pdo->prepare("INSERT INTO menus (titre, formule, description, prix) VALUES (:titre, :formule, :description, :prix)");
    $myTable->bindValue(':titre', $titre, PDO::PARAM_STR);
    $myTable->bindValue(':formule', $formule, PDO::PARAM_STR);
    $myTable->bindValue(':description', $description, PDO::PARAM_STR);
    $myTable->bindValue(':prix', $prix, PDO::PARAM_STR);
    $myTable->execute();

    echo '<script>alert("Données insérées en base de donnée")</script>';
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
