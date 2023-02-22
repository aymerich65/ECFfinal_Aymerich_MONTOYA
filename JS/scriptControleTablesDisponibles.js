const fetchOptions01 = {
    mode: 'cors'
};

document.addEventListener('DOMContentLoaded', function() {
    const pictureButton = document.querySelector('#pbutton');

    if (pictureButton) {
        pictureButton.addEventListener('click', () => {
            fetch("modeles/recuperations_donnees/recuperation_table_images.php", fetchOptions01)
                .then(response => response.text())
                .then(html => {
                    const tableContainer = document.querySelector('#table-container');
                    tableContainer.innerHTML = html;
                })
                .catch(error => {
                    console.error('Une erreur s\'est produite :', error);
                });
        });
    }
});
