<?php
   try{
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../vendor/autoload.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

$id = $_POST['id'];
$titre = htmlspecialchars($_POST['titre'], ENT_QUOTES);
$formule = htmlspecialchars($_POST['formule'], ENT_QUOTES);
$description = htmlspecialchars($_POST['description'], ENT_QUOTES);
$prix = htmlspecialchars($_POST['prix'], ENT_QUOTES);

$query = "UPDATE menus SET titre = :titre, formule = :formule, description = :description, prix = :prix WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
$stmt->bindParam(':formule', $formule, PDO::PARAM_STR);
$stmt->bindParam(':description', $description, PDO::PARAM_STR);
$stmt->bindParam(':prix', $prix, PDO::PARAM_STR);

$stmt->execute(); 
    echo 'Données envoyées';
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




