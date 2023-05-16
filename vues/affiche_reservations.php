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
        <h1>Réservation</h1>
        <form method="POST" action="modeles/insertionsdonnees/traitement_reservation.php">
            <div>
                <label for="date-input">Date :</label>
                <input type="date" id="date-input" name="date" required min="<?php echo date('Y-m-d'); ?>">

            </div>
            <br>
            <div>
                <label for="heure-input">Heure :</label>
                <select id="heure-input" name="heure" required>
                    <option value="12:00">12:00</option>
                    <option value="12:15">12:15</option>
                    <option value="12:30">12:30</option>
                    <option value="12:45">12:45</option>
                    <option value="13:00">13:00</option>
                    <option value="13:15">13:15</option>
                    <option value="13:30">13:30</option>
                    <option value="13:45">13:45</option>
                    <option value="14:00">14:00</option>
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
                    <option value="22:00">22:00</option>
                </select>
            </div>
            <br>
            <button id="disponibilites-btn" type="button">Vérifier les disponibilités</button>
            <div id="disponibilites-container"></div>
            <div class="reservationstyle" id="reservation-form-container" style="display:none;">
                <div>
                    <label>Email : <input type="email" name="email" value="<?php echo $email; ?>" required></label>
                </div>
                <br>
                <div>
                    <label>Convives : <input type="number" name="couverts" value="<?php echo $guestsnumber; ?>" required max="30" min="1"></label>
                </div>
                <br>
                <div>
                    <label>Allergies : <input type="text" name="allergies" value="<?php echo $allergies; ?>"></label>
                </div>
                <br>
                <button type="submit" id="submit-btn">Envoyer</button>
            </div>
        </form>
    </div>



    <script>
        const disponibilitesBtn = document.getElementById('disponibilites-btn');
        const reservationFormContainer = document.getElementById('reservation-form-container');
        const dateInput = document.getElementById('date-input');
        const heureInput = document.getElementById('heure-input');
        const currentDate = new Date().toISOString().split('T')[0];









// Contrôle de la sélection de l'heure


//dateInput.addEventListener('change', resetReservation);
function resetReservation() {
    const disponibilitesContainer = document.querySelector('#disponibilites-container');
    disponibilitesContainer.innerHTML = '';
    reservationFormContainer.style.display = 'none';
    submitButton.disabled = true;
}

dateInput.addEventListener('change', function() {
    if (reservationFormContainer.style.display === 'block') {
        resetReservation();
    }
});



heureInput.addEventListener('change', function() {
    const selectedDate = new Date(dateInput.value);
    const currentDate = new Date();
    const selectedTime = heureInput.value;

    const selectedDateString = selectedDate.toISOString().split('T')[0];
    const currentDateString = currentDate.toISOString().split('T')[0];
    const currentTime = currentDate.getHours() + ':' + currentDate.getMinutes();

    if (selectedDateString === currentDateString && selectedTime < '13:00') {
        const disponibilitesContainer = document.querySelector('#disponibilites-container');
        disponibilitesContainer.innerHTML = '<p>L\'heure sélectionnée est antérieure à l\'heure minimale autorisée.</p>';
        reservationFormContainer.style.display = 'none';
        submitButton.disabled = true;
    } else {
        // Afficher le bloc de réservation si la date sélectionnée n'est pas la date actuelle ou si l'heure est supérieure ou égale à 13h
        reservationFormContainer.style.display = 'block';
        submitButton.disabled = false;
    }
});

// Contrôle au moment de la vérification des disponibilités
disponibilitesBtn.addEventListener('click', function() {
    const selectedDate = new Date(dateInput.value);
    const currentDate = new Date();
    const selectedTime = heureInput.value;

    const selectedDateString = selectedDate.toISOString().split('T')[0];
    const currentDateString = currentDate.toISOString().split('T')[0];
    const currentTime = currentDate.getHours() + ':' + currentDate.getMinutes();

    if (selectedDateString === currentDateString && selectedTime < '13:00') {
        const disponibilitesContainer = document.querySelector('#disponibilites-container');
        disponibilitesContainer.innerHTML = '<p>L\'heure sélectionnée est antérieure à l\'heure minimale autorisée.</p>';
        reservationFormContainer.style.display = 'none';
        submitButton.disabled = true;
    } else {
        // Afficher le bloc de réservation si la date sélectionnée n'est pas la date actuelle ou si l'heure est supérieure ou égale à 13h
        reservationFormContainer.style.display = 'block';
        submitButton.disabled = false;
    }
});

// Désactiver le bouton de soumission de la réservation par défaut
const submitButton = document.getElementById('submit-btn');
submitButton.disabled = true;

// Activer le bouton de soumission lorsque le formulaire est complet
dateInput.addEventListener('change', toggleSubmitButton);
heureInput.addEventListener('change', toggleSubmitButton);
emailInput.addEventListener('input', toggleSubmitButton);
guestsInput.addEventListener('change', toggleSubmitButton);

function toggleSubmitButton() {
    const selectedDate = new Date(dateInput.value);
    const currentDate = new Date();
    const selectedTime = heureInput.value;

    const selectedDateString = selectedDate.toISOString().split('T')[0];
    const currentDateString = currentDate.toISOString().split('T')[0];
    const currentTime = currentDate.getHours() + ':' + currentDate.getMinutes();

    if (
        (selectedDateString === currentDateString && selectedTime < '13:00') ||
        !emailInput.value ||
        !guestsInput.value
    ) {
        submitButton.disabled = true;
    } else {
        submitButton.disabled = false;
    }
}





















        



        disponibilitesBtn.addEventListener('click', function() {
            const date = dateInput.value;
            const heure = heureInput.value;
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
                        reservationFormContainer.style.display = 'none';
                    } else {
                        disponibilitesContainer.innerHTML = `<p>Il reste <span id="nb-couverts-dispo">${data.nb_couverts_dispo}</span> couverts disponibles pour cette date et cette heure.</p>`;
                        reservationFormContainer.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Une erreur s\'est produite :', error);
                });
        });

        dateInput.addEventListener('change', function() {
            reservationFormContainer.style.display = 'none';
        });

        heureInput.addEventListener('change', function() {
            reservationFormContainer.style.display = 'none';
        });













    </script>




<?php






$contenu =ob_get_clean();

require_once 'layout.php';


