<?php

ob_start();
$titrePage = "Restaurant Quai Antique - Réservation";
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
            <div class="rowDate">
                <label for="date-input" >Date : </label>
                <input type="date" id="date-input" name="date" required min="<?php echo date('Y-m-d'); ?>" class="datereservation-input">

            </div>
            <br>
            <div class="rowHeure">
                <label for="heure-input" >Heure : </label>
                <select id="heure-input" name="heure" class="heurereservation-input"required>
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
                <div class="rowemail">
                    <label>Email : </label><input type="email" name="email" value="<?php echo $email; ?>" class="emailreservation-input"required>
                </div>
                <br>
                <div>
                    <label class="rowConvives">Convives : <input type="number" name="couverts" value="<?php echo $guestsnumber; ?>" required max="30" min="1" class="numberreservation-input"></label>
                </div>
                <br>
                <div>
                    <label class="rowAllergies">Allergies : <input type="text" name="allergies" value="<?php echo $allergies; ?>" class="allergiesreservation-input"></label>
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





// Réinitialise les éléments de réservation lorsque la date est modifiée 

function resetReservation() {
    const disponibilitesContainer = document.querySelector('#disponibilites-container');
    disponibilitesContainer.innerHTML = '';
    reservationFormContainer.style.display = 'none';
    submitButton.disabled = true;
}


//  Utilise un événement de clic sur le bouton disponibilitesBtn pour vérifier les disponibilités en fonction de la date et de l'heure sélectionnées


disponibilitesBtn.addEventListener('click', function() {
            const date = dateInput.value;
            const heure = heureInput.value;

/*Si aucune valeur de date n'est sélectionnée le block ne s'affiche pas*/
            if (!dateInput.value) {
        return;
    }


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




/*Contrôle des données à envoyer*/


const submitButton = document.getElementById('submit-btn');

submitButton.addEventListener('click', function(event) {
  // Votre logique de vérification ici
  const selectedDate = new Date(dateInput.value);
  const currentDate = new Date();
  const selectedTime = heureInput.value;

  if (selectedDate.toDateString() === currentDate.toDateString()) {
    const [selectedHour, selectedMinute] = selectedTime.split(':');
    const currentHour = currentDate.getHours();
    const currentMinute = currentDate.getMinutes();

    if (
      parseInt(selectedHour) < currentHour ||
      (parseInt(selectedHour) === currentHour && parseInt(selectedMinute) <= currentMinute)
    ) {
      event.preventDefault(); // Bloquer l'envoi du formulaire
      alert('L\'heure sélectionnée est antérieure ou égale à l\'heure actuelle. Veuillez choisir une heure ultérieure.');
    }
  }
});






    </script>


<?php






$contenu =ob_get_clean();

require_once 'layout.php';


