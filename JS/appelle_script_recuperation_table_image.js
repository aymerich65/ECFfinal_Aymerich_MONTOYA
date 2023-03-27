const myFetchOptions = {
    mode: 'cors'
};

document.addEventListener('DOMContentLoaded', function() {
    const pictureButton = document.querySelector('#pbutton');

    pictureButton.addEventListener('click', () => {
        fetch("modeles/recuperations_donnees/recuperation_table_images.php", myFetchOptions)
            .then(response => response.text())
            .then(html => {
                const tableContainer = document.querySelector('#table-container');
                tableContainer.innerHTML = html;
            })
            .catch(error => {
                console.error('Une erreur s\'est produite :', error);
            });
    });
});



