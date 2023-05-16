
document.getElementById("submit-btn").addEventListener("click", function(event) {
    var dateInput = document.getElementById("date-input").value;
    var currentDate = new Date().toISOString().split("T")[0];

    if (dateInput > currentDate) {
        event.preventDefault(); // bloc l'envoi du formulaire
        alert("La réservation pour une date ultérieure n'est pas autorisée.");
    }
});

