const afficherEntreesBtn = document.getElementById('afficher-entrees');
const entreesContainer = document.getElementById('entrees-container');

afficherEntreesBtn.addEventListener('click', function() {
  fetch('modeles/recuperations_donnees/recuperation_entrees.php')
    .then(response => response.json())
    .then(data => {
      let entreesHtml = '';
      data.forEach(entree => {
        entreesHtml += `
          <div class=tableauadminconsultationbdd>
            <p>ID : ${entree.id}</p>
            <h3>${entree.titre}</h3>
            <p>Description : ${entree.description}</p>
            <p>Prix : ${entree.prix}</p>
          </div>
        `;
      });
      entreesContainer.innerHTML = entreesHtml;
    })
    .catch(error => {
      console.error('Une erreur s\'est produite :', error);
    });
});