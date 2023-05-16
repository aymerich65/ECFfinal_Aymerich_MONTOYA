
const afficherMenuBtn = document.getElementById('afficher-menus');
const menusContainer = document.getElementById('menus-container');

afficherMenuBtn.addEventListener('click', function() {
    fetch('modeles/recuperations_donnees/recuperation_menus.php')
      .then(response => response.json())
      .then(data => {
        let menusHtml = '';
        data.forEach(menu => {
          menusHtml += `
            <div class="tableauadminconsultationbdd">
              <p>ID : ${menu.id}</p>
              <h3>${menu.titre}</h3>
              <p>Description : ${menu.description}</p>
              <p>Prix : ${menu.prix}</p>
            </div>
          `;
        });
        menusContainer.innerHTML = menusHtml;
      })
      .catch(error => {
        console.error('Une erreur s\'est produite :', error);
      });
  });
  