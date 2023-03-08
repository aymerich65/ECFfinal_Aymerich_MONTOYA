<?php

ob_start();
require_once 'JWT/authentification.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    $email = '';
}

if (isset($_SESSION['convives'])) {
    $guestsnumber = $_SESSION['convives'];
} else {
    $guestsnumber = '';
}

if (isset($_SESSION['allergies'])) {
    $allergies = $_SESSION['allergies'];
} else {
    $allergies = '';
}
?>




    <div class="reservationstyle">
        <h1>Reservation</h1>
        <div class="disponibiltéstyle">
            <p>Consulter disponibilités:</p>
            <label for="date-input">Date :</label>
            <input type="date" id="date-input" name="date">
            <label for="heure-input">Heure :</label>
            <select id="heure-input" name="heure">
                <option value="12:00">12:00</option>
                <option value="12:15">12:15</option>
                <option value="12:30">12:30</option>
                <option value="12:45">12:45</option>
                <option value="13:00">13:00</option>
                <option value="13:15">13:15</option>
                <option value="13:30">13:30</option>
                <option value="13:45">13:45</option>
                <option value="19:00">19:00</option>
                <option value="19:15">19:15</option>
                <option value="19:30">19:30</option>
                <option value="19:45">19:45</option>
                <option value="20:00">20:00</option>
                <option value="20:15">20:15</option>
                <option value="20:30">20:30</option>
                <option value="20:45">20:45</option>
                <option value="21:00">21:00</option>
                <option value="21:15">21:15</option>
                <option value="21:30">21:30</option>
                <option value="21:45">21:45</option>
            </select>
            <button id="disponibilites-btn" type="button">Vérifier les disponibilités</button>
            <div id="disponibilites-container"></div>
        </div>
    </div>





    <div class="reservationstyle" id="reservation-container" style="display:none;">

        <form method="post" action="modeles/insertionsdonnees/traitement_reservation.php" id="reservation-form">
            <div>
                <label>Email : <input type="email" name="email" value="<?php echo $email; ?>" required></label>
            </div>
            <br>
            <div>
                <label>Convives : <input type="number" name="couverts" value="<?php echo $guestsnumber; ?>" required max="30"></label>
            </div>
            <br>
            <div>
                <label>Date de réservation<input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required></label>
            </div>
            <div>
                <label>Heure :
                    <select name="heure">
                        <?php
                        $heures = ['12:00', '12:15', '12:30', '12:45', '13:00', '13:15', '13:30', '13:45', '14:00', '19:00', '19:15', '19:30', '19:45', '20:00', '20:15', '20:30', '20:45', '21:00', '21:15', '21:30', '21:45', '22:00'];
                        foreach ($heures as $heure) {
                            echo "<option value='".$heure."'>".$heure."</option>";
                        }
                        ?>
                    </select>
                </label>
            </div>
            <br>
            <div>
                <label>Allergies : <input type="text" name="allergies" value="<?php echo $allergies; ?>"></label>
            </div>
            <button type="submit" id="submit-btn">Envoyer</button>
        </form>
    </div>

</script>
    <script>

        const reservationContainer = document.getElementById('reservation-container');




        const disponibilitesBtn = document.querySelector('#disponibilites-btn');

        disponibilitesBtn.addEventListener('click', function() {
            const date = document.querySelector('#date-input').value;
            const heure = document.querySelector('#heure-input').value;
            const disponibilitesContainer = document.querySelector('#disponibilites-container');
            fetch('../modeles/recuperations_donnees/recuperation_disponibilites.php', {
                method: 'POST',
                body: JSON.stringify({ date, heure }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.nb_couverts_dispo <= 0) {
                        disponibilitesContainer.innerHTML = '<p>Désolé, il n\'y a plus de couverts disponibles pour cette date et cette heure.</p>';
                        reservationContainer.style.display = 'none';
                    } else {
                        disponibilitesContainer.innerHTML = `<p>Il reste <span id="nb-couverts-dispo">${data.nb_couverts_dispo}</span> couverts disponibles pour cette date et cette heure.</p>`;
                        reservationContainer.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Une erreur s\'est produite :', error);
                });
        });
    </script>











<?php

$contenu =ob_get_clean();

require_once 'layout.php';

