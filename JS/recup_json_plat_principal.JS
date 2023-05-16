const afficherPlatsPrincipauxBtn = document.getElementById('afficher-plats-principaux');
const platsContainer = document.getElementById('plats-container');

afficherPlatsPrincipauxBtn.addEventListener('click', function() {
  fetch('modeles/recuperations_donnees/recuperation_plat_principal.php')
    .then(response => response.json())
    .then(data => {
      let platsHtml = '';
      data.forEach(plat => {
        platsHtml += `
          <div class="tableauadminconsultationbdd">
            <p>ID : ${plat.id}</p>
            <h3>${plat.titre}</h3>
            <p>Description : ${plat.description}</p>
            <p>Prix : ${plat.prix}</p>
          </div>
        `;
      });
      platsContainer.innerHTML = platsHtml;
    })
    .catch(error => {
      console.error('Une erreur s\'est produite :', error);
    });
});