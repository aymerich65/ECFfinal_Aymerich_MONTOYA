disponibilitesBtn.addEventListener('click', function() {
    const date = dateInput.value;
    const heure = heureInput.value;
    const disponibilitesContainer = document.querySelector('#disponibilites-container');

    if (date < currentDate) {
        disponibilitesContainer.innerHTML = '<p>La date sélectionnée est antérieure à la date actuelle.</p>';
        return;
    }


});
