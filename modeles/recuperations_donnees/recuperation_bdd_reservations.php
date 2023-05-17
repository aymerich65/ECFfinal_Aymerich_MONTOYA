<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);






try{




    $myTable = $pdo->query("SELECT * FROM reservations");
    $myTable->execute();
    $reservationsArray = $myTable->fetchAll(PDO::FETCH_ASSOC);



} catch(PDOException $e){
    echo 'il y a une erreur:'.$e->getMessage();
}



if(!empty($reservationsArray)){
    echo '<table class="reservationstablestyle">';
    echo '<thead>
<tr>
<th>Reservation</th>
<th>Couverts</th>
<th>Email</th>
<th>Date</th>
<th>Horaire</th>
<th>Allergies</th>
</tr></thead>';
echo '<tbody>';

    foreach ($reservationsArray as $reservation) {
        echo '<tr>';
        echo '<td>' . $reservation['reservation'] . '</td>';
        echo '<td>' . $reservation['couverts'] . '</td>';
        echo '<td>' . $reservation['email'] . '</td>';
        echo '<td>' . date('j/m/Y', strtotime($reservation['date'])).'</td>';
        echo '<td>' . $reservation['horaire'] . '</td>';
        echo '<td>' . $reservation['allergies'] . '</td>';
        echo '</tr>';
}
echo '</tbody>';
echo '</table>';


}else {
    echo 'Aucune réservation trouvée';
    }
    ?>

<div class="dishbuton">
    <button onclick="location.reload()" class="refresh-button-reservation">Actualiser</button>
</div>