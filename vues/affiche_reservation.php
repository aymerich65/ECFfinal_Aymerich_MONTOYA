<?php
ob_start();
require_once('modeles/recuperations_donnees/recuperationDonneesClients.php');

?>

<div>
    <h1>Reservation</h1>
    <h2>Tables disponibles</h2>
    <p>Actuellement:<span id="table-data"> </span></p>
    <form method="post" action="modeles/insertionsdonnees/traitement_reservation.php">
        <div>
            <label>email : <input type="email" name="email" value="<?php if(isset($email)){echo $email;}?>"></label>
        </div>
        <br>
        <div>
        <label>Convives : <input type="text" name="convives" value="<?php if(isset($guestsnumber)){echo $guestsnumber;}?>"></label>
        </div>
        <br>
        <div>
            <label>Date de réservation<input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>"></label>
        </div>

        <div>
        <label>Heure : <select name = "heure"><?php for($i = 12; $i <= 14;$i++){
            for($j=0;$j<=45;$j+=15){
                $time = sprintf("%02d:%02d",$i,$j);
                if($i == 14 && $j == 0) break;
                echo "<option value='".$time."'>".$time."</option>";
            }
                }?></select></label>
        </div>
        <br>
        <div>
        <label>Allergies : <input type="text" name="allergies" value="<?php if(isset($allergies)){echo $allergies;}?>"></label>
        </div>
        <button type="submit">Envoyer</button>
    </form>

</div>

<?php

$contenu =ob_get_clean();

require_once 'layout.php';

