<?php
require_once 'modeles/recuperations_donnees/script_recuperation_horaires.php';
?>
<div class="footerchildrenstyle ">
    <h3 class="titleschedule">Nos horaires d'ouverture</h3>


    <p>Lundi:
    <?php
    if ($mondayOpeningNoon != '00:00:00' || $mondayOpeningEvening != '00:00:00') {
        echo $mondayOpeningDay."&nbsp;&nbsp;";
        if ($mondayOpeningNoon != '00:00:00') {
            echo date("H:i", strtotime($mondayOpeningNoon))."-".date("H:i", strtotime($mondayClosingNoon))."&nbsp;&nbsp;";
        }
        if ($mondayOpeningEvening != '00:00:00') {
            echo date("H:i", strtotime($mondayOpeningEvening))."-".date("H:i", strtotime($mondayClosingEvening));
        }
    } else {
        echo "Fermé";
    }
    ?>
</p>
<p>Mercredi:
    <?php
    if ($wednesdayOpeningNoon != '00:00:00' || $wednesdayOpeningEvening != '00:00:00') {
        echo $wednesdayOpeningDay."&nbsp;&nbsp;";
        if ($wednesdayOpeningNoon != '00:00:00') {
            echo date("H:i", strtotime($wednesdayOpeningNoon))."-".date("H:i", strtotime($wednesdayClosingNoon))."&nbsp;&nbsp;";
        }
        if ($wednesdayOpeningEvening != '00:00:00') {
            echo date("H:i", strtotime($wednesdayOpeningEvening))."-".date("H:i", strtotime($wednesdayClosingEvening));
        }
    } else {
        echo "Fermé";
    }
    ?>
</p>
<p>Mardi:
    <?php
    if ($tuesdayOpeningNoon != '00:00:00' || $tuesdayOpeningEvening != '00:00:00') {
        echo $tuesdayOpeningDay."&nbsp;&nbsp;";
        if ($tuesdayOpeningNoon != '00:00:00') {
            echo date("H:i", strtotime($tuesdayOpeningNoon))."-".date("H:i", strtotime($tuesdayClosingNoon))."&nbsp;&nbsp;";
        }
        if ($tuesdayOpeningEvening != '00:00:00') {
            echo date("H:i", strtotime($tuesdayOpeningEvening))."-".date("H:i", strtotime($tuesdayClosingEvening));
        }
    } else {
        echo "Fermé";
    }
    ?>
</p>

    <p>Vendredi:
        <?php
        if ($fridayOpeningNoon != '00:00:00' || $fridayOpeningEvening != '00:00:00') {
            echo $fridayOpeningDay."&nbsp;&nbsp;";
            if ($fridayOpeningNoon != '00:00:00') {
                echo date("H:i", strtotime($fridayOpeningNoon))."-".date("H:i", strtotime($fridayClosingNoon))."&nbsp;&nbsp;";
            }
            if ($fridayOpeningEvening != '00:00:00') {
                echo date("H:i", strtotime($fridayOpeningEvening))."-".date("H:i", strtotime($fridayClosingEvening));
            }
        } else {
            echo "Fermé";
        }
        ?>
    </p>

    <p>Samedi:
        <?php
        if ($saturdayOpeningNoon != '00:00:00' || $saturdayOpeningEvening != '00:00:00') {
            echo $saturdayOpeningDay."&nbsp;&nbsp;";
            if ($saturdayOpeningNoon != '00:00:00') {
                echo date("H:i", strtotime($saturdayOpeningNoon))."-".date("H:i", strtotime($saturdayClosingNoon))."&nbsp;&nbsp;";
            }
            if ($saturdayOpeningEvening != '00:00:00') {
                echo date("H:i", strtotime($saturdayOpeningEvening))."-".date("H:i", strtotime($saturdayClosingEvening));
            }
        } else {
            echo "Fermé";
        }
        ?>
    </p>

    <p>Dimanche:
        <?php
        if ($sundayOpeningNoon != '00:00:00' || $sundayOpeningEvening != '00:00:00') {
            echo $sundayOpeningDay."&nbsp;&nbsp;";
            if ($sundayOpeningNoon != '00:00:00') {
                echo date("H:i", strtotime($sundayOpeningNoon))."-".date("H:i", strtotime($sundayClosingNoon))."&nbsp;&nbsp;";
            }
            if ($sundayOpeningEvening != '00:00:00') {
                echo date("H:i", strtotime($sundayOpeningEvening))."-".date("H:i", strtotime($sundayClosingEvening));
            }
        } else {
            echo "Fermé";
        }
        ?>
    </p>
