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
                echo $mondayOpeningNoon."-".$mondayClosingNoon."&nbsp;&nbsp;";
            }
            if ($mondayOpeningEvening != '00:00:00') {
                echo $mondayOpeningEvening."-".$mondayClosingEvening;
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
                echo $tuesdayOpeningNoon."-".$tuesdayClosingNoon."&nbsp;&nbsp;";
            }
            if ($tuesdayOpeningEvening != '00:00:00') {
                echo $tuesdayOpeningEvening."-".$tuesdayClosingEvening;
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
                echo $wednesdayOpeningNoon."-".$wednesdayClosingNoon."&nbsp;&nbsp;";
            }
            if ($wednesdayOpeningEvening != '00:00:00') {
                echo $wednesdayOpeningEvening."-".$wednesdayClosingEvening;
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
                echo $thursdayOpeningNoon."-".$thursdayClosingNoon."&nbsp;&nbsp;";
            }
            if ($thursdayOpeningEvening != '00:00:00') {
                echo $thursdayOpeningEvening."-".$thursdayClosingEvening;
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
                echo $fridayOpeningNoon."-".$fridayClosingNoon."&nbsp;&nbsp;";
            }
            if ($fridayOpeningEvening != '00:00:00') {
                echo $fridayOpeningEvening."-".$fridayClosingEvening;
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
            echo $saturdayOpeningNoon."-". $saturdayClosingNoon."&nbsp;&nbsp;";
        }
        if ($saturdayOpeningEvening != '00:00:00') {
            echo $saturdayOpeningEvening."-". $saturdayClosingEvening;
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
            echo $sundayOpeningNoon."-". $sundayClosingNoon."&nbsp;&nbsp;";
        }
        if ($sundayOpeningEvening != '00:00:00') {
            echo $sundayOpeningEvening."-". $sundayClosingEvening;
        }
    } else {
        echo "Fermé";
    }
    ?>
</p>
</div>