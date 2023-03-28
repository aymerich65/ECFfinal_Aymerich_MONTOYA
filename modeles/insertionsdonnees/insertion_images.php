<?php

/* Utilisation du fichier config pour récupérer les variables d'environnement:*/
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../vendor/autoload.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);






function getExtensionFromMimeType(string $mimeType): ?string {
switch ($mimeType) {
case 'image/jpeg':
return 'jpg';
case 'image/png':
return 'png';
case 'image/gif':
return 'gif';
default:
return null;
}
}

function moveUploadedFile(array $uploadedFile, &$targetFile, $titre, $targetDir): bool {
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mimeType = $finfo->file($uploadedFile['tmp_name']);
$extension = getExtensionFromMimeType($mimeType);
if ($extension === null) {

    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';



return false;
}

$targetFile = $targetDir . DIRECTORY_SEPARATOR . $titre . '.' . $extension;
return move_uploaded_file($uploadedFile['tmp_name'], $targetFile);
}

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
$fileInfo = new finfo(FILEINFO_MIME_TYPE);
$mimeType = $fileInfo->file($_FILES['image']['tmp_name']);
$extension = getExtensionFromMimeType($mimeType);
if ($extension === null) {
echo 'Type de fichier invalide';

    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}
$taille_fichier = $_FILES['image']['size'];
if ($taille_fichier > 5000000) {
echo 'Fichier trop volumineux';

    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';


exit;
}

/* sécurisation de mes variables:*/


$titre = $myText = str_replace(" ", "_", htmlspecialchars($_POST['titre'], ENT_QUOTES));
$description =  htmlspecialchars($_POST['description'], ENT_QUOTES);
$numero_image =  htmlspecialchars($_POST['numero_image'], ENT_QUOTES);





$targetDir = '../../galerie';
if (!$targetDir) {
echo 'Le dossier de destination n\'existe pas ou n\'a pas les permissions nécessaires.';

    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}

$targetFile = '';
if (moveUploadedFile($_FILES['image'], $targetFile, $titre, $targetDir)) {
echo 'Téléchargement réussi.';

$realname = basename($targetFile);








$myTable = $pdo->prepare("INSERT INTO images (titre, description, numero_image, nom_fichier) VALUES (:titre, :description, :numero_image, :nom_fichier)");
$myTable->bindValue(':titre', $titre, PDO::PARAM_STR);
$myTable->bindValue(':description', $description, PDO::PARAM_STR);
$myTable->bindValue(':numero_image', $numero_image, PDO::PARAM_INT);
$myTable->bindValue(':nom_fichier', $realname, PDO::PARAM_STR);
$myTable->execute();

    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;


} else {
echo 'Une erreur est survenue lors du téléchargement du fichier.';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}

} else {
echo 'Une erreur est survenue lors de l\'envoi du fichier.';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}

if (file_exists($targetFile)) {
echo 'Le fichier a été déplacé avec succès dans le dossier "galerie".';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;

} else {
echo 'Le fichier n\'a pas été déplacé dans le dossier "galerie". Veuillez vérifier les permissions du dossier.';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;
}

