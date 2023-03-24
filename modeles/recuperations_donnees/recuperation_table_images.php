<?php
header("Access-Control-Allow-Origin: *");

require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');

$dotenv->load();

$dsn = $_ENV['DB_DSN'];
$envuser = $_ENV['DB_USERNAME'];
$envpassword = $_ENV['DB_PASSWORD'];
$pdo = new PDO($dsn, $envuser , $envpassword);
$myTable = $pdo->prepare("SELECT * FROM images ");

$myTable->execute();

$html = '';

while($row = $myTable->fetch(PDO::FETCH_ASSOC)) {
    $html .= '<tr><td>'.htmlspecialchars($row['titre']).'</td><td>'.$row['numero_image'].'</td><td>'.$row['nom_fichier'].'</td></tr>';
}

echo '<table id="my-table"><tr><th>Titre: </th><th> Référence: </th><th> Nom du fichier:</th></tr>' . $html . '</table>';
?>

