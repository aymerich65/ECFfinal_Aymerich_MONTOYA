<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/* utilisation du fichier config pour récupérer les variables d'environnement:*/

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);




$myrequest = $pdo->prepare('SELECT * FROM images_accueil');
$myrequest->execute();
$mybddTable = $myrequest->fetchAll(PDO::FETCH_ASSOC);



ob_start();


?>
    <div class="row blocdesimages">
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

<!--version mobile paysage-->

<div class="blocdesimages2">
    <div class="myimage-container">
        <?php if (!empty($mybddTable[0])) : ?>
            <img class="img-fluid myimage" src="./galerie/<?= $mybddTable[0]['nom_fichier'] ?>" data-title="<?= str_replace('_', ' ', $mybddTable[0]['titre']) ?>">
            <div class="mytooltip"><?= str_replace('_', ' ', $mybddTable[0]['titre']) ?></div>
        <?php endif; ?>
    </div>
    <div class="myimage-container">
        <?php if (!empty($mybddTable[1])) : ?>
            <img class="img-fluid myimage" src="./galerie/<?= $mybddTable[1]['nom_fichier'] ?>" data-title="<?= str_replace('_', ' ', $mybddTable[1]['titre']) ?>">
            <div class="mytooltip"><?= str_replace('_', ' ', $mybddTable[1]['titre']) ?></div>
        <?php endif; ?>
    </div>
    <div class="myimage-container">
        <?php if (!empty($mybddTable[2])) : ?>
            <img class="img-fluid myimage" src="./galerie/<?= $mybddTable[2]['nom_fichier'] ?>" data-title="<?= str_replace('_', ' ', $mybddTable[2]['titre']) ?>">
            <div class="mytooltip"><?= str_replace('_', ' ', $mybddTable[2]['titre']) ?></div>
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

                /* mode tactile: */
                image.addEventListener('touchstart', function() {
                    tooltip.style.display = 'block';
                });
                image.addEventListener('touchend', function() {
                    tooltip.style.display = 'none';
                });
            });
        };

    </script>


<div class="button-container lignereservationaccueil">
  <a href="index.php?page=reservation"><button class="button-reservation-style">Réservation</button></a>
</div>





<?php

$contenu = ob_get_clean();

require_once 'layout.php';
