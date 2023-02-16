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

function moveUploadedFile(array $uploadedFile): bool {
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mimeType = $finfo->file($uploadedFile['tmp_name']);
$extension = getExtensionFromMimeType($mimeType);

if ($extension === null) {
return false;
}

$targetDir = 'C:\xampp\htdocs\QuaiAntique_AymerichMONTOYA\uploads\\';
$targetFile = $targetDir . sha1_file($uploadedFile['tmp_name']) . '.' . $extension;

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

if (moveUploadedFile($_FILES['image'])) {
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

/*function moveUploadedFile(array $uploadedFile): bool {
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($uploadedFile['tmp_name']);

    return move_uploaded_file(
        $uploadedFile['tmp_name'],
        sprintf('./uploads/%s.%s',
            sha1_file($uploadedFile['tmp_name']),
            getExtensionFromMimeType($mimeType)
        )
    );
}

if (!moveUploadedFile($_FILES['uploaded_file'])) {
    throw new RuntimeException('Impossible to upload file.');
}*/