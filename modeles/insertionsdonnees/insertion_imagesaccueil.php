<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* Utilisation du fichier config pour récupérer les variables d'environnement:*/
    require_once __DIR__ . '/../../config.php';
    require_once __DIR__ . '/../../vendor/autoload.php';
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);




    $num_image_bloc_1 = htmlspecialchars($_POST['num_image_bloc_1'], ENT_QUOTES);
    $num_image_bloc_2 = htmlspecialchars($_POST['num_image_bloc_2'], ENT_QUOTES);
    $num_image_bloc_3 = htmlspecialchars($_POST['num_image_bloc_3'], ENT_QUOTES);

    $stmt = $pdo->prepare('SELECT titre, nom_fichier, description, numero_image FROM images WHERE numero_image = ?');

    $stmt_insert = $pdo->prepare('INSERT INTO images_accueil (titre, nom_fichier, description, numero_image) VALUES (?, ?, ?, ?)');

    /* Supprimer les images précédemment stockées*/
    $pdo->exec('DELETE FROM images_accueil');

    $stmt->execute([$num_image_bloc_1]);
    $result = $stmt->fetch();
    $stmt_insert->execute([htmlspecialchars($result['titre']), htmlspecialchars($result['nom_fichier']), htmlspecialchars($result['description']), $num_image_bloc_1]);

    $stmt->execute([$num_image_bloc_2]);
    $result = $stmt->fetch();
    $stmt_insert->execute([htmlspecialchars($result['titre']), htmlspecialchars($result['nom_fichier']), htmlspecialchars($result['description']), $num_image_bloc_2]);

    $stmt->execute([$num_image_bloc_3]);
    $result = $stmt->fetch();
    $stmt_insert->execute([htmlspecialchars($result['titre']), htmlspecialchars($result['nom_fichier']), htmlspecialchars($result['description']), $num_image_bloc_3]);

    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;

}


