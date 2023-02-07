<?php
require_once 'modeles/recuperations_donnees/script_recuperation_horaires.php';
?>

<h3>Nos horaires d'ouverture</h3>
<p>Lundi:<?php echo "$mondayOpeningDay&nbsp;&nbsp;&nbsp;&nbsp;$mondayOpeningNoon"." "."$mondayClosingNoon&nbsp;&nbsp;&nbsp;&nbsp;$mondayOpeningEvening"." ".$mondayClosingEvening;?></p></br>
<p>Mardi:<?php echo "$tuesdayOpeningDay&nbsp;&nbsp;&nbsp;&nbsp;$tuesdayOpeningNoon"." "."$tuesdayClosingNoon&nbsp;&nbsp;&nbsp;&nbsp;$tuesdayOpeningEvening"." ".$tuesdayClosingEvening;?></p></br>
<p>Mercredi:<?php echo "$wednesdayOpeningDay&nbsp;&nbsp;&nbsp;&nbsp;$wednesdayOpeningNoon"." "."$wednesdayClosingNoon&nbsp;&nbsp;&nbsp;&nbsp;$wednesdayOpeningEvening"." ".$wednesdayClosingEvening;?></p></br>
<p>Jeudi:<?php echo "$thursdayOpeningDay&nbsp;&nbsp;&nbsp;&nbsp;$thursdayOpeningNoon"." "."$thursdayClosingNoon&nbsp;&nbsp;&nbsp;&nbsp;$thursdayOpeningEvening"." ".$thursdayClosingEvening;?></p></br>
<p>Vendredi:<?php echo "$fridayOpeningDay&nbsp;&nbsp;&nbsp;&nbsp;$fridayOpeningNoon"." "."$fridayClosingNoon&nbsp;&nbsp;&nbsp;&nbsp;$fridayOpeningEvening"." ".$fridayClosingEvening;?></p></br>
<p>Samedi:<?php echo "$saturdayOpeningDay&nbsp;&nbsp;&nbsp;&nbsp;$saturdayOpeningNoon"." "."$saturdayClosingNoon&nbsp;&nbsp;&nbsp;&nbsp;$saturdayOpeningEvening"." ".$saturdayClosingEvening;?></p></br>
<p>Dimanche:<?php echo "$sundayOpeningDay&nbsp;&nbsp;&nbsp;&nbsp;$sundayOpeningNoon"." "."$sundayClosingNoon&nbsp;&nbsp;&nbsp;&nbsp;$sundayOpeningEvening"." ".$sundayClosingEvening;?></p></br>
