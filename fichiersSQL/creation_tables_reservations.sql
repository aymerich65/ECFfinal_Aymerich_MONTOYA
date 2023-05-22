CREATE TABLE reservations (
    reservation INT NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
    couverts INT NOT NULL,
    email VARCHAR(254) NOT NULL,
    allergies VARCHAR(60) NULL,
    date DATE NOT NULL,
    horaire VARCHAR(60) NOT NULL
);
