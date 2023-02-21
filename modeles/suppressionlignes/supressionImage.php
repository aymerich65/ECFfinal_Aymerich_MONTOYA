<?php
try{
    var_dump($_POST);
    $titre=$_POST['titre'];
    $numero_image=$_POST['numero_image'];


    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn,'root','');
    $statement = $pdo->prepare("DELETE FROM images WHERE numero_image = :numero_image");
    $statement->bindValue(':numero_image', $numero_image, PDO::PARAM_INT);

    $statement->execute();

/* Supression image dans son dossier: */
    if ($statement->execute()) {
        $file_path = __DIR__ . '/galerie/' . $titre;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }


}catch(PDOException $PDOException){
    echo 'il y a une erreur'.$PDOException->getMessage().'<br>';
}
