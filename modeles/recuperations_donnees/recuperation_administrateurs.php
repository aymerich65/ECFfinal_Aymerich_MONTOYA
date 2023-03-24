<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

try {

    $dsn = $_ENV['DB_DSN'];
    $envuser = $_ENV['DB_USERNAME'];
    $envpassword = $_ENV['DB_PASSWORD'];
    $pdo = new PDO($dsn, $envuser , $envpassword);

    $myTable = $pdo->query("SELECT email, poste FROM administrateurs");
    $myTable->execute();
    $adminArray = $myTable->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Il y a une erreur : ' . $e->getMessage();
}

if (!empty($adminArray)) {
    echo '<table class="reservationstablestyle">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Email</th>';
    echo '<th>Poste</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($adminArray as $admin) {
        echo '<tr>';
        echo '<td>' . $admin['email'] . '</td>';
        echo '<td>' . $admin['poste'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo 'Aucun administrateur trouvé.';
}

