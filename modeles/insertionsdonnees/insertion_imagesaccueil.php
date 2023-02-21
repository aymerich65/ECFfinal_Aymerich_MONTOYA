<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$dsn = 'mysql:host=localhost;dbname=quaiantique';
$pdo = new PDO($dsn, 'root', '');

$num_image_bloc_1 = htmlspecialchars($_POST['num_image_bloc_1']);
$num_image_bloc_2 = htmlspecialchars($_POST['num_image_bloc_2']);
$num_image_bloc_3 = htmlspecialchars($_POST['num_image_bloc_3']);

$stmt = $pdo->prepare('SELECT titre, nom_fichier, description, numero_image FROM images WHERE numero_image = ?');

$stmt_insert = $pdo->prepare('INSERT INTO images_accueil (titre, nom_fichier, description, numero_image) VALUES (?, ?, ?, ?)');

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

