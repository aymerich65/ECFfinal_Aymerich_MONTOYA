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
                echo substr($mondayOpeningNoon, 0, 5) . "-" . substr($mondayClosingNoon, 0, 5) . "&nbsp;&nbsp;";
            }
            if ($mondayOpeningEvening != '00:00:00') {
                echo substr($mondayOpeningEvening, 0, 5) . "-" . substr($mondayClosingEvening, 0, 5);
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
                echo substr($tuesdayOpeningNoon, 0, 5) . "-" . substr($tuesdayClosingNoon, 0, 5) . "&nbsp;&nbsp;";
            }
            if ($tuesdayOpeningEvening != '00:00:00') {
                echo substr($tuesdayOpeningEvening, 0, 5) . "-" . substr($tuesdayClosingEvening, 0, 5);
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
                echo substr($wednesdayOpeningNoon, 0, 5) . "-" . substr($wednesdayClosingNoon, 0, 5) . "&nbsp;&nbsp;";
            }
            if ($wednesdayOpeningEvening != '00:00:00') {
                echo substr($wednesdayOpeningEvening, 0, 5) . "-" . substr($wednesdayClosingEvening, 0, 5);
            }
        } else {
            echo "Fermé";
        }
        ?>
    </p>

    <p>Jeudi:
        <?php
        if ($thursdayOpeningNoon != '00:00:00' || $thursdayOpeningEvening != '00:00:00') {
            echo $thursdayOpeningDay."&nbsp;&nbsp;";
            if ($thursdayOpeningNoon != '00:00:00') {
                echo date("H:i", strtotime($thursdayOpeningNoon))."-".date("H:i", strtotime($thursdayClosingNoon))."&nbsp;&nbsp;";
            }
            if ($thursdayOpeningEvening != '00:00:00') {
                echo date("H:i", strtotime($thursdayOpeningEvening))."-".date("H:i", strtotime($thursdayClosingEvening));
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
