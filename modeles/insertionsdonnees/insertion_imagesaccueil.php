<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once __DIR__ . '/../../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USER'];
    $envpassword = $_ENV['DB_PASSWORD'];

    $pdo = new PDO($dsn, $envuser , $envpassword);

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
}


