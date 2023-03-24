<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


require_once __DIR__ . '/../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
$dsn = $_ENV['DB_DSN'];
$envuser = $_ENV['DB_USER'];
$envpassword = $_ENV['DB_PASSWORD'];
$pdo = new PDO($dsn, $envuser , $envpassword );

$myrequest = $pdo->prepare('SELECT * FROM images_accueil');
$myrequest->execute();
$mybddTable = $myrequest->fetchAll(PDO::FETCH_ASSOC);


ob_start();


?>
    <div class="row">
        <div class="col-md-4 px-0">
            <?php if (!empty($mybddTable[0])) : ?>
                <div class="myimage-container">
                    <img class="img-fluid myimage" src="./galerie/<?= $mybddTable[0]['nom_fichier'] ?>" data-title="<?= str_replace('_', ' ', $mybddTable[0]['titre']) ?>">
                    <div class="mytooltip"><?= str_replace('_', ' ', $mybddTable[0]['titre']) ?></div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-4 px-0">
            <?php if (!empty($mybddTable[1])) : ?>
                <div class="myimage-container">
                    <img class="img-fluid myimage" src="./galerie/<?= $mybddTable[1]['nom_fichier'] ?>" data-title="<?= str_replace('_', ' ', $mybddTable[1]['titre']) ?>">
                    <div class="mytooltip"><?= str_replace('_', ' ', $mybddTable[1]['titre']) ?></div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-4 px-0">
            <?php if (!empty($mybddTable[2])) : ?>
                <div class="myimage-container">
                    <img class="img-fluid myimage" src="./galerie/<?= $mybddTable[2]['nom_fichier'] ?>" data-title="<?= str_replace('_', ' ', $mybddTable[2]['titre']) ?>">
                    <div class="mytooltip"><?= str_replace('_', ' ', $mybddTable[2]['titre']) ?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>



    <script>
        window.onload = function() {
            var images = document.querySelectorAll('.myimage');
            images.forEach(function(image) {
                var tooltip = image.nextElementSibling;
                var title = image.getAttribute('data-title');
                tooltip.innerHTML = title;
                image.addEventListener('mouseover', function() {
                    tooltip.style.display = 'block';
                });
                image.addEventListener('mouseout', function() {
                    tooltip.style.display = 'none';
                });
            });
        };

        /* mode tactile: */
        element.addEventListener('touchstart', function() {
            tooltip.style.opacity = 1;
        });
        element.addEventListener('touchend', function() {
            tooltip.style.opacity = 0;
        });

    </script>
<div class="button-container mytestcolor">
  <a href="index.php?page=reservation"><button class="button-reservation-style">Réservation</button></a>
</div>





<?php

$contenu = ob_get_clean();

require_once 'layout.php';
