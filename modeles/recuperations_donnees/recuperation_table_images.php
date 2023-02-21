<?php
header("Access-Control-Allow-Origin: *");
$dsn = 'mysql:host=localhost;dbname=quaiantique';
$pdo = new PDO($dsn,'root','');
$myTable = $pdo->prepare("SELECT * FROM images ");

$myTable->execute();

$html = '';

while($row = $myTable->fetch(PDO::FETCH_ASSOC)) {
    $html .= '<tr><td>'.htmlspecialchars($row['titre']).'</td><td>'.$row['numero_image'].'</td></tr>';
}

echo '<table><tr><th>Titre</th><th>Référence</th></tr>' . $html . '</table>';
?>

