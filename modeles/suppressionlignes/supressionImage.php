<?php
require_once __DIR__ . '/../../vendor/autoload.php';

try{
    var_dump($_POST);
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
        echo "Image supprimée avec succès : " . $file_path;
    } else {
        echo "Le fichier n'existe pas : " . $file_path;
    }

} catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
