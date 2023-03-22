<?php
require_once __DIR__ . '/../../vendor/autoload.php';

try{
    //var_dump($_POST);
    $titre=$_POST['titre'];
    $numero_image=$_POST['numero_image'];

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USER'];
    $envpassword = $_ENV['DB_PASSWORD'];

    $pdo = new PDO($dsn, $envuser , $envpassword);
    $statement = $pdo->prepare("DELETE FROM images WHERE numero_image = :numero_image");
    $statement->bindValue(':numero_image', $numero_image, PDO::PARAM_INT);

    $statement->execute();

    /* Suppression image dans son dossier: */
    $file_path = '../../galerie/' . $titre;



    if (file_exists($file_path)) {
        unlink($file_path);


        echo 'Suppression effectuée.';
        echo '<div class="button-container mytestcolor">';
        echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
        echo '</div>';
        exit;


    } else {
        echo "Le fichier n'existe pas : " . $file_path;
        echo '<div class="button-container mytestcolor">';
        echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
        echo '</div>';
        exit;
    }

} catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}
