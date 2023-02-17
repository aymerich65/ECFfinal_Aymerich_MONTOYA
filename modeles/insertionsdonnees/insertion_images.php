<?php

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



$targetFile= '';


function moveUploadedFile(array $uploadedFile,&$targetFile): bool {
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mimeType = $finfo->file($uploadedFile['tmp_name']);
$extension = getExtensionFromMimeType($mimeType);
    $targetDir = 'C:\xampp\htdocs\QuaiAntique_AymerichMONTOYA\uploads\\';
    $targetFile = $targetDir . sha1_file($uploadedFile['tmp_name']) . '.' . $extension;
if ($extension === null) {
return false;
}

//$targetDir = 'C:\xampp\htdocs\QuaiAntique_AymerichMONTOYA\uploads\\';
//$targetFile = $targetDir . sha1_file($uploadedFile['tmp_name']) . '.' . $extension;
    var_dump($targetFile);
return move_uploaded_file($uploadedFile['tmp_name'], $targetFile);
}

$extensions = array('jpg', 'png', 'gif');

if (isset($_FILES['image']) && !$_FILES['image']['error']) {
$fileInfo = pathinfo($_FILES['image']['name']);

if ($_FILES['image']['size'] <= 5000000) {
if (in_array($fileInfo['extension'], $extensions)) {
// Scripts à exécuter quand les contrôles sont bons.
if (!file_exists('./uploads')) {
mkdir('./uploads', 0777, true);
}

if (moveUploadedFile($_FILES['image'],$targetFile)) {
echo 'Téléchargement réussi.';
} else {
echo 'Une erreur est survenue lors du téléchargement du fichier.';
}
} else {
echo 'Ce type de fichier est interdit.';
}
} else {
echo 'Le fichier dépasse la taille autorisée.';
}
} else {
echo 'Une erreur est survenue lors de l\'envoi du fichier.';
}

$titre = $_POST['titre'];
$description = $_POST['description'];
$reference = $targetFile;

$dsn = 'mysql:host=localhost;dbname=quaiantique';
$pdo = new PDO($dsn,'root','');
$myTable = $pdo->prepare("INSERT INTO images ( titre, description, reference) VALUES (:titre, :description, :reference)");
$myTable->bindValue(':titre', $titre, PDO::PARAM_STR);
$myTable->bindValue(':description', $description, PDO::PARAM_STR);
$myTable->bindValue(':reference', $reference, PDO::PARAM_STR);
$myTable->execute();