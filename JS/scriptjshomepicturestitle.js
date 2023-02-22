
window.onload = function() {
    var images = document.querySelectorAll('.galerieaccueil img');
    images.forEach(function(img) {
        img.addEventListener('mouseover', function() {
            var desc = this.getAttribute('title');
            console.log(desc);
        });
    });
};
