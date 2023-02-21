<?php

$dsn = 'mysql:host=localhost;dbname=quaiantique';
$pdo = new PDO($dsn,'root','');
$myrequest = $pdo->prepare('SELECT * FROM images_accueil');
$myrequest->execute();
$mybddTable = $myrequest->fetchAll(PDO::FETCH_ASSOC);

ob_start();

?>

    <div class="galerieaccueil">
        <?php if (!empty($mybddTable[0])) : ?>
            <div class="myimage-container">
                <img class="img-fluid myimage" src="./galerie/<?= $mybddTable[0]['nom_fichier'] ?>" data-title="<?= $mybddTable[0]['description'] ?>">
                <div class="mytooltip"><?= $mybddTable[0]['nom_fichier'] ?></div>
            </div>
        <?php endif; ?>
    </div>

    <div class="galerieaccueil">
        <?php if (!empty($mybddTable[1])) : ?>
            <div class="myimage-container">
                <img class="img-fluid myimage" src="./galerie/<?= $mybddTable[1]['nom_fichier'] ?>" data-title="<?= $mybddTable[1]['description'] ?>">
                <div class="mytooltip"><?= $mybddTable[1]['nom_fichier'] ?></div>
            </div>
        <?php endif; ?>
    </div>

    <div class="galerieaccueil">
        <?php if (!empty($mybddTable[2])) : ?>
            <div class="myimage-container">
                <img class="img-fluid myimage" src="./galerie/<?= $mybddTable[2]['nom_fichier'] ?>" data-title="<?= $mybddTable[2]['description'] ?>">
                <div class="mytooltip"><?= $mybddTable[2]['nom_fichier'] ?></div>
            </div>
        <?php endif; ?>
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

<?php

$contenu = ob_get_clean();

require_once 'layout.php';
