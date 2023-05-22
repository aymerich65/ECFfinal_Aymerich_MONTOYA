CREATE TABLE clients (
    convives INT NOT NULL,
    email VARCHAR(40) NOT NULL PRIMARY KEY UNIQUE,
    password VARCHAR(60) NOT NULL,
    allergies VARCHAR(60) NULL
);
