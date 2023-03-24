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

    $titre = $myText = str_replace(" ", "_", htmlspecialchars($_POST['titre'], ENT_QUOTES));
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
    $numero_image = htmlspecialchars($_POST['numero_image'], ENT_QUOTES);
    $image_id = htmlspecialchars($_POST['image_id'], ENT_QUOTES);
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

        require_once __DIR__ . '/../../vendor/autoload.php';
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
        $dsn = $_ENV['DB_DSN'];
        $envuser = $_ENV['DB_USERNAME'];
        $envpassword = $_ENV['DB_PASSWORD'];

        $pdo = new PDO($dsn, $envuser , $envpassword );
        $myTable = $pdo->prepare("UPDATE images SET titre = :titre, description = :description, numero_image = :numero_image, nom_fichier = :nom_fichier WHERE id = :image_id");
        $myTable->bindValue(':titre', $titre, PDO::PARAM_STR);
        $myTable->bindValue(':description', $description, PDO::PARAM_STR);
        $myTable->bindValue(':numero_image', $numero_image, PDO::PARAM_INT);
        $myTable->bindValue(':nom_fichier', $realname, PDO::PARAM_STR);
        $myTable->bindValue(':image_id', $image_id, PDO::PARAM_INT);
        $myTable->execute();

        echo '<script>alert("Image modifiée redirection vers l\'accueil")</script>';
        echo '<div class="button-container mytestcolor">';
        echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
        echo '</div>';
        exit;



    } else {

        echo '<script>alert("Une erreur est survenue lors du téléchargement du fichier.")</script>';
        echo '<div class="button-container mytestcolor">';
        echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
        echo '</div>';
        exit;


    }

} else {
    $titre = $myText = str_replace(" ", "_", htmlspecialchars($_POST['titre'], ENT_QUOTES));
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
    $numero_image = htmlspecialchars($_POST['numero_image'], ENT_QUOTES);
    $image_id = htmlspecialchars($_POST['image_id'], ENT_QUOTES);

    require_once __DIR__ . '/../../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();
    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USER'];
    $envpassword = $_ENV['DB_PASSWORD'];

    $pdo = new PDO($dsn, $envuser , $envpassword );
    $myTable = $pdo->prepare("UPDATE images SET titre = :titre, description = :description, numero_image = :numero_image WHERE id = :image_id");
    $myTable->bindValue(':titre', $titre, PDO::PARAM_STR);
    $myTable->bindValue(':description', $description, PDO::PARAM_STR);
    $myTable->bindValue(':numero_image', $numero_image, PDO::PARAM_INT);
    $myTable->bindValue(':image_id', $image_id, PDO::PARAM_INT);
    $myTable->execute();

    echo '<script>alert("Image modifiée")</script>';
    echo '<div class="button-container mytestcolor">';
    echo '<a href="../../index.php?page=admin"><button class="button-reservation-style">Retour page administrateur</button></a>';
    echo '</div>';
    exit;



}
