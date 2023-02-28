<?php
if($_SESSION['logged_in'] === true){
    ?>
    <div>
        <h1>Reservation</h1>
        <h2>Tables disponibles</h2>
        <p>Actuellement:<span id='table-data'> </span></p>
        <form method="" action="">
            <label>Convives<input type="text" name="convives" value="<?php ?>"></label>
            <label>Heure<input type="text" name="heure" value=""></label>
            <label>Allergies<input type="text" name="allergies" value=""></label>
            <label>Nombre de tables (une table = 2 personnes)<input type="text" name="tables" value=""></label>
        </form>
    </div>
<?php
}
?>
