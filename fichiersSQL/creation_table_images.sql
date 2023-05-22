CREATE TABLE images (
    id INT NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
    titre VARCHAR(60),
    nom_fichier VARCHAR(60),
    description TEXT,
    numero_image INT NOT NULL
);
