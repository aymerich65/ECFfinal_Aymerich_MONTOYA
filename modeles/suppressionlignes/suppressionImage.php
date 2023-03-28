<?php

/* Utilisation du fichier config pour récupérer les variables d'environnement:*/
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../vendor/autoload.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);




try{
    //var_dump($_POST);
    $titre=$_POST['titre'];
    $numero_image=$_POST['numero_image'];
    $statement = $pdo->prepare("DELETE FROM images WHERE numero_image = :numero_image");
    $statement->bindValue(':numero_image', $numero_image, PDO::PARAM_INT);

    $statement->execute();

    /* Suppression image dans son dossier: */
    $file_path = '../../galerie/' . $titre;



        echo '<p>Suppression effectuée</p>';
        echo '<div class="button-container mytestcolor">';
        echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
        echo '</div>';
        exit;





} catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}
