<?php
header("Access-Control-Allow-Origin: *");

require_once __DIR__ . '/../../vendor/autoload.php';





$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');

$dotenv->load();

$dsn = $_ENV['DB_DSN'];
$pdo = new PDO($dsn,'root','');
$myTable = $pdo->prepare("SELECT * FROM images ");

$myTable->execute();

$html = '';

while($row = $myTable->fetch(PDO::FETCH_ASSOC)) {
    $html .= '<tr><td>'.htmlspecialchars($row['titre']).'</td><td>'.$row['numero_image'].'</td></tr>';
}

echo '<table><tr><th>Titre</th><th>Référence</th></tr>' . $html . '</table>';
?>

