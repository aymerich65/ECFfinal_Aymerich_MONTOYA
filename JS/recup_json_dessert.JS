
const afficherDessertsBtn = document.getElementById('afficher-dessert');
const dessertsContainer = document.getElementById('dessert-container');


afficherDessertsBtn.addEventListener('click', function() {
  fetch('modeles/recuperations_donnees/recuperation_desserts.php')
    .then(response => response.json())
    .then(data => {
      let dessertsHtml = '';
      data.forEach(dessert => {
        dessertsHtml += `
          <div class="tableauadminconsultationbdd">
            <p>ID : ${dessert.id}</p>
            <h3>${dessert.titre}</h3>
            <p>Description : ${dessert.description}</p>
            <p>Prix : ${dessert.prix}</p>
          </div>
        `;
      });
      dessertsContainer.innerHTML = dessertsHtml;
    })
    .catch(error => {
      console.error('Une erreur s\'est produite :', error);
    });
});
