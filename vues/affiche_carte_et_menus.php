<?php
ob_start();

try {
    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn, 'root', '');
    $myTable = $pdo->query("SELECT * FROM entrees");
    $myTable->execute();
    $myStarterTable = $myTable->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo 'il y a une erreur:'.$e->getMessage();
}

try {
    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn, 'root', '');
    $myTable = $pdo->query("SELECT * FROM plats");
    $myTable->execute();
    $myStarterTablePlat = $myTable->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo 'il y a une erreur:'.$e->getMessage();
}

try {
    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn, 'root', '');
    $myTable = $pdo->query("SELECT * FROM desserts");
    $myTable->execute();
    $myDessertsTable = $myTable->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo 'il y a une erreur:'.$e->getMessage();
}
try {
    $dsn = 'mysql:host=localhost;dbname=quaiantique';
    $pdo = new PDO($dsn, 'root', '');
    $myTable = $pdo->query("SELECT * FROM menus");
    $myTable->execute();
    $myMenusTable = $myTable->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo 'il y a une erreur:'.$e->getMessage();
}


?>

<h1 class="h1cartestyle">Notre carte</h1>

<h2 class="cartetitlestyle h2cartestyle">Entrées</h2>
<?php foreach($myStarterTable as $row) {
    echo "<h3 class=\"h3cartestyle\">" . $row['titre'] . "</h3>";
    echo "<p>" . $row['description'] . "</p>";
    echo "<p>Prix: " . $row['prix'] . "</p>";
} ?>

<h2 class="cartetitlestyle h2cartestyle">Plats</h2>
<?php foreach($myStarterTablePlat as $row) {
    echo "<h3 class=\"h3cartestyle\">>" . $row['titre'] . "</h3>";
    echo "<p>" . $row['description'] . "</p>";
    echo "<p>Prix: " . $row['prix'] . "</p>";
} ?>

<h2 class="cartetitlestyle h2cartestyle">Desserts</h2>
<?php foreach($myDessertsTable as $row) {
    echo "<h3 class=\"h3cartestyle\">>" . $row['titre'] . "</h3>";
    echo "<p>" . $row['description'] . "</p>";
    echo "<p>Prix: " . $row['prix'] . "</p>";
} ?>

<h2 class="cartetitlestyle h2cartestyle">Menus</h2>
<?php foreach($myMenusTable as $row) {
    echo "<h3 class=\"h3cartestyle\">>" . $row['titre'] . "</h3>";
    echo "<p> Formule: " . $row['formule'] . "</p>";
    echo "<p>" . $row['description'] . "</p>";
    echo "<p>Prix: " . $row['prix'] . "</p>";
} ?>

<?php

$contenu =ob_get_clean();

require_once 'layout.php';
