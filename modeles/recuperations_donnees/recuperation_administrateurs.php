<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);





try {



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

