<?php
ob_start();
?>

<div>
    <h1>Reservation</h1>
    <h2>Tables disponibles</h2>
    <p>actuellement:<span id='table-data'> </span></p>
</div>

<?php

$contenu =ob_get_clean();

require_once 'layout.php';
